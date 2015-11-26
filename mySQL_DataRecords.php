<?php
    
    #connection string for mySQL use mySQL"i"_connect... takes>> server, db name, psw, usrname
    $connection = mysqli_connect("localhost", "cl56-sampled-qio","rUT^ty^h9","cl56-sampled-qio");
    #use if statment with connection error function to report error
    if(mysqli_connect_error()) {
        ////echo "Connection Error!"; //report connection error on page
        die("Connection Error!"); //better option, will terminate script and report error.
        
    }
    
    #query to get data from the db
    //$query = "SELECT * FROM Users"; SELECT example
    #insert into example
    //$query = "INSERT INTO Users (UserName, Password, EMail) VALUES ('Yash','veer','Yash@domain.com')";
    #update example
    //$query = "UPDATE Users SET Password = 'KHA123',EMail = 'lad5@domain.com', JoinDate = '2015-11-18'           //WHERE ID = 5";

    #mysql1_query function take two pram (connection and query) and will return true if qry was sucessful, 
    mysqli_query($connection, $query);

    $query = "SELECT * FROM Users";

    if ($results = mysqli_query($connection, $query)) {
        #to get results from mssqli_query, need to pass it to mysqli_fetch_array
        //mysqli_fetch_array($restults);
        #we assign it to array to get the actual value, $row in this example
        //$row = mysqli_fetch_array($results);
        //print_r ($row); //print_r is used to display arrays
        #print_r will only report first array. adding while loop to loop through the vaues
        
        while($row = mysqli_fetch_array($results)) {
            
            print_r($row);
            
        }
        
        //echo $results;
        
    } else {
        
        echo "qry failed";
    }


?>