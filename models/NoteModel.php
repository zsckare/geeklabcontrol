<?php

  class NoteModel{

    protected $consult;
    public $rows;

    public function __construct()
    {
        $this->consult = new Querys();
    }


    public function get($cellComparate = null, $value = null)
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM note
            WHERE $cellComparate = '$value'
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }

    public function getSale($cellComparate = null, $value = null)
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM sale
            WHERE $cellComparate = '$value'
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function getVenta($value = null)
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM ventas
            WHERE id_venta = '$value'
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function getVentas($value = null)
    {
      $hoy = Date::getFecha();
        $query = $this->consult->getConsultar("
            SELECT *
            FROM sale
            WHERE fecha = '$hoy'
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function getLastAll($type=null)
    {
        $query = $this->consult->getConsultar("
            SELECT * FROM note WHERE type = '$type' ORDER BY id_note DESC
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function getLast()
    {
        $query = $this->consult->getConsultar("
            SELECT * FROM note ORDER BY id_note DESC LIMIT 1
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function LastSale()
    {
        $query = $this->consult->getConsultar("
            SELECT * FROM ventas ORDER BY id_venta DESC LIMIT 1
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function create($values = array())
    {
      $folio = "";
      extract($values);
      $tip = $tipo;
      if ($tip == 1) {
        $folio = Date::getFolio();
      }
      if ($tip == 2) {
        $folio = Date::getFolioPrice();
      }

      $hora = Date::getHora();
      if($this->consult->getConsultar("
        INSERT INTO note (id_note, folio, date, hora, status, id_client,type) VALUES (NULL, '$folio', '$fecha', '$hora', '1','$id_client', $tip);
          "))
      {
         Cookies::set("complete","Se ha creadi el usuario correctamente","20-s");
         Redirection::go("note/update");
      }else{

         Redirection::go("user");
      }
    }
    public function createVenta($values = null)
    {
      $id = $_SESSION['id'];
      $fecha = Date::getFecha();
      if($this->consult->getConsultar("
        INSERT INTO ventas (id_venta, cliente,id_user,fecha) VALUES (NULL, '$values', '$id', '$fecha');
          "))
      {
         Redirection::go("sale/updatesale");
      }else{

         Redirection::go("user");
      }
    }

    public function update($useractual,$mailactual, $comp, $user, $correo, $values=array())
    {
      if($this->consult->getConsultar("
          UPDATE user
          SET name = '$name'
          WHERE name_user = '$user'
      "))
      {
        $_SESSION['user']=$name;
        Cookies::set("complete","Se ha editado el usuario correctamente","20-s");
        Redirection::go("user");
      }else{
        Cookies::set("alert","Error: por algun motivo no se pudo editar el usuario intenta de nuevo","20-s");
        Redirection::go("user");
      }   
    }
    public function updateSales($value=null)
    {
      if($this->consult->getConsultar("
          UPDATE sale
          SET status = '1', id_notesale = '$value'
          WHERE status = '0'
      "))
      {
        Redirection::go("sale");
      }else{
        Cookies::set("alert","Error: por algun motivo no se pudo editar el usuario intenta de nuevo","20-s");
        Redirection::go("user");
      }   
    }
    public function ready($value = null,$payment = null)
    {
      if($this->consult->getConsultar("
          UPDATE note
          SET status = '2' , payment = '$payment'
          WHERE id_note = '$value'
      "))
      {
          Redirection::go("note");
      }else{
          Redirection::go("user");
      }   
    }
    public function destroy($id)
    {
        if($this->consult->getConsultar("
            DELETE FROM user
            WHERE id_user = '$id'
        ")){
        
           
        }else
        {
        
          Redirection::go("user");
        }
    }


//funciones para agregar disposivos y asociarlos a un anota

    public function addDevice($values = array())
    {
      extract($values);
      if($this->consult->getConsultar("
              INSERT INTO `device` (`id_device`, `type`, `mark`, `model`, `details`, `price`,`status`) VALUES (NULL, '$type', '$mark', '$model', '$details', '$price', '0');
          "))
      {
         
      }else{
        
      }
    }


    public function cotizacion($values = array())
    {
      extract($values);
      if($this->consult->getConsultar("
              INSERT INTO `notes` (`id_note`, ) VALUES (NULL, );
          "))
      {  
      }else{
        
      } 
    } 
    
    public function createSale($values = array())
    {
      $folio = "000";
      $iduser = $_SESSION['id'];
      extract($values);
      if($this->consult->getConsultar("
        INSERT INTO sale (id_sale, producto, cantidad, precio, fecha,status,id_user) VALUES (NULL, '$producto', '$cantidad', '$precio','$fecha','0','$iduser');
          "))
      {
         //Redirection::go("sale");
      }else{

         Redirection::go("user");
      }
    }

    public function getAllSales()
    {
        $query = $this->consult->getConsultar("
            SELECT * FROM ventas ORDER BY id_venta DESC 
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }


  }