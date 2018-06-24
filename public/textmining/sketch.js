var afinn;
function preload() {
    afinn=loadJSON('textmining/index.json');
}

function setup() {
    noCanvas();
    console.log(afinn);
     var txt=select('#txt');
    // txt.input(typing);
    var x=document.getElementById("butt");
    x.addEventListener("click",typing);
    function typing(){
        var textinput=txt.value();
        var words=textinput.split(/\W/);
        console.log(words);
        var scorewords=[];
        var positivescorewords=[];
        var totalscore=0;
        var score=0;
        for (var i=0;i<words.length;i++){
            var word=words[i].toLowerCase();
            if (afinn.hasOwnProperty(word)){
                if(afinn[word]>0){
                    var score=afinn[word];
                    totalscore+=Number(score);
                    positivescorewords.push(word+':'+score);
                    scorewords.push(word+':'+score);
                }
                else{
                    scorewords.push(word+':'+score);   
                }
            }
        }
        
        var str=document.getElementById("score").value;
        // str.html(totalscore);
        // var scoreP=select('#score');
        var result=Number(positivescorewords.length/scorewords.length);
        document.getElementById("score").value=result.toFixed(1)*100;
        // var comp=select('#comparative');
        // comp.html('comparative: '+ totalscore/words.length);
        // var wordlist=select('#wordlist');
        // wordlist.html(scorewords);
        //console.log(txt.value());
    }
}