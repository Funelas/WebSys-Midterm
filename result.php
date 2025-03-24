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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="[font-family:'Poppins'] bg-[#222222]">
    <div class='flex justify-between mx-3'>
        <?php include("nav.php"); ?>
    </div>
    <div class="flex justify-center items-center h-screen bg-[#222222]">
        <?php 
            $query = mysqli_query($connections, $query);
            $c_q = mysqli_num_rows($query);
            if ($c_q > 0 && $check!=""){
                echo "<div class= 'w-[50%] flex flex-col justify-center items-center'>";
                echo "<div class='grid grid-cols-2 gap-4 m-3 w-[50%]'>
                            <div class= 'bg-[#8fffff] text-[#222222] p-4 border-2 border-[#222222] rounded text-center break-words'>I.D</div>
                            <div class= 'bg-[#8fffff] text-[#222222] p-4 border-2 border-[#222222] rounded text-center break-words'>Name</div>
                        </div>";
                while($row = mysqli_fetch_assoc($query)){
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<div class='grid grid-cols-2 gap-4 m-3 w-[50%]'>
                            <div class='bg-[#222222] text-[#8fffff] p-4 text-center border-2 border-[#8fffff] rounded text-center break-words'>$id</div>
                            <div class='bg-[#222222] text-[#8fffff] p-4 text-center border-2 border-[#8fffff] rounded text-center break-words'>$name</div>
                            </div>";
                }
                echo "</div>";
            }else{
                echo "<h1 class='text-[#dc3545] my-3 text-3xl md:text-5xl lg:text-8xl mb-[25px] lg:mb-[100px] '>No Result.</h1>";
            }
        
        ?>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>