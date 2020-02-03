<?php


class BookGetter{

    private $urlstart;//aloitus url osissa
    private $urlend;

    public function __construct(){
        $this->urlstart='http://openlibrary.org/api/books?bibkeys=ISBN:';
        $this->urlend="&jscmd=details&format=json";
    }


    public function getJson($isbn){

        if(isset($isbn)){
            //Yhdistetään urli ja laitetaan isbn väliin. Haetaan urlilla
            return file_get_contents($this->urlstart.$isbn.$this->urlend);
        }

        return null;
    }
}