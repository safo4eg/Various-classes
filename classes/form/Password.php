<?php
require_once('classes/form/Input.php');
class Password extends Input {
    public function __construct() {
        $this->setAttrs(['type' => 'password']);
        parent::__construct();
    }

    public function open() {
        return Tag::open();
    }
}