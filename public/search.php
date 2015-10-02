<?php
/**
 * Search for matching ingredients in the database
 */

// include non-gittable constants

include '../config.php';

// if no search is to be reported

if (!isset($_POST['s'])) {
  $error = "No tak bez niczego?";
  include '../views/error.php';
  exit;
}

try {
  // connect to db

  $db = new PDO('mysql:host=localhost;dbname=przepisownik;charset=utf8', DB_USER, DB_PASS);

  // split the list

  $s = explode(",", $_POST['s']);
  foreach ($s as &$sval) {
    $sval = trim($sval);
  }
  unset($sval);

  // Search for ingredients

  $in_stmt = $db->prepare('SELECT ingredient_id, name FROM ingredients_names WHERE name IN ('.implode(',', array_fill(0, count($s), '?')).')');
  $in_stmt->execute($s);
  $ingredients = $in_stmt->fetchAll(PDO::FETCH_ASSOC);
  $in_ids = [];
  foreach ($ingredients as $in) {
    $in_ids[] = intval($in['ingredient_id']);
  }

  // Look for recipes containing at least one of the ingredients;
  // sort 'em by how many ingredients we don't have are needed to get them done

  $rcp_stmt = $db->prepare(
     'SELECT recipes.*, recipes.ingredients_count - COUNT(ingredient_id) AS need
      FROM recipes_ingredients, recipes
      WHERE recipes_ingredients.ingredient_id IN ('.implode(',', array_fill(0, count($in_ids), '?')).')
        AND recipes.id = recipes_ingredients.recipe_id
      GROUP BY recipe_id
      ORDER BY need
      LIMIT 0, 25');
  $rcp_stmt->execute($in_ids);
  $recipes = $rcp_stmt->fetchAll(PDO::FETCH_ASSOC);

  // see what we've got here!

  include '../views/recipes.php';

} catch (PDOException $e) {

  // error while connecting to db
  print "Error!: " . $e->getMessage() . "<br/>";
  die();

}

// auto destroy the MySQL resource; should work as there's nearly no work to do
