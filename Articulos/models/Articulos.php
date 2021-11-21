<?php

  Class Articulos extends conectar{

      public function get_articulos(){
         $conectar=parent::Conexion();
         parent::set_names();
         $sql="SELECT * FROM ma_articulos WHERE estado=1";
         $sql= $conectar->prepare($sql);
         $sql->execute();
         return $resultado= $sql->fetchAll(PDO:: FETCH_ASSOC);
        }

        public function get_articulo($ID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_articulos WHERE estado=1 AND ID = ? ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }
        public function insert_articulos($ID, $DESCRIPCION, $UNIDAD, $COSTO, $PRECIO, $APLICA_ISV, $PORCENTAJE_ISV, $ESTADO, $ID_SOCIO){
            $conectar=parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO ma_articulos(ID, DESCRIPCION, UNIDAD, COSTO, PRECIO, APLICA_ISV, PORCENTAJE_ISV, ESTADO, ID_SOCIO)
            VALUES (?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->bindValue(2, $DESCRIPCION);
            $sql->bindValue(3, $UNIDAD);
            $sql->bindValue(4, $COSTO);
            $sql->bindValue(5, $PRECIO);
            $sql->bindValue(6, $APLICA_ISV);
            $sql->bindValue(7, $PORCENTAJE_ISV);
            $sql->bindValue(8, $ESTADO);
            $sql->bindValue(9, $ID_SOCIO);
            $sql->execute();
            return $resultado=$sql->featchAll(PDO::FETCH_ASSOC);
        }
    
        public function Delete_Articulo($ID){
            $conectar=parent :: conexion();
            parent::set_names();
            $sql="DELETE FROM `g1_19`.`ma_Articulos` WHERE (`ID` = ?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function Update_Articulo($ID, $DESCRIPCION, $UNIDAD, $COSTO, 
        $PRECIO, $APLICA_ISV, $PORCENTAJE_ISV, $ESTADO,$ID_SOCIO){
            $conectar=parent :: conexion();
            parent::set_names();
            $sql="UPDATE  ma_articulos SET
            DESCRIPCION=?,
            UNIDAD=?,
            COSTO=?,
            PRECIO=?,
            APLICA_ISV=?,
            PORCENTAJE_ISV=?,
            ESTADO=?,
            ID_SOCIO=?
            WHERE ID=?;";
            
            $sql=$conectar->prepare($sql);
           
            $sql->bindValue(1,$DESCRIPCION);
            $sql->bindValue(2,$UNIDAD);
            $sql->bindValue(3,$COSTO);
            $sql->bindValue(4,$PRECIO);
            $sql->bindValue(5,$APLICA_ISV);
            $sql->bindValue(6,$PORCENTAJE_ISV);
            $sql->bindValue(7,$ESTADO);
            $sql->bindValue(8,$ID_SOCIO);
            $sql->bindValue(9,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

  

    
?>
