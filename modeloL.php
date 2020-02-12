<?php
class Login
{
    private $email;
    private $contra;
    private $correo;
    private $user;
    private $dbh;
 
    public function __construct($email, $contra)
    {
        $this->email = $email;
        $this->contra = $contra;
        $this->user = array();
        $this->correo = array();
        $this->dbh = new PDO('mysql:host=localhost;dbname=lookalive', "lookalive", "59f0b59d1");
    }
 
    private function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
 
    public function resultado_correo()
    {
        self::set_names();
        $sql="select * from usuarios where correo = '" . $this->email . "'";
        foreach ($this->dbh->query($sql) as $res)
        {
            $this->correo[]=$res;
        }
        if($this->correo==null)
        {
            return 0;   
        }
        else
        {
            return 1;
        }
    }
    
    public function resultado_login()
    {
        self::set_names();
        $sql="select nombreU, adm from usuarios where correo = '" . $this->email . "' and contra = md5('" . $this->contra . "')";
        foreach ($this->dbh->query($sql) as $res2)
        {
            $this->user[]=$res2;
        }
        if($this->user!=null)
        {
            return $this->user;   
        }
        else
        {
            return 1;
        }
        $this->dbh=null;
    }
}
?>