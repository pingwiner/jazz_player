<?php

require_once('model/Position.php');

class Notes {
    const C = 1;
    const Cx = 2;
    const Db = 2;
    const D = 3;
    const Dx = 4;
    const Eb = 4;
    const E = 5;
    const F = 6;
    const Fx = 7;
    const Gb = 7;
    const G = 8;
    const Gx = 9;
    const Ab = 9;
    const A = 10;
    const Ax = 11;
    const Hb = 11;
    const Bb = 11;
    const H = 12;
    const B = 12;    
    
    static function get($i) {
        $data = array(
            0 => 'H',
            1 => 'C',
            2 => 'C#',
            3 => 'D',
            4 => 'Eb',
            5 => 'E',
            6 => 'F',
            7 => 'F#',
            8 => 'G',
            9 => 'Ab',
            10 => 'A',
            11 => 'Bb',
            12 => 'H',
            13 => 'C',
        );
        return $data[$i];
    }
}

?>
