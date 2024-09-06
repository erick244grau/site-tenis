<?php
// Configurações do banco de dados
$serverName = "localhost";
$userName = "root";
$passWord = "";
$db_name = "site_tenis";

// Conectar ao banco de dados
$connect = new mysqli($serverName, $userName, $passWord, $db_name);

// Verificar se houve erro na conexão
if ($connect->connect_error) {
    die("Erro de conexão: " . $connect->connect_error);
}

// Definir o charset para UTF-8
$connect->set_charset("utf8");

// Mensagem de sucesso opcional para depuração (remova em produção)
// echo "Conexão bem-sucedida!";
?>
