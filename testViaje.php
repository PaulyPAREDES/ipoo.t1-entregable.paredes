<?php
require_once("clase/Viaje.php");
/*Obliga al usuario ingresar un numero entre el rango de las variables $min y $max:
* @param int $min
* @param int $max
* @return int 
*/
function solicitarNumeroEntre($min, $max)
{
   //int $numero
   echo "\nEliga un opcion entre ".$min." y ".$max." : "; //Agregué una linea de interacción con el usuario
   $numero = trim(fgets(STDIN));
   while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
       echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
       $numero = trim(fgets(STDIN));
   }
   return (int)$numero;
}

/**  
 * FUNCION SELECCIONAR OPCION MENU: 
 * @return int
 */
function seleccionarOpcion(){
    // int $numeroDeOpcion 
    echo "\n*********************MENÚ DE OPCIONES********************* \n";
    echo "\n1- Cargar informacion del viaje.";
    echo "\n";
    echo "2- Ver datos cargados.";
    echo "\n";
    echo "3- Modificar datos:";
    echo "\n";
    echo "4- Agregar un pasajero.";
    echo "\n";
    echo "\n********************************************************** \n";
    
    $numeroDeOpcion = solicitarNumeroEntre(1,4);
    return $numeroDeOpcion;
}

//FUNCION (Menú Volver al)
function  volverAlMenu (){
    // $opcionVolverMenu (cualquier tecla)
    echo "\n";
    echo " ** Presione cualquier tecla para volver al menu principal ** ";
    $opcionVolverMenu = trim(fgets( STDIN ));
        if ( $opcionVolverMenu == $opcionVolverMenu ){
    }
    
}
//Fin Modulo.
// funcion modificar nombre
function ModificarNombre($nuevoArray,$nombrePas,$nombreNuevo){
$num=count($nuevoArray);
$i = 0;
$nombreNuevo=$nombreNuevo;
while ($i <$num){
    if( $nuevoArray[$i]["nombre"] == $nombrePas){
        $nuevoArray[$i]["nombre"] = $nombreNuevo;
       // echo "El nombre es:". $nuevoArray[$i]["nombre"]."\n";     
    }   
    $i = $i + 1;        
}
//print_r($nuevoArray);
return  $nuevoArray;
}
// funcion modificar APELLIDO
function ModificarApellido($nuevoArray,$apellidoPas,$apellidoNuevo){
$num=count($nuevoArray);
$i = 0;
$apellidoNuevo=$apellidoNuevo;
while ($i <$num){
    if( $nuevoArray[$i]["apellido"] == $apellidoPas){
        $nuevoArray[$i]["apellido"] = $apellidoNuevo;     
    }   
    $i = $i + 1;        
}
//print_r($nuevoArray);
return  $nuevoArray;
}

// funcion modificar APELLIDO
function ModificarDni($nuevoArray,$dniPas,$dniNuevo){
    $num=count($nuevoArray);
    $i = 0;
    $dniNuevo=$dniNuevo;
    while ($i <$num){
        if( $nuevoArray[$i]["numDoc"] ==$dniPas){
            $nuevoArray[$i]["numDoc"] = $dniNuevo;     
        }   
        $i = $i + 1;        
    }
    //print_r($nuevoArray);
    return  $nuevoArray;
    }


// PROGRAMA PRINCIPAL
// inicializacion de variable

