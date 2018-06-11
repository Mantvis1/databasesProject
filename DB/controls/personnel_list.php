<?php

include 'libraries/personnel.class.php';
$Object = new personnel();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $Object->getBrandList($paging->size, $paging->first);

include 'templates/personnel_list.tpl.php';
?>