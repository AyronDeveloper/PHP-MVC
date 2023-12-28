<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="./asset/css/style.css">
</head>
<body>
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="./asset/img/camiseta.png" alt="">
                <a href="./">Tienda Online</a>
            </div>
        </header>
        <nav id="menu">
            <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Categoria 1</a></li>
                <li><a href="">Categoria 2</a></li>
                <li><a href="">Categoria 4</a></li>
                <li><a href="">Categoria 5</a></li>
            </ul>
        </nav>
        <div id="content">
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password">
                        <button>Ingresar</button>
                    </form>
                    <ul>
                        <li><a href="">Mis pedidos</a></li>
                        <li><a href="">Gestionar pedidos</a></li>
                        <li><a href="">Gestionar categoria</a></li>
                    </ul>
                </div>
            </aside>
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="./asset/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>S/. 30</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="./asset/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>S/. 30</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="./asset/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>S/. 30</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </div>
        </div>
        <footer id="footer">
            desarrollado por DeveloperAyron &copy;
        </footer>
    </div>
</body>
</html>