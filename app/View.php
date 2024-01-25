<?php

class View{
    protected $variables;
    protected $output;

    public function render($file, $variables = null){
        if (isset($variables)&&is_array($variables)){
            $this->variables=$variables;
        }
        ob_start();
        $this->includeFile($file);
        $output= ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function includeFile($file)
    {
        if (isset($this->variables)&&is_array($this->variables)){
            foreach ($this->variables as $key => $value){
                global ${$key};
                ${$key} = $value;
            }
        }


        if (file_exists($file)){
            return include  $file;
        }else{
            echo "<h2>No existe la view: $file</h2>";
        }

    }

}