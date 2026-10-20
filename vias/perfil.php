<?php

// Iniciando a sessão para acessar os dados do usuário
session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

// Pegando os dados guardados na sessão
$nome = $_SESSION["usuario_nome"];
$email = $_SESSION["usuario_email"];

// Definindo o CSS específico da página
$pagina_css = "css/perfil.css";

// Incluindo o cabeçalho
include("includes/header.php");
?>

<main class="pagina-perfil">

<section class="perfil">

    <span class="perfil-detalhe">✦</span>

    <h1>Minha conta</h1>

    <p class="perfil-introducao">
        Confira os dados da sua conta.
    </p>

    <div class="dados-perfil">

        <div class="dado">
            <span class="dado-titulo">Nome</span>
            <span class="dado-valor">
                <?php echo htmlspecialchars($nome); ?>
            </span>
        </div>

        <div class="dado">
            <span class="dado-titulo">E-mail</span>
            <span class="dado-valor">
                <?php echo htmlspecialchars($email); ?>
            </span>
        </div>

    </div>

    <a href="produtos/produtos.php" class="botao-perfil">
        Ver produtos
    </a>

</section>

</main>

<?php

// Incluindo o rodapé
include("includes/footer.php");

?>