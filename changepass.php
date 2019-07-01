
   <div class="col-md-4 col-md-offset-4" style="margin-top:55px;">
   
  
		<form class="form-horizontal" method="post">
		
   <div class="form-group">
		<label  class="col-sm-10 control-label"><h3><b>Change Password</b><h3></label>
				
		
			</div>
			
			
	<div class="form-group">
				<label for="inputPhoneNo" class="col-sm-2 control-label">Old Password</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="txtoldpas" id="inputEmail3" placeholder="old password" required>
			
			</div>
			
			</div>		
			
			
			
			
	<div class="form-group">
				<label for="inputPhoneNo" class="col-sm-2 control-label">New Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="txtnewpas" placeholder="new password" id="password" required>
				
			</div>
			
			</div>
			
			
	<div class="form-group">
				<label for="inputPhoneNo" class="col-sm-2 control-label">Confirm Password</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="txtconfpass"  placeholder="confirm password" id="confirm_password" required>
				
			</div>
			
			</div>		
			
	
	
   
    <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="btnSubmit" class="btn btn-success">SUBMIT</button>
			</div>
			</div>
   
   
   
   
   
   
   
   
    </div>
   
       </form>
   
 

<script>

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>


   
   <?php
if(isset($_POST["btnSubmit"]))
{

//include("Login_Villageofficer.php");

$unme=$_SESSION['login_user'];

$oldpassword=$_POST["txtoldpas"];
$newpassword=$_POST["txtnewpas"];
$confirmpassword=$_POST["txtconfpass"];
$uname=$_SESSION["login_user"];

$qry="select * from `admin` where `username`='$uname'";
echo $qry;
$result = mysqli_query($db,$qry);
$row = mysqli_fetch_assoc($result);
$oldpass= $row['passcode'];

if($oldpass==$oldpassword)
{
		$sql="UPDATE `admin` set `passcode`='$newpassword'  WHERE `username`='$unme'" ;
		echo $sql;
		if ($db->query($sql) === TRUE) 
		{
			echo "Updated successfully";
		}
		else 
		{
			echo "Error: " . $sql . "<br>" . $db->error;
		}	
}
else
{
	echo "old password is wrong";
	
}
$db->close();
}
?>