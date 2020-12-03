function validation(){
	var id=document.F.usr.value;
	var ps=document.F.pwd.value;
	if( id.length == 0 || ps.length == 0){
		alert("Fill all the required details!");
		return false;
	}
	return true;
}
function pass(){
	var x = document.getElementById("pwd");
  if (x.type === "password") {
  	x.type = "text";
  } else {
  	x.type = "password";
  }
}
