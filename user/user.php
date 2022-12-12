<?php

class user{

    public $user_id;
    public $user_name;
    public $name;
    public $dateofsignup;
    public $mobile;
    public $password;
    public $is_admin;


     function allcars($connection){
        $query=$connection->prepare('SELECT * FROM cars');
        $query->execute();
        
        $appr=array();
		if($query->rowCount()>0)
            while($result=$query->fetch()) array_push($appr, $result);
        return $appr;
    }

    function prof($id,$connection){
        $query=$connection->prepare('SELECT * FROM users WHERE ID=?');
        $query->execute([$id]);
        
        $appr=array();
        while($result=$query->fetch()) array_push($appr, $result);
        return $appr;
    }
}
