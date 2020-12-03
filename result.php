<!DOCTYPE html>
<head>
  <title>Crawler</title>
<!--style -->
  <style>
  .disp_table
  {
    position:absolute;
    margin-top:-200px;
    margin-left: 500px;
    font-size: large;
    border: 1px solid black;
  }
  .disp_td
  {
    background-color: #456268;
    padding: 10px;
    border: 1px solid black;
  }
  .displ_td{
    background-color: #d0e8f2;
    padding: 10px;
    border: 1px solid black;
  }
  tr{
    color:white;
  }
  </style>

</head>
<body>
<?php
//include conecction and simple_html_dom php files
  $num = $_GET['num'];
  include_once('connection.php');
  include_once('simple_html_dom.php');
  //link
  $sample = "https://www.digit.in/latest-mobile-phones/";
  $html = file_get_html($sample);

 // echo $html;

  echo "<table class='disp_table' cellspacing=0>";
  for($i =0; $i<$num; $i++){

    $name = $html->find('h3', $i)->plaintext;
    $size = $html->find('div.value',4*$i)->plaintext;
    $cam = $html->find('div.value', (4*($i)+1))->plaintext;
    $mem = $html->find('div.value', (4*($i)+2))->plaintext;
    $batt = $html->find('div.value', (4*($i)+3))->plaintext;
    $price = $html->find('strong', 3*$i)->plaintext;
//the display table
    echo "<tr>";
    echo "<td class='disp_td'><h2>Phone Name</h2></td>";
    echo "<td class='disp_td'><h4 class='name'>" .$name. "</h4></td>";
    echo "</tr><tr>";
    echo "<td class='displ_td'><h4>Phone Size</td>";
    echo "<td class='displ_td'>" .$size. "</td>";
    echo "</tr><tr>";
    echo "<td class='displ_td'><h4>Camera</td>";
    echo "<td class='displ_td'>" .$cam. "</td>";
    echo "</tr><tr>";
    echo "<td class='displ_td'><h4>Memory</td>";
    echo "<td class='displ_td'>" .$mem. "</td>";
    echo "</tr><tr>";
    echo "<td class='displ_td'><h4>Battery</td>";
    echo "<td class='displ_td'>" .$batt. "</td>";
    echo "</tr><tr>";
    echo "<td class='displ_td'><h4>Price</td>";
    echo "<td class='displ_td'>" .$price. "</td>";
    echo "</tr><br>";
    $query = "insert into crawled_info values('$name','$size','$cam','$mem','$batt','$price')";
    $result = mysqli_query($connect, $query);
  }
  echo "</table>";

?>
</body>
</html>
