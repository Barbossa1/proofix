<?php
require_once "Connection.php";

function addTimetables($post, $employment)
{
    extract($post);
    $null = null;

    if ($employment) {
        echo "Данный курьер занят в это время";
        return false;
    }

    $stmt = DataBase::getDb()->mysqli->prepare("INSERT INTO `timetables` 
	(`id`, `region`, `courier`, `departure`, `arrival`) 
	VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('bssss', $null, $region, $courier, $date_from, $date_to);


    if ($stmt->execute()) {
        echo 'Добавлено в расписание';
    } else {
        echo "Ошибка БД";
    }
}

function employmentCheck($post)
{
    extract($post);
    $departure = strtotime($date_from);
    $arrival = strtotime($date_to);

    if ($query_user = mysqli_query(DataBase::getDB()->mysqli,"
        SELECT courier FROM timetables
        WHERE (courier) = '{$courier}'
        AND UNIX_TIMESTAMP(departure) <= '{$arrival}'
        AND UNIX_TIMESTAMP(arrival) >= '{$departure}'")) {
        $data = mysqli_fetch_array($query_user, MYSQLI_ASSOC);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}

$employment = employmentCheck($_POST);
addTimetables($_POST, $employment);