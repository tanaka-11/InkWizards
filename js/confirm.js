const links = document.querySelectorAll('.excluir');
for(let link of links){
    link.addEventListener("click", function(event){
        event.preventDefault();
        
        const modalExclusao = document.querySelector("#modal-exclusao");
        modalExclusao.showModal();

        const botaoSim = modalExclusao.querySelector("#sim");
        const botaoNao = modalExclusao.querySelector("#nao");

        botaoSim.addEventListener("click", function(){
            location.href = link.getAttribute('href');
            modalExclusao.close();
        });

        botaoNao.addEventListener("click", function(){
            modalExclusao.close();
        });


    });
}