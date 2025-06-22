<?php
    include("conexion.php");
    $modalMessage = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inicio de sesión
        if (isset($_POST["emailLogin"]) && isset($_POST["passwordLogin"])) {
            $email = $_POST["emailLogin"];
            $password = $_POST["passwordLogin"];

            // Usar consultas preparadas para evitar inyección SQL
            $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE `email` = ? AND `password` = ?");
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
      <div class="container">
        <a class="navbar-brand" href="index.php" aria-label="PRODIGIOS - Inicio">PRODIGIOS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="#inicio" aria-label="Ir a sección Inicio">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="#cursos" aria-label="Ir a sección Cursos">Cursos</a></li>
            <li class="nav-item"><a class="nav-link" href="#instructores" aria-label="Ir a sección Instructores">Instructores</a></li>
            <li class="nav-item"><a class="nav-link" href="#contacto" aria-label="Ir a sección Contacto">Contacto</a></li>
          </ul>
          <div class="d-flex">
            <button class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#modalLogin" aria-label="Abrir modal de inicio de sesión">Iniciar Sesión</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistro" aria-label="Abrir modal de registro">Registrarse</button>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- Sección de Carrusel -->
  <section id="inicio" class="mb-5">
    <div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
          <img src="img/image1.jpg" class="d-block w-100" alt="Persona tocando requinto" loading="lazy">
          <div class="carousel-caption d-none d-md-block">
            <h3>Clases de Requinto</h3>
            <p>Aprende técnicas profesionales con nuestros instructores certificados</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="img/image2.jpg" class="d-block w-100" alt="Persona tocando piano" loading="lazy">
          <div class="carousel-caption d-none d-md-block">
            <h3>Clases de Piano</h3>
            <p>Desde principiantes hasta niveles avanzados</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="img/image3.jpg" class="d-block w-100" alt="Persona tocando ukelele" loading="lazy">
          <div class="carousel-caption d-none d-md-block">
            <h3>Clases de Ukelele</h3>
            <p>El instrumento perfecto para comenzar en la música</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="img/image4.jpg" class="d-block w-100" alt="Persona cantando" loading="lazy">
          <div class="carousel-caption d-none d-md-block">
            <h3>Clases de Canto</h3>
            <p>Desarrolla tu voz con técnicas profesionales</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="img/image5.jpg" class="d-block w-100" alt="Persona tocando guitarra" loading="lazy">
          <div class="carousel-caption d-none d-md-block">
            <h3>Clases de Guitarra</h3>
            <p>Aprende tus canciones favoritas desde el primer día</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev" aria-label="Slide anterior">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next" aria-label="Slide siguiente">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </section>

  <!-- Sección de Cursos -->
  <section id="cursos" class="section-padding bg-light courses-section">
    <div class="container">
      <h2 class="text-center mb-5">Nuestros Cursos</h2>
        <!-- Filtros de cursos -->
        <div class="course-filter">
          <button class="filter-btn active" data-filter="all">Todos</button>
          <button class="filter-btn" data-filter="piano">Piano</button>
          <button class="filter-btn" data-filter="guitarra">Guitarra</button>
          <button class="filter-btn" data-filter="canto">Canto</button>
          <button class="filter-btn" data-filter="violin">Violín</button>
          <button class="filter-btn" data-filter="ukelele">Ukelele</button>
          <button class="filter-btn" data-filter="requinto">Requinto</button>
        </div>
        <!-- Grid de cursos -->
        <div class="courses-container">
          <!-- Curso de Piano -->
          <div class="course-card" data-category="piano">
            <img src="img/piano.jpg" alt="Clases de piano" class="course-img">
            <div class="course-content">
            <span class="course-category">Piano</span>
            <h3 class="course-title">Piano para Principiantes</h3>
            <p class="course-description">Aprende las bases del piano y desarrolla tu técnica con nuestro método progresivo.</p>
            <div class="course-meta">
              <span class="course-price">S/. 120</span>
              <span class="course-duration">12 clases</span>
            </div>
            <a href="#" class="btn-enroll" data-bs-toggle="modal" data-bs-target="#pianoModal">Más información</a>
            </div>
          </div>
          <!-- Curso de Guitarra -->
          <div class="course-card" data-category="guitarra">
            <img src="img/guitarra.jpg" alt="Clases de guitarra" class="course-img">
            <div class="course-content">
            <span class="course-category">Guitarra</span>
            <h3 class="course-title">Guitarra Moderna</h3>
            <p class="course-description">Domina acordes, escalas y técnicas para tocar tus canciones favoritas.</p>
            <div class="course-meta">
              <span class="course-price">S/. 100</span>
              <span class="course-duration">8 clases</span>
            </div>
            <a href="#" class="btn-enroll" data-bs-toggle="modal" data-bs-target="#guitarraModal">Más información</a>
            </div>
          </div>
          <!-- Curso de Canto -->
          <div class="course-card" data-category="canto">
            <img src="img/canto.jpg" alt="Clases de canto" class="course-img">
            <div class="course-content">
            <span class="course-category">Canto</span>
            <h3 class="course-title">Técnica Vocal</h3>
            <p class="course-description">Desarrolla tu voz con ejercicios de respiración, afinación y proyección.</p>
            <div class="course-meta">
              <span class="course-price">S/. 90</span>
              <span class="course-duration">10 clases</span>
            </div>
            <a href="#" class="btn-enroll" data-bs-toggle="modal" data-bs-target="#cantoModal">Más información</a>
            </div>
          </div>
          <!-- Curso de Violín -->
          <div class="course-card" data-category="violin">
            <img src="img/violin.jpg" alt="Clases de violín" class="course-img">
            <div class="course-content">
            <span class="course-category">Violín</span>
            <h3 class="course-title">Violín Clásico</h3>
            <p class="course-description">Aprende la técnica correcta del violín con repertorio clásico y moderno.</p>
            <div class="course-meta">
              <span class="course-price">S/. 150</span>
              <span class="course-duration">12 clases</span>
            </div>
            <a href="#" class="btn-enroll" data-bs-toggle="modal" data-bs-target="#violinModal">Más información</a>
            </div>
          </div>
          <!-- Curso de Ukelele -->
          <div class="course-card" data-category="ukelele">
            <img src="img/ukelele.jpg" alt="Clases de ukelele" class="course-img">
            <div class="course-content">
            <span class="course-category">Ukelele</span>
            <h3 class="course-title">Ukelele Divertido</h3>
            <p class="course-description">El instrumento perfecto para comenzar en la música de forma alegre.</p>
            <div class="course-meta">
              <span class="course-price">S/. 80</span>
              <span class="course-duration">8 clases</span>
            </div>
            <a href="#" class="btn-enroll" data-bs-toggle="modal" data-bs-target="#ukeleleModal">Más información</a>
            </div>
          </div>
          <!-- Curso de Requinto -->
          <div class="course-card" data-category="requinto">
            <img src="img/requinto.jpg" alt="Clases de requinto" class="course-img">
            <div class="course-content">
            <span class="course-category">Requinto</span>
            <h3 class="course-title">Requinto Tradicional</h3>
            <p class="course-description">Domina este instrumento melódico esencial en la música tradicional.</p>
            <div class="course-meta">
              <span class="course-price">S/. 110</span>
              <span class="course-duration">10 clases</span>
            </div>
            <a href="#" class="btn-enroll" data-bs-toggle="modal" data-bs-target="#requintoModal">Más información</a>
            </div>
          </div>
        </div>
    </div>
  </section>

  <!-- Sección de Instructores -->
  <section id="instructores" class="section-padding">
    <div class="container">
      <h2 class="text-center mb-5">Nuestros Instructores</h2>
      <div class="row g-4">
        
        <!-- Instructor 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <img src="img/user.jpg" class="instructor-img rounded-circle mb-4" alt="Instructor Juan Pérez" loading="lazy">
              <h3 class="card-title">Juan Pérez</h3>
              <p class="text-muted"><i class="fas fa-piano me-2"></i> Piano</p>
              <p class="card-text">Pianista con más de 15 años de experiencia en enseñanza y presentaciones en vivo. Graduado del Conservatorio Nacional de Música.</p>
              <div class="mt-3">
                <a href="#" class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#instructorModal1">Ver perfil</a>
                <a href="#" class="btn btn-primary btn-sm">Contactar</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Instructor 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <img src="img/user.jpg" class="instructor-img rounded-circle mb-4" alt="Instructora Ana Gómez" loading="lazy">
              <h3 class="card-title">Ana Gómez</h3>
              <p class="text-muted"><i class="fas fa-microphone me-2"></i> Canto</p>
              <p class="card-text">Cantante profesional con 10 años de experiencia en enseñanza vocal. Especializada en técnica vocal contemporánea.</p>
              <div class="mt-3">
                <a href="#" class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#instructorModal2">Ver perfil</a>
                <a href="#" class="btn btn-primary btn-sm">Contactar</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Instructor 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <img src="img/user.jpg" class="instructor-img rounded-circle mb-4" alt="Instructor Pedro López" loading="lazy">
              <h3 class="card-title">Pedro López</h3>
              <p class="text-muted"><i class="fas fa-guitar me-2"></i> Guitarra</p>
              <p class="card-text">Guitarrista profesional con amplia experiencia en géneros como rock, blues y jazz. Ha participado en múltiples giras internacionales.</p>
              <div class="mt-3">
                <a href="#" class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#instructorModal3">Ver perfil</a>
                <a href="#" class="btn btn-primary btn-sm">Contactar</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Instructor 4 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <img src="img/user.jpg" class="instructor-img rounded-circle mb-4" alt="Instructora María Fernández" loading="lazy">
              <h3 class="card-title">María Fernández</h3>
              <p class="text-muted"><i class="fas fa-music me-2"></i> Violín</p>
              <p class="card-text">Violinista clásica con formación en el extranjero. Miembro de la Orquesta Sinfónica Nacional por más de 8 años.</p>
              <div class="mt-3">
                <a href="#" class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#instructorModal4">Ver perfil</a>
                <a href="#" class="btn btn-primary btn-sm">Contactar</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Instructor 5 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <img src="img/user.jpg" class="instructor-img rounded-circle mb-4" alt="Instructora Luisa Rodríguez" loading="lazy">
              <h3 class="card-title">Luisa Rodríguez</h3>
              <p class="text-muted"><i class="fas fa-guitar me-2"></i> Ukelele</p>
              <p class="card-text">Especialista en música hawaiana y contemporánea con el ukelele. Más de 5 años enseñando a niños y adultos.</p>
              <div class="mt-3">
                <a href="#" class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#instructorModal5">Ver perfil</a>
                <a href="#" class="btn btn-primary btn-sm">Contactar</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Instructor 6 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center p-4">
              <img src="img/user.jpg" class="instructor-img rounded-circle mb-4" alt="Instructor Carlos Méndez" loading="lazy">
              <h3 class="card-title">Carlos Méndez</h3>
              <p class="text-muted"><i class="fas fa-guitar me-2"></i> Requinto</p>
              <p class="card-text">Experto en música tradicional y requinto. Ha participado en festivales internacionales de música folklórica.</p>
              <div class="mt-3">
                <a href="#" class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#instructorModal6">Ver perfil</a>
                <a href="#" class="btn btn-primary btn-sm">Contactar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="text-center mt-5">
        <button class="btn btn-outline-primary">Ver todos los instructores</button>
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
    <!-- Modal Mensaje -->
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
