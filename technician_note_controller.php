<?php
require_once(__DIR__.'/../model/technician_note_db.php');
class TechnicianNoteController {public static function getByComplaint($id){return TechnicianNotesDB::getByComplaint($id);}}
?>
