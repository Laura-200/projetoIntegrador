<?php

// Iniciando a sessão para verificar o usuário
session_start();

// Verificando se o usuário está logado como administrador
if (
    !isset($_SESSION["usuario_id"]) ||
    $_SESSION["usuario_tipo"] != "admin"
) {
    header("Location: ../index.php");
    exit;
}

// Incluindo o cabeçalho
include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/admin.css">

<main class="pagina-admin">

<section class="admin">

    <span class="admin-detalhe">✦</span>

    <h1>Área administrativa</h1>

    <p class="admin-introducao">
        Bem-vindo! Aqui você pode administrar a Vias para o Céu.
    </p>

    <div class="admin-opcoes">

        <a href="admin_produtos.php">
            <h2>Produtos</h2>
            <p>Gerenciar os produtos da loja.</p>
        </a>

        <a href="admin_categorias.php">
            <h2>Categorias</h2>
            <p>Gerenciar as categorias dos produtos.</p>
        </a>

        <a href="admin_clientes.php">
            <h2>Clientes</h2>
            <p>Visualizar os clientes cadastrados.</p>
        </a>

        <a href="admin_pedidos.php">
            <h2>Pedidos</h2>
            <p>Visualizar e atualizar os pedidos.</p>
        </a>

    </div>

</section>

</main>

<?php

// Incluindo o rodapé
include("../includes/footer.php");

?>