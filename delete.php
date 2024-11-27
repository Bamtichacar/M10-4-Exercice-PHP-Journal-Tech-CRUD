<?php
include 'connexion.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
?>
