<?php
/**
 * Search view
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Wyniki wyszukiwania</title>
  </head>
  <body>
    <p>No hej! Oto twe przepisy!</p>
    <ul>
    <?php
      foreach ($recipes as $recipe) {
        echo '
          <li>
            <a href="'.$recipe['url'].'">
              <h4>'.$recipe['name'].'</h4>
              <p>Brakuje '.$recipe['need'].' z '.$recipe['ingredients_count'].'</p>
            </a>
          </li>';
      } ?>
  </ul>
  </body>
</html>
