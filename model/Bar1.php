<?php

require_once('model/Bar.php');
require_once('model/Notes.php');

class Bar1 extends Bar {
    
    protected function getBarNumber() {
        return 1;
    }
    
    protected function step($i) {
        switch($i) {
            case 1:
                $this->notes[$i] = Notes::Ab;
                break;
            case 2:
            case 4:
            case 6:
            case 8:    
            case 10:
            case 12:
            case 14:    
            case 16:    
            case 18:
            case 20:
            case 22:
            case 24:
            case 26:
            case 28:
            case 30:    
                $this->choose(array(
                        $this->notes[$i + 1] - 1,
                        $this->notes[$i + 1] + 1
                    ), $i);
                break;//return false;
            case 3:
            case 5:
            case 7:
                $this->choose(array(
                        Notes::D, 
                        Notes::F, 
                        Notes::Ab, 
                        Notes::C
                    ), $i);
                break;//return false;
            case 9:
                $this->notes[$i] = Notes::D;
                break;
            case 11:
            case 13:
            case 15:
                $this->choose(array(
                        Notes::G, 
                        Notes::H, 
                        Notes::D, 
                        Notes::F
                    ), $i);
                break;//return false;   
                
            case 17:
                $this->notes[$i] = Notes::G;
                break;
            case 19:
            case 21:
            case 23:
            case 25:    
            case 27:
            case 29:
            case 31:
                $this->choose(array(
                        Notes::C, 
                        Notes::Eb, 
                        Notes::G, 
                        Notes::Bb                        
                    ), $i);                
                break;//return false;
            case 32:
                $this->choose(array(
                        Notes::A, 
                        Notes::G, 
                    ), $i);                
                break;//return false;
        }
        //print("step $i: " . $this->notes[$i] . "<br>");
        return true;
    }
    
    private function choose(array $a, $step) {  
        $c = count($a);
        if (!$c) return;                
        $i = rand(0, $c - 1);        
        $this->notes[$step] = $a[$i];
        return;        
    } 
    
    private function fork(array $a, $step) {           
        $c = count($a);
        for($i = 0; $i < $c; $i++) {
            $newBar = clone $this;
            $newBar->id .= ($i + 1); 
            $newBar->notes[$step] = $a[$i];
            $newBar->generate($step + 1);
        }        
    }
    
}

?>
