<?php 
include 'libraries/contest.class.php';
$Object = new contest();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $Object->getBrandList($paging->size, $paging->first);

include 'templates/contest_list.tpl.php';
?>