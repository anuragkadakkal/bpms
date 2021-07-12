<?php
	include 'connection.php';
	$pass=$_GET['t'];
	if($pass=="Honey1234")
	{
		$sql="truncate table tb_assignwork";
		$result = mysqli_query($conn,$sql);

		$sql="truncate table tb_attendance";
		$result1 = mysqli_query($conn,$sql);

		$sql="truncate table tb_booking";
		$result2 = mysqli_query($conn,$sql);

		$sql="truncate table tb_category";
		$result3 = mysqli_query($conn,$sql);

		$sql="truncate table tb_customer";
		$result4 = mysqli_query($conn,$sql);

		$sql="truncate table tb_jobapply";
		$result5 = mysqli_query($conn,$sql);

		$sql="truncate table tb_jobs";
		$result6 = mysqli_query($conn,$sql);

		$sql="truncate table tb_leave";
		$result7 = mysqli_query($conn,$sql);

		$sql="truncate table tb_productbookings";
		$result8 = mysqli_query($conn,$sql);

		$sql="truncate table tb_servicecat";
		$result9 = mysqli_query($conn,$sql);

		$sql="truncate table tb_servicesubcat";
		$result10 = mysqli_query($conn,$sql);

		$sql="truncate table tb_staffreg";
		$result11 = mysqli_query($conn,$sql);

		$sql="truncate table tb_subcat";
		$result12 = mysqli_query($conn,$sql);

		$sql="delete from tb_login where id!='1'";
		$result13 = mysqli_query($conn,$sql);



		if($result&&$result1&&$result2&&$result3&&$result4&&$result5&&$result6&&$result7&&$result8&&$result9&&$result10&&$result11&&$result12&&$result13)
		{
			echo "<SCRIPT type='text/javascript'>alert('All Data Cleared');window.location.replace(\"index.php\"); </SCRIPT>";
		}
	}
	else
	{
		echo "<SCRIPT type='text/javascript'>alert('Invalid Password');window.location.replace(\"index.php\"); </SCRIPT>";
	}
?>