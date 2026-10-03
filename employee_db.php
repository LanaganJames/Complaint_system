<?php
require_once(__DIR__.'/database.php');
class EmployeesDB {
    public static function getByUserId($userId){$db=new Database();$c=$db->getDbConn();if(!$c)return false;$s=$c->prepare('SELECT * FROM employees WHERE user_id=?');$s->bind_param('s',$userId);$s->execute();return $s->get_result()->fetch_assoc();}
    public static function getAll(){ $db=new Database();$c=$db->getDbConn();if(!$c)return false;$r=$c->query('SELECT * FROM employees ORDER BY last_name, first_name');return $r->fetch_all(MYSQLI_ASSOC);}
}
?>
