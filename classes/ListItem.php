<?php
require_once('classes/Tag.php');
class ListItem extends Tag{
    public function __construct($text = '') {
        parent::__construct('li');
        $this->setText($text);
    }

    public function __toString() {
        return $this->show();
    }
}