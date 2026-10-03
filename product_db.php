<?php
require_once(__DIR__.'/database.php');
class ProductsDB {public static function getAll(){$d=new Database();$c=$d->getDbConn();if(!$c)return false;$r=$c->query('SELECT * FROM products ORDER BY product_name');return $r->fetch_all(MYSQLI_ASSOC);}}
?>
