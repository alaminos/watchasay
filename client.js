
const model = {

    phraseID: 0,

    sentence: "",

    audioFile: "",

    index: 0,

    fetchNextSentence: function() 
    {
        this.sentence = data[this.index].text;
        this.phraseID = data[this.index].id;
        this.audioFile = data[this.index].source;
        console.log(this.audioFile);
        console.log(this.sentence);
        this.index++;
        this.breakSentence();
        handlers.putAudioIntoPage();
    },

    breakSentence: function() 
    {
        let wordsArr = this.sentence.split(" ");
        wordsArr = this.shuffleWordsArray(wordsArr);
        view.putWordsIntoTokens(wordsArr);
    },

    shuffleWordsArray: function(arr) 
    {
        let currentIndex = arr.length, temporaryValue, randomIndex;
        // While there remain elements to shuffle...
        while (0 !== currentIndex) {
            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;
            // And swap it with the current element.
            temporaryValue = arr[currentIndex];
            arr[currentIndex] = arr[randomIndex];
            arr[randomIndex] = temporaryValue;
        }
        return arr;
    },

    player: function()
    {
        let audio = document.getElementById("player");
        audio.load();
        audio.play();
    },

    verify: function() 
    {
        let userInput = this.fetchUserInput();
        let isCorrect;
        if (this.sentence == userInput){
            view.giveFeedback("Bravo!");
            isCorrect = "Yes";
            } else {
                view.giveFeedback("Fail.");
                isCorrect = "No";
            }
        
        handlers.ajaxSendOutput(isCorrect);
    },


    fetchUserInput: function() 
    {
        let userInput = "";
        let userInputArr = [];
        let userInputTokens = document.getElementById("userInputBox").children; //HTMLcollection array of all tokens within userInput
        //---now we are going to extract the TEXT from each token, and put it into userInputArr-- */
        for (var i= 0; i < userInputTokens.length; i++) {
            userInputArr.push(userInputTokens[i].innerHTML);
        }
        userInput = userInputArr.join(" ");
        return userInput;
        
        // for each token in #userInput // extract word
        // put all words into array
        // convert array into string // arr.join(" ");
        // return string
    }
}


const handlers = {

    fetchNextSentence: function() 
    {
        view.clearAreas();
        model.fetchNextSentence();
    },

    putAudioIntoPage: function()
    {   
        let source = document.getElementById('source');
        let folder = "audio/";
        let audioPath = folder + model.audioFile;
        source.src = audioPath;
    },

    ajaxSendOutput: function(isCorrect) {
        let req = new XMLHttpRequest();
        req.open('POST', "result.php");
        req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        req.onload = function() {  //or .onreadystatechange ??
            if (req.status === 200) {
                alert('Status OK, response: ' + req.responseText);
            }
            else if (req.status !== 200) {
                alert('Request failed.  Returned status of ' + req.status);
            }
        };
        req.send("result="+ isCorrect + "&phrase_id="+ model.phraseID );  //when is uriencode() needed ?
        console.log("envoyé el valor de isCorrect es: " + isCorrect + " y el de phraseID es: " + model.phraseID);
    },

}


const view = {

    tokensBox: document.getElementById("tokensBox"),
    inputBox: document.getElementById("userInputBox"),
    msgBox: document.getElementById("msgBox"),

    setUpEventListener: function() 
    {
        thisObjet = this; // was having trouble trying to use "this" in callback function below
        //---event listener on tokensArea---
        this.tokensBox.addEventListener("click", function(event){
            if (event.target.className == "token") {
                thisObjet.movesWord(event.target);
            }
        } );
        
        //---event listener on phraseArea---
        this.inputBox.addEventListener("click", function(event){
            if (event.target.className == "token") { //if target is a token
                thisObjet.movesWord(event.target);
            }
        })
    },

    movesWord: function(el) 
    {
        if (el.parentNode.id == "tokensBox") {
            this.inputBox.appendChild(el);
        } else {
            this.tokensBox.appendChild(el);
        }
    },

    clearAreas: function()
    {
        this.tokensBox.innerHTML = "";
        this.inputBox.innerHTML = "";
    },

    giveFeedback: function(msgStr) //takes a message of type String
    { 
        this.msgBox.innerHTML = msgStr;
    },

    putWordsIntoTokens: function(arr)
    {
        for (let i = 0; i < arr.length; i++) {
            let newToken = document.createElement("div");
            newToken.className = 'token';
            newToken.id = i;
            newToken.textContent = arr[i];
            this.tokensBox.appendChild(newToken);
        }
    }    
}

view.setUpEventListener();