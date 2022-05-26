<html>
    <head>
        <title>Survey</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
        <body>
        <?php
            include "../nav/nav.php";
            include "../nav/footer.php";
        ?>
        <br>
       <form method="post">
 
        <lable for="fname">Please enter your first name: </lable><br> 
        <input type="text" name="fname" id="fname" size=35 maxlength=50 value="" required>
        <br>
        <lable for="lname">Please enter your last name: </lable><br>  
        <input type="text" name="lname" id="lname" size=35 maxlength=50 value="" required>
        <br>
        <labal for="age">Please enter your age: </lable><br>   
        <input type="number" name="age" id="age" min=18 max=120 value="" required>
        <p>Please choose your sex:</p>
        <input type="radio" id="male" name="sex" value="Male" required>
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="sex" value="Female" required>
        <label for="female">Female</label><br>
        <input type="radio" id="else" name="sex" value="Else" required>
        <label for="else">Else</label><br>
        <label for="email">Please enter your email:</label><br>
        <input type="email" id="email" name="email"required><br>
        <input type="submit" value="submit" name="submit" id="submit">
        </form>
            
</html>
<?php
    if (isset($_POST['submit'])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $age = $_POST["age"];
        $sex = $_POST["sex"];
        $email = $_POST["email"];
        $file_name = $fname . "_file.txt";

        $openFile = fopen($file_name, 'a');
            $data = "\t"."{$fname}";
            $data .= "\t"."{$lname}";
            $data .= "\t"."{$age}";
            $data .= "\t"."{$sex}";
            $data .= "\t"."{$email}";
            $data .= "\n"; 

        fwrite($openFile,$data);
        fclose($openFile);
    }
?>
    </body>