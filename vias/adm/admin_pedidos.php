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

// Buscando os pedidos e os clientes
$sql = "SELECT pedidos.id, usuarios.nome, pedidos.status
        FROM pedidos
        INNER JOIN usuarios ON pedidos.usuario_id = usuarios.id
        ORDER BY pedidos.id DESC";

$comando = $conexao->prepare($sql);
$comando->execute();
$pedidos = $comando->fetchAll(PDO::FETCH_ASSOC);

// Incluindo o cabeçalho
include("../includes/header.php");
?>

<link rel="stylesheet" href="../css/admin.css">

<main class="pagina-admin">

<section class="admin">

    <span class="admin-detalhe">✦</span>

    <h1>Pedidos</h1>

    <p class="admin-introducao">
        Confira os pedidos realizados pelos clientes.
    </p>

    <?php if (empty($pedidos)): ?>

        <p>Nenhum pedido realizado ainda.</p>

    <?php else: ?>

        <div class="admin-lista">

            <?php foreach ($pedidos as $pedido): ?>

                <article class="admin-item">

                    <div>

                        <h2>
                            Pedido #<?php echo $pedido["id"]; ?>
                        </h2>

                        <p>
                            Cliente:
                            <?php echo htmlspecialchars($pedido["nome"]); ?>
                        </p>

                        <p>
                            Status:
                            <?php echo htmlspecialchars($pedido["status"]); ?>
                        </p>

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