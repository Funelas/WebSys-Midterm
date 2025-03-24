<?php 
    $user_id = $_REQUEST["id"];
    include("connections.php");

    $query_delete = mysqli_query($connections, "SELECT * FROM mytbl WHERE id = '$user_id' ");


    while($row_delete = mysqli_fetch_assoc($query_delete)){

        $user_id = $row_delete["id"];
        $db_name = $row_delete["name"];
        $db_address = $row_delete["address"];
        $db_email = $row_delete["email"];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class= "[font-family:'Poppins'] bg-[#222222] w-screen h-screen">
    <div class='flex justify-between mx-3'>
            <?php include("nav.php"); ?>
    </div>
    <div class="flex flex-col justify-center items-center">
        <div class= "flex items-center mt-[100px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2fffff" class="h-[50px]">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
            <?php echo "<h1 class= 'text-[#8fffff] text-xl md:text-3xl lg:text-5xl mx-2'> Are you sure you want to delete $db_name ?</h1>"; ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2fffff" class="h-[50px]">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
        </div>
        <form class= "w-full flex justify-around my-[100px]" method= "POST" action="delete_now.php">
                <input type="hidden" name = "user_id" value = <?php echo $user_id; ?>>
                <input class= "btn bg-[#2fffff] rounded-full px-[100px] py-[10px]"type="submit" value = "Yes">
                <a class= "btn bg-[#2fffff] rounded-full px-[100px] py-[10px]"href="index.php">No</a>
        </form>
    </div>
    
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>
