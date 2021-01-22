var dateFromOutput = document.getElementById('date-from-output');
var dateToOutput = document.getElementById('date-to-output');
var submitShow =  document.getElementById('submitShow');
var result = document.getElementById('result');

submitShow.addEventListener('click', function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'http://proofix/Model/ShowTimetables.php',
        data: {dateFromOutput:dateFromOutput.value, dateToOutput: dateToOutput.value},
        success: function(data) {
            result.innerHTML = data + "\n";
        }
    });

})