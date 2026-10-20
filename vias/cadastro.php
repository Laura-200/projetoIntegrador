<?php

// Ligando o PHP ao banco de dados
include("config/conexao.php");

$mensagem = "";
$tipo_mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pegando os dados enviados pelo formulário
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];
    $confirmar = $_POST["confirmar_senha"];

    // Verificando se as duas senhas são iguais
    if ($senha != $confirmar) {

        $mensagem = "As senhas não são iguais.";
        $tipo_mensagem = "erro";

    } else {

        // Transformando a senha em uma versão segura antes de salvar
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        try {

            // Enviando os dados do novo usuário para o banco
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $comando = $conexao->prepare($sql);
            $comando->execute([$nome, $email, $senha]);

            $mensagem = "Cadastro realizado com sucesso!";
            $tipo_mensagem = "sucesso";

        } catch (PDOException $erro) {

            // Mostrando uma mensagem se acontecer algum erro no banco
            $mensagem = "Não foi possível realizar o cadastro.";
            $tipo_mensagem = "erro";
        }
    }
}

// Incluindo o cabeçalho
include("includes/header.php");
?>

<link rel="stylesheet" href="css/cadastro.css">

<main class="pagina-cadastro">

<section class="cadastro">

<?php if ($tipo_mensagem == "sucesso"): ?>

    <span class="cadastro-detalhe">✦</span>

    <h1>Cadastro realizado!</h1>

    <p class="cadastro-introducao">
        Seja bem-vindo(a) à <strong>Vias para o Céu</strong>.
        <br><br>
        Sua conta foi criada com sucesso.
    </p>

    <a href="index.php" class="botao">Ir para a página inicial</a>

<?php else: ?>

    <span class="cadastro-detalhe">✦</span>

    <h1>Crie sua conta</h1>

    <p class="cadastro-introducao">
        Cadastre-se para acompanhar seus pedidos
        e ter uma experiência mais completa na Vias para o Céu.
    </p>

    <?php if ($mensagem != ""): ?>

        <p class="mensagem <?php echo $tipo_mensagem; ?>">
            <?php echo $mensagem; ?>
        </p>

    <?php endif; ?>

    <form action="cadastro.php" method="post">

        <div class="campo">
            <label for="nome">Nome completo</label>
            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite seu nome completo"
                required
            >
        </div>

        <div class="campo">
            <label for="email">E-mail</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Digite seu e-mail"
                required
            >
        </div>

        <div class="campo">
            <label for="senha">Senha</label>
            <input
                type="password"
                id="senha"
                name="senha"
                placeholder="Digite sua senha"
                required
            >
        </div>

        <div class="campo">
            <label for="confirmar_senha">Confirmar senha</label>
            <input
                type="password"
                id="confirmar_senha"
                name="confirmar_senha"
                placeholder="Digite a senha novamente"
                required
            >
        </div>

        <button type="submit" class="botao-cadastro">
            Cadastrar
        </button>

    </form>

    <p class="login-link">
        Já possui uma conta?
        <a href="login.php">Entrar</a>
    </p>

<?php endif; ?>

</section>

</main>

<?php

// Incluindo o rodapé
include("includes/footer.php");

?>