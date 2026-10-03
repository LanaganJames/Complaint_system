<?php
require_once(__DIR__.'/model/database.php');
$db = new Database();
if ($db->getDbConn()) echo '<h1>Database Connection Successful!</h1>';
else echo '<h1>Database Connection Failed</h1><p>'.htmlspecialchars($db->getDbError()).'</p>';
?>
