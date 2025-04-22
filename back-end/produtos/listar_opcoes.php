<?php 
session_start();
include_once "../inc/funcoes.inc.php";
header('Content-Type: application/json');

try {
    if ($conn->connect_error) {
        throw new Exception("Erro na conexão com o banco de dados");
    }

    // Buscar dados
    $status = buscarStatus($conn); 
    $tp_produto = buscarTipoProduto($conn);

    echo json_encode([
        "success" => true,
        "status" => $status,
        "tipos" => $tp_produto
    ]);
    

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}

$conn->close();
?>
