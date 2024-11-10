<?php
include 'conecta.php';

// Habilitar a exibição de erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cadastro
    if (isset($_POST['action']) && $_POST['action'] == 'cadastrar') {
        // Verifique se a confirmação de senha é igual
        if ($_POST['Senha'] !== $_POST['c-Senha']) {
            echo "As senhas não coincidem!";
            exit;
        }

        $email = $_POST['Gmail'];
        $senha = password_hash($_POST['Senha'], PASSWORD_DEFAULT);

        // Exibir dados para depuração
        echo "Email: $email<br>";
        echo "Senha (hash): $senha<br>"; // Para depuração

        // Inserir no banco de dados usando prepared statement
        $stmt = $conn->prepare("INSERT INTO login (Email, senha) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $senha);

        if ($stmt->execute()) {
            echo "Cadastrado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }
        $stmt->close();
    }

    // Login
    if (isset($_POST['action']) && $_POST['action'] == 'logar') {
        $email = $_POST['Gmail'];
        $senha = $_POST['Senha'];

        // Buscar no banco de dados usando prepared statement
        $stmt = $conn->prepare("SELECT senha FROM login WHERE Email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();
            if (password_verify($senha, $hashed_password)) {
                echo "Logado com sucesso!";
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Usuário não encontrado!";
        }
        $stmt->close();
    }
}

$conn->close();
?>