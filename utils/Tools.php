<?php

class Tools{


    public static function getIPAddressClient() {
        //whether ip is from the share internet
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
//whether ip is from the remote address
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    public static function getInfoDeviceConect(){
        $body_class = 'desktop';
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $body_class = "tablet";
        }
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $body_class = "mobile";
        }
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $body_class = "mobile";
        }
        return $body_class;
    }

    public static function minutosTranscurridos($fecha_i,$fecha_f)
    {
        //echo $fecha_i."<>".$fecha_f;
        $minutos = (strtotime($fecha_i)-strtotime($fecha_f))/60;
        //$minutos = abs($minutos);
        $minutos = floor($minutos);
        return $minutos;
    }

    public static function validarListaBool($lista){
        if (count($lista)>0){
            $val =true;
            foreach ($lista as $ite){
                if (!$ite){
                    $val =false;
                }
            }
            return $val;
        }else{
            return false;
        }
    }

    public static function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }

        return $token;
    }
    public static function onlyTextNoHtml($text){
        return  trim(strip_tags($text));
    }
    public static function abreviaturaMes($mes){
        $meses = array("EN","FEBR","MZO","ABR","MY","JUN","JUL","AGTO","SPTt","OCT","NOV","DIC");

        return $meses[$mes];

    }
    public static function nombreMes($mes){
        $meses = array('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE' ,'OCTUBRE','NOVIEMBRE','DICIEMBRE');

        return $meses[$mes];

    }
    public static function money($n) {
        $m = number_format($n, 2, '.', ',');
        return $m;
    }
    public static function encrypt($string) {
        return base64_encode(base64_encode($string));
    }
    public static function prettyPrint($array) {
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
    }
    public static function formatoFechaVisual($fecha){
        $fecha = new DateTime($fecha);
        return self::nombreMes(intval($fecha->format('m'))-1). " " .$fecha->format('d')." del, ".$fecha->format('Y');
    }
    public static function formatoHora($fecha) {
        $fecha = new DateTime("$fecha");
        return $fecha->format('h:i a');
    }
    public static function formatoFecha($fecha) {
        $fecha = new DateTime("$fecha");
        return $fecha->format('Y-m-d');
    }
    public static function decrypt($string) {
        return  base64_decode(base64_decode($string));
    }
}