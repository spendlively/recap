<?php

require_once 'vendor/Reminder.php';

//file_put_contents("public/active_item", serialize(array(1=>'linux')));die();

$reminder = new \vendor\Reminder();
var_dump($reminder->setNextItem());
