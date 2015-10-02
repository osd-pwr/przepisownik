<?php
/**
 * Search for matching ingredients in the database
 */

// include non-gittable constants

include '../config.php';

// if no search is to be reported

if (!isset($_POST['s']))
  die("No tak bez niczego?");

try {
  // connect to db

  $db = new PDO('mysql:host=localhost;dbname=przepisownik;charset=utf8', DB_USER, DB_PASS);

  // split the list

  $s = explode(",", $_POST['s']);
  foreach ($s as &$sval) {
    $sval = trim($sval);
  }
  unset($sval);
  var_dump($s);

  // Search for ingredients

  $in_stmt = $db->prepare('SELECT ingredient_id, name FROM ingredients_names WHERE name IN ('.implode(',', array_fill(0, count($s), '?')).')');
  $in_stmt->execute($s);
  $in = $in_stmt->fetchAll(PDO::FETCH_ASSOC);

  var_dump($in);

} catch (PDOException $e) {

  // error while connecting to db
  print "Error!: " . $e->getMessage() . "<br/>";
  die();

}

// auto destroy the MySQL resource; should work as there's nearly no work to do
