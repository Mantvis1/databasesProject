<?php

include 'libraries/personnel.class.php';
$obj = new personnel();

if (!empty($id)) {

    $count = 0;
    $removeErrorParameter = '';

    if ($count == 0) {
        $obj->remove($id);
    } else {
        $removeErrorParameter = '&remove_error=1';
    }

    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}