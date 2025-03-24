<?php 
    $search = $searchErr = "";
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        if(empty($_POST["search"])){
            $searchErr = "Please input at least one character.";
        }else{
            $search = $_POST["search"];
        }
    }
    if ($search){
        echo "<script>window.location.href='result.php?search=$search';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class='[font-family:"Poppins"] bg-[#222222] '>
<div class='flex justify-between mx-3'>
    <?php include("nav.php"); ?>
</div>
<div class="h-screen flex flex-col justify-center items-center">
    <h1 class='text-[#8fffff] my-3 text-3xl md:text-5xl lg:text-8xl mb-[25px] lg:mb-[100px] '>Find an Alike Account</h1>
    <div class="flex justify-center items-center w-full">
        <form class= "flex w-[75%] lg:w-[50%]"method = "POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" >
            <div class="w-full">
            <input class="w-full px-5 py-3 border-2 border-[#222222] rounded-full" name="search" value="<?php echo $search; ?>">
            <span class="m-2 text-[#dc3545] text-sm"><?php echo $searchErr;?></span>
            </div>
            
            <div class="btn border-2 border-[#222222] rounded-full bg-[#8fffff] text-[#222222] px-4 py-2 flex items-center h-[52px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <input class="mx-5" type="submit" value="Search">
            </div>
        </form>
    </div>
    
</div>


</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>


