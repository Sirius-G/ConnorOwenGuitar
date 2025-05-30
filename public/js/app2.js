// Select the container
let container = document.getElementsByTagName('section')[0];

let songs = [ 
    { title: "", src: "" },
    { title: "Dreams", src: "music/dreams.mp3" },
    { title: "Hey", src: "music/hey.mp3" },
    { title: "Inspire", src: "music/inspire.mp3" }
];

// Loop to create 4 records
for (let i = 1; i <= 3; i++) {

    // Create record player div
    let recordPlayer = document.createElement('div');
    recordPlayer.classList.add('record_player');
    recordPlayer.id = 'record_player';

    recordPlayer.innerHTML = `
        <img src="images/record_static.png" class="record" id="record${i}" alt="${songs[i].title} Record">
        <img src="images/play.png" alt="play" id="play_butn${i}" class="play_butn" onclick="play(${i})">
        <p class="record_title"> ${songs[i].title} </p>
        <audio id="audio_${i}">
        <source src="${songs[i].src}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <div class="progress-bar"><div id="progress_${i}"></div></div>`;
    // Append record player to container
    container.appendChild(recordPlayer);

}
