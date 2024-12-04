<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Defina as informações de conexão com o banco de dados
$host = "localhost";  // geralmente é localhost
$dbname = "poketoys"; // nome do banco de dados
$username = "root";   // usuário padrão do MySQL no XAMPP
$password = "";       // senha do MySQL no XAMPP (por padrão, é vazia)

// Cria a conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recupera os dados do formulário da compra (do tipo POST)
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$produto = $_POST['produto'];
$preco = $_POST['preco'];
$data_nascimento = $_POST['dataNascimento'];
$endereco = $_POST['endereco'];
$metodo_pagamento = $_POST['metodo'];

// Exibe os dados para verificar se estão corretos
echo "<pre>";
var_dump($_POST);  // Exibe os dados enviados pelo formulário
echo "</pre>";

// Prepara a consulta SQL para inserir os dados na tabela
$sql = "INSERT INTO compras (nome, cpf, produto, preco, data_nascimento, endereco, metodo_pagamento)
VALUES ('$nome', '$cpf', '$produto', '$preco', '$data_nascimento', '$endereco', '$metodo_pagamento')";

// Executa a consulta SQL e verifica se deu certo
if ($conn->query($sql) === TRUE) {
    // Se a inserção for bem-sucedida, redireciona para o home
    echo "Compra registrada com sucesso!";
    header('Location: http://localhost/poketoys/HTML/index.html');
    exit();
} else {
    // Caso haja erro na execução da consulta SQL, exibe a mensagem de erro
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
