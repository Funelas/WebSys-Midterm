<?php 

include ("connections.php");
$name = $address = $email = $password = $cpassword =  "";
$nameErr = $addressErr = $emailErr = $passwordErr = $cpasswordErr = "" ; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = $_POST["address"];
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["cpassword"])) {
        $cpasswordErr = "Confirm Password is required";
    } else {
        $cpassword = $_POST["cpassword"];
    }

    if ($password != $cpassword){
        $passwordErr = $cpasswordErr = "Password does not match.";
    }
   
    if($name && $address && $email && $password && $cpassword && ($password == $cpassword)){
        $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE email='$email'");
        $check_email_row = mysqli_num_rows($check_email);

        if($check_email_row > 0){
            $emailErr = "Email is already registered!";
        }else{
            $query = mysqli_query($connections, "INSERT INTO mytbl (name,address,email,password,account_type) VALUES ('$name','$address','$email','$cpassword', '2')");
            echo "<script language = 'javascript'>alert('New record has been inserted!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }






        
        // $query = mysqli_query($connections, "INSERT INTO mytbl (name,address,email) VALUES ('$name', '$address', '$email')");
        // echo "<script language= 'javascript'> alert('New Record has been inserted!')</script>";
        // echo "<script>window.location.href='index.php';</script>";
    }

}
?>

<!DOCTYPE html>
<html class= "w-full h-full"lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=yes,initial-scale=1">
    <title>Lesson 7-10</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class= "[font-family:'Poppins',sans-serif] bg-[#222222] w-full h-full" >

<div class='flex justify-between mx-3'>
    <?php include("nav.php"); ?>
</div>

<!-- Yellow hex code: #e8ebab -->

