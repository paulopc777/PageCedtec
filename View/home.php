<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Public/css/Home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="conteiner_header">

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorias
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item " href="#">Tecnologia</a></li>
                    <li><a class="dropdown-item" href="#">Marketing</a></li>
                    <li><a class="dropdown-item" href="#">Soft Skills</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Mais</a></li>
                </ul>
            </div>
            <div class="Perquisa">
                <form method="get" action="/">
                    <input type="text">

                    <div class="icon_pesquisa">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                <path d="M0 0H25C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50H0V0Z" fill="#95AD61" />
                                <path d="M36.6677 34.8924L32.0294 30.2916C33.8299 28.0468 34.7018 25.1974 34.4658 22.3295C34.2299 19.4615 32.9042 16.7929 30.7611 14.8724C28.6181 12.9519 25.8207 11.9255 22.9441 12.0042C20.0675 12.0829 17.3304 13.2608 15.2956 15.2956C13.2608 17.3304 12.0829 20.0675 12.0042 22.9441C11.9255 25.8207 12.9519 28.6181 14.8724 30.7611C16.7929 32.9042 19.4615 34.2299 22.3295 34.4658C25.1974 34.7018 28.0468 33.8299 30.2916 32.0294L34.8924 36.6302C35.0086 36.7474 35.1469 36.8404 35.2992 36.9039C35.4516 36.9673 35.615 37 35.7801 37C35.9451 37 36.1085 36.9673 36.2609 36.9039C36.4132 36.8404 36.5515 36.7474 36.6677 36.6302C36.893 36.3971 37.019 36.0855 37.019 35.7613C37.019 35.4371 36.893 35.1255 36.6677 34.8924ZM23.278 32.0294C21.5471 32.0294 19.8551 31.5162 18.4159 30.5545C16.9768 29.5929 15.8551 28.2261 15.1927 26.627C14.5303 25.0279 14.357 23.2683 14.6947 21.5707C15.0324 19.8731 15.8659 18.3137 17.0898 17.0898C18.3137 15.8659 19.8731 15.0324 21.5707 14.6947C23.2683 14.357 25.0279 14.5303 26.627 15.1927C28.2261 15.8551 29.5929 16.9768 30.5545 18.4159C31.5162 19.8551 32.0294 21.5471 32.0294 23.278C32.0294 25.599 31.1074 27.825 29.4662 29.4662C27.825 31.1074 25.599 32.0294 23.278 32.0294Z" fill="white" />
                            </svg>
                        </button>
                </form>
            </div>
        </div>
        <div class="Menu">
            <?php
            session_start();
            if (isset($_SESSION['id'])) {
                require('Components/ProfileMenu.php');
            }else{
                require('Components/Menu.php');
            }
            ?>
        </div>
    </header>
    <main>
        <div class="box-category">
            <?php
            include('Components/CurseCategory.php');
            ?>
        </div>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../Public/img/foto1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../Public/img/fotn2.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="../Public/js/dropdow.js"></script>

</html>