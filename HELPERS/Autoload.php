<?php
class Autoload
{
    public static function autoload()
    {

        spl_autoload_register(function($clase){
            $baseDir = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoPantallas/';
            $directorios = [
                'API',
                'ENTITIES',
                'FORMS',
                'HELPERS',
                'JS',
                'REPOSITORIES',
                'RECURSOS'
            ];

            foreach ($directorios as $directorio) {
                $archivo = $baseDir . $directorio . '/' . $clase . '.php';
                if (file_exists($archivo)) {
                    require_once $archivo;
                    return;
                }
            }  

        });
    }
}
    
?>