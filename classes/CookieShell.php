<?php
class CookieShell {
    public function set($name, $value, $time) {
        setcookie($name, $value, time() + $time);
        $_COOKIE[$name] = $value;
    }

    public function get($name) {
        return $_COOKIE[$name];
    }

    public function del($name) {
        setcookie($name, '', time());
        unset($_COOKIE[$name]);
    }

    public function exist($name) {
        return isset($_COOKIE[$name])? true: false;
    }
}