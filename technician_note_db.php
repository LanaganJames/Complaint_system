<?php
require_once(__DIR__.'/database.php');
class TechnicianNotesDB {public static function getByComplaint($complaintId){$d=new Database();$c=$d->getDbConn();if(!$c)return false;$q='SELECT n.*,e.first_name,e.last_name FROM technician_notes n JOIN employees e ON n.employee_id=e.employee_id WHERE n.complaint_id=? ORDER BY n.note_date DESC';$s=$c->prepare($q);$s->bind_param('i',$complaintId);$s->execute();return $s->get_result()->fetch_all(MYSQLI_ASSOC);}}
?>
