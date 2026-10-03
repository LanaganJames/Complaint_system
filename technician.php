<?php
session_start();
require_once(__DIR__.'/../util/security.php');
Security::checkAuthority('technician');
if (isset($_POST['logout'])) Security::logout();
?>
<!DOCTYPE html>
<html><head><title>Technician Dashboard</title></head><body>
<h1>Technician Dashboard</h1>
<p>Technician authentication is working.</p>
<ul>
<li>Assigned complaint retrieval will use the complaints table.</li>
<li>Technician notes will use the technician_notes table.</li>
<li>Resolution processing will be added in the complaint workflow.</li>
</ul>
<form method="POST"><button type="submit" name="logout">Logout</button></form>
</body></html>
