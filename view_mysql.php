<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: Index/json; charset=UTF-8");
    
    $conn = new mysqli("localhost", "root", "", "projectDB");
    $result = $conn->query("SELECT * FROM tblProduct");
    $outp = "";
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

            if ($outp != "") {$outp .= ",";}

            $outp .= '{"prodCode":"' . $rs["id"] . '",';
            $outp .= '"prodID":"' . $rs["prodID"] . '",';
            $outp .= '"Description":"' . $rs["Descr"] . '",';
            $outp .= '"Category":"' . $rs["category"] . '",';
            $outp .= '"Qty":"' . $rs["Qty"] . '",';
            $outp .= '"UnitPrice":"' . $rs["unitPrice"] . '"}';
        }
    $outp ='{"records":['.$outp.']}';
    $conn->close();
    echo($outp);
?>