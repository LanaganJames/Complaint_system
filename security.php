<?php
class Security {
    public static function checkAuthority($auth) {
        if (!isset($_SESSION[$auth]) || $_SESSION[$auth] !== true) {
            $_SESSION['login_msg'] = 'You are not authorized to view that page.';
            header('Location: ../Index.php');
            exit();
        }
    }
    public static function logout() {
        $_SESSION = [];
        session_destroy();
        header('Location: ../Index.php');
        exit();
    }
}
?>
