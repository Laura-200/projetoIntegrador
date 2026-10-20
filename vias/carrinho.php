```php
<?php

// Iniciando a sessão para guardar o carrinho
session_start();

// Ligando o PHP ao banco de dados
include("config/conexao.php");

// Criando o carrinho caso ainda não exista
if (!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = [];
}

// Verificando se alguma ação foi enviada pelo carrinho
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $acao = $_POST["acao"] ?? "";
    $produto_id = (int) ($_POST["produto_id"] ?? 0);

    // Verificando se o produto é válido
    if ($produto_id > 0) {

        // Aumentando a quantidade do produto
        if ($acao == "aumentar") {
            $_SESSION["carrinho"][] = $produto_id;
        }

        // Diminuindo uma unidade do produto
        if ($acao == "diminuir") {
            $posicao = array_search($produto_id, $_SESSION["carrinho"]);

            if ($posicao !== false) {
                unset($_SESSION["carrinho"][$posicao]);

                $_SESSION["carrinho"] = array_values(
                    $_SESSION["carrinho"]
                );
            }
        }

        // Removendo todas as unidades do produto
        if ($acao == "remover") {
            $_SESSION["carrinho"] = array_values(
                array_filter(
                    $_SESSION["carrinho"],
                    fn($id) => $id != $produto_id
                )
            );
        }
    }

    header("Location: carrinho.php");
    exit;
}

// Criando as variáveis do carrinho
$produtos_carrinho = [];
$total_carrinho = 0;

// Buscando os produtos que estão no carrinho
if (!empty($_SESSION["carrinho"])) {

    $ids = array_values(
        array_unique($_SESSION["carrinho"])
    );

    $parametros = [];
    $valores = [];

    // Criando um parâmetro para cada produto
    foreach ($ids as $indice => $id) {
        $parametro = ":produto" . $indice;

        $parametros[] = $parametro;
        $valores[$parametro] = $id;
    }

    $marcadores = implode(",", $parametros);

    $sql = "SELECT id, nome, descricao, preco, imagem
            FROM produtos
            WHERE id IN ($marcadores)
            ORDER BY id";

    $comando = $conexao->prepare($sql);
    $comando->execute($valores);

    $produtos_carrinho = $comando->fetchAll(PDO::FETCH_ASSOC);
}

// Incluindo o cabeçalho
include("includes/header.php");

?>

<link rel="stylesheet" href="css/carrinho.css">

<main class="pagina-carrinho">

    <section class="carrinho">

        <span class="carrinho-detalhe">✦</span>

        <h1>Meu carrinho</h1>

        <?php if (empty($produtos_carrinho)): ?>

            <p>Seu carrinho está vazio.</p>

            <a href="produtos/produtos.php" class="botao">
                Ver produtos
            </a>

        <?php else: ?>

            <div class="lista-carrinho">

                <?php foreach ($produtos_carrinho as $produto): ?>

                    <?php

                    // Contando quantas unidades o produto possui
                    $quantidade = count(
                        array_keys(
                            $_SESSION["carrinho"],
                            $produto["id"]
                        )
                    );

                    // Calculando o subtotal do produto
                    $subtotal = $produto["preco"] * $quantidade;

                    // Somando o subtotal ao total da compra
                    $total_carrinho += $subtotal;

                    ?>

                    <article class="item-carrinho">

                        <div class="imagem-carrinho">

                            <?php if (!empty($produto["imagem"])): ?>

                                <img
                                    src="imagens/produtos/<?php echo htmlspecialchars($produto["imagem"]); ?>"
                                    alt="<?php echo htmlspecialchars($produto["nome"]); ?>"
                                >

                            <?php endif; ?>

                        </div>

                        <div class="informacoes-carrinho">

                            <h2>
                                <?php echo htmlspecialchars($produto["nome"]); ?>
                            </h2>

                            <p>
                                Preço:
                                R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?>
                            </p>

                            <!-- Controlando a quantidade do produto -->
                            <div class="quantidade-carrinho">

                                <span>Quantidade:</span>

                                <form action="carrinho.php" method="post">
                                    <input type="hidden" name="acao" value="diminuir">
                                    <input type="hidden" name="produto_id" value="<?php echo $produto["id"]; ?>">

                                    <button
                                        type="submit"
                                        <?php echo $quantidade <= 1 ? "disabled" : ""; ?>
                                    >−</button>
                                </form>

                                <span><?php echo $quantidade; ?></span>

                                <form action="carrinho.php" method="post">
                                    <input type="hidden" name="acao" value="aumentar">
                                    <input type="hidden" name="produto_id" value="<?php echo $produto["id"]; ?>">

                                    <button type="submit">+</button>
                                </form>

                            </div>

                            <p>
                                Subtotal:
                                R$ <?php echo number_format($subtotal, 2, ",", "."); ?>
                            </p>

                            <!-- Criando o botão para remover o produto -->
                            <form action="carrinho.php" method="post">
                                <input type="hidden" name="acao" value="remover">
                                <input type="hidden" name="produto_id" value="<?php echo $produto["id"]; ?>">

                                <button type="submit">Remover produto</button>
                            </form>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

            <div class="total-carrinho">

                <h2>Total</h2>

                <p>
                    R$ <?php echo number_format($total_carrinho, 2, ",", "."); ?>
                </p>

            </div>

            <div class="finalizar-carrinho">

                <a href="finalizar_pedido.php" class="botao">
                    Finalizar compra
                </a>

            </div>

        <?php endif; ?>

    </section>

</main>

<?php

// Incluindo o rodapé
include("includes/footer.php");

?>
```