<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Configurações de envio de e-mail
    $to = "juliamaiaphg@gmail.com"; // Substitua pelo seu e-mail
    $subject = "Nova mensagem de $name";
    $body = "Você recebeu uma nova mensagem:\n\n".
            "Nome: $name\n".
            "Email: $email\n".
            "Mensagem: \n$message";
    $headers = "From: $email";

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200); // Sucesso
        echo "Mensagem enviada com sucesso!";
    } else {
        http_response_code(500); // Erro no servidor
        echo "Erro ao enviar a mensagem.";
    }
} else {
    http_response_code(403); // Método não permitido
    echo "Método de requisição inválido.";
}
?>
