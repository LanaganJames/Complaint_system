<?php
session_start();
require_once(__DIR__.'/Controller/employee.php');
require_once(__DIR__.'/Controller/employee_controller.php');
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['user_id'] ?? '');
    $password = $_POST['password'] ?? '';
    $employee = EmployeeController::login($id, $password);
    if ($employee) {
        session_regenerate_id(true);
        $_SESSION['employee_id'] = $employee->getEmployeeId();
        $_SESSION['employee_user_id'] = $employee->getUserId();
        if ($employee->getLevel() === 'Administrator') {
            $_SESSION['admin'] = true;
            $_SESSION['technician'] = false;
            header('Location: view/admin.php');
        } else {
            $_SESSION['technician'] = true;
            $_SESSION['admin'] = false;
            header('Location: view/technician.php');
        }
        exit();
    }
    $message = 'Invalid User ID or password.';
}
?>
<!DOCTYPE html>
<html>
<head><title>Employee Login</title></head>
<body>
<h1>Employee Login</h1>
<?php if ($message): ?><p><?php echo htmlspecialchars($message); ?></p><?php endif; ?>
<form method="POST">
    <label>User ID:</label><br>
    <input type="text" name="user_id" maxlength="30" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
<p><a href="Index.php">Customer Login</a></p>
</body>
</html>
