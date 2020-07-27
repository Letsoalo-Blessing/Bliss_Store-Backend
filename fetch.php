<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: Index/json; charset=UTF-8");
    
    $conn = new mysqli("localhost", "root", "", "test");
    $result = $conn->query("SELECT * FROM tbl_customers");
    $outp = "";
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

            if ($outp != "") {$outp .= ",";}

            $outp .= '{"CustomerID":"' . $rs["CustomerID"] . '",';
            $outp .= '"CustomerName":"' . $rs["CustomerName"] . '",';
            $outp .= '"Address":"' . $rs["Address"] . '",';
            $outp .= '"City":"' . $rs["City"] . '",';
            $outp .= '"PostalCode":"' . $rs["PostalCode"] . '",';
            $outp .= '"Country":"'. $rs["Country"] . '"}';
        }
    $outp ='{"records":['.$outp.']}';
    $conn->close();
    echo($outp);
?>
