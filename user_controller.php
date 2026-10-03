<?php
require_once(__DIR__ . '/../model/user_db.php');
require_once(__DIR__ . '/user.php');
class UserController {
    private static function rowToUser($row) {
        return new User($row['first_name'],$row['last_name'],$row['email'],$row['password'],$row['user_id'],
            $row['street_address'],$row['city'],$row['state'],$row['zip_code'],$row['phone']);
    }
    public static function login($email,$password) {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($email)>100 || $password==='') return false;
        $row=UsersDB::getUserByEmail($email);
        if($row && password_verify($password,$row['password'])) return self::rowToUser($row);
        return false;
    }
    public static function create($email,$first,$last,$address,$city,$state,$zip,$phone,$password) {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($email)>100) return false;
        foreach([[$first,50],[$last,50],[$address,100],[$city,50],[$state,2],[$zip,10],[$phone,15]] as $v)
            if($v[0]==='' || strlen($v[0])>$v[1]) return false;
        if(!preg_match('/^[A-Za-z]{2}$/',$state) || !preg_match('/^[0-9]{5}(-[0-9]{4})?$/',$zip)) return false;
        if(!preg_match('/^[0-9() .+\-]{7,15}$/',$phone)) return false;
        if(strlen($password)<8 || !preg_match('/[A-Z]/',$password) || !preg_match('/[a-z]/',$password) || !preg_match('/[0-9]/',$password)) return false;
        return UsersDB::create($email,$first,$last,$address,$city,$state,$zip,$phone,password_hash($password,PASSWORD_DEFAULT));
    }
    public static function update($id,$email,$first,$last,$address,$city,$state,$zip,$phone) {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($email)>100) return false;
        foreach([[$first,50],[$last,50],[$address,100],[$city,50],[$state,2],[$zip,10],[$phone,15]] as $v)
            if($v[0]==='' || strlen($v[0])>$v[1]) return false;
        if(!preg_match('/^[A-Za-z]{2}$/',$state) || !preg_match('/^[0-9]{5}(-[0-9]{4})?$/',$zip)) return false;
        if(!preg_match('/^[0-9() .+\-]{7,15}$/',$phone)) return false;
        return UsersDB::update($id,$email,$first,$last,$address,$city,$state,$zip,$phone);
    }
}
?>
