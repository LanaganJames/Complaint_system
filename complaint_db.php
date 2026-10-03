<?php
require_once(__DIR__.'/database.php');
class ComplaintsDB {
    public static function getByUser($userId){$d=new Database();$c=$d->getDbConn();if(!$c)return false;$q='SELECT c.*,p.product_name,t.type_name FROM complaints c JOIN products p ON c.product_id=p.product_id JOIN complaint_types t ON c.complaint_type_id=t.complaint_type_id WHERE c.user_id=? ORDER BY c.complaint_date DESC';$s=$c->prepare($q);$s->bind_param('i',$userId);$s->execute();return $s->get_result()->fetch_all(MYSQLI_ASSOC);}
    public static function getAll(){ $d=new Database();$c=$d->getDbConn();if(!$c)return false;$q='SELECT c.*,p.product_name,t.type_name,e.first_name technician_first,e.last_name technician_last FROM complaints c JOIN products p ON c.product_id=p.product_id JOIN complaint_types t ON c.complaint_type_id=t.complaint_type_id LEFT JOIN employees e ON c.technician_id=e.employee_id ORDER BY c.complaint_date DESC';$r=$c->query($q);return $r->fetch_all(MYSQLI_ASSOC);}
}
?>
