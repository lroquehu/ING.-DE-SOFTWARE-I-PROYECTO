<?php
require_once ROOT . 'models/Usuario.php';


class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }
    /*
    public function login() {
        require_once '../app/views/templates/nav.php';
        require_once '../app/views/auth/login.php';
        // require_once '../app/views/templates/footer.php';
    }

    public function register() {
        require_once '../app/views/templates/nav.php';
        require_once '../app/views/auth/register.php';
        // require_once '../app/views/templates/footer.php';
    }
    */

    public function login_user() {
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->usuarioModel->findUserByEmail($email);

        if ($user && $user['password'] === $password) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['tipoUsuario'] = $user['tipoUsuario'];

            /*
            if ($user['tipoUsuario'] === 'admin') {
                header('Location: index.php?page=admin_home');
            } elseif ($user['tipoUsuario'] === 'cajero') {
                header('Location: index.php?page=cajero_home');
            } elseif ($user['tipoUsuario'] === 'cliente') {
                header('Location: index.php?page=cliente_home');
            }
                */
        } else {
            echo 'Usuario o contraseña incorrectos';
        }
    }

    public function register_user() {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['correo'];
        $password = $_POST['password'];
        $telefono = $_POST['telefono'];
        $this->usuarioModel->createUser($nombre, $apellido, $email, $password,$telefono,'cliente');
        header('Location: index.php?page=inicio');
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?page=inicio');
    }
}
?>