/**
 * Created by Mark on 10-10-2017.
 * yuo tekts cuze paly cant wont problaly wana ima dont
 */

var correction = ["yuo", "tekts", "cuze", "paly", "cant", "wont", "problaly", "wana", "ima", "dont", "gona", "bout"];
var correction_replace = ["you", "tekst", "because", "play", "can't", "won't", "probaly", "want to", "i am", "don't", "going to", "about"];

function string_correct(string){
    console.log("uncleaned string: " + string);
    var text = "";
    var words = string.split(" ");
    for (var i = 0; i < words.length; i++) {
        for(var x = 0; x < correction.length;x++){
            if(words[i] === correction[x]){
                words[i] = correction_replace[x];
            }
        }
        text += words[i]+" ";
    }
    document.getElementById("content").value = text;
    console.log("cleaned string: " + text);
}