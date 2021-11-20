<?php
 if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
  header('Access-Control-Allow-Headers: token, Content-Type');
  header('Access-Control-Max-Age: 1728000');
  header('Content-Length: 0');
  header('Content-Type: text/plain');
  die();
 }
  header('Access-Control-Allow-Origin: *');  
 header('Content-Type:application/json');

 require_once("../config/conexion.php");
 require_once("../models/Socios_negocio.php");
 $socio_negocio = new Socio_negocio(); 

 $body= json_decode(file_get_contents("php://input"),TRUE);

    switch($_GET["op"]){
      case "GetSocios_negocio":
           $datos=$socio_negocio->get_socios_negocio();
           echo json_encode($datos);
      break;

      case "GetUno":
        $datos=$socio_negocio->get_soci_negocio($body["ID"]);
        echo json_encode($datos);
      break;

      case "InsertSocio_negocio":
         $datos=$socio_negocio->insert_socio_negocio($body["ID"],$body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
         echo json_encode("Socio Ingresado");
      break;


      case "DeleteSocio_negocio":
        $datos=$socio_negocio->Delete_Socio($body["ID"]);
      break;

      case "UpdateSocio_negocio":
        $datos=$socio_negocio->Update_socio($body["ID"],$body["NOMBRE"],$body["RAZON_SOCIAL"],$body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
        echo json_encode("Socio Actualizado");
      break;

     
    }

?>