<?php
require_once('interfaces/iFile.php');
class File implements iFile {
    private $path;
    private $segments = [];
    public function __construct($file_path) {
        $this->path = $file_path;
        $this->getPathSegments($file_path);
    }

    public function getPath() {
        return $this->path;
    }

    public function getDir() {
        return $this->segments['dir_name'];
    }

    public function getName() {
        return $this->segments['file_name'];
    }

    public function getExt() {
        return $this->segments['ext'];
    }

    public function getSize() {
        return filesize($this->path);
    }


    public function getText() {
        return file_get_contents($this->path);
    }

    public function setText($text) {
        file_put_contents($this->path, $text);
    }

    public function appendText($text) {
        $extended_text = file_get_contents($this->path).$text;
        file_put_contents($this->path, $extended_text);
    }

    public function copy($copy_path) {
        copy($this->path, $copy_path);
    }

    public function delete() {
        unlink($this->path);
    }

    public function rename($new_name) {
        $new_path = str_replace($this->segments['file_name'].".".$this->segments['ext'], $new_name.".".$this->segments['ext'], $this->path);
        rename($this->path, $new_path);
        $this->path = $new_path;
        $this->segments['file_name'] = $new_name;
    }

    public function replace($new_path) {
        $new_path .= "{$this->segments['file_name']}.{$this->segments['ext']}";
        rename($this->path, $new_path);
        $this->path = $new_path;
        $this->getPathSegments($new_path);
    }

    private function getPathSegments($file_path) {
        preg_match(
            '#^(?:\/?.+(?=(?:\/.+\/.+\..+)))?(?:\/?(?<dir_name>.+)\/)?(?:(?<file_name>.+)\.(?<ext>.+))$#',
            $file_path,
            $match
        );

        $this->segments['dir_name'] = $match['dir_name'];
        $this->segments['file_name'] = $match['file_name'];
        $this->segments['ext'] = $match['ext'];
    }
}