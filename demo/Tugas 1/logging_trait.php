<?php
namespace LibrarySystem;

trait LoggingTrait {
    public function log($message) {
        echo "[LOG]: " . $message . "\n";
    }
}


