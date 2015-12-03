$(document).ready(function() {

    var interv;

    // check the type of resource
    if( $('#resource_image').length )
    {
        var analyzeTime = 5;
        displayTime(0,analyzeTime);
        chrono(analyzeTime); // 5 secondes to analyze the image
    }
    else if( $('#resource_audio').length )
    {
        var audio = document.getElementById("audio");

        // only on the first listening
        $('#audio').one('play', function() {

            var analyzeTime = audio.duration;
            displayTime(0,analyzeTime);
            chrono(analyzeTime); // chrono start after the listening
        });
    }

    /**
     * Caculate the chronometer time
     * @param analyzeTime the time before start the chronometer (time to analyse the resource before start recording)
     */
    function chrono(analyzeTime)
    {
        var i = analyzeTime;
        var m = 0;
        var s = 0;

        interv = setInterval(function() {
            if(i == 0)
            {
                $('#chrono').css('color', 'black');
            }
            if(i > 0)
            {
                i--;
                displayTime(0,i);
            }
            else if(i <= 0)
            {
                i--;
                s++;
                if(s > 59)
                {
                    m++;
                    s = 0;
                }
                displayTime(m,s);
            }
        }, 1000);
    }

    /**
     * Display the chronometer time 'mm:ss'
     * @param m the minutes
     * @param s the secondes
     */
    function displayTime(m, s)
    {
        var time = '';

        if(m < 10)
        {
            time += '0' + m + ':';
        }
        else
        {
            time += m + ':';
        }

        if(s < 10)
        {
            time += '0' + s;
        }
        else
        {
            time += s;
        }

        $('#chrono').text(time);
    }

});