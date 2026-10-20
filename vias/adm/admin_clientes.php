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

// Buscando os clientes cadastrados
$sql = "SELECT id, nome, email FROM usuarios WHERE tipo = 'cliente' ORDER BY id";
$comando = $conexao->prepare($sql);
$comando->execute();
$clientes = $comando->fetchAll(PDO::FETCH_ASSOC);

// Incluindo o cabeçalho
include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/admin.css">

<main class="pagina-admin">

<section class="admin">

    <span class="admin-detalhe">✦</span>

    <h1>Clientes</h1>

    <p class="admin-introducao">
        Confira os clientes cadastrados na loja.
    </p>

    <div class="admin-lista">

        <?php foreach ($clientes as $cliente): ?>

            <article class="admin-item">

                <div>

                    <h2>
                        <?php echo htmlspecialchars($cliente["nome"]); ?>
                    </h2>

                    <p>
                        E-mail:
                        <?php echo htmlspecialchars($cliente["email"]); ?>
                    </p>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

    <br>

    <a href="admin.php" class="voltar-produtos">
        ← Voltar para o painel
    </a>

</section>

</main>

<?php

// Incluindo o rodapé
include("../includes/footer.php");

?>