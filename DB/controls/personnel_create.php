<?php

include 'libraries/personnel.class.php';
$obj = new personnel();

include 'libraries/activity.class.php';
$activitiesObject = new activity();

include 'libraries/team.class.php';
$teamsObject = new team();

$formErrors = null;
$data = array();

$required = array('kodas', 'vardas', 'pavarde','paskirtis','fk_Komandakodas');

$maxLengths = array(
    'kodas' => 10,
    'vardas' => 20,
    'pavarde' => 20
);
if (!empty($_POST['submit'])) {
    include 'utils/validator.class.php';
    $validations = ['kodas' => 'positivenumber',
        'vardas' => 'anything',
        'pavarde' => 'anything',
        'paskirtis' => 'positivenumber',
        'fk_Komandakodas' => 'positivenumber'];

    $validator = new validator($validations, $required, $maxLengths);
    if ($validator->validate($_POST)) {
        $idCount = $obj->isIdExists($_POST['kodas']);
        if ($idCount == 0) {
            $dataPrepared = $validator->preparePostFieldsForSQL();
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

include 'templates/personnel_form.tpl.php';

