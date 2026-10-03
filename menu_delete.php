<?php
include('connection.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM menu WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("location: menu_list.php");
    exit();
}
