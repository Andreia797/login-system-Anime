<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: dashboard.html"); // Redireciona para o login se não estiver autenticado
    exit();
}
?>