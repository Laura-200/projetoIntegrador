<?php

// Iniciando a sessão para acessar o pedido criado
session_start();

// Verificando se existe um pedido para mostrar
if (!isset($_SESSION["pedido_criado"])) {
    header("Location: index.php");
    exit;
}

// Pegando o número do pedido e retirando da sessão
$pedido_id = $_SESSION["pedido_criado"];
unset($_SESSION["pedido_criado"]);

// Definindo o CSS específico da página
$pagina_css = "css/pedido_confirmado.css";

// Incluindo o cabeçalho
include("includes/header.php");
?>

<main class="pagina-confirmacao">

    <section class="confirmacao">

        <span class="confirmacao-detalhe">✦</span>

        <h1>Pedido realizado!</h1>

        <p>
            Seu pedido foi registrado com sucesso.
        </p>

        <p>
            Obrigado pela sua compra e pela confiança
            na Vias para o Céu.
        </p>

        <a href="index.php" class="botao">
            Voltar para a Home
        </a>

    </section>

</main>

<?php

// Incluindo o rodapé
include("includes/footer.php");

?>