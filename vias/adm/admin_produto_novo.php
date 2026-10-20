<?php
//CREATE — produtos admin_produto_novo.php · INSERT e SELECT das categorias
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

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pegando os dados enviados pelo formulário
    $nome = trim($_POST["nome"]);
    $descricao = trim($_POST["descricao"]);
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];

    // Salvando o novo produto no banco
    $sql = "INSERT INTO produtos
            (nome, descricao, preco, categoria_id)
            VALUES (?, ?, ?, ?)";

    $comando = $conexao->prepare($sql);
    $comando->execute([
        $nome,
        $descricao,
        $preco,
        $categoria
    ]);

    $mensagem = "Produto cadastrado com sucesso!";
}

// Buscando as categorias para mostrar no formulário
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

    <h1>Cadastrar produto</h1>

    <p class="admin-introducao">
        Preencha os dados para adicionar um novo produto.
    </p>

    <?php if ($mensagem != ""): ?>

        <p class="mensagem-sucesso">
            <?php echo $mensagem; ?>
        </p>

    <?php endif; ?>

    <form class="formulario-admin" action="admin_produto_novo.php" method="post">

        <div class="campo-admin">

            <label for="nome">Nome do produto</label>

            <input
                type="text"
                id="nome"
                name="nome"
                required
            >

        </div>

        <div class="campo-admin">

            <label for="descricao">Descrição</label>

            <textarea
                id="descricao"
                name="descricao"
                rows="4"
            ></textarea>

        </div>

        <div class="campo-admin">

            <label for="preco">Preço</label>

            <input
                type="number"
                id="preco"
                name="preco"
                step="0.01"
                min="0"
                required
            >

        </div>

        <div class="campo-admin">

            <label for="categoria">Categoria</label>

            <select id="categoria" name="categoria" required>

                <option value="">Selecione uma categoria</option>

                <?php foreach ($categorias as $categoria): ?>

                    <option value="<?php echo $categoria["id"]; ?>">
                        <?php echo htmlspecialchars($categoria["nome"]); ?>
                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <button type="submit" class="botao">
            Cadastrar produto
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