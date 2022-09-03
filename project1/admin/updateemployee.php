<?php
include('inc/header.php'); 


$id = (int) $_GET['id'] ?? 0;
if (!$id) {
    //header('Location: index.php');
    exit;
}

$clean_id = $mysqli->real_escape_string($id);
$query = "SELECT * FROM leaveinfo WHERE id = '$clean_id'"; // safe
$result = $mysqli->query($query);
$data = $result->fetch_assoc();

if (!$data) {
    header('Location: index.php');
    exit;
}

if ($_POST) {
    $name = $_POST['name'] ?? 0;
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $department = $_POST['department'] ?? null;

    if ($name && $department) {
        
        $query = 'UPDATE employees SET
            name = ?,
            email = ?,
            password=?,
            department = ?
            WHERE id = ?
        ';

        $stmt = $mysqli->prepare($query); // mysqli_stmt

        $stmt->bind_param('ssssi', $name, $email, $password, $department,$id);

        $stmt->execute();

        // Redirect
        header('Location: index.php?success=1');
        exit;

    }
} 
?>
