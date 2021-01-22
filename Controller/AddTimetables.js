var WriteRegion = document.getElementById('region');
var WriteDateFromInsert = document.getElementById('date-from-insert');
var WriteCourier = document.getElementById('courier');
var WriteDateToInsert = document.getElementById('date-to-insert');
var submitSend = document.getElementById('submitSend');

submitSend.addEventListener('click', function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'http://proofix/Model/AddTimetables.php',
        data: {region:WriteRegion.value, departure: WriteDateFromInsert.value,
            courier:WriteCourier.value, arrival:WriteDateToInsert.value},
        success: function(data) {
            var p_stat = document.getElementById('status');
            p_stat.innerHTML = data;
        }
    });


} )

window.addEventListener('click', function() {
    var p_stat = document.getElementById('status');
    p_stat.innerHTML = '-';
} )