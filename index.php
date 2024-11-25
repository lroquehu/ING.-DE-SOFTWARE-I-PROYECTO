<?php
    include("conexion.php");
    $modalMessage = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inicio de sesión
        if (isset($_POST["emailLogin"]) && isset($_POST["passwordLogin"])) {
            $email = $_POST["emailLogin"];
            $password = $_POST["passwordLogin"];

            // Usar consultas preparadas para evitar inyección SQL
            $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                header("location:main.php");
                exit;
            } else {
                $modalMessage = "Email o contraseña incorrectos";
            }
        }

        // Registro de usuario
        if (isset($_POST["nombreRegistro"]) && isset($_POST["emailRegistro"]) && isset($_POST["passwordRegistro"])) {
            $nombre = $_POST["nombreRegistro"];
            $emailRegistro = $_POST["emailRegistro"];
            $passwordRegistro = $_POST["passwordRegistro"];

            // Usar consultas preparadas para evitar inyección SQL
            $stmt = $conn->prepare("INSERT INTO Usuarios (nombre, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $emailRegistro, $passwordRegistro);

            if ($stmt->execute()) {
                $modalMessage = "Registro exitoso!";
            } else {
                $modalMessage = "Error en el registro: " . $conn->error;
            }
        }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PRODIGIOS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMdXh5jzMRej1A6i/2D9tnM/ZL1v1pV15j06u" crossorigin="anonymous">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    header {
      background-color: #2c4d90;
      padding: 0.5rem;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .carousel-item img {
      width: 1122px;
      height: 656px;
      object-fit: cover;
    }
    h1 {
      font-size: 2.5rem;
      text-align: center;
    }
    h2 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: #2c4d90;
      text-transform: uppercase;
      display: inline-block;
      text-align: center;
      width: 100%;
    }
    h3 {
      color: #2c4d90;
      font-size: 1.5rem;
      text-align: center;
    }
    p {
      font-size: 1.1rem;
      line-height: 1.6;
      text-align: center;
    }
    footer p {
        margin: 0;
    }
    .navbar-nav .nav-link {
      color: white;
      font-size: 1rem;
      margin-right: 15px;
      transition: color 0.3s ease;
    }
    .navbar-nav .nav-link:hover {
      color: #9c9c9c;
    }
    .accordion-button {
      background-color: #2c4d90;
      color: white;
      font-weight: bold;
      letter-spacing: 1px;
      transition: background-color 0.3s ease;
    }
    .accordion-button:hover {
      background-color: #2c4d90;
      opacity: 0.9;
    }
    footer {
      background-color: #2c4d90;
      color: white;
      text-align: center;
      padding: 10px;
      margin-top: 20px;
      letter-spacing: 1px;
    }
    .modal-header {
      background-color: #2c4d90;
      color: white;
    }
    .modal-footer button {
      color: white;
      font-weight: 600;
    }
    form label {
      color: #2c4d90;
      font-weight: bold;
    }
    .form-control {
      border: 2px solid #2c4d90;
    }
    .btn-close {
      color: white;
    }
    .btn-close:hover {
        color: #fff;
    }
    .transition-transform:hover {
        transform: scale(1.01);
        transition: transform 0.2s ease;
    }
    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2c4d90;
    }
    .embed-responsive {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .btn-primary {
        background: #2c4d90;
        color: white;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background: white;
        color: #2c4d90;
        border: 2px solid #2c4d90;
        cursor: pointer;
    }
    hr {
        width: 95%;
        display: flex;
        margin: 0 auto;

    }
    .carousel-inner img {
        width: 100%; 
        height: 735px; 
        object-fit: cover; 
    }
  </style>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PRODIGIOS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cursos">Cursos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#instructores">Instructores</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    </ul>
                    <!-- Botones de Iniciar Sesión y Registrarse -->
                    <button class="btn btn-light mx-2" data-bs-toggle="modal" data-bs-target="#modalLogin">Iniciar Sesión</button>
                    <button class="btn btn-light mx-2" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrarse</button>
                </div>
            </div>
        </nav>
    </header>
    <!-- Sección de Carrusel -->
    <section id="inicio">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-touch="true" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="img/image1.jpg" class="d-block w-100" alt="requinto">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="img/image2.jpg" class="d-block w-100" alt="piano">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="img/image3.jpg" class="d-block w-100" alt="ukelele">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="img/image4.jpg" class="d-block w-100" alt="Canto">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="img/image5.jpg" class="d-block w-100" alt="guitarra">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- Sección de Cursos con Acordeón -->
    <section id="cursos" class="container my-5">
        <h2>Nuestros Cursos</h2>
        <div class="accordion accordion-flush" id="accordionCursos">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingPiano">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapsePiano">Piano</button>
                </h2>
                <div id="collapsePiano" class="accordion-collapse collapse show" aria-labelledby="headingPiano" data-bs-parent="#accordionCursos">
                    <div class="accordion-body d-flex">
                        <img src="img/piano.jpg" class="me-3" style="width: 400px;" alt="Imagen Piano">
                        <div class="text-center">
                            <h3>Aprende Piano</h3>
                            <p>Descubre el arte de tocar el piano, un instrumento fundamental en la música. Nuestros cursos están diseñados para todos los niveles, desde principiantes hasta avanzados. A través de una metodología práctica y divertida, aprenderás desde las bases hasta técnicas complejas, permitiéndote expresar tu creatividad musical y disfrutar de la música de manera plena.</p>
                            <p>Además de aprender a tocar, profundizarás en la teoría musical, la lectura de partituras y la interpretación de diferentes estilos musicales. Nuestros instructores están comprometidos a guiarte en cada paso de tu viaje musical.</p>




                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingGuitarra">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapseGuitarra">Guitarra</button>
                </h2>
                <div id="collapseGuitarra" class="accordion-collapse collapse show" aria-labelledby="headingGuitarra" data-bs-parent="#accordionCursos">
                    <div class="accordion-body d-flex">
                        <img src="img/guitarra.jpg" class="me-3" style="width: 400px;" alt="Imagen Guitarra">
                        <div class="text-center">
                            <h3>Clases de Guitarra</h3>
                            <p>La guitarra es un instrumento versátil y popular en todos los géneros musicales. Nuestras clases están diseñadas para guiarte desde los acordes básicos hasta solos complejos. Aprenderás a tocar tus canciones favoritas, a mejorar tu técnica y a desarrollar tu propio estilo musical.</p>
                            <p>Además, tendrás la oportunidad de colaborar con otros músicos, participar en presentaciones y disfrutar de un ambiente creativo y motivador. Nuestros instructores experimentados te ayudarán a alcanzar tus metas musicales.</p>





                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingCanto">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapseCanto">Canto</button>
                </h2>
                <div id="collapseCanto" class="accordion-collapse collapse show" aria-labelledby="headingCanto" data-bs-parent="#accordionCursos">
                    <div class="accordion-body d-flex">
                        <img src="img/canto.jpg" class="me-3" style="width: 400px;" alt="Imagen Canto">
                        <div class="text-center">
                            <h3>Clases de Canto</h3>
                            <p>¿Te apasiona cantar? Nuestras clases de canto están diseñadas para ayudarte a desarrollar tu voz y técnica vocal. Trabajamos en la proyección de la voz, el control de la respiración y la interpretación musical. Desde baladas hasta pop, mejorarás tu habilidad para cantar con confianza y estilo.</p>
                            <p>Además, aprenderás a interpretar canciones con emoción y a manejar diferentes estilos. Nuestras sesiones están diseñadas para que cada alumno desarrolle su propio estilo y se sienta seguro en el escenario.</p>




                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingViolin">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapseViolin">Violin</button>
                </h2>
                <div id="collapseViolin" class="accordion-collapse collapse show" aria-labelledby="headingViolin" data-bs-parent="#accordionCursos">
                    <div class="accordion-body d-flex">
                        <img src="img/violin.jpg" class="me-3" style="width: 400px;" alt="Imagen Violín">
                        <div class="text-center">
                            <h3>Clases de Violín</h3>
                            <p>El violín es un instrumento que destaca en la música clásica y contemporánea. Con nuestras clases, aprenderás desde la postura correcta hasta técnicas avanzadas de interpretación. Nuestros instructores te guiarán a través de un viaje musical, ayudándote a dominar el violín y a disfrutar de la música en su forma más pura.</p>
                            <p>Desarrollarás habilidades para tocar en orquestas y grupos musicales, así como para la interpretación solista. ¡Ven y vive la experiencia musical única que el violín puede ofrecerte!</p>




                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingUkelele">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapseUkelele">Ukelele</button>
                </h2>
                <div id="collapseUkelele" class="accordion-collapse collapse show" aria-labelledby="headingUkelele" data-bs-parent="#accordionCursos">
                    <div class="accordion-body d-flex">
                        <img src="img/ukelele.jpg" class="me-3" style="width: 400px;" alt="Imagen Ukelele">
                        <div class="text-center">
                            <h3>Clases de Ukelele</h3>
                            <p>El ukelele es un instrumento alegre y accesible para todos. En nuestras clases, aprenderás a tocar acordes y canciones de forma divertida. Te enseñaremos desde los fundamentos hasta técnicas avanzadas para que puedas tocar en cualquier ocasión.</p>
                            <p>Las clases son dinámicas y adaptadas a tus necesidades, fomentando la creatividad y la improvisación. ¡No hay mejor momento que ahora para empezar a disfrutar de la música con el ukelele!</p>





                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingRequinto">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapseRequinto">Requinto</button>
                </h2>
                <div id="collapseRequinto" class="accordion-collapse collapse show" aria-labelledby="headingRequinto" data-bs-parent="#accordionCursos">
                    <div class="accordion-body d-flex">
                        <img src="img/requinto.jpg" class="me-3" style="width: 400px;" alt="Imagen Requinto">
                        <div class="text-center">
                            <h3>Clases de Requinto</h3>
                            <p>El requinto es un instrumento melódico que añade un sabor especial a cualquier estilo musical. En nuestras clases, aprenderás técnicas específicas para tocar el requinto, incluyendo arpegios, acordes y solos. Nuestros instructores experimentados te ayudarán a perfeccionar tu técnica y a explorar la riqueza de este instrumento.</p>
                            <p>Además, tendrás la oportunidad de tocar con otros músicos y participar en presentaciones, lo que enriquecerá tu experiencia de aprendizaje y te permitirá disfrutar de la música de una manera única.</p>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Sección de Instructores -->
    <section id="instructores" class="container my-5">
        <h2 class="text-center mb-4">Nuestros Instructores</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow border-0 transition-transform">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="img/user.jpg" alt="Juan Pérez" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
                        </div>
                        <h3 class="card-title">Juan Pérez</h3>
                        <p class="card-text"><strong>Instrumento:</strong> Piano</p>
                        <p class="card-text">Juan es un pianista con más de 10 años de experiencia enseñando a jóvenes y adultos.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center shadow border-0 transition-transform">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="img/user.jpg" alt="Ana Gómez" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
                        </div>
                        <h3 class="card-title">Ana Gómez</h3>
                        <p class="card-text"><strong>Instrumento:</strong> Canto</p>
                        <p class="card-text">Ana ha entrenado a cantantes profesionales y aficionados durante más de 8 años.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center shadow border-0 transition-transform">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="img/user.jpg" alt="Pedro López" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
                        </div>
                        <h3 class="card-title">Pedro López</h3>
                        <p class="card-text"><strong>Instrumento:</strong> Guitarra</p>
                        <p class="card-text">Pedro es un experimentado guitarrista que ha enseñado a estudiantes de todos los niveles.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center shadow border-0 transition-transform">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="img/user.jpg" alt="María Fernández" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
                        </div>
                        <h3 class="card-title">María Fernández</h3>
                        <p class="card-text"><strong>Instrumento:</strong> Violín</p>
                        <p class="card-text">María es una violinista apasionada que ha trabajado con orquestas juveniles.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center shadow border-0 transition-transform">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="img/user.jpg" alt="Luisa Rodríguez" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
                        </div>
                        <h3 class="card-title">Luisa Rodríguez</h3>
                        <p class="card-text"><strong>Instrumento:</strong> Ukelele</p>
                        <p class="card-text">Luisa enseña a tocar el ukelele de una manera divertida y accesible.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Sección de Contacto -->
    <section id="contacto" class="container my-5">
        <h2 class="text-center mb-4">Contáctanos</h2>
        <div class="row">
            <!-- Mapa -->
            <div class="col-md-6 mb-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h3 class="card-title text-center">Ubicación</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15177.273294811263!2d-70.2608680012803!3d-18.010424771399833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sprodigios!5e0!3m2!1ses!2spe!4v1729167504117!5m2!1ses!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario de Contacto -->
            <div class="col-md-6 mb-4">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h3 class="card-title text-center">Formulario de Contacto</h3>
                        <form>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Completo:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="mensaje" class="form-label">Mensaje:</label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pie de página -->
    <footer>
        <p>Academia de Música PRODIGIOS &copy; 2024</p>
    </footer>
    <!-- Modal Iniciar Sesión -->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post"> 
                    <div class="mb-3">
                        <label for="emailLogin" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="emailLogin" name="emailLogin" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordLogin" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Registrarse -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistroLabel">Registrarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post"> 
                        <div class="mb-3">
                            <label for="nombreRegistro" class="form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" id="nombreRegistro" name="nombreRegistro" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailRegistro" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="emailRegistro" name="emailRegistro" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordRegistro" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="passwordRegistro" name="passwordRegistro" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Mensaje</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo htmlspecialchars($modalMessage); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <?php if (!empty($modalMessage)): ?>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('messageModal'));
            myModal.show();
        </script>
    <?php endif; ?>
</body>
</html>
