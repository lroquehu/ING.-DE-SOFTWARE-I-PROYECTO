<?php

  session_start();
  include("conexion.php");
  // require_once ROOT . 'config/database.php';
  $modalMessage = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Inicio de sesión
    if (isset($_POST["emailLogin"]) && isset($_POST["passwordLogin"])) {
      $email = $_POST["emailLogin"];
      $password = $_POST["passwordLogin"];

      $stmt = $conn->prepare("SELECT contraseña,ID FROM credenciales WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["contraseña"])) {
          $_SESSION['user_id'] = $row['ID'];
          header("location: index.php?page=app");
          exit;
        } else {
          $modalMessage = "Email o contraseña incorrectos";
        }
      } else {
        $modalMessage = "Email o contraseña incorrectos";
      }
      $stmt->close();
    }

    // Registro de usuario
    else if (isset($_POST["nombreRegistro"], $_POST["apellidoRegistro"], $_POST["telefonoRegistro"], $_POST["emailRegistro"], $_POST["passwordRegistro"], $_POST["passwordRegistro1"])) {
      if ($_POST["passwordRegistro"] == $_POST["passwordRegistro1"]) {
        $nombre = $_POST["nombreRegistro"] . ' ' . $_POST["apellidoRegistro"];
        $telefono = $_POST["telefonoRegistro"];
        $emailRegistro = $_POST["emailRegistro"];
        
        // Validación de email
        if (!filter_var($emailRegistro, FILTER_VALIDATE_EMAIL)) {
          $modalMessage = "Formato de email inválido";
        } else {
          // Verificar si email ya existe
          $check = $conn->prepare("SELECT email FROM credenciales WHERE email = ?");
          $check->bind_param("s", $emailRegistro);
          $check->execute();
          if ($check->get_result()->num_rows > 0) {
            $modalMessage = "El email ya está registrado";
          } else {
            // VALIDACIÓN DE FORTALEZA DE CONTRASEÑA AÑADIDA AQUÍ
            $password = $_POST["passwordRegistro"];
            $passwordErrors = [];
            
            if (strlen($password) < 8) {
              $passwordErrors[] = "Debe tener al menos 8 caracteres";
            }
            if (!preg_match("/[A-Z]/", $password)) {
              $passwordErrors[] = "Debe contener al menos una mayúscula";
            }
            if (!preg_match("/[0-9]/", $password)) {
              $passwordErrors[] = "Debe contener al menos un número";
            }
            
            if (!empty($passwordErrors)) {
              $_SESSION['password_errors'] = $passwordErrors; 
              $modalMessage = "Contraseña inválida"; 
            } else {
              // Si pasa todas las validaciones, crear el usuario
              $passwordHash = password_hash($password, PASSWORD_DEFAULT);
      
              $stmt = $conn->prepare("INSERT INTO credenciales (nombre, email, telefono, contraseña) VALUES (?, ?, ?, ?)");
              $stmt->bind_param("ssss", $nombre, $emailRegistro, $telefono, $passwordHash);

              if ($stmt->execute()) {
                $modalMessage = "Registro exitoso!";
              } else {
                $modalMessage = "Error en el registro. Por favor, inténtelo de nuevo.";
                error_log("DB Error: " . $conn->error);
              }
              $stmt->close();
            }
          }
        }
      } else {
        $modalMessage = "Las contraseñas no coinciden";
      }
    }
    if (isset($conn) && $conn instanceof mysqli) {
      $conn->close();
    }
  } else {
    if (isset($conn) && $conn instanceof mysqli) {
      $conn->close();
    }
  }