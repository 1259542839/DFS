<?php
header("Content-Type: application/json; charset=UTF-8");
$params = json_decode($_GET["dbParams"], false);

// configurate database
include_once 'dbconfig.php';
include_once 'functions.php';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error || mysqli_connect_error()) {
//    return some error message
}

// parse the parameters for sql statement
if (isset($params->id)) {
    // update the existing list
    $query = "UPDATE `tasks` SET ";
    if (isset($params->name)) {
        // update name of the list
        $query .= "`name`='" . $params->name . "'";
        if (isset($params->completed))
            $query .= ", ";
    } 
    if (isset($params->completed)) {
        $query .= "`completed`='" . $params->completed . "'";
    }
    $query .= " WHERE (`id`='" . $params->id . "')";
} else {
    // insert a new one
    // generate the uuid
    $uuid = generate_uuid();
    $query = "INSERT INTO `tasks` (`id`, `listId`, `name`) VALUES ('" . $uuid . "', '" . $params->listId . "', '" . $params->name . "')";
}



if ($result = $conn->query($query)) {
    // TODO: return something
    echo json_encode($result);
}

$conn->close();
?>