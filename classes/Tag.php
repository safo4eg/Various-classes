<?php

class Tag {
    private $name;
    private $attrs;

    public function __construct($name) {
        $this->name = $name;
    }

    public function setAttr($name, $value) {
        $this->attrs[$name] = $value;
        return $this;
    }

    public function setAttrs($attrs) {
        foreach($attrs as $name => $value) {
            $this->setAttr($name, $value);
        }
        return $this;
    }

    public function open() {
        $name = $this->name;
        $attrs_str = $this->getAttrsStr($this->attrs);
        return "<$name$attrs_str>";
    }

    public function close() {
        $name = $this->name;
        return "</$name>";
    }

    private function getAttrsStr($attrs) {
        if(!empty($attrs)) {
            $result = '';
            foreach($attrs as $name => $value) {
                $result .= " $name=\"$value\"";
            }
            return $result;
        } else {
            return '';
        }
    }
}