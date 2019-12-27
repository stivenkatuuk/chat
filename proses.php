<?php

    require_once("singletonConnect.php");
    require_once("boyerMoore.php");
    
    $tanya=$_POST["txtTanya"];


    
    if(empty($tanya) || $tanya=="" || $tanya==NULL){
        echo "cem mana ko kosong (つ◉益◉)つ";

    }else if(strlen($tanya)==1){
        echo "cem mana oy cuman satu karakter aja dicari (つ◉益◉)つ";
    }else{
        $uwu = singletonConnect::connect();
        $query = $uwu->db->query("SELECT * FROM keyword");

        while($row=$query->fetch_array()){            
            $result = boyerMoore::boyer($row['keyword'],$tanya);

            if($result==-1){
                echo "Maaf Bot-chan tidak tau soal itu (╯︵╰,)";
                echo "<br/><br/><br/>";
                continue;
            }else{
                $id_info = $row["id_info"];
                $queryInfo = $uwu->db->query("SELECT * FROM informasi WHERE id_info='$id_info'");
                echo $queryInfo->fetch_array()["informasi"];
                echo "<br/><br/><br/>";
                break;
            }
        }
    }

?>