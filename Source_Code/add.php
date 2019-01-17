<?php
$host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname = phonebook1";
   $credentials = "user = postgres password=root";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened Database successfully\n";
   }

  if($_REQUEST["ADD"])
  {
	  
	  $Name= $_REQUEST["name"];
	  $MobNo=$_REQUEST["mobno"];
          $DOB=$_REQUEST["DOB"];
	  echo $Name;
   
   $sql =<<<EOF
      INSERT INTO PHONE_DIRECTORY(NAME,MOBILE_NO,DOB)VALUES('$Name',$MobNo,'$DOB');     
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
  
  }
  if($_REQUEST["CHANGE"])
  {
	  $MobNo=$_REQUEST["mobno"];
	  $NAME=$_REQUEST["name"];
           $DOB=$_REQUEST["DOB"];
	   $sql =<<<EOF
      UPDATE  PHONE_DIRECTORY set mobile_no = $MobNo where NAME='$NAME';
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record updated successfully\n";
   }
   
  
  
  }

 if($_REQUEST["SEARCH_CONTACTS"])
  {
     $NAME= $_REQUEST["name"];
     
     $sql = <<<EOF
            SELECT MOBILE_NO FROM PHONE_DIRECTORY WHERE NAME= '$NAME';
EOF;
$result = pg_query($db,$sql);
if(!$result)
{
  echo pg_last_error($db);
}
else
$row=pg_fetch_row($result);
echo "MObile_no=" . $row[0];
  }
  if($_REQUEST["DELETE"])
  {
	    $NAME=$_REQUEST["name"];
		$MOBILE_NO=$_REQUEST["mobno"];
                 $DOB=$_REQUEST["DOB"];
		 
		$sql =<<<EOF
      DELETE from  PHONE_DIRECTORY where MOBILE_NO='$MOBILE_NO';
EOF;
   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
      exit;
   } else {
      echo "Record deleted successfully\n";
   }
   pg_close($db);
  }
?>
