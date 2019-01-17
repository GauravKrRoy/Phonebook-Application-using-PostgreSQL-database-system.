<?php
$host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname = phonebook1";
   $credentials = "user = postgres password=root";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
       echo"<br></br>";
   }


    if($_REQUEST["Show_Age_Diff"])
       {
          $Mob_No1= $_REQUEST["Mob_No1"];
	  $Mob_No2=$_REQUEST["Mob_No2"];
          
  
    
     
     $sql = <<<EOF
            select age((select DOB from PHONE_DIRECTORY where MOBILE_NO='$Mob_No1'),
                       (select DOB from PHONE_DIRECTORY where MOBILE_NO='$Mob_No2'));

                     
EOF;
$result = pg_query($db,$sql);
if(!$result)
{
  echo pg_last_error($db);
}
else
$row=pg_fetch_row($result);
echo "AGE DIFF. BY TWO NUMBER =" . $row[0];
echo"<br></br>";
}

if($_REQUEST["Show_Age_AnyDate"])
       {
          $mob_no1= $_REQUEST["mob_no1"];
	  $date=$_REQUEST["date"];

$sql = <<<EOF
            select age(('$date'),(select DOB from PHONE_DIRECTORY where MOBILE_NO='$mob_no1'));

                     
EOF;
$result = pg_query($db,$sql);
if(!$result)
{
  echo pg_last_error($db);
}
else
$row=pg_fetch_row($result);
echo "AGE DIFF. BY MOBILE_NO1 & ANY DATE =" . $row[0];
 echo"<br></br>";
}

if($_REQUEST["Show_Age"])
       {
          $mob_no1= $_REQUEST["mob_no1"];
	
       $sql = <<<EOF
            select age((select CURRENT_DATE),(select DOB from PHONE_DIRECTORY where MOBILE_NO='$mob_no1'));
                                           
EOF;
$result = pg_query($db,$sql);
if(!$result)
{
  echo pg_last_error($db);
}
else
$row=pg_fetch_row($result);
echo "AGE OF HONOR OF MOBILE_NO1 =" . $row[0];

 }

?>
