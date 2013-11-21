
function play() {
    var scale = [
        246.96, //H
        261.63, //C
        277.18, //C#
        293.66, //D
        311.13, //D#
        329.63, //E
        349.23, //F
        369.99, //F#
        392.00, //G
        415.30, //G#
        440.00, //A
        466.16, //Bb
        493.88, //H
        523.25  //C
    ];         
    
    function createOscillator(freq) {
        var attack = 10,
            decay = 280,
            gain = context.createGain(),
            osc = context.createOscillator();

        var maxGain = 0.5;    
        if (position % 2) maxGain = 1;    

        gain.connect(context.destination);
        gain.gain.setValueAtTime(0, context.currentTime);
        gain.gain.linearRampToValueAtTime(maxGain, context.currentTime + attack / 1000);
        gain.gain.linearRampToValueAtTime(0, context.currentTime + decay / 1000);
        
        osc.frequency.value = freq;
        //osc.type = "square";
        osc.connect(gain);
        osc.start(0);

        setTimeout(function() {
            osc.stop(0);
            osc.disconnect(context.destination);    
        }, 1000 / 4);
    }
    
    function playNote() {        
        if (position > 1) {
            var id = position - 1;
            var lastTd = document.getElementById('bit-' + id);
            lastTd.classList.remove("active");        
        }
        if (position > 32) {
            clearInterval(interval);
            return;
        }                
        var td = document.getElementById('bit-' + position);
        var note = parseInt(td.getAttribute("tone"));
        var freq = scale[note];
        createOscillator(freq);        
        td.classList.add("active");        
        position += 1;
    }    
    
    var context = new window.webkitAudioContext();    
    var position = 1;
    var interval = setInterval(playNote, 1000 / 4);
}

var button = document.getElementById('play');
button.onclick = play;
