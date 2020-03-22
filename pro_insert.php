<?php
$id = $_COOKIE['dbid'];
$pw = $_COOKIE['dbpw'];
//$conn = new mysqli("127.0.0.1",$id,$pw,"pdb");
$conn = new mysqli("127.0.0.1","#ID#","#pass#","pdb");
$button = $_POST["button"];
echo "$button";

$Program_Num = $_POST['Program_Num'];
$Program_Name = $_POST['Program_Name'];
$Program_Manager = $_POST['Program_Manager'];
echo $Cell_Num, $Cell_Manager;
$sql = "INSERT INTO Program (Program_Num, Program_Name, Program_Manager) VALUES('$Program_Num', '$Program_Name', '$Program_Manager')";
$sql2 = "UPDATE Program SET Program_Name = '$Program_Name', Program_Manager = '$Program_Manager' WHERE Program_Num = '$Program_Num'";
$sql3 = "DELETE FROM Program WHERE Program_Num='$Program_Num'";
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
        echo '<a href="########">돌아가기</a>';
}
?>
