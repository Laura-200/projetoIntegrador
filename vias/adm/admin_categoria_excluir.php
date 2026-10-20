<?php

// Iniciando a sessão para verificar o administrador
session_start();

if (
    !isset($_SESSION["usuario_id"]) ||
    $_SESSION["usuario_tipo"] != "admin"
) {
    header("Location: ../index.php");
    exit;
}

// Ligando o PHP ao banco
include("../config/conexao.php");

// Pegando o ID da categoria
$id = (int) $_GET["id"];

// Excluindo a categoria
$sql = "DELETE FROM categorias WHERE id = ?";
$comando = $conexao->prepare($sql);
$comando->execute([$id]);

// Voltando para as categorias
header("Location: admin_categorias.php");
exit;

?>