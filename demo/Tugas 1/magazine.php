<?php
namespace LibrarySystem;

require_once __DIR__ . '/item.php';
require_once __DIR__ . '/logging_trait.php';

class Magazine extends Item {
    private $issueNumber;
    use LoggingTrait;

    public function __construct($title, $year, $issueNumber) {
        parent::__construct($title, $year);
        $this->issueNumber = $issueNumber;
    }

    public function getInfo() {
        return "Magazine: $this->title, Issue: $this->issueNumber, Year: $this->year";
    }
}
