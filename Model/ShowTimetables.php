<?php
require_once "Connection.php";

function showTimetables($post)
{
    extract($post);
    $dateFromOutput = strtotime($dateFromOutput);
    $dateToOutput   = strtotime($dateToOutput);

    if ($query_user = mysqli_query(DataBase::getDB()->mysqli, "
        SELECT region, courier, departure, arrival  FROM timetables
        WHERE UNIX_TIMESTAMP(departure) >= '{$dateFromOutput}'
        AND UNIX_TIMESTAMP(arrival) <= '{$dateToOutput}'")) {

        while ($data = mysqli_fetch_array($query_user, MYSQLI_ASSOC)) {
            echo ('<li>' . 'Город: ' . $data['region'] . ',
                       ' . 'Курьер: ' . $data['courier'] . ',
                       ' . 'C ' .  $data['departure'] . ' ' . 'По ' .  $data['arrival'] . '</li>');
        }
    }
}

showTimetables($_POST);
