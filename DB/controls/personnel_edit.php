<?php

include 'libraries/personnel.class.php';
$obj = new personnel();

include 'libraries/activity.class.php';
$activitiesObject = new activity();

include 'libraries/team.class.php';
$teamsObject = new team();

$formErrors = null;
$data = array();

$required = array('kodas', 'vardas', 'pavarde');

$maxLengths = array(
    'kodas' => 10,
    'vardas' => 20,
    'pavarde' => 20,
);
if (!empty($_POST['submit'])) {
    include 'utils/validator.class.php';
    $validations = ['kodas' => 'positivenumber',
        'vardas' => 'anything',
        'pavarde' => 'anything'];

    $validator = new validator($validations, $required, $maxLengths);
    if ($validator->validate($_POST)) {

        $dataPrepared = $validator->preparePostFieldsForSQL();
        $obj->update($dataPrepared);

        header("Location: index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $obj->getPersonnelById($id);
}

include 'templates/personnel_form.tpl.php';

