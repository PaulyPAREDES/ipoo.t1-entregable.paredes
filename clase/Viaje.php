<?php
class Viaje{

    private $destino;
    private $cantMaxPasajero;
    private $losQueViajan;
    private $nombrePasajero;
    private $apellidoPas;
    private $numDoc;
  

    public function __construct($destino,$cantMaxPasajero,$losQueViajan)// permite cargar los valores
    {
        $this->destino =$destino;
        $this->cantMaxPasajero = $cantMaxPasajero;
        $this->losQueViajan = $losQueViajan;
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
    public function getLosQueViajan(){
        return $this->losQueViajan;
    }
    public function setLosQueViajan($losQueViajan){
       $this->losQueViajan= $losQueViajan;
    }

    //funcion cargar datos de los pasajeros, arreglo asociativo
    public function CargarDatosPasajero(){
      $datosPasajeros= ["nombre"=>$this->nombrePasajero, "apellido" =>$this->apellidoPas,
      "numDoc" =>  $this->numDoc];
      //print_r($datosPasajeros);
      return $datosPasajeros;
    }
  /// get y set para atributos que no estan en function __construct
    public function getNombrePasajero(){
        return ucwords($this-> nombrePasajero);
    }
    public function setNombrePasajero($nombrePasajero){
       $this->nombrePasajero=strtolower( $nombrePasajero);
    }

    public function getApellidoPasajero(){
        return ucwords($this->apellidoPas);
    }
    public function setApellidoPasajero($apellidoPas){
       $this->apellidoPas= strtolower($apellidoPas);
    }

    public function getNumeroDocumento(){
        return $this->numDoc;
    }
    public function setNumeroDocumento($numDoc){
       $this->numDoc= $numDoc;
    }
}