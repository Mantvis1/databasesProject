<?php

include 'libraries/personnel.class.php';
$obj = new personnel();

include 'libraries/activity.class.php';
$activitiesObject = new activity();

include 'libraries/team.class.php';
$teamsObject = new team();

$formErrors = null;
$data = array();

if (empty($_POST['submit'])) {
    include 'templates/player_report_form.tpl.php';
} else {
    $validations = [];

    include 'utils/validator.class.php';
    $validator = new validator($validations);
    if ($validator->validate($_POST)) {
        $data = $validator->preparePostFieldsForSQL();
        $result = $obj->getPersonelListWithActivities($data['fk_Komandakodas']);
         $getTeamName = $teamsObject->getTeams($data['fk_Komandakodas']);
        include 'templates/player_report_show.tpl.php';
    } else {

        $formErrors = $validator->getErrorHTML();
        $fields = $_POST;
        include 'templates/player_report_form.tpl.php';
    }
}  
