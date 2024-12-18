function showContent(type) {
    const contentArea = document.getElementById('content-area');

    let content = '';

    if (type === 'ead') {
        content = `
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <img src="img/Programação de computadores.png" class="card-img-top" alt="Imagem do curso 1">
                    <div class="card-body">
                        <h5 class="card-title">Introdução de programação à computadores</h5>
                        <p class="card-text">Aprenda os fundamentos da programação, incluindo lógica, algoritmos e linguagens como Python e Java. Ideal para iniciantes.</p>
                        <a href="#" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <img src="img/Excel.png" class="card-img-top" alt="Imagem do curso 2">
                    <div class="card-body">
                        <h5 class="card-title">Excel do básico ao avançado</h5>
                        <p class="card-text">Domine funções básicas até técnicas avançadas como tabelas dinâmicas e macros.</p>
                        <a href="#" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>`;
    } else if (type === 'graduacao') {
        content = `
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <img src="img/IA.png" class="card-img-top" alt="Imagem do curso 3">
                    <div class="card-body">
                        <h5 class="card-title">Ciência da Computação</h5>
                        <p class="card-text">Explore os fundamentos teóricos e práticos da computação, desde algoritmos e estruturas de dados até inteligência artificial e redes. Este curso prepara você para resolver problemas complexos usando abordagens computacionais inovadoras.</p>
                        <a href="#" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <img src="img/SegurancaInformacao.png" class="card-img-top" alt="Imagem do curso 4">
                    <div class="card-body">
                        <h5 class="card-title">Engenharia de Software</h5>
                        <p class="card-text">Desenvolva habilidades para criar soluções eficientes, aplicando práticas modernas de design, desenvolvimento e gestão de projetos de software. Ideal para quem deseja dominar todo o ciclo de vida de um sistema, desde o planejamento até a manutenção.</p>
                        <a href="#" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>`;
    } else if (type === 'pos') {
        content = `
            <div class="col-sm-4">
                <div class="card">
                    <img src="img/gestao TI.png" class="card-img-top" alt="Imagem do curso de Gestão de TI">
                    <div class="card-body">
                        <h5 class="card-title">Gestão de TI Avançada</h5>
                        <p class="card-text">Curso focado em estratégias de gestão para profissionais de TI, abordando desde infraestruturas até governança de TI.</p>
                        <a href="#" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>`;
    }

    contentArea.innerHTML = content;
}

function mostrarAlerta() {
    alert("Esta funcionalidade está sendo implementada!");
}


let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

document.getElementById("dropdown-btn").addEventListener("click", function() {
    var dropdown = document.getElementById("dropdown-options");
    // Alterna entre mostrar e esconder o dropdown
    dropdown.style.display = (dropdown.style.display === "none" || dropdown.style.display === "") ? "block" : "none";
});

// Fecha o dropdown se clicar fora dele
window.onclick = function(event) {
    if (!event.target.matches('#dropdown-btn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
            }
        }
    }
}