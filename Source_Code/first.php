<html>
  
<head>
    <style>
            h1
            {text-align:center;
             background-color:orange;}
            body{background-color:pink;}
            form{text-align:center;}
    </style>
<title>
    </title>
 
 </head>
  
<body>
   
<?php

 $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = phonebook1";
   $credentials = "user = postgres password=root";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "<h1>PhoneBook</h1>\n";
       echo"<br></br>";
   }
   
   $sql =<<<EOF
      CREATE TABLE PHONE_DIRECTORY
      (ID serial PRIMARY KEY     NOT NULL,
      NAME           TEXT   NOT NULL,
      MOBILE_NO      TEXT     NOT NULL,
      DOB  DATE  NOT NULL 
     
      );
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      //echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);
?>
 <form method ="post" action="second.php" > 
<input type ="submit" name="ADD_CONTACTS" value="ADD_CONTACTS"/>
<br><br>
<input type="submit" name="SHOW_CONTACTS" value="SHOW_CONTACTS"/>
      
 <br><br>
      
<input type="submit" name="UPDATE_CONTACTS" value="UPDATE_CONTACTS"/>
       
<br><br>
      
<input type="submit" name="DELETE_CONTACTS" value="DELETE_CONTACTS"/>
      
<br><br>
     
 <input type="submit" name="SEARCH_CONTACTS" value="SEARCH_CONTACTS"/> 
<br></br>
 
 
 
    
</form>
<form action="nextpage.php" method="post">

 <input type="submit" name="AGE_CALCULATE" value="AGE_CALCULATE"/>

</form>
  </body>

</html>
