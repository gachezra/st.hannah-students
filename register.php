<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}
		input[type=text], input[type=number] {
			padding: 10px;
			margin: 10px;
			width: 250px;
			border-radius: 5px;
			border: none;
			border: 2px solid #ccc;
		}
		button[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			margin: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 250px;
		}
	</style>
	<script>
		function validateForm() {
			var name = document.forms["registration"]["name"].value;
			var stream = document.forms["registration"]["stream"].value;
			var marks = document.forms["registration"]["marks"].value;
			if (name == "" || stream == "" || marks == "") {
				alert("Please fill in all fields");
				return false;
			}
			if (!/^[a-zA-Z\s]+$/.test(name)) {
				alert("Please enter a valid name");
				return false;
			}
			if (!/^[a-zA-Z]+$/.test(stream)) {
				alert("Please enter a valid stream");
				return false;
			}
			if (isNaN(marks) || marks < 0 || marks > 500) {
				alert("Please enter a valid marks (0-500)");
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
<header>
      <h1>St. Hannah's School</h1>
  </header>
	<form name="registration" onsubmit="return validateForm()" action="insert_record.php" method="post">
		<input type="text" name="name" placeholder="Student Name">
		<input type="text" name="stream" placeholder="Stream">
		<input type="number" name="marks" placeholder="Marks">
		<button type="submit">Register</button>
	</form>
      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="students.php">View Students</a></li>
        </ul>
      </nav>
  </body>
</html>
