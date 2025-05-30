function play(id) {
    //toggle play and pause function

    //connect JS to HTML elements
    var audio = document.getElementById("audio_"+id);
    var playButn = document.getElementById("play_butn"+id);
    var record = document.getElementById("record"+id);

    if(audio.paused){
        audio.play(); 

        //change source of button to pause
        playButn.src = "images/pause.png";

        //start record spinning
        record.src = "images/record_spinning.gif";


        //Update progress bar
        audio.ontimeupdate = function() {
            var progress = document.getElementById('progress_'+id);
            var t = (audio.currentTime / audio.duration) * 100;
            progress.style.width = t + '%';
        };
    } else {
       audio.pause();

       //change source of button to play
       playButn.src = "images/play.png";

       //stop the record spinning
       record.src = "images/record_static.png";
    }
}


