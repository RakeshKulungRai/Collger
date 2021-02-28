<style>
	div:hover
	{
		opacity:0.5;
	}
</style>
<div style="width:120px;height:auto;background-color:#4CAF50;text-align:center;margin:2px 2px;">
	<a href="home.php" style="color:white;text-decoration: none;padding: 2px 2px;"><h3>HOME</h3></a>
</div>
<?php
$con=mysqli_connect("localhost","root","","student");
if($con)
{
	if(isset($_POST['submit']))
	{
			$student_id=$_POST['student_id'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$email=$_POST['email'];
			$gender=$_POST['gender'];
			$faculty_name=$_POST['faculty_name'];
			$section=$_POST['section'];
			$semester=$_POST['semester'];
		$sql="SELECT * from information where student_id='$student_id'";
		$result=mysqli_query($con,$sql);
		if($result->num_rows>0)
			 {
			   echo "student_id is already exist";
			 }
		else
		{
				$sql="INSERT INTO information(student_id,firstname
				,lastname,gender,email) VALUES('$student_id','$firstname','$lastname','$gender','$email')";
				mysqli_query($con,$sql);
				$sql2="SELECT faculty_id FROM faculty where faculty_name='$faculty_name'";
				$faculty_name2=mysqli_fetch_assoc(mysqli_query($con,$sql2));
				$faculty_id=$faculty_name2['faculty_id'];
				 $sql3="INSERT INTO course VALUES('$student_id','$faculty_id','$section','$semester')";
				 mysqli_query($con,$sql3);
				 echo "insert successiful";
		}

	}
	else if(isset($_POST['update']))
	{
		$student_id=$_POST['student_id'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$faculty_name=$_POST['faculty_name'];
		$section=$_POST['section'];
		$semester=$_POST['semester'];
		$sql2="SELECT faculty_id FROM faculty where faculty_name='$faculty_name'";
		$faculty_name2=mysqli_fetch_assoc(mysqli_query($con,$sql2));
		$faculty_id=$faculty_name2['faculty_id'];
		$sql="UPDATE course SET faculty_id='$faculty_id',section='$section',semester='$semester' WHERE student_id='$student_id'";
		mysqli_query($con,$sql);
		$sql="UPDATE information SET firstname='$firstname',lastname='$lastname',email='$email',gender='$gender' WHERE student_id='$student_id'";
		mysqli_query($con,$sql);
		echo "update successiful";

	}
	else if(isset($_POST['delete']))
	{
		$student_id=$_POST['student_id'];
		    $sql="SELECT * from information where student_id='$student_id'";
		    $result=mysqli_query($con,$sql);
		    if($result->num_rows>0)
			 {
			     $sql="DELETE fROM course WHERE student_id='$student_id'";
				 $result=mysqli_query($con,$sql);
				 $sql="DELETE fROM information  WHERE student_id='$student_id'";
				 $result=mysqli_query($con,$sql);
			     echo "delete successfully";

		    }
			
		else
		{
			echo " student_id not exists!!";
		}

	}
	elseif (isset($_POST['edit'])) 
	{
            $student_id=$_POST['student_id'];
            $sql="SELECT * from information where student_id='$student_id'";
		    $result=mysqli_query($con,$sql);
		    if($result->num_rows>0)
			 {
                   
		           $sql="SELECT * from information NATURAL JOIN course NATURAL JOIN faculty where student_id='$student_id'";
		            $result=mysqli_fetch_assoc(mysqli_query($con,$sql));
?>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		label
		{
			 font-weight: bold;
		}
	</style>
</head>

<form action="campus.php" method="POST">
	     <label for="fname">First Name</label>
		<input type="text" name="student_id" value="<?php  echo $result['student_id']  ?>"readonly="readonly">
		<label for="fname">First Name</label>
		<input type="text" name="firstname" value="<?php echo $result['firstname']  ?>"required>
		<label for="lastname">Last Name</label>
		<input type="text" name="lastname" value="<?php  echo $result['lastname']  ?>"required>
		<label for="email">Email Address</label>
		<input type="text" name="email" value="<?php echo $result['email']  ?>"required>
		<label for="gender">Gender</label>
		<br>
		<input type="radio" name="gender" value="male" required>Male
		<input type="radio" name="gender" value="female">Female<br>
		<label for="section">Section</label>
		<input type="text" name="section" value="<?php echo $result['section'] ?>" required>
		<label for="faculty_name">Faculty Name</label>
		<select name="faculty_name" required>
               <option value="<?php echo $result['faculty_name'] ?> "></option>
				<option value="Agriculture"></option>
				<option value="Architecture">Architecture</option>
				<option value="Civil">Civil</option>
				<option value="Computer">Computer</option>
				<option value="Electronics">Electronics</option>
				<option value="Electrical">Electrical</option>
				<option value="Mechanical">Mechanical</option>
	</select>
	<label for="semester">Semester</label>
	<input type="text" name="semester" value="<?php echo $result['semester']  ?>" required>
	<input type="submit" name="update" value="update">
	<?php
}
	else
		{
			echo " student_id not exists!!";
		}
}
}
?>
<link rel="stylesheet" type="text/css" href="home.php">
<div> <a href="home.php"> Home</a></div>
