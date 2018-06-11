<?php

include 'libraries/player.class.php';
$Object = new player();

include 'libraries/team.class.php';
$teamsObject = new team();


$formErrors = null;
$data = array();

$required = array('kodas', 'vardas', 'pavarde', 'amzius', 'fk_Komandakodas', 'fk_Komandakodas1');

$maxLengths = array(
    'kodas' => 10,
    'vardas' => 20,
    'pavarde' => 20,
    'amzius' => 2,
    'fk_Komandakodas' => 1,
    'fk_Komandakodas1' => 1
);

if (!empty($_POST['submit'])) {
    include 'utils/validator.class.php';
    $validations = [
        'kodas' => 'positivenumber',
        'vardas' => 'anything',
        'pavarde' => 'anything',
        'amzius' => 'positivenumber',
        'fk_Komandakodas' => 'positivenumber',
        'fk_Komandakodas1' => 'positivenumber'
    ];


    $validator = new validator($validations, $required, $maxLengths);
    if ($validator->validate($_POST)) {
        
        $dataPrepared = $validator->preparePostFieldsForSQL();
        $count = $Object->checkIfPlayerIdExists($dataPrepared['kodas']);
        
        if ($count == 0) {
             $Object->insertNewPlayer($dataPrepared);
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

include 'templates\player_from.tpl.php';
