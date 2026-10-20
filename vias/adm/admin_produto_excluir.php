<?php
//DELETE — excluir admin_produto_excluir.php Exclui o produto com DELETE e retorna à listagem.
// Iniciando a sessão para verificar o administrador
session_start();

// Verificando se o usuário está logado como administrador
if (
    !isset($_SESSION["usuario_id"]) ||
    $_SESSION["usuario_tipo"] != "admin"
) {
    header("Location: ../index.php");
    exit;
}

// Ligando o PHP ao banco de dados
include("../config/conexao.php");

// Verificando se foi enviado o ID do produto
if (!isset($_GET["id"])) {
    header("Location: admin_produtos.php");
    exit;
}

// Pegando o ID do produto
$id = (int) $_GET["id"];

// Excluindo o produto do banco
$sql = "DELETE FROM produtos WHERE id = ?";
$comando = $conexao->prepare($sql);
$comando->execute([$id]);

// Voltando para a lista de produtos
header("Location: admin_produtos.php");
exit;

?>