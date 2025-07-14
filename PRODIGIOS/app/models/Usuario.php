<?php
require_once ROOT . 'config/database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function findUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($nombre, $apellido, $email, $password, $telefono, $tipoUsuario) {
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, apellido, correo, password, telefono, tipoUsuario) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellido, $email, $password, $telefono, $tipoUsuario]);  

        $userId = $this->db->lastInsertId();

        /*
        if ($tipoUsuario == 'admin') {
            $stmt = $this->db->prepare("INSERT INTO admin (idUsuario, dni, nombre, apellido) VALUES (?, '', '', '')");
            $stmt->execute([$userId]);
        } elseif ($tipoUsuario == 'cajero') {
            $stmt = $this->db->prepare("INSERT INTO cajero (idUsuario, dni, nombre, apellido, FKTerminal) VALUES (?, '', '', '', NULL)");
            $stmt->execute([$userId]);
        } elseif ($tipoUsuario == 'cliente') {
            $stmt = $this->db->prepare("INSERT INTO cliente (idUsuario) VALUES (?)");
            $stmt->execute([$userId]);
        }
        */
    }
    public function getUserInfo($userId) {
        $stmt = $this->db->prepare("SELECT * FROM credenciales WHERE ID = ?");
        $stmt->execute([$userId]);
        $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_merge($userInfo);

        /*
        if ($userInfo['tipoUsuario'] == 'admin') {
            $stmt = $this->db->prepare("SELECT * FROM admin WHERE idUsuario = ?");
            $stmt->execute([$userId]);
            $adminInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_merge($userInfo, $adminInfo);
        } 
        */
    }
}
?>