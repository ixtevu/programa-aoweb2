<?php
header("Content-Type: application/json");

$base = "https://parallelum.com.br/fipe/api/v1/carros";

function getApi($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

$tipo = $_GET['tipo'] ?? '';

if ($tipo == "marcas") {
    echo json_encode(getApi("$base/marcas"));
}

elseif ($tipo == "modelos") {
    $marca = $_GET['marca'];
    $dados = getApi("$base/marcas/$marca/modelos");
    echo json_encode($dados['modelos']);
}

elseif ($tipo == "anos") {
    $marca = $_GET['marca'];
    $modelo = $_GET['modelo'];
    echo json_encode(getApi("$base/marcas/$marca/modelos/$modelo/anos"));
}

elseif ($tipo == "preco") {
    $marca = $_GET['marca'];
    $modelo = $_GET['modelo'];
    $ano = $_GET['ano'];
    echo json_encode(getApi("$base/marcas/$marca/modelos/$modelo/anos/$ano"));
}
?>
