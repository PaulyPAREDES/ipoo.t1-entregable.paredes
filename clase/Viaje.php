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
        $this->coleccionPasajeros=[];
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
    $cadena= $cadena."\n PASAJERO:" .($i+1)."\n NOMBRE:".$nombre."\n APELLIDO:".$apellido."\n DNI:".$dni."\n";
 }
 return $cadena;
 }
//Metodo __tostring
public function __toString()
{
    $cadena="";
    $cadena="DATOS DEL VIAJE:\n Codigo:".$this->getCodigo()."\n Destino:".$this->getDestino()."\n Cantidad maxima de pasajeros:".$this->getCantMaxPasajero()."\n"
    ."\n DATOS DE LOS PASAJEROS:\n".$this->datosPasajeros()."\n";
    return $cadena;
}
//Funcion buscar pasajero
public function buscarPasajero($dniPas){
    $colPas= $this-> getColeccionPasajeros();
    $indice=-1;
    $i=0;
    while($i<count($colPas)){
        if ($colPas[$i]["dni"]==$dniPas){
            $indice=$i; 
        }
        $i=$i+1;
    }
    return $indice;
}
//Funcion Modificar pasajeros
 public function modificarPasajero($dniPas,$nombre,$apellido,$indice){
   // if ($indice >= 0){
        $colPas= $this-> getColeccionPasajeros();
        $colPas[$indice]["nombre"]=$nombre;
        $colPas[$indice]["apellido"]=$apellido;
        $colPas[$indice]["dni"]=$dniPas;
        $colPas=$this->setColeccionPasajeros( $colPas);
    //} 
    return $colPas;
}
//Funcion agregar pasajeros
Public function agregarPasajero($dni, $nombre,$apellido){
    $colPas = $this->getColeccionPasajeros();
    if($this->getCantMaxPasajero() >= count($colPas)){
        $colPas[] = ["nombre" => $nombre, "apellido" => $apellido, "dni" => $dni];
        $this->setColeccionPasajeros($colPas);
    }
}

}