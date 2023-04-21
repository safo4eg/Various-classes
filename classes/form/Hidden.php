<?php
require_once('classes/form/Input.php');
class Hidden extends Input {
    public function __construct($value_name, $value_value) {
        $this->setAttrs(['type' => 'hidden', 'name' => $value_name, 'value' => $value_value]);
        parent::__construct();
    }

    public function open() {
        return Tag::open();
    }
}