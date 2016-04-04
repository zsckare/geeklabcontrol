<?php
session_start();
  class SearchModel{

    protected $consult;
    public $rows;

    public function __construct()
    {
        $this->consult = new Querys();
    }


    public function getSearch($value = null)
    {
        $b = $value;
        $query = $this->consult->getConsultar("
              SELECT * FROM client WHERE name LIKE '%".$b."%' OR paterno LIKE '%".$b."%' 
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }
    public function getSale()
    {
        $id = $_SESSION['id'];
        $query = $this->consult->getConsultar("
              SELECT * FROM sale WHERE status = '0' AND id_user ='$id'
        ");

        while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $this->rows[] = $row;
        }

        return $this->rows;

    }

  }