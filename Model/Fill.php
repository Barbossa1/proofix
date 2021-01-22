<?php
require_once "Connection.php";

function randomDate($ranDate)
{
    $start = strtotime('2015-06-01T00:00');
    $end = strtotime('2021-01-23T00:00');
    $randomStamp = rand($start,$end);
    $date_to = date("Y-m-d H:i", $randomStamp);
    $date_from = date("Y-m-d H:i", strtotime("+ $ranDate hours", $randomStamp));
    return $randomDate=[ $date_to, $date_from ];
}

function randomCourier()
{
    if ($query_user = mysqli_query(DataBase::getDB()->mysqli, "SELECT * FROM `couriers`")) {
        while ($data = mysqli_fetch_assoc($query_user)) {
            $courier[] = $data['courier_fio'];
        }
        $randomKey = array_rand($courier, 1);
        return ($courier[$randomKey]);
    }
}

function randomRegion()
{
    if ($query_user = mysqli_query(DataBase::getDB()->mysqli, "SELECT * FROM `regions`")) {
        while ($data = mysqli_fetch_assoc($query_user)) {
            $region[] = $data['region_name'];
            $randata[] = $data['time_to'];
        }
        $randomKey = array_rand($region, 1);
        return $regionRanData = [ $region[$randomKey], $randata[$randomKey] ];
    }
}

function addTimetables($employmentCheck, $region, $courier, $departure, $arrival)
{
    $null = $null;
    if ($employmentCheck) {
        return false;
    }
    $stmt = DataBase::getDB()->mysqli->prepare("
        INSERT INTO `timetables` 
	        (`id`, `region`, `courier`, `departure`, `arrival`) 
	    VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('bssss', $null, $region, $courier, $departure, $arrival);
    $stmt->execute();
}

function employmentCheck($departure, $arrival, $courier)
{
    $departure = strtotime($departure);
    $arrival = strtotime($arrival);
    if ($query_user = mysqli_query(DataBase::getDB()->mysqli, "
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

if ($_POST['numfil']) {
    echo ('Расписание заполнено: ' . $_POST['numfil'] . ' записей');

    for($i=0; $i< $_POST['numfil'] ; $i++) {
        $randomRegion = randomRegion();
        $region = $randomRegion[0];
        $ranData = $randomRegion[1];


        $randomDate = randomDate($randata);
        $arrival = $randomDate[0];
        $departure = $randomDate[1];

        $courier = randomCourier();


        $employmentCheck = employmentCheck($departure, $arrival, $courier);
        addTimetables($employmentCheck, $region, $courier, $departure, $arrival);
    }
}
