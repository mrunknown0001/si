<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 600000); 
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 1) { // 20 minutes
        // window.location.reload();
        $.get('http://localhost:8000/logout');
        alert('Session Expired! You need to Login again.');
        window.location = 'http://localhost:8000';
    }
}
</script>