<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio de Maquillaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet">
    <link rel="stylesheet" href="./rsc/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe:ital@0;1&display=swap" rel="stylesheet">

</head>


<body>
    
    <!-- Encabezado / Inicio -->
    <header class="bg-dark text-white text-center py-5" style="background-image: url('./rsc/img/fondo3.jpg'); background-size: cover;">
        <div class="container">
            <h1 class="display-4">STUDIO CAT</h1>
            
            <p class="lead">Transformando belleza, realzando tu estilo.</p>
            <a href="#contacto" class="btn btn-custom mt-3">Reservar Cita</a>


        </div>
    </header>

    <!-- Sección de Bienvenida -->
    <section id="bienvenida" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Bienvenidos a la belleza </h2>
            <p class="text-center">Nuestro objetivo es realzar tu simpatía y darte la mejor experiencia en maquillaje y cuidado personal. Trabajamos con productos de alta calidad para asegurar que luzcas espectacular en todo momento.</p>
        </div>
    </section>
    <!-- Sección de Servicios destacados -->
    <section id="servicios" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Nuestros Servicios</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="overflow-hidden" style="height: 300px;"> <!-- Controla la altura -->
                            <img src="./rsc/img/NOVIA.jpg" class="card-img-top img-fluid" alt="Maquillaje de Novia" style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Maquillaje de Novia</h5>
                            <p class="card-text">Resalta tu belleza en el día más importante de tu vida.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="overflow-hidden" style="height: 300px;"> <!-- Controla la altura -->
                            <img src="./rsc/img/peinados.jpg" class="card-img-top img-fluid" alt="Peinados" style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peinados</h5>
                            <p class="card-text">Estilos únicos para cualquier ocasión.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="overflow-hidden" style="height: 300px;"> <!-- Controla la altura -->
                            <img src="./rsc/img/tratamientos.jpg" class="card-img-top img-fluid" alt="Tratamientos Faciales" style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Tratamientos Faciales</h5>
                            <p class="card-text">Cuidado de tu piel con productos orgánicos.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#servicios-detalle" class="btn btn-secondary">Ver Más Servicios</a>
            </div>
        </div>
    </section>
    

    <!-- Testimonios -->
    <section id="testimonios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Lo que dicen nuestros clientes</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <p>"Excelente servicio y muy profesional. ¡Me encantó el maquillaje!"</p>
                    <p><strong>- Cliente A</strong></p>
                </div>
                <div class="col-md-4 mb-4">
                    <p>"El equipo es súper atento y los productos son de calidad."</p>
                    <p><strong>- Cliente B</strong></p>
                </div>
                <div class="col-md-4 mb-4">
                    <p>"¡Me hicieron sentir hermosa en mi boda! 100% recomendado."</p>
                    <p><strong>- Cliente C</strong></p>
                </div>
            </div>
        </div>
    </section>

    <section id="servicios-detalle" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Nuestros Servicios</h2>
        <div class="card-carousel">
            <div class="card" style="background-image: url('./rsc/img/noviacara.jpeg');">
                <div class="card-body text-center">
                    <h5 class="card-title">Maquillaje de Novia</h5>
                    <p class="card-text">Resalta tu belleza en el día más importante de tu vida.</p>
                </div>
            </div>
            <div class="card" style="background-image: url('./rsc/img/eventos.jpg');">
                <div class="card-body text-center">
                    <h5 class="card-title">Maquillaje para Eventos</h5>
                    <p class="card-text">Maquillaje profesional para eventos especiales.</p>
                </div>
            </div>
            <div class="card" style="background-image: url('./rsc/img/dianoche.jpg');">
                <div class="card-body text-center">
                    <h5 class="card-title">Maquillaje de Día/Noche</h5>
                    <p class="card-text">Look perfecto para cualquier momento del día.</p>
                </div>
            </div>
            <div class="card" style="background-image: url('./rsc/img/asesoria.jpg');">
                <div class="card-body text-center">
                    <h5 class="card-title">Asesoría de Imagen</h5>
                    <p class="card-text">Mejora tu estilo con asesoramiento personalizado.</p>
                </div>
            </div>
            <div class="card" style="background-image: url('./rsc/img/facial.jpg');">
                <div class="card-body text-center">
                    <h5 class="card-title">Tratamientos Faciales</h5>
                    <p class="card-text">Cuida y rejuvenece tu piel con nuestros tratamientos.</p>
                </div>
            </div>
            <div class="card" style="background-image: url('./rsc/img/peinado.jpg');">
                <div class="card-body text-center">
                    <h5 class="card-title">Peinados</h5>
                    <p class="card-text">Estilos únicos y personalizados para cada ocasión.</p>
                </div>
            </div>
        </div>
    </div>
    
</section>

<!-- Agregar Bootstrap JavaScript al final del body -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Sobre Nosotros -->
    <section id="sobre-nosotros" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Sobre Nosotros</h2>
            <p class="text-center">Nuestro equipo está conformado por profesionales en maquillaje y estética, comprometidos a dar lo mejor para que te sientas increíble. Trabajamos en constante capacitación para ofrecerte las últimas tendencias y técnicas del mercado.</p>
            <p class="text-center"><strong>Colaboradores: </strong> Incluyéndote a ti como parte del equipo destacado.</p>
        </div>
    </section>

    <!-- Galería -->
    <section id="galeria" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Galería</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <img src="novia.jpg" class="img-fluid" alt="Maquillaje de Novia">
                </div>
                <div class="col-md-3 mb-4">
                    <img src="evento.jpg" class="img-fluid" alt="Maquillaje para Evento">
                </div>
                <div class="col-md-3 mb-4">
                    <img src="fiesta.jpg" class="img-fluid" alt="Maquillaje de Fiesta">
                </div>
                <div class="col-md-3 mb-4">
                    <img src="peinado.jpg" class="img-fluid" alt="Peinado">
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Contacto</h2>
        <form action="procesar_contacto.php" method="POST"> <!-- Cambio aquí -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Numero de celular</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="servicio" class="form-label">Selecciona un Servicio</label>
                <select class="form-select" id="servicio" name="servicio">
                    <option value="1">Maquillaje de Novia</option> <!-- Debes ajustar los valores según tus datos -->
                    <option value="2">Maquillaje para Eventos</option>
                    <option value="3">Tratamientos Faciales</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
            <br>
            <a class="btn btn-primary" href="./app/admin/login.php ">Accdeder</a>
            <hr>
                <p><strong>Teléfono:</strong> +51 123 456 789</p>
                <p><strong>Email:</strong> contacto@maquillaje.com</p>
                <p><strong>Horarios:</strong> Lunes a Sábado de 9:00 am a 8:00 pm</p>
                <div id="map" class="mt-4">
                    <!-- Aquí puedes insertar el mapa de Google -->
                </div>
                <div class="mt-4">
                    <a href="https://instagram.com/tu_perfil" class="me-2">Instagram</a>
                    <a href="https://facebook.com/tu_perfil">Facebook</a>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.card-carousel').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 7000,  // 7 segundos
            arrows: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    
</body>

</html>
