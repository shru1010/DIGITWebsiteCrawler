var d = ['obj', 'p_info', 'f_info', 'ed_info', 'exp', 'ach', 'other'];

function disp(id){
//Displays different text and image for corresponding hyperlink.

    for(var i=0;i<7;i++){
        if(d[i]==id){
	        document.getElementById(id).style.display = "block";
        }
        else{
            document.getElementById(d[i].toString()).style.display = "none"
        }
    }
}
