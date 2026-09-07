<?php 
trait CoverImage {
    private string $image_url;
    private string $image_alt;

    public function setImage(string $image_url, string $image_alt){
        $this->image_url = $image_url;
        $this->image_alt = $image_alt;
    }

    public function getImageUrl(): string {
        return $this->image_url;
    }

    public function getImageAlt(): string {
        return $this->image_alt;
    }
}

?>