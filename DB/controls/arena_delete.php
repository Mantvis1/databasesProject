<?php

include 'libraries/arena.class.php';
$obj = new arena();

if (!empty($id)) {

    $count = $obj->arenasCount($id);
    $removeErrorParameter = '';

    if ($count == 0) {
        $obj->removeFromArena($id);
    } else {
        $removeErrorParameter = '&remove_error=1';
    }

    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}

