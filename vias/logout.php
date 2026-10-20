<?php

// Inicia a sessão
session_start();

// Limpa os dados da sessão
$_SESSION = [];

// Encerra a sessão
session_destroy();

// Volta para a página inicial
header("Location: index.php");
exit;

?>