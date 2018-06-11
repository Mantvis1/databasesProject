<?php 

include 'libraries/teamStats.class.php';
$Object = new teamStats();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $Object->getBrandList($paging->size, $paging->first);

include 'templates/teamStats_list.tpl.php';
?>