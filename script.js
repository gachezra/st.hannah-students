const form = document.getElementById('login-form');
const errorMessage = document.getElementById('error-message');

form.addEventListener('submit', (event) => {
	event.preventDefault();

	const username = form.elements.username.value;
	const password = form.elements.password.value;

	// Send a POST request to the login.php script to validate the user's credentials
	const xhr = new XMLHttpRequest();
	xhr.open('POST', 'index.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.onload = () => {
		if (xhr.status === 200) {
			// If the login was successful, redirect to the home page
			window.location.href = 'home.php';
		} else {
			// If the login was unsuccessful, display an error message
			errorMessage.innerText = 'Invalid username or password';
		}
	};
	xhr.send(`username=${username}&password=${password}`);
});
