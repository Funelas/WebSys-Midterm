<?php 
    include("connections.php");
    if(empty($_GET["search"])){
        echo "Get has value";
    }else{
        $check = $_GET["search"];
        $terms = explode(" ", $check);
        $query = "SELECT * FROM mytbl WHERE ";
        $index = 0;

        foreach($terms as $each){
            $index++;
            if($index==1){
                $query .= "name LIKE '%$each%'";
            }else{
                $query .= "OR name LIKE '%$each%'";
            }
        }
    }

    $query = mysqli_query($connections, $query);
    $c_q = mysqli_num_rows($query);
    if ($c_q > 0 && $check!=""){
        while($row = mysqli_fetch_assoc($query)){
            echo $name = $row["name"] . "<br>";
        }
    }else{
        echo "No result.";
    }
?>