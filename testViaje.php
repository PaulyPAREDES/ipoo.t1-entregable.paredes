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
    echo "4- Salir.";
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
$nuevoArray=[];

do {
    $opcionMenu = seleccionarOpcion();
    switch ($opcionMenu) {
        case 1: //Cargar informacion del viaje.
            echo "Ingrese el nombre del destino:";
            $destino= strtolower(trim(fgets(STDIN)));
            echo "Ingrese la cantidad maxima de pasajero:";
            $cantidadMax= trim(fgets(STDIN));
            echo "Ingrese la cantidad de pasajeros que viajan:";
            $pasajeros= trim(fgets(STDIN));
            $viaje1= new Viaje( $destino,$cantidadMax,$pasajeros);
            // CARGAR DATOS DE PASAJEROS
            echo "Cuanto pasajero desea agregar?";
            $numPas=trim(fgets(STDIN));

            for($num=1; $num <= $numPas ; $num=$num + 1){
            echo "Ingrese nombre del pasajero:";
            $nombre= trim(fgets(STDIN));
            $viaje1->setNombrePasajero($nombre);
            echo "Ingrese el apellido:";
            $apellido= trim(fgets(STDIN));
            $viaje1->setApellidoPasajero($apellido);
            echo "Ingrese el numero de dni:";
            $numDoc = trim(fgets(STDIN));
            $viaje1->setNumeroDocumento($numDoc );

            $pasajeros= $viaje1->CargarDatosPasajero();

            array_push($nuevoArray,$pasajeros);
            }
            echo "\n";
            echo "LOS DATOS FUERON CARGADOS CORRECTAMENTE.";
            echo "\n";
            volverAlMenu();
        break;
        case 2:// Ver datos cargados.

            echo "LOS DATOS CARGADOS SON LOS SIGUIENTES:\n";
            echo "Destino:" . $viaje1->getDestino();
            echo " \n Cantidad Maxima de pasajeros:" . $viaje1->getCantMaxPasajero();
            echo "\n Cantidad de pasajeros que viajan:" . $viaje1->getLosQueViajan();
            echo "\n La lista de pasajeros cargado es:";
            print_r($nuevoArray);
            volverAlMenu();
        break;
        case 3: //Modificar datos:
            echo "Escriba el NUMERO que corresponda al dato a modificar y presione ENTER:\n";
            echo "Destino= 1\n";
            echo "Cantidad pasajeros total= 2\n";
            echo "Cantidad pasajeros que viajan = 3\n";
            echo "NOMBRE de un pasajero= 4\n";
            echo "APELLIDO de un pasajero= 5\n";
            echo "DNI de un pasajero= 6\n";
            $opcion = trim(fgets(STDIN));
                if($opcion == 1) {
                    echo "Ingrese el NUEVO destino:";
                    $nuevoDestino=strtolower(trim(fgets(STDIN)));
                    $viaje1-> setDestino($nuevoDestino); // set me permite cambiar la variable
                    echo "La nueva informacion del viaje es:\n";
                    echo "Destino:" . $viaje1->getDestino(). "\n";
                    echo "Cantidad Maxima de pasajeros:" . $viaje1->getCantMaxPasajero(). "\n";
                    echo "Cantidad de pasajeros que viajan:" . $viaje1->getLosQueViajan(). "\n";
                }
                else if($opcion == 2) {
                    echo "Ingrese la nueva cantidad TOTAL de pasajero:";
                    $cantPas=trim(fgets(STDIN));
                    $viaje1-> setCantMaxPasajero($cantPas); // set me permite cambiar la variable
                    echo "La nueva informacion del viaje es:\n";
                    echo "Destino:" . $viaje1->getDestino(). "\n";
                    echo "Cantidad Maxima de pasajeros:" . $viaje1->getCantMaxPasajero(). "\n";
                    echo "Cantidad de pasajeros que viajan:" . $viaje1->getLosQueViajan(). "\n";
                }
                else if($opcion == 3) {
                    echo "Ingrese los pasajeros que viajan.\n";
                    $pasVijan=trim(fgets(STDIN));
                    $viaje1-> setLosQueViajan($pasVijan); // set me permite cambiar la variable
                    echo "La nueva informacion del viaje es:". "\n";
                    echo "Destino:" . $viaje1->getDestino(). "\n";
                    echo "Cantidad Maxima de pasajeros:" . $viaje1->getCantMaxPasajero(). "\n";
                    echo "Cantidad de pasajeros que viajan:" . $viaje1->getLosQueViajan(). "\n";
                }
                 else if($opcion == 4) {
                   echo " LOS NOMBRES CARGADOS SON:\n";
                   $i=0;
                   while($i<count($nuevoArray)){
                    print $nuevoArray[$i]["nombre"]."\n";
                    $i++;
                   }
                   echo " Ingrese el NOMBRE que quiere modificar:\n";
                   $nombrePas=ucwords(trim(fgets(STDIN)));
                   echo " Ingrese el nombre nuevo:". "\n";
                   $nombreNuevo= ucwords(trim(fgets(STDIN)));
                   $nuevoArray= ModificarNombre( $nuevoArray,$nombrePas,$nombreNuevo);
                   echo "LA NUEVA LISTA ES:\n";
                   print_r($nuevoArray);
                }
                else if($opcion == 5) {
                    echo " LOS APELLIDOS CARGADOS SON:\n";
                    $i=0;
                    while($i<count($nuevoArray)){
                     print $nuevoArray[$i]["apellido"]."\n";
                     $i++;
                    }
                    echo " Ingrese el APELLIDO que quiere modificar:\n";
                    $apellidoPas= ucwords(trim(fgets(STDIN)));
                    echo " Ingrese el apellido nuevo:";
                    $apellidoNuevo= ucwords(trim(fgets(STDIN)));
                    $nuevoArray= ModificarApellido( $nuevoArray, $apellidoPas,$apellidoNuevo);
                    print_r($nuevoArray);
                 }
                 else if($opcion == 6) {
                    echo " LOS DNI CARGADOS SON:\n";
                    $i=0;
                    while($i<count($nuevoArray)){
                     print $nuevoArray[$i]["numDoc"]."\n";
                     $i++;
                    }
                   echo " Ingrese los NUMEROS del Dni que quiere modificar:\n";
                   $dniPas=  trim(fgets(STDIN));
                   echo " Ingrese el dni nuevo:";
                   $dniNuevo=  trim(fgets(STDIN));
                   $nuevoArray= ModificarDni( $nuevoArray,$dniPas,$dniNuevo);
                   print_r($nuevoArray);
                }
                volverAlMenu();
        break;   
        case 4: 
            echo " Saliendo... "."\n";
        break;
}
} while ($opcionMenu !=4);
    





