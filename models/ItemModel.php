<?php

  class ItemModel{

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
            FROM item
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
            FROM item
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }

    public function getCorte($dia)
    {
        $query = $this->consult->getConsultar("
          SELECT * FROM device WHERE ready = '1' AND actualizacion = '$dia'
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }


    public function getSearch($value = null)
    {
        $b = $value;
        $query = $this->consult->getConsultar("
              SELECT * FROM item WHERE code LIKE '%".$b."%' OR mark LIKE '%".$b."%' 
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
              INSERT INTO item
              (id_item, name, mark, code,quantity)
              VALUES
              (null, '$name', '$mark','$code','$quantity')
          "))
      {
         Redirection::go("inventary");
      }else{
         Redirection::go("note");
      }
    }

    public function update($values=array())
    {
      extract($values);
      if($this->consult->getConsultar("
          UPDATE item
          SET mark = '$mark', name = '$name',code = '$code', quantity = '$quantity'
          WHERE id_item = '$id'
      "))
      {
        Redirection::go("inventary");
      }else{
        Cookies::set("alert","Error: por algun motivo no se pudo editar el usuario intenta de nuevo","20-s");
        Redirection::go("note");
      }   
    }
    public function minus($value,$id)
    {
      
      if($this->consult->getConsultar("
          UPDATE item
          SET quantity = '$value'
          WHERE id_item = '$id'
      "))
      {
        Redirection::go("inventary");
      }else{
        Cookies::set("alert","Error: por algun motivo no se pudo editar el usuario intenta de nuevo","20-s");
        Redirection::go("note");
      }   
    }
    public function destroy($id)
    {
        if($this->consult->getConsultar("
            DELETE FROM item
            WHERE id_item = '$id'
        ")){
          Redirection::go("inventary");
        }else
        {
          Redirection::go("user");
        }
    }
  }