<?php
// Incluindo a conexão com o banco
include 'conecta.php';

// Habilitar a exibição de erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Teste de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'cadastrar') {
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
        echo "Cadastrado com sucesso!<br>";

        // Teste: Verificar se o usuário foi realmente inserido
        $stmt_check = $conn->prepare("SELECT * FROM login WHERE Email=?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $result = $stmt_check->get_result();

        if ($result->num_rows > 0) {
            echo "Usuário encontrado no banco de dados! Dados inseridos corretamente.";
        } else {
            echo "Erro: O usuário não foi encontrado após o cadastro. Verifique o banco de dados.";
        }
        $stmt_check->close();

    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

// Fechar conexão com o banco
$conn->close();
?>
