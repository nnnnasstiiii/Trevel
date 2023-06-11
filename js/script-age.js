let age = document.getElementById('age');
function showUser(surname, name) {
	alert("User " + surname + " " + name + ", age " + this.value);
}
showUser.apply(age, '[Last name, First name]');