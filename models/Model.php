<?php


class Model {
	

    public function __construct ($fileBase = false) {
         $fileBase = 'db.json';
       // $this->db = DB::connToDB ();
        if(is_file($fileBase)){
            $this->fileBase =$fileBase;
        }
    }
    public function ReadBase (){
        $baseRead = is_file($this->fileBase) ? file_get_contents($this->fileBase) : '[]';
        $baseRead = @json_decode($baseRead, true);
        $baseRead = is_array($baseRead) ? $baseRead : [];
        if(!isset($baseRead['email'])) $baseRead['email'] = [];
        if(!isset($baseRead['login'])) $baseRead['login'] = [];
        if(!isset($baseRead['base'])) $baseRead['base'] = [];
        return $baseRead;
    }
	
}



?>