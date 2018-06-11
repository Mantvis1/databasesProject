<?php

include 'libraries/activity.class.php';
$obj = new activity();
if (!empty($id)) {
    $obj->remove($id);

    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

