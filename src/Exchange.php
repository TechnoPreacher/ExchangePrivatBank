<?php

namespace nsfin;

class Exchange
{

    protected $rates;

   public function __construct()
    {
        $this->rates = $this->allRates();
    }

    public function allRates()
    {

        $cURL = curl_init("https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5");
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);//не плюёся в браузер
        $bufRates = curl_exec($cURL);//выполнили
        curl_close($cURL);//закрыли
        return json_decode($bufRates);//массив из жсон-строки;
    }


    public function sale($num, $curr):string
    {
        foreach ($this->rates as $currency) {
            if (($currency->ccy) == $curr) {
                return $currency->buy*$num." $currency->base_ccy".PHP_EOL;
            }
        }
        return 0;
    }

    public function buy($num, $curr):string
    {
        foreach ($this->rates as $currency) {
            if (($currency->ccy) == $curr) {
                return $num*$currency->sale." $currency->base_ccy".PHP_EOL;
            }
        }
        return 0;
    }


    public function convert(string $str):string//ф-я конвертации
    {
        $ar = explode(" ", $str);//массив нужных компонентов
        if (count($ar) <> 3) {
            echo "incorrect format";
            return 0;
        }
        $func = array(new Exchange, $ar[0]);//калбэк
        return $func($ar[1], $ar[2]);//вызов конвератции и получение результата
    }


}

