<?php
class Registro
{
    private $nombreU;
    private $email;
    private $contra;
    private $nombre;
    private $user;
    private $correo;
    private $dbh;
 
    public function __construct($nombreU, $email, $contra, $nombre)
    {
        $this->nombreU = $nombreU;
        $this->email = $email;
        $this->contra = $contra;
        $this->nombre = $nombre;
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

    public function resultado_usuario()
    {
        self::set_names();
        $sql="select * from usuarios where nombreU = '" . $this->nombreU . "'";
        foreach ($this->dbh->query($sql) as $res)
        {
            $this->user[]=$res;
        }
        if($this->user==null)
        {
            return 0;   
        }
        else
        {
            return 1;
        }
    }

    public function registro_user()
    {
        self::set_names();
        $sql="insert into usuarios(id, correo, nombreU, contra, nombre, adm) values (null, '".$this->email."', '".$this->nombreU."', md5('".$this->contra."'), '".$this->nombre."', 0)";
        if(!$this->dbh->query($sql))
        {
            return 0;
        }
        else
        {
            $json = array();
            $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
            $fo = fopen("jsons//".$this->nombreU.".json", 'w');
            fwrite($fo, $jsonencoded);
            fclose($fo);
            return 1;
        }
    }
}
?>