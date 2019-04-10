<?php 
// PHP Data Objects(PDO) Sample Code:
$host = "anggitserver.database.windows.net";
$user = "anggit";
$pass = "helena12345?";
$db = "db_anggit";

try {
    // $conn = new PDO("sqlsrv:server = tcp:anggitserver.database.windows.net,1433; Database = db_anggit", "anggit", "helena12345?");
    $conn = new PDO("sqlsrv:server = $host; Database = $db", "$user", "$pass");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>