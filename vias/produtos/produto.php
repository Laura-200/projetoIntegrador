<?php

// Iniciando a sessão para conseguir usar o carrinho
session_start();

// Ligando o PHP ao banco de dados
include("../config/conexao.php");

// Verificando se foi enviado o ID do produto
if (!isset($_GET["id"])) {
    header("Location: produtos.php");
    exit;
}

// Transformando o ID em número
$id = (int) $_GET["id"];

// Buscando o produto e sua categoria no banco
$sql = "SELECT produtos.*, categorias.nome AS categoria
        FROM produtos
        INNER JOIN categorias ON produtos.categoria_id = categorias.id
        WHERE produtos.id = ?";

$comando = $conexao->prepare($sql);
$comando->execute([$id]);

// Guardando o produto encontrado
$produto = $comando->fetch(PDO::FETCH_ASSOC);

// Parando se o produto não existir
if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}

// Verificando se o botão de adicionar foi clicado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Criando o carrinho caso ainda não exista
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = [];
    }

    // Colocando o produto dentro do carrinho
    $_SESSION["carrinho"][] = $produto["id"];

    // Levando para o carrinho
    header("Location: ../carrinho.php");
    exit;
}

// Incluindo o cabeçalho do site
include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/produto.css">

<main class="pagina-produto">

<section class="produto-detalhe">

<div class="produto-detalhe-imagem">

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

<div class="produto-detalhe-informacoes">

<!-- Mostrando a categoria do produto -->
<span class="produto-detalhe-categoria">
    <?php echo htmlspecialchars($produto["categoria"]); ?>
</span>

<!-- Mostrando o nome do produto -->
<h1><?php echo htmlspecialchars($produto["nome"]); ?></h1>

<!-- Mostrando a descrição do produto -->
<p class="produto-detalhe-descricao">
    <?php echo htmlspecialchars($produto["descricao"]); ?>
</p>

<!-- Mostrando o preço do produto -->
<p class="produto-detalhe-preco">
    R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?>
</p>

<!-- Criando o botão para adicionar ao carrinho -->
<form action="produto.php?id=<?php echo $produto["id"]; ?>" method="post">
    <button type="submit" class="botao">Adicionar ao carrinho</button>
</form>

<br><br>

<!-- Criando o link para voltar aos produtos -->
<a href="produtos.php" class="voltar-produtos">
    ← Voltar para produtos
</a>

</div>

</section>

</main>

<?php

// Incluindo o rodapé do site
include("../includes/footer.php");

?>