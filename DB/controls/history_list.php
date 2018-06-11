<?php 
include 'libraries/history.class.php';
$historyObject = new history();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $historyObject->getBrandList($paging->size, $paging->first);

include 'templates/history_list.tpl.php';
?>