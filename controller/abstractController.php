<?php
abstract class abstractController{

    public function getTitle(){
        return $this->title();
    }

    public function getMetaKey(){
        return $this->metaKey();
    }

    public function getMetaDesc(){
        return $this->metaDesc();
    }


    public function getMainContent(){
        return $this->mainContent();
    }
    
    abstract function title();
    abstract function metaKey();
    abstract function metaDesc();
    abstract function mainContent();
}