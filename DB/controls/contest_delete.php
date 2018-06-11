<?php

include 'libraries/contest.class.php';
$obj = new contest();

if (!empty($id)) {

    $count = $obj->countOfForgeinkeys($id);
    $removeErrorParameter = '';

    if ($count == 0) {
        $obj->remove($id);
    } else {
        $removeErrorParameter = '&remove_error=1';
    }

    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}