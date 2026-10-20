<?php

// Colocando os dados que o PHP precisa para encontrar o banco
$servidor = "192.168.10.32";
$porta = "5432";
$banco = "vias";
$usuario = "postgres";
$senha = "L@ur@2025";

try {

    // Criando a ligação entre o PHP e o banco PostgreSQL
    $conexao = new PDO(
        "pgsql:host=$servidor;port=$porta;dbname=$banco",
        $usuario,
        $senha
    );

    // Fazendo o PDO avisar se acontecer algum erro
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $erro) {

    // Mostrando uma mensagem se a conexão der errado
    echo "Não foi possível conectar ao banco.";
    echo "<br>";

    // Mostrando o erro encontrado
    echo "Erro: " . $erro->getMessage();
}
?>