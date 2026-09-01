<?php

// Define que a resposta será em JSON
header("Content-Type: application/json; charset=utf-8");

// Importa a conexão e o Model
require __DIR__ . "/database.php";
require __DIR__ . "/ProjetoModel.php";

// Conecta ao banco
$pdo = conectarBanco();

// recebe a ação enviada pelo javaScript
$acao = $_REQUEST["acao"] ?? "listar";

// decide qual operação executar
switch ($acao) {
    // listar 
    case "listar":
        $projetos = listarProjetos($pdo);

        echo json_encode([
        "sucesso" => true,
        "mensagem" => "Projetos listados.",
        "dados" => $projetos
        ]);
        break;
    // buscar
    case "buscar":
        break;
    // cadastrar
    case "cadastrar":
        break;
    // editar
    case "editar":
        break;
    // excluir
    case "excluir":
        break;
    // ação nao encontrada
    default:
        break;
}
