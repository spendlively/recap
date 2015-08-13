<?php
namespace vendor;

require_once 'vendor/DataPath.php';

class ContentIterator implements \RecursiveIterator{

    public $data = array();

    public $level;

    public function __construct($data, $level = 1){
        $this->data = $data;
        $this->level = $level;
    }

    public function hasChildren(){

        $current = $this->data[$this->key()];
        return !empty($current['items']);
    }

    public function getChildren(){

        $current = $this->data[$this->key()];
        return new ContentIterator($current['items'], $this->level + 1);
    }

    public function current(){

        \vendor\DataPath::setPath($this->key(), $this->level);

        $current = $this->data[$this->key()];
        return array(
            'title'     => $current['title'],
            'href'      => $current['href'],
            'style'     => $current['style'],
            'img'       => $current['img'],
            'cls'       => $current['cls'],
            'activable' => $current['activable'],
        );
    }

    public function next(){
        next($this->data);
    }

    public function key(){

        return key($this->data);
    }

    public function valid(){

        return !empty($this->data[$this->key()]);
    }

    public function rewind(){

        rewind($this->data);
    }
}