<?php
//UPDATE — produtos admin_produto_editar.php Busca o produto e salva as alterações com UPDATE.
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

// Verificando se foi enviado o ID do produto
if (!isset($_GET["id"])) {
    header("Location: admin_produtos.php");
    exit;
}

// Pegando o ID do produto
$id = (int) $_GET["id"];

// Buscando o produto no banco
$sql = "SELECT * FROM produtos WHERE id = ?";
$comando = $conexao->prepare($sql);
$comando->execute([$id]);
$produto = $comando->fetch(PDO::FETCH_ASSOC);

// Verificando se o produto existe
if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}

// Verificando se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pegando os novos dados enviados pelo formulário
    $nome = trim($_POST["nome"]);
    $descricao = trim($_POST["descricao"]);
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];

    // Atualizando o produto no banco
    $sql = "UPDATE produtos
            SET nome = ?, descricao = ?, preco = ?, categoria_id = ?
            WHERE id = ?";

    $comando = $conexao->prepare($sql);
    $comando->execute([
        $nome,
        $descricao,
        $preco,
        $categoria,
        $id
    ]);

    // Voltando para a lista de produtos
    header("Location: admin_produtos.php");
    exit;
}

// Buscando as categorias para o formulário
$sql = "SELECT id, nome FROM categorias ORDER BY nome";
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

    <h1>Editar produto</h1>

    <p class="admin-introducao">
        Altere os dados do produto e salve as mudanças.
    </p>

    <form class="formulario-admin" action="admin_produto_editar.php?id=<?php echo $id; ?>" method="post">

        <div class="campo-admin">

            <label for="nome">Nome do produto</label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="<?php echo htmlspecialchars($produto["nome"]); ?>"
                required
            >

        </div>

        <div class="campo-admin">

            <label for="descricao">Descrição</label>

            <textarea
                id="descricao"
                name="descricao"
                rows="4"
            ><?php echo htmlspecialchars($produto["descricao"]); ?></textarea>

        </div>

        <div class="campo-admin">

            <label for="preco">Preço</label>

            <input
                type="number"
                id="preco"
                name="preco"
                step="0.01"
                min="0"
                value="<?php echo $produto["preco"]; ?>"
                required
            >

        </div>

        <div class="campo-admin">

            <label for="categoria">Categoria</label>

            <select id="categoria" name="categoria" required>

                <?php foreach ($categorias as $categoria): ?>

                    <option
                        value="<?php echo $categoria["id"]; ?>"
                        <?php echo $categoria["id"] == $produto["categoria_id"] ? "selected" : ""; ?>
                    >
                        <?php echo htmlspecialchars($categoria["nome"]); ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <button type="submit" class="botao">
            Salvar alterações
        </button>

    </form>

    <br>

    <a href="admin_produtos.php" class="voltar-produtos">
        ← Voltar para produtos
    </a>

</section>

</main>

<?php

// Incluindo o rodapé
include("../includes/footer.php");

?>