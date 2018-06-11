<?php 
include 'libraries/arena.class.php';
$arenasObject = new arena();

//$elementCount = $arenasObject->elementCount($currentPage);

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);
//$paging->process($elementCount, $currentPage);

$data = $arenasObject->getBrandList($paging->size, $paging->first);

include 'templates/arena_list.tpl.php';
?>