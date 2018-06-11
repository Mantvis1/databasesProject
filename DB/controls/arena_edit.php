<?php

include 'libraries/arena.class.php';
$obj = new arena();

$formErrors = null;
$data = array();

$required = array('id', 'pavadinimas', 'talpa');

$maxLengths = array(
    'id' => 10,
    'pavadinimas' => 50,
    'talpa' => 6
);

if (!empty($_POST['submit'])) {
    include 'utils/validator.class.php';
    $validations = [
        'id' => 'positivenumber',
        'pavadinimas' => 'anything',
        'talpa' => 'positivenumber'
    ];


    $validator = new validator($validations, $required, $maxLengths);
    if ($validator->validate($_POST)) {

        $dataPrepared = $validator->preparePostFieldsForSQL();
        $obj->updateArenasInfo($dataPrepared);
        header("Location: index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $obj->getArenaById($id);
}
include 'templates/arena_form.tpl.php';
?>