do {
    $opcionMenu = seleccionarOpcion();
    switch ($opcionMenu) {
        case 1: //Cargar informacion del viaje.
            echo "Ingrese el codigo del viaje:";
            $codigo= strtolower(trim(fgets(STDIN)));
            echo "Ingrese el nombre del destino:";
            $destino= ucwords( trim(fgets(STDIN)));
            echo "Ingrese la cantidad maxima de pasajero:";
            $cantidadMax= trim(fgets(STDIN));
            $viaje1= new Viaje($codigo, $destino,$cantidadMax);

            // CARGAR DATOS DE PASAJEROS
           echo "Cuanto pasajero desea agregar?";
            $numPas=trim(fgets(STDIN))-1;

            for($num=0; $num <= $numPas ; $num=$num + 1){
            echo "Ingrese nombre del pasajero:";
            $nombre=ucwords( trim(fgets(STDIN)));
            echo "Ingrese el apellido:";
            $apellido= ucwords( trim(fgets(STDIN)));
            echo "Ingrese el numero de dni:";
            $numDoc = trim(fgets(STDIN));
            $coleccionPasajeros[$num] = ["nombre" => $nombre, "apellido" =>  $apellido, "dni" => $numDoc];
            $viaje1->setColeccionPasajeros($coleccionPasajeros);
            }
            echo "\n";
            echo "LOS DATOS FUERON CARGADOS CORRECTAMENTE.";
            echo "\n";
            volverAlMenu();
        break;
        case 2:// Ver datos cargados.
            echo "LOS DATOS CARGADOS SON LOS SIGUIENTES:\n".$viaje1;
            volverAlMenu();
        break;
        case 3: //Modificar datos:
            echo "Escriba el NUMERO que corresponda al dato a modificar y presione ENTER:\n";
            echo "\nCodigo viaje= 1\n";
            echo "Destino= 2\n";
            echo "Cantidad pasajeros total= 3\n";
            echo "DATOS DE LOS PASAJEROS = 4\n";
            $opcion = trim(fgets(STDIN));
            if($opcion == 1) {
                echo "Ingrese el NUEVO codigo:";
                $nuevoCodigo=trim(fgets(STDIN));
                $viaje1-> setCodigo( $nuevoCodigo); // set me permite cambiar la variable
                echo "La nueva informacion del viaje es:\n". $viaje1;
            }
            else if($opcion == 2) {
                echo "Ingrese el NUEVO destino:";
                $nuevoDestino=trim(fgets(STDIN));
                $viaje1-> setDestino( $nuevoDestino); // set me permite cambiar la variable
                echo "\n La nueva informacion del viaje es:\n". $viaje1;
            }
            else if($opcion == 3) {
                echo "Ingrese la NUEVA cantidad TOTAL de pasajero:";
                $cantPas=trim(fgets(STDIN));
                $viaje1-> setCantMaxPasajero($cantPas); // set me permite cambiar la variable
                echo "La nueva informacion del viaje es:\n". $viaje1;
            }
            else if($opcion == 4) {
            echo "Escriba el NUMERO de DNI del pasajero a modificar y presione ENTER:\n";
            $numDoc = trim(fgets(STDIN));
            $indicePasajero=$viaje1->buscarPasajero($numDoc);
              if ( $indicePasajero >=0){
                 echo "Se encontro pasajero:\n";
                 echo "Que dato desea moficar: nombre, apellido o DNI?\n";
                 $datoModificar= trim(fgets(STDIN));
                   if($datoModificar == "nombre"){
                    echo "Ingrese el nuevo nombre:";
                    $nuevoNombre=trim(fgets(STDIN));
                    $colPas= $viaje1->getColeccionPasajeros();
                    $apellido = $colPas [$indicePasajero]["apellido"];
                    $numDoc =$colPas [$indicePasajero]["dni"];
                    $viaje1->modificarPasajero($numDoc, $nuevoNombre, $apellido,$indicePasajero);
                    echo "Se modifico el pasajero ". $viaje1->datosPasajeros();
                   }
                   else if($datoModificar == "apellido"){
                    echo "Ingrese el nuevo apellido:";
                    $nuevoApellido=trim(fgets(STDIN));
                    $colPas= $viaje1->getColeccionPasajeros();
                    $nombre= $colPas [$indicePasajero]["nombre"];
                    $numDoc =$colPas [$indicePasajero]["dni"];
                    $viaje1->modificarPasajero($numDoc, $nombre, $nuevoApellido,$indicePasajero);
                    echo "Se modifico el pasajero ". $viaje1->datosPasajeros();
                   }
                   else if($datoModificar == "DNI"){
                    echo "Ingrese el nuevo DNI:";
                    $nuevoDni=trim(fgets(STDIN));
                    $colPas= $viaje1->getColeccionPasajeros();
                    $nombre= $colPas [$indicePasajero]["nombre"];
                    $apellido =$colPas [$indicePasajero]["apellido"];
                    $viaje1->modificarPasajero( $nuevoDni, $nombre, $apellido,$indicePasajero);
                    echo "Se modifico el pasajero ". $viaje1->datosPasajeros();
                   }
               }

               else{
                 echo "NO se encontraron datos que coincidan con ese pasajero";}
               }
                volverAlMenu();
        break;   
        case 4: //agregar un pasajero
            echo "Ingrese nombre del pasajero:";
            $nombre=ucwords( trim(fgets(STDIN)));
            echo "Ingrese el apellido:";
            $apellido= ucwords( trim(fgets(STDIN)));
            echo "Ingrese el numero de dni:";
            $numDoc = trim(fgets(STDIN));
            $viaje1->agregarPasajero( $nombre,$apellido,$numDoc);
            echo "Se agrego  el pasajero ".$viaje1;
            volverAlMenu();
        break;
}
} while ($opcionMenu !=4);
    





