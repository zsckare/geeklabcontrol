<?php

  class DeviceModel{

    protected $consult;
    public $rows;

    public function __construct()
    {
        $this->consult = new Querys();
    }

    public function getDevicesTypes()
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM typedevices
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }


    public function getMarca($value = null)
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM mark WHERE id_type = $value
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function getMarcas()
    {
        $query = $this->consult->getConsultar("
            SELECT DISTINCT name
            FROM mark 
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
	public function getModelo($value = null)
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM model WHERE id_mark = $value
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }

    public function getByID($value = null)
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM device WHERE id_note = $value
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function getBy($value = null)
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM device WHERE id_device = $value
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function getDevices($value = null)
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM device WHERE status = $value
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function quitDevice($value = null)
    {
        $query = $this->consult->getConsultar("
            DELETE * FROM device WHERE id_device = $value
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function updateDevices($values=array())
    {
        extract($values);
      if($this->consult->getConsultar("
          UPDATE device
          SET id_note = '$id_note', status = '1'
          WHERE status = '$status'
      "))
      {
        Redirection::go("note/lastnote");
      }else{
        Redirection::go("user");
      }   
    }


    public function createType($value= null)
    {
        
      if($this->consult->getConsultar("
          INSERT INTO typedevices (id_type, name) VALUES(null, '$value');
      "))
      {
        Redirection::go("admin");
      }else{
        Redirection::go("user");
      }   
    }
    public function createMark($name,$type)
    {
        
      if($this->consult->getConsultar("
          INSERT INTO mark (id_mark, id_type, name) VALUES(null,'$type', '$name');
      "))
      {
        Redirection::go("admin/marks/?type=$type");
      }else{
        Redirection::go("user");
      }   
    }

    public function createModel($name,$mark)
    {
        
      if($this->consult->getConsultar("
          INSERT INTO model (id_model, id_mark, name) VALUES(null,'$mark', '$name');
      "))
      {
        Redirection::go("admin/models/?mark=$mark");
      }else{
        Redirection::go("user");
      }   
    }
    public function updateDetails($id,$details,$price)
    {
      
      if($this->consult->getConsultar("
          UPDATE device
          SET details = '$details', price = '$price'
          WHERE id_device = '$id'
      "))
      {
        Redirection::go("note");
      }else{
        Redirection::go("user");
      }   
    }
    public function updateStatus($id,$status)
    {
      $dia = Date::getFecha();
      if($this->consult->getConsultar("
          UPDATE device
          SET ready = '$status', actualizacion = '$dia'
          WHERE id_device = '$id'
      "))
      {
        Redirection::go("note");
      }else{
        Redirection::go("user");
      }   
    }
    public function deleteMark($id,$type)
    {
      
      if($this->consult->getConsultar("
          DELETE FROM mark
          WHERE id_mark = '$id'
      "))
      {
        Redirection::go("admin/marks/?type=$type");
      }else{
        Redirection::go("user");
      }   
    }

  }