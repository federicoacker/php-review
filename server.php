<?php 
require_once "./Traits/CoverImage.php";
require_once "./Models/Movie.php";
require_once "./Models/Genre.php";
require_once "./functions.php";


$associatedGenres = associateGenres();
$new_movie = new Movie($_POST["title"], $_POST["short_description"], $_POST["year"], ...$associatedGenres);
$new_movie -> setImage($_POST["image_url"], $_POST["image_alt"]);

add_movie($new_movie);

header("Location: ./index.php");
?>