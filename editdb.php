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
	$sql="SELECT * FROM information NATURAL JOIN course NATURAL JOIN faculty ORDER BY firstname asc";
	$result=mysqli_query($con,$sql);
	
	 ?>
	 <head>
	 	<style>
			#student {
			  font-family: Arial, Helvetica, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			#student td, #student th {
			  border: 1px solid #ddd;
			  padding: 8px;
			}

			#student tr:nth-child(even){background-color: #f2f2f2;}

			#student tr:hover {background-color: #ddd;}

			#student th {
			  padding-top: 12px;
			  padding-bottom: 12px;
			  text-align: left;
			  background-color: #4CAF50;
			  color: white;
			}
         </style>
	 </head>
	 <table id="student">
	 	<tr>
	 		<th>student_id</th>
	 		<th>firstname</th>
	 		<th> lastname</th>
	 		<th>email</th>
	 		<th>gender</th>
	 		<th>faculty_name</th>
	 		<th>semester</th>
	 	</tr>
	 	<?php
while($result1=mysqli_fetch_assoc($result)) 
	 {
	 	 ?>
	 	
	 		<tr>
	 			<td><?php  echo $result1['student_id']  ?></td>
	 			<td><?php echo $result1['firstname']  ?></td>
	 			<td><?php  echo $result1['lastname']  ?></td>
	 			<td><?php echo $result1['email']  ?></td>
	 			<td><?php echo $result1['gender'] ?></td>
	 			<td><?php echo $result1['faculty_name'] ?></td>
	 			<td><?php echo $result1['semester']  ?></td>
	 		</tr>
	 	
	 	<?php 
	 }
?></table>