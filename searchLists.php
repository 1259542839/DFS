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
$query = "SELECT * FROM lists";

// search criteria
if (isset($params->searchString)) {
    // pass an optional search string for looking up a list instead of showing all
    $query .= " WHERE `name` LIKE '%" . $params->searchString . "%' OR `desc` LIKE '%" . $params->searchString . "%'";
} else if (isset($params->id)) {
    $query .= " WHERE `id`='" . $params->id . "'";
}

if (isset($params->limit)) {
    if ($params->skip) {
        // number of records to skip for pagination
        $query .= " LIMIT " . $params->skip;
    } else {
        // starting from row 0
        $query .= " LIMIT 0";
    }
    $query .= ", " . $params->limit;
}


if ($result = $conn->query($query)) {
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    // return search results matching criteria in Json
    echo json_encode($outp);
}

$conn->close();
?>