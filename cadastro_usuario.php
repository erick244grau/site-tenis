<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Minha Loja</title>
    
    <link rel="stylesheet" href="suporte.css">
</head>

<body>
    <?php include_once 'includes/header.php'; ?>

    <section class="suporte">
        <?php
        include 'includes/conexao.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
            // Captura e sanitiza os dados do formulário
            $nome = mysqli_real_escape_string($connect, trim($_POST['nome']));
            $email = mysqli_real_escape_string($connect, trim($_POST['email']));
            $senha = mysqli_real_escape_string($connect, $_POST['senha']);
            
            // Hash da senha
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

            // Verifica se o email já está cadastrado
            $sql = "SELECT id FROM usuarios WHERE email = ?";
            $stmt = mysqli_prepare($connect, $sql);
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 0) {
                // Insere os dados na tabela
                $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($connect, $sql);
                mysqli_stmt_bind_param($stmt, 'sss', $nome, $email, $senhaHash);
                
                if (mysqli_stmt_execute($stmt)) {
                    echo "<p style='color: #5cb85c;'>Cadastro realizado com sucesso!</p>";
                } else {
                    echo "<p style='color: #d9534f;'>Erro ao cadastrar: " . mysqli_error($connect) . "</p>";
                }
            } else {
                echo "<p style='color: #d9534f;'>O email já está cadastrado.</p>";
            }
        }
        ?>

        <h2>Cadastro de Usuário</h2>
        <form id="form-suporte" style="width: 50%; margin-left:25%" action=""st method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
                
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Seu e-mail" required>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br>
                
                <button type="submit" class="enviar-btn">Cadastrar</button>
            </form>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
