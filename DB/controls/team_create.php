<?php

include 'libraries/team.class.php';
$teamObject = new team();

$formErrors = null;
$data = array();

$required = array('id', 'pavadinimas', 'biudzetas', 'kodas', 'rezultatas', 'rezultatas1');

$maxLengths = array(
    'id' => 10,
    'pavadinimas' => 50,
    'talpa' => 9,
    'kodas' => 10,
    'rezultatas' => 3,
    'rezultatas1' => 3
);
if (!empty($_POST['submit'])) {
    include 'utils/validator.class.php';
    $validations = [
        'id' => 'positivenumber',
        'pavadinimas' => 'anything',
        'talpa' => 'positivenumber',
        'kodas' => 'positivenumber',
        'rezultatas' => 'positivenumber',
        'rezultatas1' => 'positivenumber'
    ];
    $validator = new validator($validations, $required, $maxLengths);
}

include 'templates/team_form.tpl.php';
