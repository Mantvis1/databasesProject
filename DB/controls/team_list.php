<?php

include 'libraries/team.class.php';
$teamsObject = new team();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $teamsObject->getBrandList($paging->size, $paging->first);

include 'templates/team_list.tpl.php';
?>