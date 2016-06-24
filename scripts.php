<script> 

$(document).ready(function () {
    $('#txtDate').datepicker();
    $('#follow_Date').datepicker();
});

function getdate() {
    var tt = document.getElementById('txtDate').value;

    var date = new Date(tt);
    var newdate = new Date(date);
var numb = 10;
    newdate.setDate(newdate.getDate() + numb);
    
    var dd = newdate.getDate();
    var mm = newdate.getMonth() + 1;
    var y = newdate.getFullYear();

    var someFormattedDate = mm + '/' + dd + '/' + y;
    document.getElementById('follow_Date').value = someFormattedDate;
}

</script>


<!-- END of script that calculates date based on days added -->
