 <!-- ============ NAVBAR ============ -->
<link rel="stylesheet" href="../vista/css/navbar.css">
<nav class="navbar">

                <!-- Botón desplegable y logo -->
                <div class="box left">
                        <button class="navbar-toggler toggler-example border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
                        <a href="http://proyecto-final.com">
                            <img src="../vista/img/logo.png" alt="Logo getgames" width="75" height="50">
                        </a>
                    </div>
                </div>

                <!-- Búsqueda -->
                <div class="box center">

                    <!-- Búsqueda móvil -->
                    <button type="button" class="search-icon"><i class="fas fa-search"></i></button>

                    <!-- Búsqueda tablet y escritorio -->
                    <div class="input-group searchbar">
                            <input type="text" class="form-control" placeholder="FIFA, Minecraft..." aria-label="FIFA, Minecraft..." aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn" type="button">Buscar</button>
                        </div>
                    </div>

                </div>

                <!-- Carrito y usuario -->
                <div class="box right">
                    <?php
                        if(Usuario::usuarioLogeado()) {
                            echo '<a href="./biblioteca.php">';
                        } else {
                            echo '<a href="./login.php">';
                        }
                    ?>
                    
                        <i class="fas fa-user"></i>
                    </a>
                    <button>
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>

                <!-- Navbar desplegable -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <?php
                            if((Usuario::usuarioLogeado())) {
                                echo '<a class="nav-link" href="#">Mi cuenta <span class="sr-only">(current)</span></a>';
                            } else {
                                echo '<a class="nav-link" href="#">Iniciar sesión/Registro <span class="sr-only">(current)</span></a>';
                            }
                        ?>
                        </li>   
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Biblioteca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Configuración</a>
                        </li>
                        <?php 
                            if((Usuario::usuarioLogeado())) {
                         ?>   
                                <li class="nav-item">
                                    <a class="nav-link" href="cerrarSesion.php">Cerrar sesión</a>
                                </li>    
                        <?php 
                            }
                        ?>
                       
                    </ul>

                </div>
            </nav>


             <script>
                       
                let botonBusqueda = document.querySelector(".search-icon");
                let barraBusqueda = document.querySelector(".searchbar");
                let menuDesplegable = document.querySelector(".navbar-collapse");
                
                // Listener en el botón de búsqueda
                botonBusqueda.addEventListener("click", () => {

                        botonBusqueda.classList.toggle("search-active");
                        let busquedaActiva = botonBusqueda.classList.contains("search-active");

                        if (busquedaActiva) {
                            // Oculto las demás partes del menú dejando solo la búsqueda
                            botonBusqueda.innerHTML = '<i class="fas fa-times"></i>';
                            document.querySelector(".left").style.display = "none";
                            document.querySelector(".right").style.display = "none";
                            document.querySelector(".center").style.width = "100%";
                            barraBusqueda.style.display = "flex";

                            // Si el usuario pulsó buscar con el menú desplegado, lo cierro
                            if(menuDesplegable.classList.contains("show")) menuDesplegable.classList.toggle("show");
                                
                        } else {
                            // Se vuelve al aspecto normal del menú
                            botonBusqueda.innerHTML = '<i class="fas fa-search"></i>';
                            document.querySelector(".left").style.display = "flex";
                            document.querySelector(".right").style.display = "flex";
                            document.querySelector(".center").style.width = "auto";
                            barraBusqueda.style.display = "none";
                        }
                    });

                // - - Reajustes de visualización del menú según resolución actual - -
                // En tablet y escritorio, la barra de búsqueda ya viene integrada, por lo que
                // al redimensionar hay que ajustar qué se ve y qué se oculta
                let resNoMovil = window.matchMedia("(min-width: 500px)");

                function reajustarMenu(e) {
                    let botonBusqueda = document.querySelector(".search-icon");
                    let barraBusqueda = document.querySelector(".searchbar");

                    // Tablet o escritorio
                    if (e.matches) {

                        // Si se redimensiona a tablet/escritorio con una búsqueda activa, se resetea la visualización
                        if(botonBusqueda.classList.contains("search-active")) botonBusqueda.click();
                        
                        // Oculto el botón de búsqueda y muestro la barra
                        barraBusqueda.style.display = "flex";
                        botonBusqueda.style.display="none";

                    // Móvil
                    } else {

                        // Justo lo contrario
                        barraBusqueda.style.display = "none";
                        botonBusqueda.style.display = "flex";
                    }
                }
                
                // Listener que está pendiente de la resolución actual
                resNoMovil.addListener(reajustarMenu);

            </script>