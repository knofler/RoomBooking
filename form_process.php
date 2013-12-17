<html>
    <head>
        <link href="main.css" rel="stylesheet" type="text/css" />
    </head>
<body>
<?php

session_start();
require_once('connect.php');

//Variable defined for HTML Input forms to pass user input to php
                    
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $oneid=$_POST['oneid'];
    $email=$_POST['email'];
    $computername=$_POST['computername'];
    $bookingdate=$_POST['bookingdate'];
    $bookingstart=$_POST['bookstarttime'];
    $bookingend=$_POST['bookendtime'];
    $todo=$_POST['todo'];
    $startBooking= strtotime("09:00:00");
    $endBooking= strtotime("22:00:00");
    //$duration=$_POST['duration'];
    //$bookingend=$bookintime+strtotime(date('H:i:s'))+strtotime($mysql_time);
                    
    //$time = "00:06:58";
    //$time2 = "40 minutes";
    //$timestamp = strtotime($bookingtime." +".$duration);
    //$endTime = date("d.m.Y H:i:s", $timestamp);                

                    
//Variable defined for database table names
                    
    $dbt_booking="booking";
    
//MYSQL connect script
                    
    mysql_connect($dbhost,$dbuser,$dbpass) or die("Could not connect to host");
    
    //MYSQL database connect
    
    mysql_select_db("$dbname") or die ("Could not connect to database  $dbname");

    
    
    //FORM DATA VALIDITY CONDITIONS
    
    if(isset($todo) and $todo=="post"){
        $status="OK";
        $msg="";
        
    //CHECK FIRST NAME FIELD    
        
        if (!isset($firstname) or strlen($firstname)<2)
        {
            $msg=$msg."Please provide your first name";
            $status="NOTOK";
            if ($status<>"OK")
            {
                echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
            }
        }
        
        //CHECK VALID ONE ID
        
        elseif (!isset($oneid) or strlen($oneid) <8)
        {
            
            $msg=$msg."please provide a valid one ID";
            $status="NOTOK";
            if ($status <> "OK")
            {
                echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
            }
            
        }
        
        //CHECK BOOKING DATE IS NOT BEFORE TODAY
        
        elseif ($bookingdate <date("Y-m-d"))
        //(mysql_query("SELECT Booking_day FROM $dbt_booking where Booking_day = '$bookingdate'") <= date("Y-m-d"))
        {
            $msg=$msg."You can not book a lab computer earlier then today";
            $status="NOTOK";
           if ($status <> "OK")
            {
                echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
            }
        }
        
        //CHECK BOOKING TIME IS NOT BEFORE NOW
        
        elseif ($bookingdate==date("Y-m-d") and strftime($bookingstart) < date('H:i:s'))
        //(mysql_query("SELECT Booking_day FROM $dbt_booking where Booking_day = '$bookingdate'") <= date("Y-m-d"))
        {
            $msg=$msg."You can not book a meeting earlier then now,Can You? its not a liner time you can go any direction";
            $status="NOTOK";
           if ($status <> "OK")
            {
                echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
            }
        }
        
        
        //CHECK IF BOOKING END TIME IS NOT EARLIER THEN BOOKING START TIME
        
        elseif(strtotime($bookingend)<strtotime($bookingstart))
        {
         $msg=$msg."end time can not be earlier then start time";
         $status="NOTOK";
         if ($status <> "OK")
            {
                echo "<font face='Verdana' size='2' color=red> $msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
            }
        }
        
        
        //CHECK BBOKING START TIME IS BETWEEN CERTAIN HOURS OF THE DAY
        
         elseif(strtotime($bookingstart)<$startBooking or strtotime($bookingstart) > $endBooking)
        {
         $msg=$msg."This is out side the booking Acceptance area.Please chose between 9-6 Pm weekdays";
         $status="NOTOK";
         if ($status <> "OK")
            {
                echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
            }
        }
        
        
        //CHECK BBOKING END TIME IS BETWEEN CERTAIN HOURS OF THE DAY
        
           elseif(strtotime($bookingend)<$startBooking or strtotime($bookingend) > $endBooking)
        {
         $msg=$msg."This is out side the booking Acceptance area.Please chose between 9-6 Pm weekdays";
         $status="NOTOK";
         if ($status <> "OK")
            {
                echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
            }
        }
        
        
        //CHECK IF THE BOOKING ALREADY EXISTS
        
        elseif (mysql_num_rows(mysql_query("SELECT * from $dbt_booking where Booking_day='$bookingdate' and Computer_name='$computername' and Booking_start='$bookingstart'")))
        {
            $msg=$msg."This slot is already booked,Please try another time slot.";
            $status="NOTOK";
            if ($status <> "OK")
            {
                echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
            }
        }
        
        else
        {
            

     //INSERT DATA TO VARIOUS TABLE
                    
    $sql_query_insert_booking="INSERT INTO $dbt_booking VALUES ('$firstname','$lastname','$oneid','$email','$computername','$bookingdate','$bookingstart','$bookingend')";
    
    //RUN SQL INSERT QUERY
    
    $sql_result_booking=mysql_query($sql_query_insert_booking);
    
    mysql_close();
        }
     }
?>

<p>PHP passed</p>
                
</body>
</html>