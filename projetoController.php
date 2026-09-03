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
        $projetos = buscarProjeto($pdo, $_GET["id"]);
        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Projetos encontrado.",
            "dados" => $projetos

        ]);


        break;
    // cadastrar
    case "cadastrar":
        cadastrarProjeto($pdo, $_POST);

        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Projeto cadastrado com sucesso.",
            "dados" => null
        ]);
        break;

    // editar
    case "editar":
        editarProjeto($pdo, $_POST);

        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Projeto atualizado com sucesso.",
            "dados" => NULL

        ]);
        break;


    // excluir
    case "excluir":
        excluirProjeto($pdo, $_POST["id"]);

        echo json_encode([ 
        "sucesso" => true,
        "mensagem" => "Projeto excluido com sucesso.",
        "dados" => null
        ]);
        break;

    // ação nao encontrada
    default:
    echo json_encode([ 
        "sucesso" => true,
        "mensagem" => "ação invalida.",
        "dados" => null
    ]);
        break;
}
