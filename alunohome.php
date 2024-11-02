<?php

session_start();
if(!isset($_SESSION['id'])){
    header('Location:index.php?erro=true');
    exit;
}

$nome = $_SESSION["nome"];

$id = $_SESSION["id"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/alunos.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
    <div style="display: flex; align-items: center;">
        <h1 style="color:white; margin-right: 20px;">Bem-vindo, <?php echo htmlspecialchars($nome); ?></h1>
        <a href="#cursos">Cursos</a>
        <a href="#review">Professores</a>
        <a href="#contact">TechAcademy</a>
        <a href="#blogs">Artigos</a>
        <a href="boletimaluno.php">Desempenho</a>
        <a href="logout.php">Sair</a>
    </div>
</nav>

<div class="icons">
    <div class="fas fa-search" id="search-btn"></div>
    <div class="fas fa-bars" id="menu-btn"></div>
    <div class="fas fa-bell"></div>
</div>

    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>A TECHSTUDY ESTÁ DE CARA NOVA</h3>
        <p>Explore nossa nova plataforma e conheça os cursos que oferecemos para seu desenvolvimento.</p>
        <a href="#cursos" class="btn">Comece Agora</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>Conecte-se</span> !</h1>

    <div class="row">

        <div class="image">
            <img src="images/about-img.jpeg" alt="">
        </div>

        <div class="content">
            <h3>Oportunidades de Carreira</h3>
            <p>Na nossa plataforma, entendemos que o início da carreira pode ser desafiador. Por isso, oferecemos um ambiente que conecta alunos com Oportunidades de Carreira que impulsionam o seu desenvolvimento profissional e preparam você para o mercado de trabalho. Nosso compromisso é proporcionar uma experiência completa que não apenas ajuda a encontrar um estágio ou emprego, mas também orienta na construção de uma carreira promissora.</p>
            <a href="#" class="btn">Ler mais</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- menu section starts  -->

<section class="menu" id="cursos">

    <h1 class="heading"> NOSSOS <span>CURSOS</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="img/fullstack.jpg" alt="">
            <h3>Desenvolvimento Web Full Stack</h3>
            <div class="price">R$15.99 <span>20.99</span></div>
            <a href="#" class="btn">Inscreva-se</a>
        </div>

        <div class="box">
            <img src="img/IA.png" alt="">
            <h3>Curso de IA</h3>
            <div class="price">R$29.99 <span>120.99</span></div>
            <a href="#" class="btn">Inscreva-se</a>
        </div>

        <div class="box">
            <img src="img/powerbi.jpg" alt="">
            <h3>Power BI</h3>
            <div class="price">R$15.99 <span>20.99</span></div>
            <a href="#" class="btn">Inscreva-se</a>
        </div>

        <div class="box">
            <img src="img/agil.png" alt="">
            <h3>Metodologia Ágil</h3>
            <div class="price">$15.99 <span>20.99</span></div>
            <a href="#" class="btn">Inscreva-se</a>
        </div>

        <div class="box">
            <img src="img/pentest.png" alt="">
            <h3>Pentest</h3>
            <div class="price">$15.99 <span>20.99</span></div>
            <a href="#" class="btn">Inscreva-se</a>
        </div>

        <div class="box">
            <img src="img/admbd.jpg" alt="">
            <h3>Administrador de Banco de Dados</h3>
            <div class="price">$15.99 <span>20.99</span></div>
            <a href="#" class="btn">Inscreva-se</a>
        </div>

    </div>

</section>

<!-- menu section ends -->

<section class="products" id="products">

    <h1 class="heading"> MAIS <span>ASSINADOS</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="images/product-1.png" alt="">
            </div>
            <div class="content">
                <h3>Desenvolvedor Fullstack</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price">$15.99 <span>$20.99</span></div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="images/product-2.png" alt="">
            </div>
            <div class="content">
                <h3>Realidade Aumentada</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price">$45.99 <span>$85.99</span></div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="images/product-3.png" alt="">
            </div>
            <div class="content">
                <h3>Engenharia Reversa</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price">R$150.00 <span>R$420.00</span></div>
            </div>
        </div>

    </div>

</section>

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> CONHEÇA NOSSOS <span>PROFESSORES</span> </h1>

    <div class="box-container">

        <div class="box">
            <p>Jovem e dinâmico, Lucas trabalhou como analista de segurança antes de se tornar professor. Ele é certificado em segurança digital e traz cases atuais de cibersegurança para suas aulas, além de mostrar práticas em laboratórios virtuais. Lucas é prático e usa uma linguagem acessível, buscando que todos entendam os riscos e as práticas de segurança essenciais.</p>
            <img src="img/lucas.jpg" class="user" alt="">
            <h3>Lucas Freitas</h3>

        </div>

        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p>André tem uma carreira de 15 anos como desenvolvedor web e agora é professor. Ele é dinâmico e adora fazer analogias para simplificar conceitos complexos, tornando suas aulas interativas e práticas. André gosta de introduzir ferramentas modernas e de discutir tendências, inspirando os alunos a pensar na experiência do usuário em cada projeto.</p>
            <img src="img/andre.jpg" class="user" alt="">
            <h3>André Ramos</h3>
        </div>
        
        <div class="box">
            <p>Com um histórico em análise de dados e um mestrado em Inteligência Artificial, Cláudia é uma professora dedicada a ensinar habilidades práticas em Python, R, e ferramentas de BI. Ela traz exemplos reais para a sala de aula, facilitando o entendimento de modelos de machine learning aplicados ao mercado. Sua abordagem é estruturada e detalhista, ideal para estudantes que buscam precisão.</p>
            <img src="img/claudia.jpg" class="user" alt="">
            <h3>Cláudia Silva</h3>

        </div>

    </div>

</section>

<!-- review section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> CONHEÇA A NOSSA <span>INSTITUIÇÃO</span></h1>

    <div class="row">

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30153.788252261566!2d72.82321484621745!3d19.141690214227783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1629452077891!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>

    </div>

</section>

<!-- contact section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> LEIA NOSSOS <span>ARTIGOS</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="img/artigo01.png" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">A Revolução da Inteligência Artificial</a>
                <span>Por Marcos / 17st fev, 2024</span>
                <p>Inteligência Artificial Revoluciona o Mercado: Como as Novas Tecnologias Estão Transformando Empresas e Profissões</p>
                <a href="#" class="btn">Ler</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="img/artigo2.png" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">Data Science para Negócios: Como Aproveitar o Poder dos Dados na Tomada de Decisões</a>
                <span>Por Davi / 02st fev, 2024</span>
                <p>Este artigo explora como o Data Science orienta decisões estratégicas nas empresas, usando análises de dados para identificar tendências, prever comportamentos e otimizar operações. Entenda os principais métodos e ferramentas para implementar a ciência de dados em seu negócio.</p>
                <a href="#" class="btn">Ler</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="img/artigo3.png" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">Cloud Computing: Por que as Empresas Estão Migrando para a Nuvem</a>
                <span>Por Claudia/ 25st may, 2024</span>
                <p>Descubra os motivos pelos quais a computação em nuvem se tornou uma escolha estratégica para empresas de todos os portes. O artigo aborda os benefícios de segurança, economia e flexibilidade que impulsionam essa transformação digital.</p>
                <a href="#" class="btn">Ler</a>
            </div>
        </div>

    </div>

</section>

<!-- blogs section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="share">
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
    </div>


    <footer class="text-center mt-4">
        <p>&copy; 2024 TechAcademy. Todos os direitos reservados.</p>
    </footer>
    
</section>

<!-- footer section ends -->

















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>