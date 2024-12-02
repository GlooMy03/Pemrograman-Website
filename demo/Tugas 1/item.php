<?php
namespace LibrarySystem;


abstract class Item {
    protected $title; 
    protected $year;

    public function __construct($title, $year) { 
        $this->title = $title;
        $this->year = $year;
    }
   

    abstract public function getInfo();
    
}
