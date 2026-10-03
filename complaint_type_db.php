<?php
require_once(__DIR__.'/database.php');
class ComplaintTypesDB {public static function getAll(){$d=new Database();$c=$d->getDbConn();if(!$c)return false;$r=$c->query('SELECT * FROM complaint_types ORDER BY type_name');return $r->fetch_all(MYSQLI_ASSOC);}}
?>
