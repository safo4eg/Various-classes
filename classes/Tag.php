<?php
require_once('interfaces/iTag.php');

class Tag implements iTag {
    private $name;
    private $attrs;
    private $text = '';

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getText() {
        return $this->text;
    }

    public function show() {
        return $this->open().$this->text.$this->close();
    }

    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    public function removeClass($class_name) {
        if(isset($this->attrs['class'])) {
            $class_names = explode(' ', $this->attrs['class']);

            if(in_array($class_name, $class_names)) {
                $class_names = $this->removeElem($class_name, $class_names);
                $this->attrs['class'] = implode(' ', $class_names);
            }
        }

        return $this;
    }

    public function addClass($class_name) {
        if(isset($this->attrs['class'])) {
            $class_names = explode(' ', $this->attrs['class']);
            if(!in_array($class_name, $class_names)) {
                $class_names[] = $class_name;
                $this->attrs['class'] = implode(' ', $class_names);
            }
        } else $this->attrs['class'] = $class_name;
        return $this;
    }

    public function setAttr($name, $value = true) {
        $this->attrs[$name] = $value;
        return $this;
    }

    public function getAttr($name) {
        if(isset($this->attrs[$name])) {
            return $this->attrs[$name];
        } else {
            return null;
        }
    }

    public function setAttrs($attrs) {
        foreach($attrs as $name => $value) {
            $this->setAttr($name, $value);
        }
        return $this;
    }

    public function getAttrs() {
        return $this->attrs;
    }

    public function removeAttr($name) {
        unset($this->attrs[$name]);
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

    private function removeElem($elem, $arr) {
        $key = array_search($elem, $arr);
        array_splice($arr, $key, 1);
        return $arr;
    }

    private function getAttrsStr($attrs) {
        if(!empty($attrs)) {
            $result = '';
            foreach($attrs as $name => $value) {
                if($value === true) {
                    $result .= " $name";
                } else {
                    $result .= " $name=\"$value\"";
                }
            }
            return $result;
        } else {
            return '';
        }
    }
}