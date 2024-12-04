<?php
// Include the database connection
include('conexao.php'); // ou o arquivo onde você configurou a conexão

// Consulta para obter todos os registros
$sql = "SELECT id, nome, cpf, dataNascimento, endereco, metodo, produto FROM compras";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Exibe os dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - CPF: " . $row["cpf"]. " - Data de Nascimento: " . $row["dataNascimento"]. " - Endereço: " . $row["endereco"]. " - Método de pagamento: " . $row["metodo"]. " - Produto: " . $row["produto"]. "<br>";
    }
} else {
    echo "Nenhuma compra encontrada.";
}

// Fecha a conexão
$conn->close();
?>
