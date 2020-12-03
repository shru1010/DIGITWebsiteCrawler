function validation(){
  var id=document.F.username.value;
  var ps=document.F.password.value;
  var em=document.F.email_id.value;
  if( id.length == 0 || ps.length == 0 || em.length == 0){
    alert("Please fill all the details!");
    return false;
  }
  return true;
}
function pass(){
	var x = document.getElementById("password");
  if (x.type === "password") {
  	x.type = "text";
  } else {
  	x.type = "password";
  }
}
