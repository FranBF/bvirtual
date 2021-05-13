<?php
include_once('user.php');
$user = new User();
$name = filter_input(INPUT_POST, 'name');
$surname = filter_input(INPUT_POST, 'surname');
$email = filter_input(INPUT_POST, 'email');
$dni = filter_input(INPUT_POST, 'dni');
$phone = filter_input(INPUT_POST, 'phone');
$user->register($name, $surname, $email, $dni, $phone);
