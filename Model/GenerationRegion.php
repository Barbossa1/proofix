<?php
require_once "Connection.php";

function generationRegion()
{
    $region = [];
    if ($query_user = mysqli_query(DataBase::getDB()->mysqli, "SELECT * FROM `regions`")) {
        while ($data = mysqli_fetch_assoc($query_user)) {
            $region[$data['region_id']] = $data['region_name'];
        }
        return $region;
    }
}

$region = generationRegion();

foreach ($region as $key => $value) {
    echo "<option value='$value'>$value</option>";
}