<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <title>Proofix</title>
</head>
<body>
<!--    <label for="numberFields">Количество полей</label>-->
<!--    <input id="numberFields" type="number">-->
<!--    <button id="pull" href="#">Заполнить расписание</button>-->

    <div class="wrap">
        <div id="result">
            <ul id="result"></ul>
        </div>
        <div class="output-data">
            <h3>=====Расписание поездок в регионы за период=====</h3>
            <form class="output-form">
                <p>
                    <label for="date-from-output">С</label>
                    <input type="datetime-local" name="date-from-output" id="date-from-output">
                </p>
                <p>
                    <label for="date-to-output">По</label>
                    <input type="datetime-local" name="date-to-output" id="date-to-output">
                </p>
                <button type="submit" name="submitShow" id="submitShow">Показать</button>
            </form>
        </div>

        <div class="insert-data">
            <h3>=====Внесение данных в расписание=====</h3>
                <form class="insert-form" action="Model/AddTimetables.php">
                    <p>
                        <label for="region">Регион:</label>
                        <select name="region" id="region">
                            <option>Выберите город</option>
                            <?php require_once "Model/GenerationRegion.php"; ?>
                        </select>
                    </p>
                    <p>
                        <label for="date-from-insert">Дата выезда из Москвы:</label>
                        <input type="datetime-local" name="date-from-insert" id="date-from-insert">
                    </p>
                    <p>
                        <label for="courier">Курьер:</label>
                        <select name="courier" id="courier">
                            <option>Выберите курьера</option>
                            <?php require_once "Model/GenerationCourier.php"; ?>
                        </select>
                    </p>
                    <p>
                        <label for="date-to-insert">Дата прибытия в регион:</label>
                        <input type="text" name="date-to-insert" id="date-to-insert" disabled="disabled">
                    </p>
                    <button type="submit" name="submitSend" id="submitSend">Добавить в расписание</button>
                </form>
                <h4 id="status">-</h4>
        </div>
    </div>
    <script src="Controller/DateFromInsert.js" type="text/javascript"></script>
    <script src="Controller/AddTimetables.js" type="text/javascript"></script>
    <script src="Controller/ShowTimetables.js" type="text/javascript"></script>
    <script src="Controller/Fill.js" type="text/javascript"></script>
</body>
</html>