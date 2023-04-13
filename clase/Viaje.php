<?php
class Viaje{
 //ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantMaxPasajero;
    private $coleccionPasajeros;

 // METODOS
    public function __construct($codigo,$destino,$cantMaxPasajero)// permite cargar los valores
    {
        $this->codigo=$codigo;
        $this->destino =$destino;
        $this->cantMaxPasajero = $cantMaxPasajero;
       // $this->coleccionPasajeros = $coleccionPasajeros;
    }
// metodos get y set
    public function getCodigo(){
     return $this->codigo;
    }
    public function setCodigo($codigo){
   $this->codigo= $codigo;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
       $this->destino= $destino;
    }

    public function getCantMaxPasajero(){
        return $this->cantMaxPasajero;
    }
    public function setcantMaxPasajero($cantMaxPasajero){
       $this->cantMaxPasajero= $cantMaxPasajero;
    }

    public function getColeccionPasajeros(){
        return $this->coleccionPasajeros;
    }
    public function setColeccionPasajeros($coleccionPasajeros){
       $this->coleccionPasajeros= $coleccionPasajeros;
    }

 //Funcion permite mostrar datos pasajeros
 public function datosPasajeros() {
 $cadena=" ";
 $colPas= $this-> getColeccionPasajeros();
 for ($i=0;$i< count($colPas) ; $i++){
    $nombre= $colPas[$i]["nombre"];
    $apellido= $colPas[$i]["apellido"];
    $dni= $colPas[$i]["dni"];
    $cadena= $cadena."Pasajeros".$i."".$nombre."".$apellido."".$dni;
 }
 }
//Metodo __tostring
public function __toString()
{
    $cadena="";
    $cadena="DATOS DEL VIAJE:\n Codigo:".$this->getCodigo()."\n Destino:".$this->getDestino()."\n Cantidad maxima de pasajero:".$this->getCantMaxPasajero()."\n"
    .$this->datosPasajeros()."\n";
    return $cadena;
}
//Funcion buscar pasajero
public function buscarPasajero($dniPas){
    $colPas= $this-> getColeccionPasajeros();
    $i=0;
    $seEncontro=false;
    while($i< count($colPas) && !$seEncontro){
        $seEncontro=$colPas[$i]["dni"]==$dniPas;
        $i=$i+1;
    return $i-1;
    }
}
//Funcion Modificar pasajeros
public function modificarPasajero($dniPas,$nombre,$apellido,$dniBuscar){
    $indice=$this-> buscarPasajero($dniBuscar);
    if ($indice >= 0){
        $colPas= $this-> getColeccionPasajeros();
        $colPas[$indice]["nombre"]=$nombre;
        $colPas[$indice]["apellido"]=$apellido;
        $colPas[$indice]["dni"]=$dniPas;

    } 
}
}