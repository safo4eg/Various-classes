<?php
require_once('classes/Tag.php');
class Link extends Tag {
    public function __construct($text = '', $link = '') {
        parent::__construct('a');
        $this->setAttr('href', $link);
        $this->setText($text);
    }

    public function __toString() {
        return parent::show();
    }
}