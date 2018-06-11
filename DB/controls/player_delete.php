<?php

include 'libraries/player.class.php';
$obj = new player();

if (!empty($id)) {

    $count = $obj->checkIfPlayerExistAsPrivateKey($id);
    $removeErrorParameter = '';

    if ($count == 0) {
        $obj->deletePlayer($id);
    } else {
        $removeErrorParameter = '&remove_error=1';
    }

    header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
    die();
}