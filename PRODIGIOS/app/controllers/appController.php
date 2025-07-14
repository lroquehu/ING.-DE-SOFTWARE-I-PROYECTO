<?php
require_once ROOT . 'models/Usuario.php';

class AppController {
    public function getUserInfo() {
        session_start();
        
        $usuario = new Usuario();
        $userId = $_SESSION['user_id'];
        return $usuario->getUserInfo($userId);
    }
    public function app() {
        $userInfor = $this->getUserInfo();
        require_once ROOT .  'views/layouts/header.php';
        require_once ROOT .  'views/layouts/aside.php';

        require_once ROOT .  'views/partials/dashboard.php';
        require_once ROOT .  'views/partials/attendance.php';
        require_once ROOT .  'views/partials/calendary.php';
        require_once ROOT .  'views/partials/adminStudent.php';
        require_once ROOT .  'views/partials/adminTeacher.php';
        require_once ROOT .  'views/partials/adminCourse.php';
        require_once ROOT .  'views/partials/report.php';
        require_once ROOT .  'views/partials/configuration.php';

        require_once ROOT .  'views/layouts/footer.php';
    }
}