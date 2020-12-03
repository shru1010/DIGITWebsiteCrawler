function getData(num)
{
    console.log(num);
    if(num == "")
    {
        num = 10;
    }
    else if((num <= 20) && (num > 0))
    {
        if (window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                    document.getElementById("data_block").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","result.php?&num="+num,true);
        xmlhttp.send();
    }
    else
    {
        alert("Enter value between 1 to 20");
    }
}
