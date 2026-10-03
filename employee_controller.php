<?php
require_once(__DIR__.'/../model/employee_db.php'); require_once(__DIR__.'/employee.php');
class EmployeeController {
    private static function row($r){return new Employee($r['employee_id'],$r['user_id'],$r['first_name'],$r['last_name'],$r['email'],$r['phone_extension'],$r['password'],$r['level']);}
    public static function login($id,$password){if($id===''||strlen($id)>30||$password==='')return false;$r=EmployeesDB::getByUserId($id);if($r&&password_verify($password,$r['password']))return self::row($r);return false;}
}
?>
