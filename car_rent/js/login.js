var form = document.getElementById("form");

form.onchange = function()
{
	var login = document.getElementById("login");
	var password = document.getElementById("password");
	
	
	
	var loginMessage = document.getElementById("login_message");
	var passwordMessage = document.getElementById("password_message");
}




login.onchange = function()
{
	var loginValue = login.value;
	if (loginValue === "") {
		loginMessage.innerHTML = "Поле является обязательным для заполнения";
	}
};

password.onchange = function()
{
	var passwordnValue = password.value;
	if (passwordValue === "") {
		passwordMessage.innerHTML = "Поле является обязательным для заполнения";
	}
};