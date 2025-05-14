<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitização
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senha = $_POST["senha"]; // senha não deve ser sanitizada diretamente

    $mensagens = [];

    // Validação do nome (mínimo 3 caracteres)
    if (strlen($nome) < 3) {
        $mensagens[] = "❌ Nome muito curto.";
    }

    // Validação do telefone (números com 10 ou mais dígitos)
    $telefoneNumerico = preg_replace('/\D/', '', $telefone);
    if (strlen($telefoneNumerico) < 10) {
        $mensagens[] = "❌ Telefone inválido.";
    }

    // Validação do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagens[] = "❌ E-mail inválido.";
    }

    // Validação da senha (mínimo 6 caracteres)
    if (strlen($senha) < 6) {
        $mensagens[] = "❌ A senha deve ter pelo menos 6 caracteres.";
    }

    // Exibe resultado
    $classe = empty($mensagens) ? "sucesso" : "erro";

} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .sucesso { color: green; font-weight: bold; }
        .erro { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Resultado:</h2>

        <?php if ($classe === "sucesso"): ?>
            <p class="sucesso">✅ Cadastro realizado com sucesso!</p>
            <ul>
                <li><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></li>
                <li><strong>Telefone:</strong> <?= htmlspecialchars($telefone) ?></li>
                <li><strong>E-mail:</strong> <?= htmlspecialchars($email) ?></li>
                <!-- Nunca exiba a senha! -->
            </ul>
        <?php else: ?>
            <?php foreach ($mensagens as $msg): ?>
                <p class="erro"><?= $msg ?></p>
            <?php endforeach; ?>
            <a href="index.php">🔙 Voltar e corrigir</a>
        <?php endif; ?>
    </div>
</body>
</html>
