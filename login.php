<?php 
$email = $password = "";
$emailErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["email"])){
        $emailErr = "Email is required!";
    } else{
        $email = $_POST["email"];
    }

    if(empty($_POST["password"])){
        $passwordErr = "Password is required!";
    } else{
       $password = $_POST["password"];
    }
    
    if ($email && $password){
        include("connections.php");
        $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE email = '$email'");
        $check_email_row = mysqli_num_rows($check_email);
        if($check_email_row > 0){
            while($row = mysqli_fetch_assoc($check_email)){
                $db_password = $row["password"];
                $db_account_type = $row["account_type"];
                if ($password == $db_password){
                    if ($db_account_type == "1"){
                        echo "<script>window.location.href='admin'</script>";
                    }else{
                        echo "<script>window.location.href='user'</script>";
                    }
                }else{
                    $passwordErr = "Password is incorrect!";
                }
            }
        } else{
            $emailErr = "Email is not registered!";
        }
    }
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
<body class="[font-family:'Poppins'] bg-[#222222]">
    <div class='flex justify-between mx-3'>
        <?php include("nav.php"); ?>
    </div>
    <div class= "w-full h-screen flex flex-col justify-center items-center">
        <form class= "border-3 rounded flex flex-col justify-center items-center border-4 border-[#8fffff] p-2 w-[25%] h-[50%]" method = "POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="w-24 h-24 rounded-full flex justify-center items-center border-2 border-[#8fffff]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#8fffff" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
            <span class="text-[#8fffff] [font-size:25px] mb-4">Member Login</span>
            <div class= "flex flex-col w-full">
                <div class="px-3 [font-size:20px] text-[#8fffff]">Email:</div> 
                <input class= "w-full px-3 py-1 rounded-full" type="text" name="email" placeholder= "Enter your email"value= "<?php echo $email;?>">
                <span class = "text-[#dc3545]"><?php echo $emailErr; ?></span><br>
            </div>
            <div class= "flex flex-col w-full">
                <div class="px-3 [font-size:20px] text-[#8fffff]">Password:</div> 
                <input class = "w-full px-3 py-1 rounded-full" type="password" name="password" placeholder= "Enter your password"value= "<?php echo $password;?>">
                <span class = "text-[#dc3545]"><?php echo $passwordErr; ?></span><br>
            </div>
            
            <input class="btn bg-[#8fffff] text-[#222222] w-full rounded-full" type="submit" value="Login">
        </form>
    </div>
    
</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>
