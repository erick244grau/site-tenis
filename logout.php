<?php
session_start(); // Inicia a sessão se não estiver iniciada

// Verifica se a sessão está ativa antes de destruí-la
if (session_status() === PHP_SESSION_ACTIVE) {
    
    // Limpa todas as variáveis de sessão
    $_SESSION = [];

    // Se estiver usando cookies de sessão, remova o cookie de sessão
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }

    // Destroi a sessão
    session_destroy();
}

// Redireciona o usuário para a página inicial
header('Location: index.php');
exit(); // Garante que o script pare de executar após o redirecionamento
?>
