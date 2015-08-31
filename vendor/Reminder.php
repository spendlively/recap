<?php
namespace vendor;

require_once 'vendor/ContentIterator.php';
require_once 'vendor/DataPath.php';

class Reminder {

    public $content = null;

    public $activeItemFile = 'public/active_item';

    public $activeItemStyle = 'border: 4px dotted #ffff00; background: #ffff00;';

    public function getActiveItemStyle(){
        return $this->activeItemStyle;
    }

    public function getContent(){

        if($this->content === null){
            $this->content = include 'content.php';
        }

        return $this->content;
    }

    public function getActiveItem(){

        $content = file_get_contents($this->activeItemFile);
        if($content){
            $activeItem = unserialize($content);
            if(is_array($activeItem) && !empty($activeItem)){
                return $activeItem;
            }
        }

        return array('', '');
    }

    public function setNextItem(){

        $activeItem = $this->getActiveItem();
        $allItems = array();
        $this->getAllItems($allItems);

//        file_put_contents("public/active_item", serialize(array(1=>'linux'))); die();

        if(!empty($allItems)){

            foreach($allItems as $i => $item){
                if($activeItem === $item){
                    if(!$nextItem = current($allItems)){
                        $nextItem = reset($allItems);
                    }
                    file_put_contents($this->activeItemFile, serialize($nextItem));
                    break;
                }
            }
        }
    }

    public function getAllItems(&$allItems){

        $iterator = new \vendor\ContentIterator($this->getContent());
        $this->iterate($iterator, $allItems);
    }

    public function iterate($iterator, &$allItems){


        while($iterator->valid()){

            $key = $iterator->key();
            $current = $iterator->current();

            if($iterator->hasChildren()){
                $this->iterate($iterator->getChildren(), $allItems);
            }
            else{
                if($current['activable'] === true){
                    $allItems[] = \vendor\DataPath::getPath();
                }
            }

            $iterator->next();
        }
    }
} 