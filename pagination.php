<?php 
include("sql.php");

$per_page=2;
echo $query="select fname,address,num from pagination LIMIT ".$per_page ."  OFFSET ".(($_GET['page']=='' || $_GET['page']==0)? $_GET['page']=0 : ($_GET['page']+2.=$a."))."";
//echo "<pre>";
//var_dump($con);
//die();
$myqli_result=mysqli_query($con,$query);
$for_pagenation=mysqli_query($con,"select fname,address,num from pagination");
$num_rows=mysqli_num_rows($for_pagenation);

$page_records=ceil($num_rows/$per_page);
//var_dump($myqli_result);
echo "<table border=1><tr><th>Full Name.</th><th>Full Adderess.</th><th>Cell Num.</th></tr>";
while($rows=mysqli_fetch_array($myqli_result,MYSQLI_BOTH)){
	
	echo "<tr><td>".$rows['fname']."</td><td>".$rows['address']."</td><td>".$rows['num']."</td></tr>";
	
}


echo "</table><br>";
for($i=0; $i<$page_records; $i++){
	echo "<a href=pagination.php?page=".$i.">".   $i  ."</a>";
}
	//echo $_GET['page'];
mysqli_close($con);
echo "<br>";
//echo ($_GET['page']%2 && $_GET['page']+1)? : $_GET['page']+2;
 echo $a= ($_GET['page']%2)? $_GET['page']+1 : '' ;
die();
$value = $_GET['page'];
if ($value % 2 && $_GET['page']+1) {
  echo "$value is odd ".$_GET['page']+2;
} else {
  echo "$value is even";
}
//echo ($_GET['page']=='')? $_GET['page']=0 : $_GET['page']+2;
//$a=4;
//echo  ($a<=3)? "a" : "b";

?>