<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Formulário</h1>
        <p>Preencha os campos abaixo:</p>

        <form action="filtros.php" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required>

            <label for="telefone">Telefone: </label>
            <input type="text" name="telefone" id="telefone" required>

            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email" required>

            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
