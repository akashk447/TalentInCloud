<?php
require_once'../includes/connect.php';
require_once'../includes/sessionvalue.php';

 		
 if(isset($_POST["btnsave"]))
	 {
	 	$hidid=trim($_POST['hideditid']);
	 	$eid=base64_encode($hidid);
		$passids=$randomstring.$eid;
		$txtlocation=trim($_POST['txtlocation']);
		
if($hidid!='')
{
		$result = $conn->query("select * from tbl_location where locname='$txtlocation' and loc_id!='$hidid'");
		if ($result->num_rows > 0) 
		{
			echo "<script>document.location.href='../addlocation.php?msg=1'</script>";
			exit();
		}
		else
		{
		
			$updates ="update tbl_location set locname='$txtlocation' where loc_id='$hidid'";
			if ($conn->query($updates) === TRUE)
			{			 
				echo "<script>document.location.href='../managelocation.php?msg=2&edit=$passids'</script>";
				exit();
			}
			else
			{
				echo "<script>document.location.href='../managelocation.php?msg=3'</script>";
				exit();
			}
		}
}
else
{
	 	$result = $conn->query("select * from tbl_location where locname='$txtlocation'");
		if ($result->num_rows > 0) 
		{
			echo "<script>document.location.href='../managelocation.php?msg=4'</script>";
			exit();
		}
		else
		{
		$insert ="INSERT INTO tbl_location(locname)VALUES('$txtlocation')";
		
			if ($conn->query($insert) === TRUE)
			{
				echo "<script>document.location.href='../managelocation.php?msg=5'</script>";
				exit();
			}
			else
			{
				echo "<script>document.location.href='../managelocation.php?msg=6'</script>";
				exit();
			}
		}
}
}
?>
