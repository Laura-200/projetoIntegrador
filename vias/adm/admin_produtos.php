<?php
//READ — produtos admin_produtos.php · SELECT com INNER JOIN
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

$produtos = [];

// Buscando os produtos e suas categorias
try {

    $sql = "SELECT produtos.*, categorias.nome AS categoria
            FROM produtos
            INNER JOIN categorias
                ON produtos.categoria_id = categorias.id
            ORDER BY produtos.id";

    $comando = $conexao->prepare($sql);
    $comando->execute();

    // Guardando os produtos encontrados
    $produtos = $comando->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $erro) {

    // Mostrando uma mensagem se o banco encontrar um problema
    $mensagem = "Não foi possível carregar os produtos.";
}

// Incluindo o cabeçalho
include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/admin.css">

<main class="pagina-admin">

<section class="admin">

    <span class="admin-detalhe">✦</span>

    <h1>Gerenciar produtos</h1>

    <p class="admin-introducao">
        Aqui você pode visualizar e administrar os produtos da loja.
    </p>

    <a href="admin_produto_novo.php" class="botao">
        + Cadastrar produto
    </a>

    <?php if (isset($mensagem)): ?>

        <p><?php echo $mensagem; ?></p>

    <?php elseif (empty($produtos)): ?>

        <p>Nenhum produto cadastrado.</p>

    <?php else: ?>

        <div class="admin-lista">

            <?php foreach ($produtos as $produto): ?>

                <article class="admin-item">

                    <div>

                        <h2>
                            <?php echo htmlspecialchars($produto["nome"]); ?>
                        </h2>

                        <p>
                            Categoria:
                            <?php echo htmlspecialchars($produto["categoria"]); ?>
                        </p>

                        <p>
                            R$
                            <?php echo number_format($produto["preco"], 2, ",", "."); ?>
                        </p>

                    </div>

                    <div class="admin-acoes">

                        <a href="admin_produto_editar.php?id=<?php echo $produto["id"]; ?>">
                            Editar
                        </a>

                        <a href="admin_produto_excluir.php?id=<?php echo $produto["id"]; ?>">
                            Excluir
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

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