<div class="container flex flex-col justify-center items-center lg:flex-row lg:items-start my-[10px] lg:mx-[20px]">
    <div class="flex flex-col justify-start items-center">
        <h1 class="text-[#8fffff] my-3 text-lg">Register / Signup</h1>
        <form method= "POST" class='container bg-[#222222] text-[#8fffff] border border-[#8fffff] rounded border-4 p-3 w-[500px] mx-[50px] flex flex-col items-center justify-center' action= "<?php htmlspecialchars("PHP_SELF");?>">
            <div class= "w-full">
                <div class="[font-size:15px]">Name:</div> 
                <input class="w-full rounded-full px-2 py-1 text-[#222222]" type="text" name = "name" placeholder= "Enter your name" value = "<?php echo $name; ?>"> <br>
                <span class= "text-[#dc3545]"> <?php echo $nameErr ;?></span><br>
            </div>
            <div class= "w-full">
                <div class="[font-size:15px]">Address:</div> 
                <input class="w-full rounded-full px-2 py-1 text-[#222222]" type="text" name = "address" value = "<?php echo $address ; ?>" placeholder="Enter your address"> <br>
                <span class= "text-[#dc3545]"> <?php echo $addressErr ;?></span><br>
            </div>
            <div class= "w-full">
                <div class="[font-size:15px]">Email:</div>
                <input class="w-full rounded-full px-2 py-1 text-[#222222]" type="text" name = "email" placeholder="Enter your email" value = "<?php echo $email;?>"> <br>
                <span class= "text-[#dc3545]"> <?php echo $emailErr ;?></span><br>
            </div>
            <div class= "w-full">
                <div class="[font-size:15px]">Password:</div>
                <input class="w-full rounded-full px-2 py-1 text-[#222222]" type="password" name = "password" placeholder="Enter your password" value = "<?php echo $password;?>"> <br>
                <span class= "text-[#dc3545]"> <?php echo $passwordErr ;?></span><br>
            </div>
            <div class= "w-full">
                <div class="[font-size:15px]">Confirm Password:</div>
                <input class="w-full rounded-full px-2 py-1 text-[#222222]" type="password" name = "cpassword" placeholder= "Retype Password" value = "<?php echo $cpassword;?>"> <br>
                <span class= "text-[#dc3545]"> <?php echo $cpasswordErr ;?></span><br>
            </div>
            <div class= "w-full">
                <input class = "w-full p-2 bg-[#8fffff] text-[#222222] border-[#8fffff] rounded-full"type="submit" value= "Submit"> <br>
            </div>
            
        </form>
    </div>
    

    <!-- <hr> -->

    
    <?php 
        echo "<div class = 'w-[50%] flex flex-col justify-center items-center'>";
        echo "<h1 class='text-[#8fffff] my-3 text-lg'>Accounts</h1>";
        echo "<table class = 'border-4 border-[#8fffff] table-fixed rounded-lg border-separate'>";
        echo "<tr>
                <td class= 'bg-[#222222] text-[#8fffff] px-[6px] py-[3px] border-2 border-[#8fffff] text-center [font-size:20px]'>Name</td>
                <td class= 'bg-[#222222] text-[#8fffff] px-[6px] py-[3px] border-2 border-[#8fffff] text-center [font-size:20px]'>Address</td>
                <td class= 'bg-[#222222] text-[#8fffff] px-[6px] py-[3px] border-2 border-[#8fffff] text-center [font-size:20px]'>Email</td>
                <td class= 'bg-[#222222] text-[#8fffff] px-[6px] py-[3px] border-2 border-[#8fffff] text-center [font-size:20px]'>Option</td>
                </tr>";

        $view_query = mysqli_query($connections, "SELECT * FROM mytbl");

        while ($row = mysqli_fetch_assoc($view_query)){
            $user_id = $row['id'];
            $db_name = $row["name"];
            $db_address = $row["address"];
            $db_email = $row["email"];
            echo "<tr>
                    <td class = 'px-[6px] py-[3px] border-2 border-[#8fffff] text-center break-words text-[#8fffff]'>$db_name</td>
                    <td class = 'px-[6px] py-[3px] border-2 border-[#8fffff] text-center break-words text-[#8fffff]'>$db_address</td>
                    <td class = 'px-[6px] py-[3px] border-2 border-[#8fffff] text-center break-words text-[#8fffff]'>$db_email</td>
                    <td class = 'px-[6px] py-[3px] border-2 border-[#8fffff] text-center break-words text-[#8fffff]'>
                        <div class = 'h-24 flex flex-col justify-around'> 
                            <a class='btn bg-[#8fffff] text-[#222222] rounded-full p-1 flex items-center' href= 'edit.php?id=$user_id'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5 ml-2'>
                                <path stroke-linecap='round' stroke-linejoin='round' d='m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10' />
                                </svg>
                                <span class = 'mx-5'>Update</span>
                            </a>
                            <a class='btn bg-[#8fffff] text-[#222222] rounded-full p-1 flex items-center' href= 'confirm_delete.php?id=$user_id'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5 ml-2'>
                                <path stroke-linecap='round' stroke-linejoin='round' d='m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z' />
                                </svg>
                                <span class = 'mx-5'>Delete</span>
                            </a>
                        </div>
                    
                    </td>
                    </tr>";

            
        }

        echo "</table>";
        echo "</div>";
    ?>
</div>

<!-- <hr> -->

<br><br><br>
<div class= "flex flex-col justify-center items-center">
    <h1 class='text-[#8fffff] my-3 text-lg'>List Names</h1>
    <div class='grid grid-cols-2 gap-4 m-3 w-[50%]'>
        <div class='bg-[#8fffff] text-[#222222] p-4 text-center border-2 border-black rounded'>Number</div>
        <div class='bg-[#8fffff] text-[#222222] p-4 text-center border-2 border-black rounded'>Name</div>
    </div>
    <?php 
        
        $Paul = "Paul";
        $Mica = "Mica";
        $Kaye = "Kaye";
        $names = array($Paul, $Mica, $Kaye);
        $counter = 1;
        foreach($names as $display_names){
            echo "<div class='grid grid-cols-2 gap-4 m-3 w-[50%]'>
                <div class='bg-[#222222] text-[#8fffff] p-4 text-center border-2 border-[#8fffff] rounded'>$counter</div>
                <div class='bg-[#222222] text-[#8fffff] p-4 text-center border-2 border-[#8fffff] rounded'>$display_names</div>
                </div>";
            $counter ++;
        }
            

    ?>
</div>

</body>
<script src="https://cdn.tailwindcss.com"></script>
</html>










