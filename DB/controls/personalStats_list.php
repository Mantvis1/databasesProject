<?php

include 'libraries/personalStats.class.php';
$playersObject = new personalStats();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $playersObject->getBrandList($paging->size, $paging->first);

include 'templates/personalStats_list.tpl.php';
?>