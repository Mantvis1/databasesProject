<?php 
include 'libraries/arena.class.php';

$arenasObject = new arena();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $arenasObject->getAllArenas();

include 'templates/arena_list.tpl.php';
?>