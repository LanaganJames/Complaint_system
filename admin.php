<?php
session_start();
require_once(__DIR__.'/../util/security.php');
Security::checkAuthority('admin');
if (isset($_POST['logout'])) Security::logout();
?>
<!DOCTYPE html>
<html><head><title>Administrator Dashboard</title></head><body>
<h1>Administrator Dashboard</h1>
<p>Administrator authentication is working.</p>
<ul>
<li>Customers are stored in the users table.</li>
<li>Employees are stored in the employees table.</li>
<li>Complaints are stored in the complaints table.</li>
<li>Technicians are related to complaints through technician_id.</li>
</ul>
<form method="POST"><button type="submit" name="logout">Logout</button></form>
</body></html>
