<?php
require_once('classes/form/Input.php');
class Submit extends Input {
    public function __construct($value = '') {
        $this->setAttrs(['value' => $value, 'type' => 'submit']);
        parent::__construct();
    }
}