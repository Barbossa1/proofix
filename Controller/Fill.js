var pull = document.getElementById('pull');
var numberFields = document.getElementById('numberFields');
var numfil = numberFields.value;



pull.addEventListener('click', function(e) {
    var pull = document.getElementById('pull');
    var numberFields = document.getElementById('numberFields');
    var numfil = numberFields.value;
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'http://proofix/Model/Fill.php',
        data: {'numfil':numfil, },
        success: function(data) {
            alert(data);
        }
    })
} );