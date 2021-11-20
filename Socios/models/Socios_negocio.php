<?php
     
    Class Socio_negocio extends conectar{
    
        public function get_socios_negocio(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

        public function get_soci_negocio($ID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE estado=1 AND ID = ? ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_socio_negocio($ID,$NOMBRE, $RAZON_SOCIAL, $DIRECCION, $TIPO_SOCIO, $CONTACTO, $EMAIL, $FECHA_CREADO, $ESTADO,$TELEFONO){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO ma_socios_negocio(ID,NOMBRE,RAZON_SOCIAL,DIRECCION,TIPO_SOCIO,CONTACTO,EMAIL,FECHA_CREADO,ESTADO,TELEFONO)
            VALUES (?,?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->bindValue(2, $NOMBRE);
            $sql->bindValue(3, $RAZON_SOCIAL);
            $sql->bindValue(4, $DIRECCION);
            $sql->bindValue(5, $TIPO_SOCIO);
            $sql->bindValue(6, $CONTACTO);
            $sql->bindValue(7, $EMAIL);
            $sql->bindValue(8, $FECHA_CREADO);
            $sql->bindValue(9, $ESTADO);
            $sql->bindValue(10, $TELEFONO);
            $sql->execute();
            return $resultado=$sql->featchAll(PDO::FETCH_ASSOC);
   
        }

        public function Delete_Socio($ID){
            $conectar=parent :: conexion();
            parent::set_names();
            $sql="DELETE FROM `g1_19`.`ma_socios_negocio` WHERE (`ID` = ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Update_socio($ID,$NOMBRE, $RAZON_SOCIAL, $DIRECCION, $TIPO_SOCIO, $CONTACTO, $EMAIL, $FECHA_CREADO, $ESTADO,$TELEFONO){
           $conectar=parent::conexion();
           parent::set_names();
           $sql="UPDATE ma_socios_negocio SET 
           NOMBRE=?,
           RAZON_SOCIAL=?,
           DIRECCION=?,
           TIPO_SOCIO=?,
           CONTACTO=?,
           EMAIL=?,
           FECHA_CREADO=?,
           ESTADO=?, 
           TELEFONO=?
           WHERE ID=?;";
            
           $sql=$conectar->prepare($sql);

           $sql->bindValue(1,$NOMBRE);
           $sql->bindValue(2,$RAZON_SOCIAL);
           $sql->bindValue(3,$DIRECCION);
           $sql->bindValue(4,$TIPO_SOCIO);
           $sql->bindValue(5,$CONTACTO);
           $sql->bindValue(6,$EMAIL);
           $sql->bindValue(7,$FECHA_CREADO);
           $sql->bindValue(8,$ESTADO);
           $sql->bindValue(9,$TELEFONO);
           $sql->bindValue(10,$ID);
           $sql->execute();
           return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    
        }



        
    }

    
?>