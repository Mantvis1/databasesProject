<?php

include 'libraries/arena.class.php';
$arenasObject = new arena();

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
        $count = $arenasObject->idCount($dataPrepared['id']);
        if ($count == 0) {
            $arenasObject->addNewArena($dataPrepared);
            header("Location: index.php?module={$module}&action=list");
            die();
        } else {
            $removeErrorParameter = '&remove_error=1';
            header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
            die();
        }
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
}
include 'templates/arena_form.tpl.php';
?>