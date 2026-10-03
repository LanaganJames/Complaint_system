<?php
session_start();
require_once(__DIR__.'/Controller/user.php');
require_once(__DIR__.'/Controller/user_controller.php');

$message = $_SESSION['login_msg'] ?? '';
unset($_SESSION['login_msg']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $user = UserController::login($email, $password);

    if ($user) {
        session_regenerate_id(true);
        $_SESSION['customer'] = true;
        $_SESSION['user_id'] = $user->getUserId();
        header('Location: view/user.php');
        exit();
    }
    $message = 'Invalid email or password.';
}
?>
<!DOCTYPE html>
<html>
<head><title>KitchenPro Complaint Management</title></head>
<body>
<h1>KitchenPro Equipment</h1>
<h2>Customer Login</h2>
<?php if ($message): ?><p><?php echo htmlspecialchars($message); ?></p><?php endif; ?>
<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" maxlength="100" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
<p><a href="employee_login.php">Employee Login</a></p>
</body>
</html>
