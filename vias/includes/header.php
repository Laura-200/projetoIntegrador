<?php

// Iniciando a sessão para guardar os dados do usuário
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Descobrindo a página atual
$pagina_atual = basename($_SERVER["PHP_SELF"]);

// Verificando em qual pasta estamos
$esta_na_pasta_produtos = strpos($_SERVER["PHP_SELF"], "/produtos/") !== false ||
                          strpos($_SERVER["PHP_SELF"], "\\produtos\\") !== false;

$esta_na_pasta_adm = strpos($_SERVER["PHP_SELF"], "/adm/") !== false ||
                     strpos($_SERVER["PHP_SELF"], "\\adm\\") !== false;

// Verificando se o usuário é administrador
$eh_admin = isset($_SESSION["usuario_tipo"]) &&
            $_SESSION["usuario_tipo"] == "admin";

// Definindo os caminhos
if ($esta_na_pasta_produtos || $esta_na_pasta_adm) {

    $inicio = "../index.php";
    $produtos_link = $esta_na_pasta_produtos
        ? "produtos.php"
        : "../produtos/produtos.php";
    $sobre = "../sobre.php";
    $contato = "../contato.php";
    $login = "../login.php";
    $cadastro = "../cadastro.php";
    $perfil = "../perfil.php";
    $carrinho = "../carrinho.php";
    $logo = "../imagens/logo.png";
    $logout = "../logout.php";

} else {

    $inicio = "index.php";
    $produtos_link = "produtos/produtos.php";
    $sobre = "sobre.php";
    $contato = "contato.php";
    $login = "login.php";
    $cadastro = "cadastro.php";
    $perfil = "perfil.php";
    $carrinho = "carrinho.php";
    $logo = "imagens/logo.png";
    $logout = "logout.php";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vias para o Céu</title>

    <link
        rel="stylesheet"
        href="<?php echo ($esta_na_pasta_produtos || $esta_na_pasta_adm)
            ? "../css/style.css"
            : "css/style.css"; ?>"
    >

    <?php if (isset($pagina_css)): ?>
        <link rel="stylesheet" href="<?php echo $pagina_css; ?>">
    <?php endif; ?>

</head>

<body>

<header>

    <div class="logo">

        <a href="<?php echo $inicio; ?>">
            <img
                src="<?php echo $logo; ?>"
                alt="Logo Vias para o Céu"
            >
        </a>

    </div>

    <nav>

        <?php if ($eh_admin): ?>

            <!-- Mostrando o menu do administrador -->

            <a href="<?php echo $esta_na_pasta_adm ? "admin.php" : "adm/admin.php"; ?>">
                Painel
            </a>

            <a href="<?php echo $esta_na_pasta_adm ? "admin_produtos.php" : "adm/admin_produtos.php"; ?>">
                Produtos
            </a>

            <a href="<?php echo $esta_na_pasta_adm ? "admin_categorias.php" : "adm/admin_categorias.php"; ?>">
                Categorias
            </a>

            <a href="<?php echo $esta_na_pasta_adm ? "admin_clientes.php" : "adm/admin_clientes.php"; ?>">
                Clientes
            </a>

            <a href="<?php echo $esta_na_pasta_adm ? "admin_pedidos.php" : "adm/admin_pedidos.php"; ?>">
                Pedidos
            </a>

            <a href="<?php echo $inicio; ?>">
                Ver loja
            </a>

            <a href="<?php echo $logout; ?>">
                Sair
            </a>

        <?php elseif (isset($_SESSION["usuario_id"])): ?>

            <!-- Mostrando o menu do cliente logado -->

            <span class="usuario-logado">
                Olá, <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>
            </span>

            <a href="<?php echo $perfil; ?>">
                Minha conta
            </a>

            <a href="<?php echo $carrinho; ?>">
                Carrinho
            </a>

            <a href="<?php echo $logout; ?>">
                Sair
            </a>

        <?php else: ?>

            <!-- Mostrando o menu para visitantes -->

            <?php if ($pagina_atual != "login.php"): ?>
                <a href="<?php echo $login; ?>">Entrar</a>
            <?php endif; ?>

            <?php if ($pagina_atual != "cadastro.php"): ?>
                <a href="<?php echo $cadastro; ?>">Criar conta</a>
            <?php endif; ?>

            <a href="<?php echo $carrinho; ?>">
                Carrinho
            </a>

        <?php endif; ?>

        <?php if (!$eh_admin): ?>

            <!-- Mostrando o menu normal da loja -->

            <?php if ($pagina_atual != "index.php"): ?>
                <a href="<?php echo $inicio; ?>">Início</a>
            <?php endif; ?>

            <?php if ($pagina_atual != "produtos.php"): ?>
                <a href="<?php echo $produtos_link; ?>">Produtos</a>
            <?php endif; ?>

            <?php if ($pagina_atual != "sobre.php"): ?>
                <a href="<?php echo $sobre; ?>">Sobre nós</a>
            <?php endif; ?>

            <?php if ($pagina_atual != "contato.php"): ?>
                <a href="<?php echo $contato; ?>">Contato</a>
            <?php endif; ?>

        <?php endif; ?>

    </nav>

</header>