<?php

include 'libraries/contest.class.php';
$obj = new contest();

include 'libraries/team.class.php';
$teamsObject = new team();

$formErrors = null;
$data = array();

$required = array('kodas', 'rezultatas1', 'rezultatas2','fk_Komandaid','fk_Komandaid1');

$maxLengths = array(
    'kodas' => 10,
    'rezultatas1' => 3,
    'rezultatas2' => 3
);

if (!empty($_POST['submit'])) {
    include 'utils/validator.class.php';
    $validations = [
        'kodas' => 'positivenumber',
        'rezultatas1' => 'positivenumber',
        'rezultatas2' => 'positivenumber',
        'fk_Komandaid' => 'positivenumber',
        'fk_Komandaid1' => 'positivenumber'
    ];


    $validator = new validator($validations, $required, $maxLengths);
    if ($validator->validate($_POST)) {

        $dataPrepared = $validator->preparePostFieldsForSQL();
        $count = $obj->isIdExists($dataPrepared['kodas']);
        if ($count == 0) {
            $obj->addNew($dataPrepared);
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

include 'templates/contest_form.tpl.php';
