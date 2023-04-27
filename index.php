<!DOCTYPE html>
<html>
<head>
<style src="style.css">	</style>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-container">
		<h1>Login</h1>
		<form id="login-form" action="login.php" method="post">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<button type="submit">Login</button>
		</form>
		<p id="error-message"></p>
	</div>

	<script src="script.js"></script>
</body>
</html>
