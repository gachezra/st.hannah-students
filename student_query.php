<!DOCTYPE html>
<html>
<head>
	<title>Student Records</title>
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		input[type=text] {
			padding: 6px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 10px;
			margin-bottom: 10px;
		}
        button {
			background-color: #f44336;
			color: white;
			border: none;
			padding: 8px 16px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 14px;
			margin: 4px 2px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h2>Student Records</h2>
	<form method="POST" action="">
		<label for="stream">Select Stream:</label>
		<input type="text" name="stream" placeholder="Search...">
		<input type="submit" name="submit" value="Search">
	</form>
	<table>
		<thead>
			<tr>
				<th>Student Name</th>
				<th>Stream</th>
				<th>Marks</th>
			</tr>
		</thead>
		<tbody>
			<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "st_hanahs_db";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
			if(isset($_POST['submit'])) {
				$stream = $_POST['stream'];
				$search = $_POST['search'];
				$sql = "SELECT * FROM student_records WHERE student_stream LIKE '%$stream%' AND student_name LIKE '%$search%'";
			} else {
				$sql = "SELECT * FROM student_records";
			}
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row['student_name'] . "</td>";
					echo "<td>" . $row['student_stream'] . "</td>";
					echo "<td>" . $row['student_marks'] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='4'>No records found.</td></tr>";
			}
			?>
		</tbody>
	</table>
    <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="students.php">View Students</a></li>
        </ul>
      </nav>
</body>
</html>
