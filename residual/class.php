<?php

class Game {

    private $round;

    private $index = 0;

    private $user;

    private $phraseDeck;

    private $phrase;

    public function nextSentence()
    {
        //get new sentence from array
    }

    public function breakSentence()
    {
        //turns sentence into array
    }

    public function shuffleWords()
    {
        //shuffle words 
    }

    public function sendToClient()
    {
        //send to client side: array of words
    }

    public function receiveFeedback() 
    {
        //after verification of user input is done on client side
        //PHP receives feedback
        //and gets datetime
        //stores it in $phraseDeck
    } 

    public function __construct()
    {
        $this->user = $user_id; //toma el user_id de la $_SESSION?
        $this->round = $round; //fecha + i
        $this->phraseDeck = $phraseDeck; //
    }


}