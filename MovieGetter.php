<?php


class MovieGetter{
    private $url;//aloitus url

    public function __construct(){
        $this->url="http://www.omdbapi.com/?apikey=a7a6dd9b&";//apikey jolla haku onnistuu lopussa
    }

    public function getJson($title, $year, $plot){
        if(isset($title)){$this->url=$this->url."t=".str_replace(" ","%20",$title)."&";}//lisätään title jos annettu

        if(isset($year)){$this->url=$this->url."y=".$year."&";}//lisätään vuosi jos annettu

        if(isset($plot)){$this->url=$this->url."plot=".$plot;}//lisätään plot pituus. full defaulttina

        return file_get_contents($this->url);//haetaan json

        //ei kätevin keino lisätä hakuarvot mutta tein jo
    }
}