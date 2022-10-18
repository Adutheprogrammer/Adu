<h1><center>Computation of Grades</center></h1>
<body background-image: linear-gradient( 135deg, #FFF6B7 10%, #F6416C 100%);>
<table border=1 align=center>
<form action=compute.php method=post>
<tr>
	<td>Student Number
	<td><input type=text name=studnum required>
<tr>
	<td>Last Name
	<td><input type=text name=lastname required>

<tr>
	<td>First Name
	<td><input type=text name=firstname required>
<tr>
	<td>Middle Name
	<td><input type=text name=middlename required>
<tr>
	<td>Course
	<td><input type=text name=course_id required>
<tr>
	<td>Midterm Grade
	<td><input type=number name=mgrade required>
<tr>
	<td>Final Grade
	<td><input type=number name=fgrade required>
<tr>
	<td><input type=submit name=submit value=compute>
	<td><input type=reset name=reset value=clear>
	</form>
</table>
</body>
<?php
if (isset($_POST['submit'])) 
{
	$studnum=$_POST['studnum'];
	$lastname=$_POST['lastname'];
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$course_id=$_POST['course_id'];
	$mgrade=$_POST['mgrade'];
	$fgrade=$_POST['fgrade'];
	$tgrade=($mgrade + $fgrade)/2;

	include ("connect.php");

	$search = "SELECT * from kahitano where (studnum='$studnum')";

	$result=mysqli_query($con,$search);
	$total=mysqli_num_rows($result); 	
	
	if ($total==0) 
	{
		$insert = "insert into kahitano values ('$studnum','$lastname','$firstname','$middlename','$course_id',$mgrade,$fgrade,$tgrade)";

		mysqli_query($con,$insert);
		print "<center><font color=violet><b>RECORD SAVED!</b></font></center>";
	}
	else 
		print "<center><font color=pink><b>$studnum IS ALREADY EXIST!</b></font></center>";	

}
print "<p><center><a href = display.php>DISPLAY ALL RECORDS</a></center>";
?>