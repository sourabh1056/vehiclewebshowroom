<?php
session_start();
if(!isset($_SESSION[loginid]))
{
	header("Location: login.php");
}
include("header.php"); //Developed by Students
include("dbconnection.php");
?>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        <?php
		include("menusidebar.php");
		?>
        </div>
        
        <div id="content" class="float_r">
        	<h1>My Account</h1>

        <div class="cleaner"></div>
<div class="cleaner"></div>
<blockquote>
<?php         
$sql1 = "SELECT * FROM  `customer`  where custid='$_SESSION[loginid]'";
$seleditquery1 = mysqli_query($con,$sql1);
$rseditfetch1 = mysqli_fetch_array($seleditquery1);
echo "Welcome ".$rseditfetch1[fname] .  " " . $rseditfetch1[lname];
?>
</blockquote>   
<div class="cleaner"></div>
 <blockquote> <strong>Last Login Date and Time:</strong> <?php echo $_SESSION[lastlogin]; ?></blockquote>
    <div class="cleaner"></div>    
<blockquote>
<strong>Account details:</strong> <br>
<?php         
$sql2 = "SELECT * FROM  `customer`  where custid='$_SESSION[loginid]'";
$seleditquery2 = mysqli_query($con,$sql2);
$rseditfetch2 = mysqli_fetch_array($seleditquery2);
echo "Name:  ".$rseditfetch2[fname] .  " " . $rseditfetch2[lname]. "<br><br>";
echo "<strong>Contact details:</strong><br> Address:  ".$rseditfetch2[address] ;
echo "<br>City -  ". $rseditfetch2[city]. "<br>";
echo "State - ". $rseditfetch2[state]. "<br>";
echo "Country -  ". $rseditfetch2[country]. "<br>";
echo "PIN Code -  ". $rseditfetch2[pincode]. "<br>";
echo "<br><strong>Contact No.:</strong>  ". $rseditfetch2[contactno]. "<br><br>";
echo "<strong>Email ID.: </strong> ". $rseditfetch2[emailid]. "<br>";

?>
</blockquote>       
        
                <div class="cleaner"></div>
        <blockquote> No. of vehicles booked :
<?php         
$sql = "SELECT * FROM sales where custid='$_SESSION[loginid]'";
$seleditquery = mysqli_query($con,$sql);
$rseditfetch = mysqli_fetch_array($seleditquery);
echo mysqli_num_rows($seleditquery);
?>
        </blockquote>

        </div> 
        <div class="cleaner"></div>


<!-- Existing code for account details -->

<blockquote>
    <strong>Test Drive Requests:</strong> <br>
    <?php
    $sql3 = "SELECT * FROM  `test_drive_request`  where custid='$_SESSION[loginid]'";
    $seleditquery3 = mysqli_query($con, $sql3);
    if (mysqli_num_rows($seleditquery3) > 0) {
        while ($rseditfetch3 = mysqli_fetch_array($seleditquery3)) {
            echo "Vehicle ID: " . $rseditfetch3['vehicle_id'] . "<br>";
            echo "Name: " . $rseditfetch3['name'] . "<br>";
            echo "Email: " . $rseditfetch3['email'] . "<br>";
            echo "Phone: " . $rseditfetch3['phone'] . "<br>";
            echo "Preferred Date: " . $rseditfetch3['preferred_date'] . "<br>";
            echo "Preferred Time: " . $rseditfetch3['preferred_time'] . "<br>";
            echo "Message: " . $rseditfetch3['message'] . "<br>";
            echo "Status: " . $rseditfetch3['status'] . "<br><br>";
        }
    } else {
        echo "No test drive requests found.";
    }
    ?>
</blockquote>







    </div> <!-- END of templatemo_main -->
    
   <?php
include("footer.php");
?>