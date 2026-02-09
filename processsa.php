<?php
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$usuario = [
    "id" => $id,
    "username" => $username,
    "email" => $email,
    "password" => $password
];

$arquivo = "usuarios.json";

if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
    $usuarios = json_decode($conteudo, true);
} else {
    $usuarios = [];
}

$usuarios[] = $usuario;

file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo "<h2>Usuário salvo com sucesso!</h2>";
?>
