<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <main class="container py-5">
        <h1 class="card mb-4"> Cadastro de projetos</h1>


        <!-- FORMULARIO -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 id="tituloFormulario"> Novo Projeto</h4>

                <form id="formprojeto">

                    <!---------------  CAMPOS OCULTOS ------------------------>
                    <imput type="hidden" id="id" name="id">
                        <imput type="hidden" id="acao" name="acao" value="cadastrar">

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
                                    <input type="text" id="responsavel" name="responsavel" class="form_control"
                                        requerid>
                                </div>

                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="submit" class="btn btn-secondary" onclick="novoProjeto()">
                                    >Novo </button>
                </form>
            </div>
        </div>
        <!-- TABELA -->
        <div class="card">
        </div>
    </main>
    <script src="projeto.js"></script>
</body>

</html>