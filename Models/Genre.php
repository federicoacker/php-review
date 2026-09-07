<?php 

class Genre implements \JsonSerializable{
    private int $id;
    private string $name;
    private string $short_description;

    public function __construct(int $id, string $name, string $short_description){
        $this->id = $id;
        $this->name = $name;
        $this->short_description = $short_description;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getShortDescription():string {
        return $this->short_description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function jsonSerialize(): array{
        return[
            "name" => $this->getName()
        ];
    }
}

?>