<?php

include 'libraries/player.class.php';
$playersObject = new player();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $playersObject->getBrandList($paging->size, $paging->first);

include 'templates/player_list.tpl.php';
?>