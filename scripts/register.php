<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Criptografar senha

    $conn = new mysqli("localhost", "root", "", "login_db");

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        header("Location: registar.html"); // Redirecionar para o login
    } else {
        echo "<script>alert('Erro ao cadastrar usuário.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
