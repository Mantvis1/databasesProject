<?php

include 'libraries/team.class.php';
$teamsObject = new team();
include 'libraries/player.class.php';
$playerObject = new player();

$formErrors = null;
$data = array();
$fields = array();
$rez = array();

if (empty($_POST['submit'])) {
    include 'templates/team_report_from.tpl.php';
} else {
    $validations = [];

    include 'utils/validator.class.php';
    $validator = new validator($validations);
    if ($validator->validate($_POST)) {
        $data = $validator->preparePostFieldsForSQL();
        $result = $playerObject->getAllPlayersWithStatstic($data['fk_Komandakodas']);
        $getTeamName = $teamsObject->getTeams($data['fk_Komandakodas']);
        $count = sizeof($result);
        if ($count != 0) {
            $effectiveness = array();
            $points = array();
            foreach ($result as $key => $value) {
                array_push($effectiveness, $value['eff']);
                array_push($points, $value['pelnytiTaskai']);
            }

            $rez[0] = array_sum($effectiveness) / $count;
            $rez[1] = array_sum($points) / $count;
        } else {
            $rez[0] = 0;
            $rez[1] = 0;
        }
        include 'templates/team_report_show.tpl.php';
    } else {

        $formErrors = $validator->getErrorHTML();
        $fields = $_POST;
        include 'templates/team_report_form.tpl.php';
    }
}  
            
