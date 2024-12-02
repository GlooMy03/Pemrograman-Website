<?php
require_once __DIR__ . '/book.php';
require_once __DIR__ . '/magazine.php';

use LibrarySystem\Book;
use LibrarySystem\Magazine;

$book = new Book("Object Oriented Programming", 2023, "John Doe");
$magazine = new Magazine("PHP Weekly", 2024, "23");

echo $book->getInfo() . "\n";
echo $magazine->getInfo() . "\n";

$book->log("New book added to the library");
$magazine->log("New magazine added to the library");


//echo $book ;
