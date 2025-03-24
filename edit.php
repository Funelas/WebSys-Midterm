<?php 
    $user_id = $_REQUEST["id"];

    include("connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$user_id'");
    while($row_edit = mysqli_fetch_assoc($get_record)){
        $db_name = $row_edit["name"];
        $db_address = $row_edit["address"];
        $db_email = $row_edit["email"];

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
<body class="[font-family:'Poppins'] bg-[#222222] w-screen h-screen">
    <div class='flex justify-between mx-3'>
        <?php include("nav.php"); ?>
    </div>
    <div class="h-full flex flex-col justify-center items-center">
        <div class= "flex items-center mb-[100px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#8fffff" class="h-[80px]">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
            <span class="text-[#8fffff] text-xl md:text-3xl lg:text-5xl">Update Information</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#8fffff" class="h-[80px] scale-x-[-1]">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
        </div>
        

        <div class="border-4 border-[#2fffff] p-4">
            <form method = "POST" action="update_record.php">
                <input  type="hidden" name="user_id" value="<?php echo $user_id;?>">
                <div class="py-3 [font-size:20px] text-[#8fffff]">User Name</div> 
                <input class="w-full px-3 py-1 rounded-full" type="text" name="new_name" value= "<?php echo $db_name; ?>">
                <div class="py-3 [font-size:20px] text-[#8fffff]">User Address</div> 
                <input class="w-full px-3 py-1 rounded-full" type="text" name="new_address" value= "<?php echo $db_address; ?>">
                <div class="py-3 [font-size:20px] text-[#8fffff]">User Email</div> 
                <input class="w-full px-3 py-1 rounded-full" type="text" name="new_email" value= "<?php echo $db_email; ?>">
                <input class="btn bg-[#8fffff] text-[#222222] w-full rounded-full mt-[20px] mb-[10px] h-[40px]" type="submit" value="Update">
            </form>
        </div>
       
    </div>
   
</body>
    <script src="https://cdn.tailwindcss.com"></script>
</html>
