<?php
require_once "./Traits/CoverImage.php";
require_once "./Models/Genre.php";
require_once "./Models/Movie.php";
require_once "./functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./Styles/index.css">

<body>
    <div class="wrapper">
        <header>
            <h1>Film</h1>
        </header>

        <div class="container py-4">
            <div class="row row-gap-2 mb-3">
                <?php
                $movies = read_movies();
                foreach ($movies as $movie) {
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card disk-card">
                            <div class="card-header">
                                <div class="card-title"><?php echo $movie->title ?></div>
                                <img class="card-img" src=<?php echo $movie->getImageUrl() ?> alt=<?php echo $movie->getImageAlt() ?> />
                            </div>
                            <div class="card-body">
                                <div class="card-text"><?php echo $movie->short_description ?></div>
                                <hr>
                                <div class="card-text">Generi: <br /> <?php echo $movie->getGenreString() ?></div>
                                <hr>
                                <div class="card-text">Anno di Rilascio: <?php echo $movie->year ?></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <form action="./server.php" method="POST">
                <div class="form-control mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input required id="title" name="title" type="text" class="form-control"/>

                    <label for="short_description" class="form-label">Descrizione Breve</label>
                    <textarea required id="short_description" name="short_description" type="text" class="form-control"></textarea>

                    <label for="year" class="form-label">Anno</label>
                    <input required id="year" name="year" type="text" class="form-control"/>

                    <label for="genres" class="form-label">Generi</label>
                    <input required id="genres" name="genres" type="text" class="form-control"/>

                    <label for="image_url" class="form-label">URL Immagine</label>
                    <input required id="image_url" name="image_url" type="text" class="form-control"/>

                    <label for="image_alt" class="form-label">URL Immagine</label>
                    <input required id="image_alt" name="image_alt" type="text" class="form-control"/>

                </div>
                
                <button class="btn btn-primary">Aggiungi</button>
            </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>