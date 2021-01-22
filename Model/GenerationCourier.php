<?php
require_once "Connection.php";

function generationCourier()
{
    $courier = [];
    if ($query_user = mysqli_query(DataBase::getDB()->mysqli, "SELECT * FROM `couriers`")) {
        while ($data = mysqli_fetch_assoc($query_user)) {
            $courier[$data['courier_id']] = $data['courier_fio'];
        }
        return $courier;
    }
}

$courier = generationCourier();

foreach ($courier as $key => $value) {
    echo "<option value='$value'>$value</option>";
}