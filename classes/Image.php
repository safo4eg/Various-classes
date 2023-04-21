<?php
require_once('classes/Tag.php');

class Image extends Tag {

    public function __construct() {
        $this->setAttrs(['src' => '', 'alt' => '']);
        parent::__construct('img');
    }

    public function __toString() {
        return parent::open();
    }
}