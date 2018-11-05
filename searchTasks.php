<?php
header("Content-Type: application/json; charset=UTF-8");
$params = json_decode($_GET["dbParams"], false);

// configurate database
include_once 'dbconfig.php';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error || mysqli_connect_error()) {
//    return some error message
}

// parse the parameters for sql statement
$query = "SELECT * FROM tasks";

// search criteria
if (isset($params->listId)) {
    $query .= " WHERE `listId`='" . $params->listId . "'";
}

/*
 * TODO: return with list details
 */
if ($result = $conn->query($query)) {
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    // return search results matching criteria in Json
    echo json_encode($outp);
}

$conn->close();
?>