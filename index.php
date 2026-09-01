<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Projeto simples PDO</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" >

</head>

<body>


    <main class="container py-5">
        <h1 class="card mb-4"> Cadastro de projetos</h1>


        <!-- FORMULARIO -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 id="tituloFormulario"> Novo Projeto</h4>

                <form id="formProjeto">

                    <!---------------  CAMPOS OCULTOS ------------------------>
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="acao" name="acao" value="cadastrar">

                    <!------------------------------------------------------->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do projeto </label>
                        <input type="text" id="nome" name="nome" class="form_control"
                            min="1" requerid>
                    </div>

                    <div class="mb-3">
                        <label for="duracao" class="form-label">Duração em meses </label>
                        <input type="number" id="duracao" name="duracao" class="form_control"
                            requerid>

                        <div class="mb-3">
                            <label for="responsavel" class="form-label"> Responsavel</label>
                            <input type="text" id="responsavel" name="responsavel" class="form_control" requerid>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="submit" class="btn btn-secondary" onclick="novoProjeto()">Novo </button>
                </form>
            </div>
        </div>
        <!-- TABELA -->
        <div class="card">
            <div class="card-body">
                <h4>Projetos Cadastrados</h4>
                <div class="table_responsive">
                    <table class="table table_striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Projeto</th>
                                <th>Duração</th>
                                <th>Responsavel</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody id="tabelaProjetos">
        
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </main>
    <script src="projeto.js"></script>
</body>

</html>