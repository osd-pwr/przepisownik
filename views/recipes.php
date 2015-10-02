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
    <link rel="stylesheet" href="/css/master.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body class="search">
    <div class="main card">
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
    </div>
  </body>
</html>
