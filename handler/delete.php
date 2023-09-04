<?php

require "../dbBroker.php";
require "../model/player.php";

if(isset($_POST['playerID'])){
    
    $status = Player::deleteById($_POST['playerID'], $conn);
    if($status){
        echo 'Success';
    }else{
        echo 'Failed';
    }
}

?>