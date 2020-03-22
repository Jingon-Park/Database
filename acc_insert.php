<?php
$id = $_COOKIE['dbid'];
$pw = $_COOKIE['dbpw'];
//$conn = new mysqli("127.0.0.1",$id,$pw,"pdb");
$conn = new mysqli("127.0.0.1","#ID#","#pass#","pdb");
$button = $_POST["button"];
echo "$button";

$Account_Num = $_POST['Account_Num'];
$Prisoner_Num = $_POST['Prisoner_Num'];
$Amount = $_POST['Amount'];
$sql = "INSERT INTO Account (Accout_Num, Prisoner_Num, Amount) VALUES('$Accout_Num', '$Prisoner_Num', '$Amount')";
$sql2 = "UPDATE Account SET Amount = '$Amount' WHERE Accout_Num = '$Accout_Num'";
$sql3 = "DELETE FROM Account WHERE Accout_Num = '$Account_Num'";
echo $sql;
if ($button =="등록"){
        $result = mysqli_query($conn,$sql);
        }
if ($button=="수정") {
        $result = mysqli_query($conn,$sql2);
}
if ($button=="삭제"){
        $result = mysqli_query($conn,$sql3);
}

if ($result == 1){
        echo '<a href="######">돌아가기</a>';
}
?>
