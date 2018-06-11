<?php

include 'libraries/sponsor.class.php';
$sponsorsObject = new sponsor();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $sponsorsObject->getBrandList($paging->size, $paging->first);

include 'templates/sponsor_list.tpl.php';
?>