<h1><center>RECORD OF GRADES</center></h1>
<table border=1 align=center>
<tr>
	<td>Student Number
	<td>Last Name
	<td>First Name
	<td>Middle Name
	<td>Course
	<td>Midterm Grade
	<td>Final Grade
	<td>Total Grade

<?php
	include ("connect.php");

	$search = "SELECT * from kahitano order by lastname asc";
	$result=mysqli_query($con,$search); 
	$total=mysqli_num_rows($result); 

	if ($total==0)
	{
		print "NO RECORDS";
	}

	else 
		{
			while ($rec=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				$studnum=$rec['studnum'];
				$lastname=$rec['lastname'];
				$firstname=$rec['firstname'];
				$middlename=$rec['middlename'];
				$course_id=$rec['course_id'];
				$mgrade=$rec['mgrade'];
				$fgrade=$rec['fgrade'];
				$tgrade=$rec['tgrade'];
				
				print "<tr><td>$studnum<td>$lastname<td>$firstname<td>$middlename<td>$course_id<td>$mgrade<td>$fgrade<td>$tgrade";
			}
			
			print "</table><center>$total TOTAL RECORD/S";	
		}
?>

<p><A href=compute.php>COMPUTE ANOTHER</A>