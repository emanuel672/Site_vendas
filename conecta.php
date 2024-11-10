<?php
$servername = "localhost"; // ou o IP do seu servidor
$username = "root"; // seu usuário do banco
$password = "2004"; // sua senha do banco
$dbname = "banco"; // o nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!"; // Para confirmar que a conexão foi estabelecida
?>