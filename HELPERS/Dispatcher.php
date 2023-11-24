<?php

//hacer metodo next, metodo generate

class Dispatcher{

    private static $puntero = 0;



    public static function next(){
        
        RP_Noticia::BuscarPorID(self::$puntero);
        self::$puntero++;


    }

    public static function generate(){


        $array = RP_Noticia::BuscaIDyPrioridad();
        $arrayGenerado=[];

        for($i=0;$i<count($array);$i++){

            $fila = $array[$i];

            for($j= 0;$j<count($fila);$j++){

                if($fila[$j]==1){ //Para asegurarnos de que es la prioridad lo que hemos seleccionado

                    $priori = $fila[$j];

                    if($priori==1){

                        $arrayGenerado[]=$fila[0];

                    }elseif($priori== 2){

                        for($k=0;$k<$priori;$k++){
                            $arrayGenerado[]=$fila[0];
                        }

                    }elseif($priori== 3){
                        $arrayGenerado[]=$fila[0];
                    }
                 
                }
            }

        }

        return $arrayGenerado;

    }

    public static function barajaArray($array){

        return shuffle($array);

    }

}





?>