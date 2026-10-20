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

// Buscando as categorias
$sql = "SELECT * FROM categorias ORDER BY id";
$comando = $conexao->prepare($sql);
$comando->execute();
$categorias = $comando->fetchAll(PDO::FETCH_ASSOC);

// Incluindo o cabeçalho
include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/admin.css">

<main class="pagina-admin">

<section class="admin">

    <span class="admin-detalhe">✦</span>

    <h1>Gerenciar categorias</h1>

    <p class="admin-introducao">
        Aqui você pode visualizar as categorias dos produtos.
    </p>

    <a href="admin_categoria_nova.php" class="botao">
        + Cadastrar categoria
    </a>

    <div class="admin-lista">

        <?php foreach ($categorias as $categoria): ?>

            <article class="admin-item">

                <div>
                    <h2>
                        <?php echo htmlspecialchars($categoria["nome"]); ?>
                    </h2>
                </div>

                <div class="admin-acoes">

                    <a href="admin_categoria_editar.php?id=<?php echo $categoria["id"]; ?>">
                        Editar
                    </a>

                    <a
                        href="admin_categoria_excluir.php?id=<?php echo $categoria["id"]; ?>"
                        onclick="return confirm('Deseja realmente excluir esta categoria?');"
                    >
                        Excluir
                    </a>

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