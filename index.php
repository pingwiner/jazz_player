<?php

require_once('model/Notes.php');
require_once('model/Bar1.php');
//require_once('model/Bar2.php');
//require_once('model/Bar3.php');
//require_once('model/Bar4.php');

class Jazz {
    private $notes;
    
    public function __construct() {
        $this->notes = array();
    }
    
    private function init() {
        $this->notes[0] = new Note(0, array('C', 'H#', 'B#'), array(
            new Position()
        ));
    }
    
    public function play() {
        $bar = new Bar1();
        $bar->generate();
    }
    
}

$jazz = new Jazz();
$jazz->play();