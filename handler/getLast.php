<?php

require "../dbBroker.php";
require "../model/player.php";

$status = Player::getLast($conn);
if ($status) {
    echo $status->fetch_column();
} else {
    echo $status;
    echo 'Failed';
}

?>