<?php 
// define("DS",DIRECTORY_SEPARATOR);
// define("ROOT_PATH",dirname(__DIR__).DS);
// define("APP",ROOT_PATH.'App'.DS);
// define("CORE",APP.'Core'.DS);
// define("CONFIG",APP.'Config'.DS);
// define("CONTROLLERS",APP.'Controllers'.DS);
// define("MODELS",APP.'Models'.DS);
// define("VIEWS",APP.'Views'.DS);
// define("UPLOADS",ROOT_PATH.'public'.DS.'uploads'.DS);



// // autoload all classes 
// $modules = [ROOT_PATH,APP,CORE,VIEWS,CONTROLLERS,MODELS,CONFIG];
// set_include_path(get_include_path(). PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
// spl_autoload_register('spl_autoload');

session_start();

spl_autoload_register('autoload');
function autoload($class_name){
    $path_array = array(
        'Database/',
        'Controllers/',
        'Models/',
        'App/Classes/',
    );

    $path = explode("'\'", $class_name);
    $name = array_pop($path);
    
    foreach($path_array as $item){ 
        $file = sprintf($item.'%s.php',$name);
        if(is_file($file)){
            include $file;
        }
    }
}
