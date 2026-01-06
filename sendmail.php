<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "viaje@voonobre.com"; // <-- Substitua pelo seu e-mail real
    $subject = "Nova mensagem do site Voo Nobre";

    // Coleta os dados do formulário
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $message = strip_tags(trim($_POST["message"]));

    // Monta o corpo do e-mail
    $body = "Nova mensagem recebida:\n\n";
    $body .= "Nome: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Telefone: $phone\n";
    $body .= "Mensagem:\n$message\n";

    $headers = "From: $email";

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        // Redireciona com feedback de sucesso
        header("Location: obrigado.html");
        exit;
    } else {
        // Redireciona com feedback de erro
        header("Location: erro.html");
        exit;
    }
} else {
    // Se não for POST, redireciona para a página inicial
    header("Location: index.html");
    exit;
}
?>
