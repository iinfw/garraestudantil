<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "mensagens";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$nome = $_POST['nome'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO mensagens (nome, mensagem) VALUES (?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $nome, $mensagem);
$stmt->execute();

echo "Mensagem enviada com sucesso!";

$conexao->close();
?>