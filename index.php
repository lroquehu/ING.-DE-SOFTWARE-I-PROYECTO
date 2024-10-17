<?php
include("conexion.php");

// Inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emailLogin"]) && isset($_POST["passwordLogin"])) {
    $email = $_POST["emailLogin"];
    $password = $_POST["passwordLogin"];

    // Consulta simple para verificar el usuario y la contraseña
    $sql = "SELECT * FROM Usuarios WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si el usuario existe
        echo "Inicio de sesión exitoso";
        header("location:main.php");
    } else {
        // Si las credenciales no son correctas
        echo "Email o contraseña incorrectos";
    }
}

// Registro de usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombreRegistro"]) && isset($_POST["emailRegistro"]) && isset($_POST["passwordRegistro"])) {
    $nombre = $_POST["nombreRegistro"];
    $emailRegistro = $_POST["emailRegistro"];
    $passwordRegistro = $_POST["passwordRegistro"];

    // Consulta simple para insertar un nuevo usuario
    $sql = "INSERT INTO Usuarios (nombre, email, password) VALUES ('$nombre', '$emailRegistro', '$passwordRegistro')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error en el registro: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academia de Música PRODIGIOS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMdXh5jzMRej1A6i/2D9tnM/ZL1v1pV15j06u" crossorigin="anonymous">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  
    header {
      background-color: #2c4d90;
      color: white;
      padding: 1rem;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 1.5px;
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
      font-size: 2rem;
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
  
    .navbar-nav .nav-link {
      color: white;
      font-size: 1.1rem;
      margin-right: 15px;
      transition: color 0.3s ease;
    }
  
    .navbar-nav .nav-link:hover {
      color: #2c4d90;
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
      padding: 10px 0;
      margin-top: 20px;
      letter-spacing: 1px;
    }
  
    .btn-primary {
      background-color: #2c4d90;
      border: none;
    }
  
    .btn-primary:hover {
      background-color: #1e3871;
    }
  
    .modal-header {
      background-color: #2c4d90;
      color: white;
    }
  
    .modal-footer button {
      background-color: #2c4d90;
      color: white;
      font-weight: 600;
    }
  
    form label {
      color: #2c4d90;
    }
  
    .form-control {
      border: 2px solid #2c4d90;
    }
  
    .btn-close {
      background-color: #2c4d90;
      color: white;
    }
    .transition-transform:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
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
        background-color: #2c4d90; /* Color personalizado */
        border: none;
    }

    .btn-primary:hover {
        background-color: #1a3b6b; /* Color en hover */
    }

    strong {
        color: #2c4d90;
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
          <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrarse</button>
        </div>
      </div>
    </nav>
  </header>

  <!-- Sección de Carrusel -->
  <section id="inicio">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image1.jpg" class="d-block w-100" alt="Piano">
          </div>
          <div class="carousel-item">
            <img src="image2.jpg" class="d-block w-100" alt="Guitarra">
          </div>
          <div class="carousel-item">
            <img src="image3.jpg" class="d-block w-100" alt="Canto">
          </div>
          <div class="carousel-item">
            <img src="image4.jpg" class="d-block w-100" alt="Canto">
          </div>
          <div class="carousel-item">
            <img src="image5.jpg" class="d-block w-100" alt="Canto">
          </div>
          <div class="carousel-item">
            <img src="image6.jpg" class="d-block w-100" alt="Canto">
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
  </section>

<!-- Sección de Cursos con Acordeón -->
<section id="cursos" class="container my-5">
    <h2>Nuestros Cursos</h2>
    <div class="accordion accordion-flush" id="accordionCursos">

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingPiano">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePiano" aria-expanded="true" aria-controls="collapsePiano">
                    <img src="piano_icon.png" alt="Icono Piano" class="me-2">Piano
                </button>
            </h2>
            <div id="collapsePiano" class="accordion-collapse collapse show" aria-labelledby="headingPiano" data-bs-parent="#accordionCursos">
                <div class="accordion-body d-flex">
                    <img src="piano.jpg" class="me-3" style="width: 400px;" alt="Imagen Piano">
                    <div class="text-center">
                        <h3>Aprende Piano</h3>
                        <p>Descubre el arte de tocar el piano, un instrumento fundamental en la música. Nuestros cursos están diseñados para todos los niveles, desde principiantes hasta avanzados. A través de una metodología práctica y divertida, aprenderás desde las bases hasta técnicas complejas, permitiéndote expresar tu creatividad musical y disfrutar de la música de manera plena.</p>
                        <p>Además de aprender a tocar, profundizarás en la teoría musical, la lectura de partituras y la interpretación de diferentes estilos musicales. Nuestros instructores están comprometidos a guiarte en cada paso de tu viaje musical.</p>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalPiano">Detalles</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingGuitarra">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGuitarra" aria-expanded="false" aria-controls="collapseGuitarra">
                    <img src="guitar_icon.png" alt="Icono Guitarra" class="me-2">Guitarra
                </button>
            </h2>
            <div id="collapseGuitarra" class="accordion-collapse collapse" aria-labelledby="headingGuitarra" data-bs-parent="#accordionCursos">
                <div class="accordion-body d-flex">
                    <img src="guitarra.jpg" class="me-3" style="width: 400px;" alt="Imagen Guitarra">
                    <div class="text-center">
                        <h3>Clases de Guitarra</h3>
                        <p>La guitarra es un instrumento versátil y popular en todos los géneros musicales. Nuestras clases están diseñadas para guiarte desde los acordes básicos hasta solos complejos. Aprenderás a tocar tus canciones favoritas, a mejorar tu técnica y a desarrollar tu propio estilo musical.</p>
                        <p>Además, tendrás la oportunidad de colaborar con otros músicos, participar en presentaciones y disfrutar de un ambiente creativo y motivador. Nuestros instructores experimentados te ayudarán a alcanzar tus metas musicales.</p>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalGuitarra">Detalles</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingCanto">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCanto" aria-expanded="false" aria-controls="collapseCanto">
                    <img src="singing_icon.png" alt="Icono Canto" class="me-2">Canto
                </button>
            </h2>
            <div id="collapseCanto" class="accordion-collapse collapse" aria-labelledby="headingCanto" data-bs-parent="#accordionCursos">
                <div class="accordion-body d-flex">
                    <img src="canto.jpg" class="me-3" style="width: 400px;" alt="Imagen Canto">
                    <div class="text-center">
                        <h3>Clases de Canto</h3>
                        <p>¿Te apasiona cantar? Nuestras clases de canto están diseñadas para ayudarte a desarrollar tu voz y técnica vocal. Trabajamos en la proyección de la voz, el control de la respiración y la interpretación musical. Desde baladas hasta pop, mejorarás tu habilidad para cantar con confianza y estilo.</p>
                        <p>Además, aprenderás a interpretar canciones con emoción y a manejar diferentes estilos. Nuestras sesiones están diseñadas para que cada alumno desarrolle su propio estilo y se sienta seguro en el escenario.</p>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalCanto">Detalles</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingViolin">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseViolin" aria-expanded="false" aria-controls="collapseViolin">
                    <img src="violin_icon.png" alt="Icono Violin" class="me-2">Violín
                </button>
            </h2>
            <div id="collapseViolin" class="accordion-collapse collapse" aria-labelledby="headingViolin" data-bs-parent="#accordionCursos">
                <div class="accordion-body d-flex">
                    <img src="violin.jpg" class="me-3" style="width: 400px;" alt="Imagen Violín">
                    <div class="text-center">
                        <h3>Clases de Violín</h3>
                        <p>El violín es un instrumento que destaca en la música clásica y contemporánea. Con nuestras clases, aprenderás desde la postura correcta hasta técnicas avanzadas de interpretación. Nuestros instructores te guiarán a través de un viaje musical, ayudándote a dominar el violín y a disfrutar de la música en su forma más pura.</p>
                        <p>Desarrollarás habilidades para tocar en orquestas y grupos musicales, así como para la interpretación solista. ¡Ven y vive la experiencia musical única que el violín puede ofrecerte!</p>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalViolin">Detalles</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingUkelele">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUkelele" aria-expanded="false" aria-controls="collapseUkelele">
                    <img src="ukulele_icon.png" alt="Icono Ukelele" class="me-2">Ukelele
                </button>
            </h2>
            <div id="collapseUkelele" class="accordion-collapse collapse" aria-labelledby="headingUkelele" data-bs-parent="#accordionCursos">
                <div class="accordion-body d-flex">
                    <img src="ukelele.jpg" class="me-3" style="width: 400px;" alt="Imagen Ukelele">
                    <div class="text-center">
                        <h3>Clases de Ukelele</h3>
                        <p>El ukelele es un instrumento alegre y accesible para todos. En nuestras clases, aprenderás a tocar acordes y canciones de forma divertida. Te enseñaremos desde los fundamentos hasta técnicas avanzadas para que puedas tocar en cualquier ocasión.</p>
                        <p>Las clases son dinámicas y adaptadas a tus necesidades, fomentando la creatividad y la improvisación. ¡No hay mejor momento que ahora para empezar a disfrutar de la música con el ukelele!</p>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalUkelele">Detalles</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingRequinto">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRequinto" aria-expanded="false" aria-controls="collapseRequinto">
                    <img src="requinto_icon.png" alt="Icono Requinto" class="me-2">Requinto
                </button>
            </h2>
            <div id="collapseRequinto" class="accordion-collapse collapse" aria-labelledby="headingRequinto" data-bs-parent="#accordionCursos">
                <div class="accordion-body d-flex">
                    <img src="requinto1.jpg" class="me-3" style="width: 400px;" alt="Imagen Requinto">
                    <div class="text-center">
                        <h3>Clases de Requinto</h3>
                        <p>El requinto es un instrumento melódico que añade un sabor especial a cualquier estilo musical. En nuestras clases, aprenderás técnicas específicas para tocar el requinto, incluyendo arpegios, acordes y solos. Nuestros instructores experimentados te ayudarán a perfeccionar tu técnica y a explorar la riqueza de este instrumento.</p>
                        <p>Además, tendrás la oportunidad de tocar con otros músicos y participar en presentaciones, lo que enriquecerá tu experiencia de aprendizaje y te permitirá disfrutar de la música de una manera única.</p>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modalRequinto">Detalles</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal para Piano -->
    <div class="modal fade" id="modalPiano" tabindex="-1" aria-labelledby="modalPianoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPianoLabel">Detalles del Curso de Piano</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Duración:</strong> 3 meses</p>
                    <p><strong>Tipo de profesores:</strong> Instructores especializados en piano clásico y contemporáneo</p>
                    <p><strong>Precio:</strong> $300</p>
                    <p><strong>Requisitos:</strong> No se requiere experiencia previa, solo ganas de aprender.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Guitarra -->
    <div class="modal fade" id="modalGuitarra" tabindex="-1" aria-labelledby="modalGuitarraLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGuitarraLabel">Detalles del Curso de Guitarra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Duración:</strong> 4 meses</p>
                    <p><strong>Tipo de profesores:</strong> Guitarristas con experiencia en varios géneros</p>
                    <p><strong>Precio:</strong> $350</p>
                    <p><strong>Requisitos:</strong> Guitarra propia y deseo de aprender.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Canto -->
    <div class="modal fade" id="modalCanto" tabindex="-1" aria-labelledby="modalCantoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCantoLabel">Detalles del Curso de Canto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Duración:</strong> 2 meses</p>
                    <p><strong>Tipo de profesores:</strong> Vocal coaches especializados en técnica vocal</p>
                    <p><strong>Precio:</strong> $250</p>
                    <p><strong>Requisitos:</strong> Ninguno, solo amor por la música.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Violín -->
    <div class="modal fade" id="modalViolin" tabindex="-1" aria-labelledby="modalViolinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalViolinLabel">Detalles del Curso de Violín</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Duración:</strong> 5 meses</p>
                    <p><strong>Tipo de profesores:</strong> Violinistas con experiencia en música clásica y moderna</p>
                    <p><strong>Precio:</strong> $400</p>
                    <p><strong>Requisitos:</strong> Violín propio y compromiso para practicar.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Ukelele -->
    <div class="modal fade" id="modalUkelele" tabindex="-1" aria-labelledby="modalUkeleleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUkeleleLabel">Detalles del Curso de Ukelele</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Duración:</strong> 3 meses</p>
                    <p><strong>Tipo de profesores:</strong> Instructores entusiastas y creativos</p>
                    <p><strong>Precio:</strong> $200</p>
                    <p><strong>Requisitos:</strong> Ukelele propio y pasión por aprender.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Requinto -->
    <div class="modal fade" id="modalRequinto" tabindex="-1" aria-labelledby="modalRequintoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRequintoLabel">Detalles del Curso de Requinto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Duración:</strong> 4 meses</p>
                    <p><strong>Tipo de profesores:</strong> Músicos con experiencia en el requinto</p>
                    <p><strong>Precio:</strong> $300</p>
                    <p><strong>Requisitos:</strong> Requinto propio y deseo de aprender.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Sección de Instructores con Estilo Mejorado -->
<section id="instructores" class="container my-5">
    <h2 class="text-center mb-4">Nuestros Instructores</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow border-0 transition-transform">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="user.jpg" alt="Juan Pérez" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
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
                        <img src="user.jpg" alt="Ana Gómez" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
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
                        <img src="user.jpg" alt="Pedro López" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
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
                        <img src="user.jpg" alt="María Fernández" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
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
                        <img src="user.jpg" alt="Luisa Rodríguez" class="img-fluid rounded-circle border border-primary" style="width: 150px; height: 150px;">
                    </div>
                    <h3 class="card-title">Luisa Rodríguez</h3>
                    <p class="card-text"><strong>Instrumento:</strong> Ukelele</p>
                    <p class="card-text">Luisa enseña a tocar el ukelele de una manera divertida y accesible.</p>
                </div>
            </div>
        </div>
    </div>
</section>

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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLoginLabel">Iniciar Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post"> <!-- Agregar action y method -->
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRegistroLabel">Registrarse</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="main.php" method="post"> <!-- Agregar action y method -->
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



  <!-- Scripts de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
