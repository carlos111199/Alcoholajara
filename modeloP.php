<?php
class Inventario
{
    private $objeto;
    private $dbh;
 
    public function __construct()
    {
        $this->objeto = array();
        $this->dbh = new PDO('mysql:host=localhost;dbname=lookalive', "lookalive", "59f0b59d1");
    }
 
    private function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
 
    public function lista_inventario()
    {
        self::set_names();
        $sql="select id, imagen, nombre, tipo, presentacion, precio from productos where stock >= 1";
        foreach ($this->dbh->query($sql) as $res)
        {
            $this->objeto[]=$res;
        }
        return $this->objeto;
        $this->dbh=null;
    }

    public function lista_especiales()
    {
        self::set_names();
        $sql="select id, imagen, nombre, tipo, presentacion, precio from productos where stock >= 1 and tipo='Reserva'";
        foreach ($this->dbh->query($sql) as $res)
        {
            $this->objeto[]=$res;
        }
        return $this->objeto;
        $this->dbh=null;
    }

    public function lista_donjulio()
    {
        self::set_names();
        $sql="select id, imagen, nombre, tipo, presentacion, precio from productos where stock >= 1 and nombre='Don Julio'";
        foreach ($this->dbh->query($sql) as $res)
        {
            $this->objeto[]=$res;
        }
        return $this->objeto;
        $this->dbh=null;
    }
}
?>