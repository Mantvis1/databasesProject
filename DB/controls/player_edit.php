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
        $Object->updatePlayersInfo($dataPrepared);
        
        header("Location: index.php?module={$module}&action=list");
        die();
    } else {
        $formErrors = $validator->getErrorHTML();
        $data = $_POST;
    }
} else {
    $data = $Object->getPlayerById($id);
}

include 'templates\player_from.tpl.php';
