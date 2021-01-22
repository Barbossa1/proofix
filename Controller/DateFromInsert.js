function addZero(num) {
    var str = num.toString();
    return str.length == 1? "0" + str : str;
}

var region = document.getElementById('region');

region.addEventListener('change', function(e) {
    var dateToInsert = document.getElementById('date-to-insert');
    dateToInsert.value = '';
    var regionValue = region.value;
    var dateFromInsert = document.getElementById('date-from-insert');
    dateFromInsert.value = '';

    $.ajax({
        type: 'POST',
        url: 'http://proofix/Model/DateFromInsert.php',
        data: {city:regionValue},
        success: function(data){
            var qwe = data;
            console.log(qwe);

            var dateFromInsert = document.getElementById('date-from-insert');
            dateFromInsert.addEventListener('change', function(e){
                var newDate = new Date(dateFromInsert.value);
                newDate = newDate.setMilliseconds(qwe * 60 * 60 * 1000);
                newDate = new Date(newDate);
                var date =
                    newDate.getFullYear() + "-" +
                    addZero( (newDate.getMonth() + 1) ) +"-" +
                    addZero( newDate.getDate() ) + ' ' +
                    addZero( newDate.getUTCHours() ) + ':' +
                    addZero( newDate.getUTCMinutes() );
                dateToInsert.value = date;
            });

        }
    });

})