<?php

include 'libraries/history.class.php';
$Object = new history();

include 'libraries/team.class.php';
$teamsObject = new team();

$formErrors = null;
$data = array();

$required = array('id', 'pavadinimas', 'biudzetas');

$maxLengths = array(
    'id' => 10,
    'pavadinimas' => 50,
    'biudzetas' => 10,
);

if (!empty($_POST['submit'])) {
    include 'utils/validator.class.php';
    $validations = [
        'id' => 'positivenumber',
        'pavadinimas' => 'anyhing',
        'biudzetas' => 'positivenumber',
    ];
    $validator = new validator($validations, $required, $maxLengths);

    if ($validator->validate($_POST)) {

        $dataPrepared = $validator->preparePostFieldsForSQL();
        $Object->insertNew($dataPrepared);


        //  header("Location: index.php?module={$module}&action=list");
        // die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
        if (isset($_POST['aa']) && sizeof($_POST['aa']) > 0) {
            $i = 0;
            foreach($_POST['aa'] as $key=>$value){
                $data['id'][$i]['aa'] = $value;
                $i++;
            }
        }
    }
}

include 'templates\history_form.tpl.php';
