
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
<form  method="post" action="age.php">
<?php

    if($_REQUEST["AGE_CALCULATE"])
    {
       echo'AGE OF SINGLE CONTACT:<input type="submit" name="Show_Age" value="Show_Age"/><br></br>
            AGE DIFF OF TWO CONTACTS:<input type="submit" name="Show_Age_Diff" value="Show_Age_Diff"/><br></br>
            AGE ON CERTAIN DATE:<input type="submit" name="Show_Age_AnyDate" value="Show_Age_AnyDate"/><br></br>';
     }
?> 
</form>
</body>
</html>
