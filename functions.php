<?php
require_once "./Traits/CoverImage.php";
require_once "./Models/Genre.php";
require_once "./Models/Movie.php";


function createGenres()
{
    $json_text = file_get_contents("./genres.json");
    $json_genres = json_decode($json_text, true);
    $genres = [];
    foreach ($json_genres as $genre) {
        $genres[] = new Genre($genre["id"], $genre["name"], $genre["short_description"]);
    }
    return $genres;
}

function associateGenres()
{
    $genres = createGenres();
    $associatedGenres = [];

    $separatedPostGenres = explode(",", $_POST["genres"]);

    foreach ($genres as $genre) {
        if (in_array(strtolower($genre->getName()), $separatedPostGenres, true)) {
            $associatedGenres[] = $genre;
        }
    }

    return $associatedGenres;
}
function findGenres(array $genres){
    $real_genres = createGenres();
    $found_genres = [];
    foreach($real_genres as $real_genre){
        foreach($genres as $genre){
            if(strtolower($genre["name"]) == strtolower($real_genre -> getName())){
                $found_genres[] = $real_genre;
            }
        }
    }
    return $found_genres;
}
function read_movies()
{
    $json_text = file_get_contents("./movies.json");
    $json_movies = json_decode($json_text, true);
    $movies = [];
    foreach ($json_movies as $movie) {
        $associated_genres = findGenres($movie["genres"]);
        $new_movie = new Movie($movie["title"], $movie["short_description"], $movie["year"], ...$associated_genres);
        $new_movie->setImage($movie["image_url"], $movie["image_alt"]);
        $movies[] = $new_movie;
    }
    return $movies;
}

function add_movie(Movie $movie)
{
    $movies = read_movies();
    $movies[] = $movie;
    $json_text = json_encode($movies);
    file_put_contents("./movies.json", $json_text);
}

?>