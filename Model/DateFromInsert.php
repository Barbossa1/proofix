<?php
require_once "Connection.php";

function dateFromInsert()
{
    if ($query_user = mysqli_query(DataBase::getDB()->mysqli, "SELECT * FROM `regions`")) {
        while ($data = mysqli_fetch_assoc($query_user)) {
            $key =$data["region_name"];
            $val = $data["time_to"];
            $arr[$key] = $val;
        }
    }

    foreach ($arr as $key => $value) {
        if ($_POST['region'] == $key) {
            echo "$value";
        }
    }
}

dateFromInsert();
