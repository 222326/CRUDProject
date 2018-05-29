<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")


    $mysql_host = "localhost";
    $mysql_username = "zachsusee14";
    $mysql_password = "zach0902";
    $mysql_database = "music";
    
    $AlbumName = $_POST["AlbumName"];
    $Artist = $_POST["Artist"];
    $year = $_POST["year"];
    
    
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
    
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}   
	
	$statement = $mysqli->prepare("INSERT INTO Music (Artist, AlbumName, year) VALUES(?, ?, ?)");
	
	$statement->bind_param('sss', $AlbumName, $Artist, $year); 
		if($statement->execute())
			{
				
				echo nl2br($title .' '. 'by'. $Artist .' '. "has been added to the database");
			}
			else{
					print $mysqli->error; 
				}