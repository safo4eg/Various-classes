<?php
require_once('classes/Tag.php');
class HtmlList extends Tag {
    private $items = [];

    public function __toString() {
        return $this->show();
    }

    public function addItem(ListItem $li) {
        $this->items[] = $li;
        return $this;
    }

    public function show() {
        $result = $this -> open();
        foreach($this->items as $item) {
            $result .= $item;
        }
        $result .= $this->close();
        return $result;
    }
}