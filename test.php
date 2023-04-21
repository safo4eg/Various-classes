<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    require_once('classes/form/Form.php');
    require_once('classes/form/Input.php');
    require_once('classes/form/Submit.php');
    require_once('classes/form/Password.php');
    require_once('classes/form/Hidden.php');

    $form = new Form();
    $form->setAttrs(['action' => 'test.php', 'method' => 'POST']);

    $input_hidden = new Hidden('id', '123');

    $input_login = new Input();
    $input_login->setAttrs(['placeholder' => 'login', 'name' => 'login']);

    $input_password = new Password();
    $input_password->setAttrs(['name' => 'passw', 'placeholder' => 'password']);

    $input_submit = new Submit('Send');

    echo $form->open()."\r\n";
    echo $input_hidden."\r\n";
    echo $input_login."\r\n";
    echo $input_password."\r\n";
    echo $input_submit."\r\n";
    echo $form->close()."\r\n";

    if(!empty($_POST)) {
        echo var_dump($_POST);
    }
