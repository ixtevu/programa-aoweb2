<?php
$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$category = $_POST['category'];
$description = $_POST['description'];
$nomeImagem = $_FILES['image']['name'];

$pasta = "uploads/";
if (!is_dir($pasta)) {
    mkdir($pasta, 0777, true);
}

$caminhoImagem = $pasta . basename($nomeImagem);
move_uploaded_file($_FILES['image']['tmp_name'], $caminhoImagem);


$produto = [
    "id" => $id,
    "title" => $title,
    "price" => $price,
    "category" => $category,
    "description" => $description,
    "image" => $caminhoImagem
];


$arquivo = "usuarios.json";

if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
    $produtos = json_decode($conteudo, true);
} else {
    $produtos = [];
}

$produtos[] = $produto;

file_put_contents($arquivo, json_encode($produtos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo "<h2>Produto salvo com sucesso!</h2>";
?>
