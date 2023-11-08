const campoCelular = document.querySelector("#celular");
const campoTelefone = document.querySelector("#telefone");

const campoCep = document.querySelector("#cep");
const campoEndereco = document.querySelector("#endereco");
const campoBairro = document.querySelector("#bairro");
const botaoLocalizar = document.querySelector("#localizar-cep");
const mensagemStatus = document.querySelector("#status");

$(campoCep).mask("00000-000");
$(campoCelular).mask("(00) 00000-0000");
$(campoTelefone).mask("(00) 0000-0000");

botaoLocalizar.addEventListener("click", async function(event) {
    event.preventDefault();
    let cep = campoCep.value;
    let url = `https://viacep.com.br/ws/${cep}/json/`;

    const resposta = await fetch(url);
    const dados = await resposta.json();

    if("erro" in dados) {
        mensagemStatus.innerHTML = "CEP não encontrado!";
        mensagemStatus.style.color = "#F00";
    } else {
        mensagemStatus.innerHTML = "CEP foi encontrado!";
        mensagemStatus.style.color = "#00F";

        campoEndereco.value = dados.logradouro;
        campoBairro.value = dados.bairro;
    }
})