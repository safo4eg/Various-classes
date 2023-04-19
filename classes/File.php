<?php
require_once('interfaces/iFile.php');
class File implements iFile {
    public $path;
    public function __construct($file_path) {
        $this->path = $file_path;
    }

    public function getPath() {
        return $this->path;
    }

    public function getDir() {
        preg_match('#.+(?<dir_name>\/.+\/)(?<file_name>.+\.(?<file_ext>.+))$#', $this->path, $match);
        return $match['dir_name'];
    }

    public function getName() {
        preg_match('#.+(?<dir_name>\/.+\/)(?<file_name>.+\.(?<file_ext>.+))$#', $this->path, $match);
        return $match['file_name'];
    }

    public function getExt() {
        preg_match('#.+(?<dir_name>\/.+\/)(?<file_name>.+\.(?<file_ext>.+))$#', $this->path, $match);
        return $match['file_ext'];
    }

    public function getSize() {
        return filesize($this->path);
    }


    public function getText() {
        return file_get_contents($this->path);
    }

    public function setText($text) {
        file_put_contents($this->path);
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
        preg_match('#.+(?<dir_name>\/.+\/)(?<file_name>.+\.(?<file_ext>.+))$#', $this->path, $match);
        $file_name = $match['file_name'];
        $new_path = preg_replace($file_name, $new_name, $this->path);
        rename($this->path, $new_path);
        $this->path = $new_path;
    }

    public function replace($new_path) {
        rename($this->path, $new_path);
        $this->path = $new_path;
    }
}