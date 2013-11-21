<?php

abstract class Bar {
    protected $notes;
    protected $id;    
    
    public function __construct($id = 1) {
        $this->notes = array();
        $this->id = $id;
    }   
   
    public function generate($from = 1) {
        for ($i = 1; $i <= 31; $i+=2) {
            $this->step($i);
        }
        for ($i = 2; $i <= 30; $i+=2) {
            $this->step($i);
        }
	$this->step(32);
        //$this->save();
        $this->printx();
    }
    
    protected abstract function step($i);

    protected abstract function getBarNumber();
    
    private function save() {
        $data = implode(';', $this->notes);
        file_put_contents('results/' . $this->getBarNumber() . '_' . $this->id, $data);
    }
    
    private function printx() {
        $result = '';
          for($i = 1; $i < 33; $i++) {
            $note = $this->notes[$i]; 
            if ($i % 8 != 1) $result .= '';
            $result .= $this->colorize(Notes::get($note), $i);
            if ($i % 8 == 0) $result .= "</tr>\n<tr>\n";
        }
        $tpl = file_get_contents('templates/main.html');        
        print(str_replace('%OUT%', $result, $tpl));
    }
    
    private function colorize($text, $step) {
        if ($step % 2) 
            $class = 'strong'; 
        else 
            $class = 'weak';
        return '<td id="bit-' . $step . '" class="' . $class . '" tone="' . $this->notes[$step] . '">' . $text . '</td>' . "\n";
        
    }
}

?>
