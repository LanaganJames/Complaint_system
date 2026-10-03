<?php
require_once(__DIR__.'/../model/complaint_db.php');
class ComplaintController {public static function getByUser($id){return ComplaintsDB::getByUser($id);}public static function getAll(){return ComplaintsDB::getAll();}}
?>
