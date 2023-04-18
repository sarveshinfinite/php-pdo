<!-- Developed by Sarvesh Raje -->
<?php
    $servername = 'localhost';
    $dbname = 'pdosample';
    $username = 'root';
    $password = '';

    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Initial Check for Database connectivity
        //echo "Connected successfully";
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>