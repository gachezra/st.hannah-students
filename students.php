<!DOCTYPE html>
<html>
<head>
	<title>Student Details</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
			color: #333;
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
	<h1>Student Details</h1>
	<table>
		<thead>
			<tr>
				<th>Student Name</th>
				<th>Student Stream</th>
				<th>Student Marks</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Establish database connection
				$host = "localhost";
				$username = "root";
				$password = "";
				$database = "st_hanahs_db";

				$conn = mysqli_connect($host, $username, $password, $database);

				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				// Retrieve records from database
				$sql = "SELECT * FROM student_records";
				$result = mysqli_query($conn, $sql);

				// Display records in HTML table
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['student_name'] . "</td>";
						echo "<td>" . $row['student_stream'] . "</td>";
						echo "<td>" . $row['student_marks'] . "</td>";
						echo "<td><button onclick=\"deleteRecord(" . $row['id'] . ")\">Delete</button></td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='4'>No records found</td></tr>";
				}

				// Close database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
<nav>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="student_query.php">Streams</a></li>
      <li><a href="register.php">Register Students</a></li>
    </ul>
</nav>
	<script>
		function deleteRecord(id) {
			if (confirm("Are you sure you want to delete this record?")) {
				// Send request to server to delete record
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "delete_record.php", true);
				xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhr.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						// Reload page after record has been deleted
						window.location.reload();
					}
				};
				xhr.send("id=" + id);
			}
		}
	</script>
</body>
</html>
