<?php
class Inventario
{
    private $producto;
    private $dbh;
    private $id;
    private $productoCart;
 
    public function __construct($id)
    {
        $this->id = $id;
        $this->productoCart = array();
        $this->producto = array();
        $this->dbh = new PDO('mysql:host=localhost;dbname=lookalive', "lookalive", "59f0b59d1");
    }
 
    private function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public function producto()
    {
        self::set_names();
        $sql="select nombre, presentacion, tipo, imagen, precio, descripcion from productos where id=".$this->id;
        foreach($this->dbh->query($sql) as $res2)
        {
            $this->producto[]=$res2;
        }
        return $this->producto;
        $this->dbh=null;
    }

    public function prodCart()
    {
        self::set_names();
        $sql="select nombre, tipo, presentacion, imagen, precio from productos where ID=".$this->id;
        foreach($this->dbh->query($sql) as $res3)
        {
            $this->productoCart[]=$res3;
        }
        return $this->productoCart;
        $this->dbh=null;
    }
}
?>