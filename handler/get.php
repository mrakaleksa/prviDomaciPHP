<?php

require "dbBroker.php";
require "model/player.php";

if(isset($_POST['playerID'])) {
    $myArray = Player::getById($_POST['playerID'], $conn);
    echo json_encode($myArray);
}

?>