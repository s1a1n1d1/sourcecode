
<div class="col-md-4 col-md-offset-4" style="margin-top:55px;">
		<form class="form-horizontal" method="post">
	

		<a href="view1.php "><span class="glyphicon glyphicon-search" style="margin-left:50px; aria-hidden="true" ></span></a>
		
		
		
		
			<label><h3>View  </h3></label>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="form-group">
				<label for="inputDistrict" class="col-sm-2 control-label"><b>category</b></label>
			<div class="col-sm-10">
				<select  class="form-control" name="cat" required>
				<option value="">--SELECT--</option>
				<option value="ALAPPUZHA">woman</option>
				<option value="ERNAKULAM">man</option>
				
				</select>
			</div>
			</div>
			
			
			<div class="form-group">
		<div class="col-sm-20">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success" name="btnsubmit">SUBMIT</button>
			</div>
			</div>
			</div>


















</form>
		</div>
<div class="clearfix">...</div>

<?php
if(isset($_POST["btnsubmit"]))
{
include("dbcon.php");

$cat=$_POST["cat"];







/*$sql="SELECT * FROM `avail_things_reg` WHERE district='$dist'";
echo $sql;
mysqli_query($conn,$sql);*/



function get_all_results($cat){
include("dbcon.php");
	$a=0;
	$typ=array();
	$sql="SELECT * FROM `product` WHERE cat='$cat' ";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$typ[$a]=array();
		$typ[$a]['id']=stripslashes($row['id']);
		$typ[$a]['name']=stripslashes($row['name']);
		$typ[$a]['phone']=stripslashes($row['phone']);
		$typ[$a]['price']=stripslashes($row['price']);
		$typ[$a]['chk']=stripslashes($row['chk']);
		
		$typ[$a]['img']=stripslashes($row['img']);
		
		
		
		
	$a++;
	}
	return $typ;
	
	}
	$pgs=get_all_results($cat);
	$pCnt=count($pgs);
 ?>

<div class="table-responsive col-md-12">
  <table class="table table-striped table-bordered" cellspacing="0" width="100%">
   
   
   <thead>
      <tr>
        
       
		<th>Name</th>
        <th>phone</th>
		  <th>price</th>
		
		<th>chk</th>
		<th>img</th>
		
		
		
      </tr>
    </thead>   
    <tbody>
   <?php  for($a=0;$a<$pCnt;$a++){?>
      <tr>
      
		<td class="center"><?php echo $pgs[$a]['name']; ?></td>
		<td class="center"><?php echo $pgs[$a]['phone']; ?></td>
		<td class="center"><?php echo $pgs[$a]['price']; ?></td>
		<td class="center"><?php echo $pgs[$a]['chk']; ?></td>
		
		
		<td class="center"><img src="<?php echo $pgs[$a]['img']; ?>" width="50px"/></td>
		
		
      <?php }?>
	</tbody>
   
  </table>
</div>	
<?php

}

?>

