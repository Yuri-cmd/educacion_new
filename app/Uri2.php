<?php

class Uri2{
    var $uri;
    var $ruta;
    protected $request;

    public function __construct($uri, $ruta)
    {
        $this->uri = $uri;
        $this->ruta = $ruta;
    }
    public function match($url) {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->uri);
        $regex = "#^$path$#i";
        //echo $regex ."<>" . $path;
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        /*if ($this->method != $_SERVER['REQUEST_METHOD'] && $this->method != "ANY") {
            return false;
        }*/
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }
    private function parseRequest() {
        $this->request = new Request($this->request);
        $this->matches[] = $this->request;
        $partes = explode(":", $this->uri);
       // var_dump($partes);
        if (count($partes)>1){
            define($partes[1],$this->matches[0]);
        }
    }

    public function call() {
       // echo $this->ruta;
        try {
            $this->request = $_REQUEST;
            if (is_string($this->ruta)) {
                $extension = pathinfo($this->ruta, PATHINFO_EXTENSION);
                if ($extension=='php'){
                    if (file_exists($this->ruta)){
                        $this->parseRequest();
                        require_once $this->ruta;

                    }
                }elseif(file_exists($this->ruta.'/index.php')){
                    $this->parseRequest();
                    require_once $this->ruta.'/index.php';
                }elseif(file_exists($this->ruta.'.php')){
                    $this->parseRequest();
                    require_once $this->ruta.'.php';
                }else{
                    header("Content-Type: text/html");
                    include "./views/404.php";
                }


            }else{
                header("Content-Type: text/html");
                include "./views/404.php";
            }
        } catch (Exception $ex) {
            echo "ERROR: " . $ex->getMessage();
        }
    }

}