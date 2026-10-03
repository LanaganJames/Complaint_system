<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'complaint_management';
    private $username = 'complaint_app';
    private $password = 'ComplaintApp123!';
    private $conn;
    private $conn_error = '';

    function __construct() {
        mysqli_report(MYSQLI_REPORT_OFF);
        $this->conn = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname
        );
        if ($this->conn === false) {
            $this->conn_error = 'Failed to connect to DB: ' . mysqli_connect_error();
        }
    }

    function __destruct() {
        if ($this->conn) mysqli_close($this->conn);
    }

    function getDbConn() { return $this->conn; }
    function getDbError() { return $this->conn_error; }
}
?>
