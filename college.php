<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css">
	<style>
		div {
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 20px;
		}
	</style>
</head>
<body>
	<div>
		<form action="campus.php" method="POST">
		<input type="text" name="student_id" placeholder="student_id" required>
		<input type="text" name="firstname" placeholder="user firstname"required>
		<input type="text" name="lastname" placeholder="user lastname"  required>
		<input type="text" name="email" placeholder="user email"required>
		<input type="radio" name="gender" value="male" required><b>Male<b>
		<input type="radio" name="gender" value="female"><b>Female</b>
		<input type="text" name="section" placeholder="class section" required>
		<select name="faculty_name" required>
               <option value="" disabled selected hidden style="0.7;">Choose Faculty</option>
				<option value="Agriculture">Agriculture</option>
				<option value="Architecture">Architecture</option>
				<option value="Civil">Civil</option>
				<option value="Computer">Computer</option>
				<option value="Electronics">Electronics</option>
				<option value="Electrical">Electrical</option>
				<option value="Mechanical">Mechanical</option>
		</select>
		<input type="text" name="semester" placeholder="user semester" required>
		<input type="submit" name="submit" value="submit">
		</form>
	</div>
</body>
</html>