<?php

// Definindo o CSS específico da página
$pagina_css = "css/contato.css";

// Incluindo o cabeçalho
include("includes/header.php");
?>

<main class="pagina-contato">

<section class="contato">

    <span class="contato-detalhe">✦</span>

    <h1>Entre em contato</h1>

    <p class="contato-introducao">
        Ficou com alguma dúvida ou deseja falar conosco?
        Será uma alegria atender você.
    </p>

    <!-- Mostrando as formas de contato -->
    <div class="contato-informacoes">

        <div class="contato-bloco">
            <h2>Instagram</h2>

            <p>
                Acompanhe nosso trabalho e entre em contato
                através do Instagram.
            </p>

            <a
                href="https://www.instagram.com/vias_para_o_ceu/"
                target="_blank"
                rel="noopener noreferrer"
            >
                @vias_para_o_ceu
            </a>
        </div>

        <div class="contato-bloco">
            <h2>WhatsApp</h2>

            <p>
                Para informações sobre produtos, pedidos
                ou encomendas, entre em contato conosco.
            </p>

            <a
                href="https://wa.me/5519123456789"
                target="_blank"
                rel="noopener noreferrer"
            >
                (19) 12345-6789
            </a>
        </div>

    </div>

    <div class="contato-frase">

        <p>Será um prazer falar com você.</p>

        <span>Nada é pequeno se feito com Amor.</span>

    </div>

</section>

</main>

<?php

// Incluindo o rodapé
include("includes/footer.php");

?>