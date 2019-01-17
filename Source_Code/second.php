<html>
<head>
</head><style>
 h1
            {text-align:center;
             background-color:orange;}
            body{background-color:pink;}
form{text-align:center;}</style>
<body>
<form  method="post" action="add.php">

<?php
  if($_REQUEST["ADD_CONTACTS"])
  {
      echo 'NAME:<input type="text" name="name">
            <br/><br/>
            MOBILE No:<input type="text" name="mobno">
           <br></br>
            DOB:<input type="text" name="DOB">
            <br></br>
            <input type="submit" name="ADD" value="ADD">';
  }
  if($_REQUEST["UPDATE_CONTACTS"])
  {
	 echo 'Name:<input type="text" name="name">';
	   echo '<br><br>';
    echo 'Enter the new number to be updated';
    echo '<br><br>';
    echo 'EDIT NUMBER:<input type="text" name="mobno">
           <br><br>
          <input type="submit" name="CHANGE" value="CHANGE">';
  }
  if($_REQUEST["DELETE_CONTACTS"])
  {
    echo 'Enter the contact to be deleted';
    echo '<br/><br/>';
    echo 'NAME:<input type="text" name="name">
          <br><br>
          MOBILE NO:<input type="text" name="mobno">
          <input type="submit" name="DELETE" value="DELETE">';
  }
  if($_REQUEST["SEARCH_CONTACTS"])
  {
     echo 'Enter the contact name';
     echo '<br/><br/>';
     echo 'NAME:<input type="text" name="name">
           <input type="submit" name="SEARCH_CONTACTS" value="SEARCH_CONTACTS">';
    
       

  }
  if($_REQUEST["SHOW_CONTACTS"])
  {
	  
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = phonebook1";
   $credentials = "user = postgres password=root";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      //echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      SELECT * from PHONE_DIRECTORY;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } 
   while($row = pg_fetch_row($ret)) {
      echo "ID = ". $row[0] . "<br>";
      echo "NAME = ". $row[1] ."<br>";
      echo "MOBILE_NO = ". $row[2] ."<br>";
      echo "DOB=" .$row[3] ."<br>";
      
      //echo "SALARY =  ".$row[4] ."\n\n";
	  echo "<br><br>";
   }
   echo "Operation done successfully\n";
   pg_close($db);
  }
  
?>

</form>
</body>
</html>
