<?php

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

// Verificando se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pegando o nome da nova categoria
    $nome = trim($_POST["nome"]);

    // Salvando a categoria no banco
    $sql = "INSERT INTO categorias (nome) VALUES (?)";
    $comando = $conexao->prepare($sql);
    $comando->execute([$nome]);

    $mensagem = "Categoria cadastrada com sucesso!";
}

// Incluindo o cabeçalho
include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/admin.css">

<main class="pagina-admin">

<section class="admin">

    <span class="admin-detalhe">✦</span>

    <h1>Cadastrar categoria</h1>

    <p class="admin-introducao">
        Adicione uma nova categoria para organizar os produtos.
    </p>

    <?php if ($mensagem != ""): ?>

        <p class="mensagem-sucesso">
            <?php echo $mensagem; ?>
        </p>

    <?php endif; ?>

    <form
        class="formulario-admin"
        action="admin_categoria_nova.php"
        method="post"
    >

        <div class="campo-admin">

            <label for="nome">Nome da categoria</label>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite o nome da categoria"
                required
            >

        </div>

        <button type="submit" class="botao">
            Cadastrar categoria
        </button>

    </form>

    <br>

    <a href="admin_categorias.php" class="voltar-produtos">
        ← Voltar para categorias
    </a>

</section>

</main>

<?php

// Incluindo o rodapé
include("../includes/footer.php");

?>