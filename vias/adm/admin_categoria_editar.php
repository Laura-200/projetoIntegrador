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

$id = (int) $_GET["id"];

// Buscando a categoria
$sql = "SELECT * FROM categorias WHERE id = ?";
$comando = $conexao->prepare($sql);
$comando->execute([$id]);
$categoria = $comando->fetch(PDO::FETCH_ASSOC);

if (!$categoria) {
    header("Location: admin_categorias.php");
    exit;
}

// Salvando a alteração
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);

    $sql = "UPDATE categorias SET nome = ? WHERE id = ?";
    $comando = $conexao->prepare($sql);
    $comando->execute([$nome, $id]);

    header("Location: admin_categorias.php");
    exit;
}

include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/admin.css">

<main class="pagina-admin">

<section class="admin">

    <span class="admin-detalhe">✦</span>

    <h1>Editar categoria</h1>

    <form class="formulario-admin" method="post">

        <div class="campo-admin">

            <label for="nome">Nome da categoria</label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="<?php echo htmlspecialchars($categoria["nome"]); ?>"
                required
            >

        </div>

        <button type="submit" class="botao">
            Salvar alterações
        </button>

    </form>

    <a href="admin_categorias.php" class="voltar-produtos">
        ← Voltar para categorias
    </a>

</section>

</main>

<?php

// Incluindo o rodapé
include("../includes/footer.php");

?>