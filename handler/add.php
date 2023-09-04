<?php

require "../dbBroker.php";
require "../model/player.php";

if (
    isset($_POST['name']) && isset($_POST['age'])
    && isset($_POST['country']) && isset($_POST['contract'])
) {
    $status = Player::add($_POST['name'], $_POST['age'], $_POST['country'], $_POST['contract'], $conn);
    if ($status) {
        echo 'Success';
    } else {
        echo $status;
        echo 'Failed';
    }
}

?>