<html>
    <head>
        <title>Survey</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
        <body>
        <?php
            include "../nav/nav.php";
        ?>
        <br>
       <form action="survey.cgi" method="POST">
 
        <lable for="fname">Please enter your first name: </lable><br> 
        <input type="text" name="fname" id="fname" size=35 maxlength=50 value="">
        <br>
        <lable for="lname">Please enter your last name: </lable><br>  
        <input type="text" name="lname" id="lname" size=35 maxlength=50 value="">
        <br>
        <labal for="age">Please enter your age: </lable><br>   
        <input type="number" name="age" id="age" min=18 max=120 value="">
        <p>Please choose your sex:</p>
        <input type="radio" id="html" name="fav_language" value="HTML">
        <label for="male">Male</label><br>
        <input type="radio" id="css" name="fav_language" value="CSS">
        <label for="female">Female</label><br>
        <input type="radio" id="javascript" name="fav_language" value="JavaScript">
        <label for="else">Else</label><br>
        <label for="email">Please enter your email:</label>
        <input type="email" id="email" name="email"><br>
        <input type="submit" value="Submit">
        </form>
    </body>
</html>