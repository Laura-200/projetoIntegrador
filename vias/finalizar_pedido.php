```php
<?php

// Iniciando a sessão para acessar o usuário e o carrinho
session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

// Verificando se o carrinho possui produtos
if (empty($_SESSION["carrinho"])) {
    header("Location: carrinho.php");
    exit;
}

// Ligando o PHP ao banco de dados
include("config/conexao.php");

// Criando as variáveis do pedido
$produtos_carrinho = [];
$total_carrinho = 0;
$mensagem_erro = "";

// Organizando os IDs dos produtos e suas quantidades
$quantidades = array_count_values($_SESSION["carrinho"]);
$ids = array_keys($quantidades);

// Criando os parâmetros da consulta
$parametros = [];
$valores = [];

foreach ($ids as $indice => $id) {
    $parametro = ":produto" . $indice;
    $parametros[] = $parametro;
    $valores[$parametro] = (int) $id;
}

// Buscando os produtos que estão no carrinho
$marcadores = implode(",", $parametros);

$sql = "SELECT id, nome, preco, imagem
        FROM produtos
        WHERE id IN ($marcadores)
        ORDER BY id";

try {
    $comando = $conexao->prepare($sql);
    $comando->execute($valores);

    $produtos_carrinho = $comando->fetchAll(PDO::FETCH_ASSOC);

    // Conferindo se todos os produtos do carrinho existem
    if (count($produtos_carrinho) != count($quantidades)) {
        $_SESSION["carrinho"] = [];
        header("Location: carrinho.php");
        exit;
    }

    // Calculando o total da compra
    foreach ($produtos_carrinho as $produto) {
        $quantidade = $quantidades[$produto["id"]];
        $total_carrinho += $produto["preco"] * $quantidade;
    }

} catch (PDOException $erro) {
    $mensagem_erro = "Não foi possível carregar os produtos. Tente novamente.";
}

// Criando o pedido quando o cliente confirmar
if ($_SERVER["REQUEST_METHOD"] == "POST" && $mensagem_erro == "") {

    try {

        // Iniciando uma transação para salvar tudo ou nada
        $conexao->beginTransaction();

        // Criando o pedido no banco
        $sql = "INSERT INTO pedidos (usuario_id, status)
                VALUES (:usuario_id, 'Pendente')
                RETURNING id";

        $comando = $conexao->prepare($sql);
        $comando->execute([
            ":usuario_id" => $_SESSION["usuario_id"]
        ]);

        // Guardando o número do pedido criado
        $pedido_id = $comando->fetchColumn();

        // Salvando os produtos do pedido
        $sql = "INSERT INTO itens_pedido
                (pedido_id, produto_id, quantidade, preco)
                VALUES (:pedido_id, :produto_id, :quantidade, :preco)";

        $comando_item = $conexao->prepare($sql);

        foreach ($produtos_carrinho as $produto) {

            $comando_item->execute([
                ":pedido_id" => $pedido_id,
                ":produto_id" => $produto["id"],
                ":quantidade" => $quantidades[$produto["id"]],
                ":preco" => $produto["preco"]
            ]);
        }

        // Confirmando o pedido no banco
        $conexao->commit();

        // Limpando o carrinho depois da compra
        $_SESSION["carrinho"] = [];
        $_SESSION["pedido_criado"] = $pedido_id;

        header("Location: pedido_confirmado.php");
        exit;

    } catch (PDOException $erro) {

        // Desfazendo tudo se acontecer algum erro
        if ($conexao->inTransaction()) {
            $conexao->rollBack();
        }

        $mensagem_erro = "Não foi possível finalizar o pedido. Confira a estrutura das tabelas.";
    }
}

// Incluindo o cabeçalho
include("includes/header.php");

?>

<link rel="stylesheet" href="css/finalizar_pedido.css">

<main class="pagina-finalizar">

    <section class="finalizar">

        <span class="finalizar-detalhe">✦</span>

        <h1>Finalizar compra</h1>

        <p>
            Olá, <?php echo htmlspecialchars($_SESSION["usuario_nome"] ?? "cliente"); ?>!
        </p>

        <p>
            Confira os produtos antes de confirmar seu pedido.
        </p>

        <?php if ($mensagem_erro != ""): ?>
            <p><?php echo htmlspecialchars($mensagem_erro); ?></p>
        <?php endif; ?>

        <div class="resumo-pedido">

            <?php foreach ($produtos_carrinho as $produto): ?>

                <?php
                // Calculando a quantidade e o subtotal do produto
                $quantidade = $quantidades[$produto["id"]];
                $subtotal = $produto["preco"] * $quantidade;
                ?>

                <div class="resumo-item">

                    <span>
                        <?php echo htmlspecialchars($produto["nome"]); ?>
                    </span>

                    <span>
                        <?php echo $quantidade; ?> x
                        R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?>
                    </span>

                    <strong>
                        R$ <?php echo number_format($subtotal, 2, ",", "."); ?>
                    </strong>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="resumo-total">

            <h2>Total</h2>

            <p>
                R$ <?php echo number_format($total_carrinho, 2, ",", "."); ?>
            </p>

        </div>

        <?php if ($mensagem_erro == ""): ?>

            <!-- Criando o botão para confirmar o pedido -->
            <form action="finalizar_pedido.php" method="post">
                <button type="submit" class="botao">
                    Confirmar pedido
                </button>
            </form>

        <?php endif; ?>

        <br>

        <a href="carrinho.php" class="voltar-produtos">
            ← Voltar ao carrinho
        </a>

    </section>

</main>

<?php

// Incluindo o rodapé
include("includes/footer.php");

?>
```