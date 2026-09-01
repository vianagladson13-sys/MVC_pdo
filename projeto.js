//INICIALIZAÇÃO DA PAGINA
document.addEventListener("DOMContentLoaded", function (){
 // carrega a tabela ao abrir a pagina
 ListarProjetos();

 //QUANDO CLICAR EM SALVAR, EXECUTA ESSE PROJETO()
 document
 .getElementById("formProjeto")
 .addEventListener("submit", salvarProjeto);
});

//LISTAR PROJETOS (READ)
async function ListarProjetos(){
    const resposta = await fetch("ProjetoController.php?acao=listar",{
        method: "GET",
    });

    const resultado = await responsta.json();
    const tabela = document.getElementById("tabelaProjetos");
    tabela.innerHTML = "";

    resultado.dados.forEach(function(projeto){
    tabela.innerHTML += `
       <tr>
        <td>${projeto.id}</td>
        <td>${projeto.nome}</td>
        <td>${projeto.duracao}</td>
        <td>${projeto.responsavel}</td>
        
        <td>
            <button class="btn btn_warning btn_sm onclick="editarProjeto(${projeto.id})">
            editar
             </button>
             <button class="btn btn_danger btn-sm"onclick="excluirProjeto(${projeto.id})">
             Excluir
             </button>
        </td>

       </tr>
        `;
    });

}