<?php
include('user/user.php'); 

class adminwrk
{
    public $ride_id;
    public $ride_date;
    public $from_distance;
    public $to_distance;
    public $total_distance;
    public $luggage;
    public $total_fare;
    public $status;
    public $customer_user_id;

    function fetloc($connection){
        $query=$connection->prepare('SELECT * FROM location WHERE is_available=?');
        $query->execute([1]);

        if($query->rowCount()==0) return false;
        $appr=array();
        while($row = $query->fetch()) array_push($appr, $row);
        return $appr;
    }

    function book($pickup,$drop,$cabtype,$dist,$far,$lugg,$datetime,$id,$connection){
        $_SESSION['bookdata'] = array('ride_date'=>$datetime,'from_distance'=>$pickup,'to_distance'=>$drop,'from_distance'=>$pickup,'cab_type'=>$cabtype, 'customer_user_id'=>$id);	
    
        $query=$connection->prepare('INSERT INTO ride(ride_date,from_distance,to_distance,cab_type,total_distance,luggage,total_fare,customer_user_id) VALUES(?,?,?,?,?,?,?,?)');
        $query->execute([$datetime,$pickup,$drop,$cabtype,$dist,$lugg,$far,$id]);
        return true;
    }

    function calfare($cabtype,$dist,$lugg){
        $fare=0;
        $tdist=$dist;
        
        if($cabtype =='Basic'){
            if($dist<=10){
                $fare=0+(13.50*$dist);
            }
            elseif ($dist<=60) {
                $tdist= $tdist-10;
                $fare=10+(12*$tdist);
            }
            elseif ($dist<=160) {
                $tdist= $tdist-60;
                $fare=30+(10.20*$tdist);
            }
            elseif ($dist>160) {
                $tdist= $tdist-160;
                $fare=50+(8.50*$tdist);
            }
        }
        if($cabtype =='Pro'){
            if($dist<=10){
                $fare=10+(14.50*$dist);
            }
            elseif ($dist<=60) {
                $tdist= $tdist-10;
                $fare=20+(13*$tdist);
            }
            elseif ($dist<=160) {
                $tdist= $tdist-60;
                $fare=40+(11.20*$tdist);
            }
            elseif ($dist>160) {
                $tdist= $tdist-160;
                $fare=60+(9.50*$tdist);
            }
        }
        if($cabtype =='Luxury'){
            if($dist<=10){
                $fare=20+(15.50*$dist);
            }
            elseif ($dist<=60) {
                $tdist= $tdist-10;
                $fare=30+(14*$tdist);
            }
            elseif ($dist<=160) {
                $tdist= $tdist-60;
                $fare=50+(12.20*$tdist);
            }
            elseif ($dist>160) {
                $tdist= $tdist-160;
                $fare=70+(10.50*$tdist);
            }
        }
        
        if($lugg>0){
            if($lugg<=10) $fare=$fare+5;
            elseif ($lugg>10 && $lugg<=20) $fare=$fare+10;
            elseif($lugg>20) $fare=$fare+20;
        }

        return $fare+10;
    }

    function driverinfo($driver_name,$connection){
        $query=$connection->prepare('SELECT * FROM users WHERE name=?');
        $query->execute([$driver_name]);
        
        $appr=array();
        while($result=$query->fetch()) array_push($appr, $result);
        return $appr;
    }

}
?>