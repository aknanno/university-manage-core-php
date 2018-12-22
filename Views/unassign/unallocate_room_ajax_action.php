<?php
require_once "../../vendor/autoload.php";
use App\Admin\Room;

header('Content-type: text/javascript');

if (isset($_POST['unallocateButton'])){
    if (Room::unallocateRooms()){
        $json = true;
    }else{
        $json = false;
    }

}

echo json_encode($json);