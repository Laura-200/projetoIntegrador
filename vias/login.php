<?php

// Iniciando a sessão para guardar os dados do usuário
session_start();

// Ligando o PHP ao banco de dados
include("config/conexao.php");

$mensagem = "";
$tipo_mensagem = "";
$login_realizado = false;

// Verificando se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pegando os dados enviados pelo formulário
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];

    // Buscando o usuário pelo e-mail
    $sql = "SELECT id, nome, email, senha, tipo FROM usuarios WHERE email = ?";
    $comando = $conexao->prepare($sql);
    $comando->execute([$email]);
    $usuario = $comando->fetch(PDO::FETCH_ASSOC);

    // Verificando se o usuário existe e se a senha está correta
    if ($usuario && password_verify($senha, $usuario["senha"])) {

        // Guardando os dados do usuário na sessão
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["usuario_nome"] = $usuario["nome"];
        $_SESSION["usuario_email"] = $usuario["email"];
        $_SESSION["usuario_tipo"] = $usuario["tipo"];

        $mensagem = "Login realizado com sucesso!";
        $tipo_mensagem = "sucesso";
        $login_realizado = true;

    } else {

        // Mostrando uma mensagem quando os dados estiverem incorretos
        $mensagem = "E-mail ou senha incorretos.";
        $tipo_mensagem = "erro";
    }
}

// Incluindo o cabeçalho
include("includes/header.php");
?>

<link rel="stylesheet" href="css/login.css">

<main class="pagina-login">

<section class="login">

    <span class="login-detalhe">✦</span>

    <h1>Entrar</h1>

    <p class="login-introducao">
        Entre na sua conta para acompanhar
        seus pedidos e acessar sua área de cliente.
    </p>

    <?php if ($mensagem != ""): ?>

        <p class="mensagem <?php echo $tipo_mensagem; ?>">
            <?php echo $mensagem; ?>
        </p>

    <?php endif; ?>

    <form action="login.php" method="post">

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

        <button type="submit" class="botao-login">
            Entrar
        </button>

    </form>

    <p class="cadastro-link">
        Ainda não possui uma conta?
        <a href="cadastro.php">Criar conta</a>
    </p>

</section>

</main>

<?php

// Incluindo o rodapé
include("includes/footer.php");

?>

<?php if ($login_realizado): ?>

<script>
// Redirecionando para a Home depois do login
setTimeout(function() {
    window.location.href = "index.php";
}, 1500);
</script>

<?php endif; ?>