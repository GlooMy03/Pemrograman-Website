<?php 
namespace LibrarySystem;


require_once __DIR__ . '/item.php';
require_once __DIR__ . '/logging_trait.php';


class Book extends Item {
    private $author;
    use LoggingTrait;

    public function __construct($title, $year, $author) {
        parent::__construct($title, $year);
        $this->author = $author;
    }

    public function getInfo() {
        return "Book: $this->title, Author: $this->author, Year: $this->year";
    }

    // public function __toString() {
    //     return $this->getInfo();
    // }
    // magic methode 
    
}
?>
