<?php
if (isset($_GET['erro'])){
    $erro = 'É necessário logar para acessar o sistema!';
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechAcademy</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

</head>
<body>

<div style="background-color:coral; margin:10px">
    <?php echo $erro ?? ''?>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mt-3">  
  <a class="navbar-brand" href="#">
      <img src="img/logopreta.png" alt="Logo do site TechAcademy" style="width: 120px; height: auto;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a class="nav-link" href="about.html">Sobre Nós</a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Cursos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Presencial</a>
                  <a class="dropdown-item" href="#">EAD</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Todos</a>
              </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Portal
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="loginaluno.php">Aluno</a>
                  <a class="dropdown-item" href="loginprofessor.php">Professor</a>
              </div>
          </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>

      <a href="matricula.php" class="btn btn-outline-primary ml-3">
          <i class="fas fa-user"></i> Inscreva-se
      </a>

      <!-- Dropdown de Acessibilidade -->
      <div class="dropdown ml-3">
          <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Acessibilidade
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a onclick="mostrarAlerta()" class="dropdown-item" href="#" id="modoEscuroBtn">Modo Escuro</a>
              <a onclick="mostrarAlerta()" class="dropdown-item" href="#">Aumentar Fonte</a>
              <a onclick="mostrarAlerta()" class="dropdown-item" href="#">Diminuir Fonte</a>
          </div>
      </div>
  </div>
</nav>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            
            <div class="carousel-inner">
                
              <div class="carousel-item">
                <img class="d-block w-100" src="img/ensinomedio.jpg" alt="First slide">
              </div>
              <div class="carousel-item active">
                <img class="d-block w-100" src="img/MAIOR PLATAFORMA DE ESTUDO TECNOLÓGICO EAD (1).png" alt="Second slide">
                <div class="carousel-caption d-none d-md-block"></div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/CARROSEL2.png">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/pexels-thisisengineering-3861964.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="bg-box p-3">
                        <h5>Venha Aprender Conosco</h5>
                        <p>Desenvolva suas habilidades na TechAcademy.</p>
                        <a onclick="mostrarAlerta()"  class="btn btn-primary">COMECE AGORA</a>
                    </div>
                </div>
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

        <section class="cursos">
            <h1>Uma ampla seleção de cursos na Techstudy</h1>
        
            <div>
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="tabEAD" onclick="showContent('ead')">QUALIFICAÇÃO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tabGraduacao" onclick="showContent('graduacao')">GRADUAÇÃO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tabPosGraduacao" onclick="showContent('pos')">PÓS-GRADUAÇÃO</a>
                            </li>
                        </ul>
                    </div>
        
                    <div id="content-area" class="row mt-3">
                        
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card">
                                <img src="img/Programação de computadores.png" class="card-img-top" alt="Imagem do curso 1">
                                <div class="card-body">
                                    <h5 class="card-title">Introdução de programação à computadores</h5>
                                    <p class="card-text">Aprenda os fundamentos da programação, incluindo lógica, algoritmos e linguagens como Python e Java. Este curso é ideal para iniciantes.</p>
                                    <a href="#" class="btn btn-primary">Ver mais</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-sm-6">
                            <div class="card">
                                <img src="img/Excel.png" class="card-img-top" alt="Imagem do curso 2">
                                <div class="card-body">
                                    <h5 class="card-title">Excel do básico ao avançado</h5>
                                    <p class="card-text">Domine desde as funções básicas até técnicas avançadas como tabelas dinâmicas e macros.</p>
                                    <a href="#" class="btn btn-primary">Ver mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    <!-- Nova Seção de Cards -->
    <section class="servicos">
      <hr>
      <h1>Serviços</h1>
      <div class="container mt-5">
          <div class="row row-cols-1 row-cols-md-3 g-4">
              <div class="col">
                  <div class="card">
                      <a href=""><img src="img/techstudy servico.png" class="card-img-top" alt="Tech Study"></a>
                      <div class="card-body">
                          <h5 class="card-title">Tech Study</h5>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <a href="loginprofessor.php"><img src="img/professor servico.png" class="card-img-top" alt="Portal do Professor"></a>
                      <div class="card-body">
                          <h5 class="card-title">Portal do Professor</h5>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                     <a href="portaldoaluno.php"><img src="img/portal aluno servico.png" class="card-img-top" alt="Portal do Aluno"></a> 
                      <div class="card-body">
                          <h5 class="card-title">Portal do Aluno</h5>
                      </div>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <a href=""><img src="img/biblioteca servico.png" class="card-img-top" alt="Biblioteca Virtual"></a>
                      <div class="card-body">
                          <h5 class="card-title">Biblioteca Virtual</h5>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
  <footer class="text-center mt-5">
    <p>&copy; 2024 TechAcademy. Todos os direitos reservados.</p>
</footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="js/script.js"></script> 



</body>
</html>
