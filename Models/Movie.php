<?php 
class Movie implements \JsonSerializable {
    public string $title;
    public string $short_description;
    public string $year;
    public array $genres;

    use CoverImage;

    public function __construct(string $title, string $short_description, string $year, Genre ...$genres){
        $this->title = $title;
        $this->short_description = $short_description;
        $this->year = $year;
        $this->genres = $genres;
    }

    public function getGenreString():string{
        $return_string = "<ul>";
        foreach($this->genres as $genre){
            $return_string .= "<li>" . $genre->getName() . "</li>";
        }
        $return_string .= "</ul>";

        return $return_string;
    }

    public function jsonSerialize(): array{
        return[
            "title" => $this->title,
            "short_description" => $this->short_description,
            "year" => $this->year,
            "genres" => $this->genres,
            "image_url" => $this->getImageUrl(),
            "image_alt" => $this->getImageAlt()
        ];
    }
}

?>