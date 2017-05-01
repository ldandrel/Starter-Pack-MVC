<?php
namespace Core;

class Cache
{
    public $dirname;	// Dossier de cache
    public $duration;   // Durée de vie du cache EN MINUTES
    public $buffer;		// Buffer (utilisé pour les méthodes start/end)


    public function __construct($dirname, $duration){
        $this->dirname = $dirname;
        $this->duration = $duration;
    }

    public function write($cachename, $content){
        return file_put_contents($this->dirname.'/'.$cachename, $content);
    }


    public function read($cachename){
        $file = $this->dirname.'/'.$cachename;
        if(!file_exists($file)){
            return false;
        }
        $lifetime = (time() - filemtime($file)) / 60;
        if($lifetime > $this->duration){
            return false;
        }
        return file_get_contents($file);
    }


    public function delete($cachename){
        $file = $this->dirname.'/'.$cachename;
        if(file_exists($file)){
            unlink($file);
        }
    }


    public function clear(){
        $files = glob($this->dirname.'/*');
        foreach( $files as $file ) {
            unlink($file);
        }
    }
}