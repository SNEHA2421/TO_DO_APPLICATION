<?php

function make_connection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todolist";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("There is an error in Database connection: " . $conn->connect_error);
    }

    return $conn;
}

function add_items($value)
{
    $con = make_connection();
    $stmt = $con->prepare("INSERT INTO todolist (item, status) VALUES (?, 0)");
    $stmt->bind_param("s", $value);
    $stmt->execute();
    $stmt->close();
    $con->close();
}

function get_items()
{
    $con = make_connection();
    $stmt = $con->prepare("SELECT id, item FROM todolist WHERE status = 0");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $con->close();
    return $result;
}

function update_items($id)
{
    $con = make_connection();
    $stmt = $con->prepare("UPDATE todolist SET status = 1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $con->close();
}

function get_items_checked()
{
    $con = make_connection();
    $stmt = $con->prepare("SELECT id, item FROM todolist WHERE status = 1");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $con->close();
    return $result;
}

function delete_items($id)
{
    $con = make_connection();
    $stmt = $con->prepare("DELETE FROM todolist WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $con->close();
}

?>
