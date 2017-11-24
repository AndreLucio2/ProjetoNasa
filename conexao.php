<?php
    $servername = "mysql";
    $username = "root";
    $password = "admin";
    $dbname = "mysql";

    try
    {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        foreach($dbh->query('SELECT usuario FROM users') as $row)
        {
            print_r($row);
        }
        $dbh = null;
    }
    catch(PDOException $e)
    {
        die ("Connection failed: " . $e->getMessage());
    }
?>
