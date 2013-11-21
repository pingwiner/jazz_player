<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Position
 *
 * @author nightrain
 */
class Position {
    public $string;
    public $fret;
    
    public function __construct($string, $fret) {
        $this->string = $string;
        $this->fret = $fret;
    }
}

?>
