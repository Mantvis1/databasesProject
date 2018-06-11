<?php 
include 'libraries/activity.class.php';
$activitiesObject = new activity();

include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

$data = $activitiesObject->getBrandList($paging->size, $paging->first);

include 'templates/activity_list.tpl.php';
?>