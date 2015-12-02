$(document).ready(function() {

    var interv;

    if( $('#resource_image').length )
    {
        var startImage = 5000; // in ms
        var time = new Date(startImage);
        displayTime(time);

        analyzeTime(time);
    }
    else if( $('#resource_audio').length )
    {
        var audio = document.getElementById("audio");
        var startAudio = audio.duration*1000; // in ms
        var time = new Date(startAudio);
        displayTime(time);

        analyzeTime(time);
    }

    function displayTime(time)
    {
        $('#chrono').text(time.getSeconds());
    }

    function analyzeTime(time)
    {
        interv = setInterval(function(){
            time = new Date(time - 1000);
            if(time<=0){
                clearInterval(interv);
                startChrono();
            }
            else
            {
                displayTime(time);
            }
        }, 1000);
    }

    function startChrono()
    {
        $('#chrono').text('start chrono');
    }

});