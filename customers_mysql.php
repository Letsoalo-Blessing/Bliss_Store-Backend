<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: Index/json; charset=UTF-8");
    
    $conn = new mysqli("localhost", "root", "", "projectDB");
    $result = $conn->query("SELECT * FROM tbluser");
    $outp = "";
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

            if ($outp != "") {$outp .= ",";}

            $outp .= '{"userid":"' . $rs["userid"] . '",';
            $outp .= '"email":"' . $rs["email"] . '",';
            $outp .= '"province":"' . $rs["province"] . '",';
            $outp .= '"city":"' . $rs["city"] . '",';
            $outp .= '"address":"' . $rs["address"] . '"}';
        }
    $outp ='{"records":['.$outp.']}';
    $conn->close();
    echo($outp);
?>