<?php

include 'libraries/activity.class.php';
$Object = new activity();

$formErrors = null;
$data = array();

$required = array('id_Veikla', 'rusis');

$maxLengths = array(
    'id_Veikla' => 5,
    'rusis' => 100,
);

if (!empty($_POST['submit'])) {
    include 'utils/validator.class.php';
    $validations = [
        'id_Veikla' => 'positivenumber',
        'rusis' => 'anything',
    ];


    $validator = new validator($validations, $required, $maxLengths);
    if ($validator->validate($_POST)) {

        $dataPrepared = $validator->preparePostFieldsForSQL();
        $Object->updateActivityInfo($dataPrepared);
        header("Location: index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $Object->getActivityById($id);
}
include 'templates/activity_form.tpl.php';
?>