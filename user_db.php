<?php
require_once(__DIR__ . '/database.php');
class UsersDB {
    public static function getUserByEmail($email) {
        $db=new Database(); $conn=$db->getDbConn(); if(!$conn)return false;
        $stmt=$conn->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s',$email); $stmt->execute(); return $stmt->get_result()->fetch_assoc();
    }
    public static function getUserById($id) {
        $db=new Database(); $conn=$db->getDbConn(); if(!$conn)return false;
        $stmt=$conn->prepare('SELECT * FROM users WHERE user_id = ?');
        $stmt->bind_param('i',$id); $stmt->execute(); return $stmt->get_result()->fetch_assoc();
    }
    public static function getAll() {
        $db=new Database(); $conn=$db->getDbConn(); if(!$conn)return false;
        $result=$conn->query('SELECT * FROM users ORDER BY last_name, first_name');
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public static function create($email,$first,$last,$address,$city,$state,$zip,$phone,$password) {
        $db=new Database(); $conn=$db->getDbConn(); if(!$conn)return false;
        $stmt=$conn->prepare('INSERT INTO users (email,first_name,last_name,street_address,city,state,zip_code,phone,password) VALUES (?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('sssssssss',$email,$first,$last,$address,$city,$state,$zip,$phone,$password);
        return $stmt->execute();
    }
    public static function update($id,$email,$first,$last,$address,$city,$state,$zip,$phone) {
        $db=new Database(); $conn=$db->getDbConn(); if(!$conn)return false;
        $stmt=$conn->prepare('UPDATE users SET email=?,first_name=?,last_name=?,street_address=?,city=?,state=?,zip_code=?,phone=? WHERE user_id=?');
        $stmt->bind_param('ssssssssi',$email,$first,$last,$address,$city,$state,$zip,$phone,$id);
        return $stmt->execute();
    }
}
?>
