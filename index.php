<!DOCTYPE html>

<html>
    <head>
        <title>FBE Online Room Booking System</title>
        <link type="text/css" rel="stylesheet" href="main.css"/>
        <script src="validate.js"></script>
    </head>

    <body>
        
        <?php include 'header.php';?>
        
       <!-- <header>
            <table>
                <tr class="hdtr" id="tr1">
                    <td class="hdtd" id="td1"></td>
                    <td class="hdtd" id="td2"></td>
                    <td class="hdtd" id="td1"></td>
                </tr>
            </table>
        </header>-->
        
        <div class="status" id="stat1">
            <table>
                <tr class="sttr" id="tr1">
                    <td class="sttd" id="td1"></td>
                </tr>
            </table>
        </div>
        
        <div class="cntent" id="booking">
            
            <form  class="form" id="form1" name="bookingform" action="form_process.php" method="post" onsubmit='return validate(this)'>
                <input name="todo" type="hidden" value="post" class="todo" />
                
                <table class="rego" id="regtable">
                    <tr class="regotr" id="tr1">
                        <td class="regotd" id="td1"> First Name <input name="fname" type="text" class="user" id="fname"/></td>
                    </tr>
                    <tr class="regotr" id="tr1">
                        <td class="regotd" id="td1"> Last Name <input name="lname" type="text" class="user" id="lname"/></td>
                    </tr>
                    <tr class="regotr" id="tr1">
                        <td class="regotd" id="td1"> OneID <input name="oneid" type="text" class="user" id="oneid"/></td>
                    <tr class="regotr" id="tr2">
                        <td class="regotd" id="td2"> Email <input name="email" type="text" class="user" id="email"/></td>    
                    </tr>    
                </table>
                
                <table class="booking" id="booktable">
                    <tr class="booktr" id="tr1">
                        <td class="booktd" id="td1">Booking Date<input name="bookingdate" type="date" class="textfiled" id="bookdate"></td>
                    </tr>
                    <tr class="booktr" id="tr1">
                        <td class="booktd" id="td1">Start Time<input name="bookstarttime" type="time" class="textfiled" id="bookstart"></td>
                        <td class="booktd" id="td2">End Time<input name="bookendtime" type="time" class="textfiled" id="bookend"></td>
                    </tr>
                    <tr class="booktr" id="tr2">
                        <td class="booktd" id="td3">Computer Name
                            <select name="computername" type="text" class="textfied" id="pcname">
                                <option>pc1</option>
                                <option>pc2</option>
                                <option>pc3</option>
                            </select>
                        </td>
                        <td class="booktd" id="td3">Room Number
                            <select name="roomnumber" type="text" class="textfied" id="rno1">
                                <option>Room 101</option>
                                <option>Room 102</option>
                                <option>Room 103</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="booktr" id="tr3">
                        <td class="booktd" id="td4"> I agree to terms and condition <input type="checkbox" name="agree" value="yes" /></td>
                    </tr>
                    <tr>
                        <td class="booktd" id="td4"> Book Now <input type="submit" value="Book Room" class="submit" id="bookroom"/></td>
                    </tr>
                </table>
                
            </form>
            
        </div>
        
        <?php include 'footer.php';?>
        
        
        <!--<div class="footerBottom" id="fb1"></div>
        
        <div class="b4footer" id="b4f1">
            <table>
                <tr class="b4ftr" id="tr1">
                    <td class="b4ftd" id="td1"></td>
                    <td class="b4ftd" id="td2"></td>
                    <td class="b4ftd" id="td1"></td>
                </tr>
                <tr class="b4ftr" id="tr2">
                    <td class="b4ftd" id="td1"></td>
                    <td class="b4ftd" id="td2"></td></td>
                </tr>
            </table>
        </div>
        
        <footer>
            <table>
                <tr class="fttr" id="tr1">
                    <td class="fttd" id="td1"></td>
                    <td class="fttd" id="td2"></td>
                    <td class="fttd" id="td1"></td>
                </tr>
            </table>
        </footer>-->
        
    </body>
</html>
