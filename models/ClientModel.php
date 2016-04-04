<?php

  class ClientModel{

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
            FROM client
            WHERE $cellComparate = '$value'
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }

    public function getAll()
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM client
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }

    public function getAllByLastname()
    {
        $query = $this->consult->getConsultar("
            SELECT *
            FROM client ORDER BY paterno ASC
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    
    public function create($values = array())
    {
      extract($values);
      if($this->consult->getConsultar("
              INSERT INTO client
              (id_client, name, paterno, phone,type,rating)
              VALUES
              (null, '$name', '$lastname','$phone','1','2')
          "))
      {
         Redirection::go("client");
      }else{
         Redirection::go("note");
      }
    }

    public function update($values=array())
    {
      extract($values);
      if($this->consult->getConsultar("
          UPDATE client SET name = '$name',paterno = '$lastname', rating = '$rating',type = '$type'
          WHERE id_client = '$id'
      "))
      {
        Cookies::set("complete","Se ha editado el usuario correctamente","20-s");
        Redirection::go("client");
      }else{
        Cookies::set("alert","Error: por algun motivo no se pudo editar el usuario intenta de nuevo","20-s");
      }   
    }

    public function destroy($id)
    {
        if($this->consult->getConsultar("
            DELETE FROM client
            WHERE id_client = '$id'
        ")){
           Redirection::go("client");
        }else
        {
           Cookies::set("alert","Error: No se ha podido eliminar el usuario intenta de nuevo","20-s");
          Redirection::go("user");
        }
    }
  }