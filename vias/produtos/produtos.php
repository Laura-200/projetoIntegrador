<?php

// Ligando o PHP ao banco de dados
include("../config/conexao.php");

// Buscando os produtos e suas categorias no banco
$sql = "SELECT produtos.*, categorias.nome AS categoria
        FROM produtos
        INNER JOIN categorias ON produtos.categoria_id = categorias.id
        ORDER BY categorias.id, produtos.id";

$comando = $conexao->prepare($sql);
$comando->execute();

// Guardando todos os produtos encontrados
$produtos = $comando->fetchAll(PDO::FETCH_ASSOC);

// Separando os produtos por categoria
$produtos_por_categoria = [];

foreach ($produtos as $produto) {
    $categoria = $produto["categoria"];

    // Criando uma lista para a categoria se ela ainda não existir
    if (!isset($produtos_por_categoria[$categoria])) {
        $produtos_por_categoria[$categoria] = [];
    }

    // Colocando o produto dentro da sua categoria
    $produtos_por_categoria[$categoria][] = $produto;
}

// Incluindo o cabeçalho
include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/produtos.css">

<main class="pagina-produtos">

<section class="produtos-introducao">
    <span class="produtos-detalhe">✦</span>
    <h1>Nossos produtos</h1>
    <p>Encontre artigos religiosos feitos com carinho, fé e dedicação.</p>
</section>

<section class="lista-produtos">

<?php foreach ($produtos_por_categoria as $categoria => $lista_produtos): ?>

    <div class="titulo-categoria">
        <span>✦</span>
        <h2><?php echo htmlspecialchars($categoria); ?></h2>
    </div>

    <div class="grade-produtos">

    <?php foreach ($lista_produtos as $produto): ?>

        <article class="produto-card">

            <div class="produto-imagem">

            <?php if (!empty($produto["imagem"])): ?>

                <!-- Mostrando a imagem do produto -->
                <img
                    src="../imagens/produtos/<?php echo htmlspecialchars($produto["imagem"]); ?>"
                    alt="<?php echo htmlspecialchars($produto["nome"]); ?>"
                >

            <?php else: ?>

                <!-- Mostrando uma mensagem quando não houver imagem -->
                <span>Foto do produto</span>

            <?php endif; ?>

            </div>

            <div class="produto-informacoes">

                <!-- Mostrando o nome do produto -->
                <h3><?php echo htmlspecialchars($produto["nome"]); ?></h3>

                <!-- Mostrando a descrição do produto -->
                <p class="produto-descricao">
                    <?php echo htmlspecialchars($produto["descricao"]); ?>
                </p>

                <!-- Mostrando o preço do produto -->
                <p class="produto-preco">
                    R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?>
                </p>

                <!-- Criando o link para ver o produto -->
                <a
                    href="produto.php?id=<?php echo $produto["id"]; ?>"
                    class="botao-produto"
                >
                    Ver detalhes
                </a>

            </div>

        </article>

    <?php endforeach; ?>

    </div>

<?php endforeach; ?>

</section>

</main>

<?php

// Incluindo o rodapé
include("../includes/footer.php");

?>