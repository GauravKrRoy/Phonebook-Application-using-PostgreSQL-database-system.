
<html>
<head>
</head>
       <style>
           h1{text-align:center;
              background-color:orange;}
           body{background-color:pink;}
           form{text-align:center;}
      </style>
<body>
<h1>Age-Calculation</h1>
<form  method="post" action="nextpage1.php">
<?php

    if($_REQUEST["Show_Age"])
    {
      echo'ENTER MOBILE NO<input type="text" name="mob_no1"/><br></br>
                          <input type="submit" name="Show_Age" value="Show_Age"/>';
    }

    if($_REQUEST["Show_Age_Diff"])
    {
      echo'ENTER MOBILE NO OF FIRST CONTACT<input type="text" name="Mob_No1"/><br></br>
           ENTER MOBILE NO OF SECOND CONTACT<input type="text" name="Mob_No2"/><br></br>
                                             <input type="submit" name="Show_Age_Diff" value="Show_Age_Diff"/>';
    }
    
    if($_REQUEST["Show_Age_AnyDate"])
    {
      echo'ENTER MOBILE NO<input type="text" name="mob_no1"/><br></br>
                          <input type="date" name="date"/><br></br>          
                          <input type="submit" name="Show_Age_AnyDate" value="Show_Age_AnyDate"/>';
    }
?> 
</form>
</body>
</html>
