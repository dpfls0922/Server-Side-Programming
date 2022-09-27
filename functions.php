<?php
date_default_timezone_set('America/New_York');

function calAge($info, $id){
    if(isset($info)){
        if(isset($id)){
            $birth = sprintf("%04d-%02d-%02d", $info[$id]['birth'][0], $info[$id]['birth'][1], $info[$id]['birth'][2]);

            $birth_time = strtotime($birth);
            $now = date('Ymd');
            $birthday = date('Ymd', $birth_time);
            
            $age = floor(($now - $birthday) / 10000);        
            echo $age.' ';
        }
    }
}
function howManyYmds($info, $id){
    if(isset($info)){
        $birth = sprintf("%04d-%02d-%02d", $info[$id]['birth'][0], $info[$id]['birth'][1], $info[$id]['birth'][2]);
        $interval = date_diff(date_create(date('Y-m-d')), date_create($birth));
        echo '('.$interval->format("%Y Years, %M Months, %d Days").')';
    }
}