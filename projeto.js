// INICIALIZAÇÃO DA PÁGINA
document.addEventListener("DOMContentLoaded", function () {
    // Carrega a tabela ao abrir a página
    listarProjetos();
  
    // Quando clicar em Salvar, executa salvarProjeto()
    document
      .getElementById("formProjeto")
      .addEventListener("submit", salvarProjeto);
  });
  
  // LISTAR PROJETOS (READ)
  async function listarProjetos() {
    const resposta = await fetch("ProjetoController.php?acao=listar", {
      method: "GET",
    });
    const resultado = await resposta.json();
  
    //TODO: dar console.table
  
    const tabela = document.getElementById("tabelaProjetos");
    tabela.innerHTML = "";
  
    resultado.dados.forEach(function (projeto) {
      tabela.innerHTML += `
          <tr>
            <td>${projeto.id}</td>
            <td>${projeto.nome}</td>
            <td>${projeto.duracao} mês(es)</td>
            <td>${projeto.responsavel}</td>
    
            <td>
              <button  class="btn btn-warning btn-sm" onclick="editarProjeto(${projeto.id})">
                Editar
              </button>
    
              <button class="btn btn-danger btn-sm"onclick="excluirProjeto(${projeto.id})">
                Excluir
              </button>
            </td>
          </tr>
        `;
    });
  }
    // SALVAR PROJETO
  // CADASTRAR OU EDITAR CREATE/UPDATE
  async function salvarProjeto(event){
    // Impede o recarregamento da pagina
    event.preventDefault();

    //Captura os dados do formulario
    const formulario = document.getElementById("formProjeto");
    const dados = new FormData(formulario);

    // envia os dados para o controller
    const resposta = await fetch("ProjetoController.php?acao=cadastrar",{method: "POST", body:dados,});

    // recebe a resposta do PHP
     const resultado = await resposta.json();

     // exibe a mensagem
     alert(resultado.mensagem);

     // se salvou com sucesso ...
     if (resultado.sucesso == true) {

      //RESETA O FORMULARIO PARA NOVO CADASTRO
      limparFormProjeto();

      // atualiza a tabela
      listarProjetos();

     }
  }
// NOVO PROJETO (LIMPA O FORMULARIO E PREPARA PARA CADASTRO)
function limparFormProjeto(){
 document.getElementById("formProjeto").reset();
 document.getElementById("id").value = "";
 document.getElementById("acao").value = "cadastrar";
 document.getElementById("tituloFormulario").textContent = "Novo Projeto"
}
  //EDITAR PROJETO (UPDATE)
  async function editarProjeto(id) {
 // busca o projeto pelo ID
 const resposta = await fetch(`ProjetoController.php?acao=buscar&id=${id}`);
 const resultado = await resposta.json();
 const projeto = resultado.dados;

 //PREENCHE O FORMULARIO
 document.getElementById("id").value = projeto.id;
 document.getElementById("nome").value = projeto.nome;
 document.getElementById("duracao").value = projeto.duracao;
 document.getElementById ("responsavel").value = projeto.responsavel;

 // ALTERA A AÇÃO PARA EDITAR
 document.getElementById("acao").value = "editar";

 // MUDA O TITULO
 document.getElementById("tituloFormulario").textContent = "Editar projeto"

 //POSICIONA O CURSOR NO NOME 
 document.getElementById("nome").focus();
 
}

  // EXCLUIR PROJETO (DELETE)
  async function excluirProjeto(id) {
    // Confirma a exclusão
    if (!confirm("Deseja excluir este projeto?")){
      return;
    }

    // Cria os daddos da requisição
    const dados = new FormData();
    dados.append("acao", "excluir");
    dados.append("id", id);

    // ENVIAR PARA CONTROLLER
    const resposta = await fetch("ProjetoController.php", {
      method: "POST",
      body: dados,
    });

      // RECEBE A RESPOSTA
      const resultado = await resposta.json();

      //EXIBE A MENSAGEM
      alert(resultado.mensagem);

      // ATUALIZA A TABELA 
      listarProjetos();
  }