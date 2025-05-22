<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["add"]) && !empty($_POST["inputBox"])) {
        add_items($_POST["inputBox"]);
    } 
    
    if (isset($_POST["checked"])) {
        update_items($_POST["checked"]);
    }

    if (isset($_POST["deleted"])) {
        delete_items($_POST["deleted"]);
    }

    header("Location: index.php");
    exit();
}
?>
