<?php
class DataBase
{
    private static $db = null;
    public $mysqli;

    public static function getDB()
    {
        if (self::$db == null) {
            self::$db = new DataBase();
        }
        return self::$db;
    }

    private function __construct()
    {
        $this->mysqli = mysqli_connect(
            'localhost',
            'root',
            'root',
            'proofix'
        );
    }

    public function __destruct()
    {
        if ($this->mysqli) {
            $this->mysqli->close();
        }
    }
}