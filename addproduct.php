

<html>
   
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   
   <body> 
      <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $genderErr = $websiteErr = "";
         $name = $email = $gender = $class = $course = $subject = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["course"])) {
               $course = "";
            }else {
               $course = test_input($_POST["course"]);
            }
            
            if (empty($_POST["class"])) {
               $class = "";
            }else {
               $class = test_input($_POST["class"]);
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
               $gender = test_input($_POST["gender"]);
            }
            
            if (empty($_POST["subject"])) {
               $subjectErr = "You must select 1 or more";
            }else {
               $subject = $_POST["subject"];	
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
		
      <h2>Absolute classes registration</h2>
      
      <p><span class = "error">* required field.</span></p>
      
      <form method = "POST">
         <table>
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>E-mail: </td>
               <td><input type = "text" name = "email">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Time:</td>
               <td> <input type = "text" name = "course">
                  <span class = "error"><?php echo $websiteErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Classes:</td>
               <td> <textarea name = "class" rows = "5" cols = "40"></textarea></td>
            </tr>
            
            <tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
                  <span class = "error">* <?php echo $genderErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Select:</td>
               <td>
                  <select name = "subject" >
                     <option value = "Android">Android</option>
                     <option value = "Java">Java</option>
                     <option value = "C#">C#</option>
                     <option value = "Data Base">Data Base</option>
                     <option value = "Hadoop">Hadoop</option>
                     <option value = "VB script">VB script</option>
                  </select>
               </td>
            </tr>
            
            <tr>
               <input type="checkbox" name="Days[]" value="Daily">Daily<br>
				<input type="checkbox" name="Days[]" value="Sunday">Sunday<br>
				<input type="checkbox" name="Days[]" value="Monday">Monday<br>
				<input type="checkbox" name="Days[]" value="Tuesday">Tuesday <br>
				<input type="checkbox" name="Days[]" value="Wednesday">Wednesday<br>
            </tr>
            
			<tr>
			
			Date: <input type="Text" id="date" maxlength="25" size="25" name="datepick"><a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Date"></a>
			
			
			
			
			
			
			<tr>
			
			
			
            <tr>
               <td>
                  <input type = "submit" name = "btnSubmit" value = "Submit"> 
               </td>
            </tr>
            
         </table>
      </form>
      
      
      
   </body>




<?php
if(isset($_POST["btnSubmit"]))
{
include("config.php");

$name=$_POST["name"];
$email=$_POST["email"];
$course=$_POST["course"];
$class=$_POST["class"];
$gender=$_POST["gender"];
$subject=$_POST["subject"];
$chk=implode(',', $_POST['Days']);



$sql="INSERT INTO `product`(`name`, `email`,  `course`, `class`, `gender`,`subject`,`chk`) VALUES ('$name','$email','$course','$class','$gender','$course','" . $chk . "')";
echo" success";
mysqli_query($db,$sql);
header('Location: panel.php');
}
?>
</html>