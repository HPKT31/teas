<?php
class Core
{
    protected $controller = 'Page';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        if (isset($_GET['url'])) {
            $url = explode("/", $_GET['url']);

            $this->controller = ucfirst($url[0]);
            unset($url[0]);
            $this->method = $url[1];
            unset($url[1]);
            $this->params = array_values($url);
            // print_r($url);
        }
        spl_autoload_register(function($class) {
            $ctrlPath = '../app/Controllers/'.$class.'.php';
            $modelPath = '../app/Models/'.$class.'.php';
            $libPath = '../app/Libraries/'.$class.'.php';

            if (file_exists($ctrlPath)) {
                include_once $ctrlPath;
            }
            if (file_exists($modelPath)) {
                include_once $modelPath;
            }
            if (file_exists($libPath)) {
                include_once $libPath;
            }
            
        });
        $class = new ($this->controller.'Controllers')();
        //tạo class
        call_user_func_array([$class,$this->method],$this->params);
    }
    

}



  
          
       
           
    






