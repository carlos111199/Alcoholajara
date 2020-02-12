<?php
class Carritos
{
    private $users;
    private $dbh;
 
    public function __construct()
    {
        $this->users = array();
        $this->dbh = new PDO('mysql:host=localhost;dbname=lookalive', "lookalive", "59f0b59d1");
    }
 
    private function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
 
    public function resultado_carritos()
    {
        self::set_names();
        $sql="select nombreU from usuarios";
        foreach ($this->dbh->query($sql) as $res)
        {
            $this->users[]=$res;
        }
        if($this->users==null)
        {
            return 0;   
        }
        else
        {
            return $this->users;
        }
    }
}
?>