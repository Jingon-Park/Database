<?php
$id = $_COOKIE['dbid'];
$pw = $_COOKIE['dbpw'];
$conn = new mysqli("127.0.0.1",$id,$pw,"pdb");
$button = $_POST["button"];
echo "$button";

$Cell_Num = $_POST['Cell_Num'];
$Cell_Manager = $_POST['Cell_Manager'];
$sql = "INSERT INTO Cell (Cell_Num, Cell_Manager) VALUE('$Cell_Num', '$Cell_Manager');
$sql2 = "UPDATE Cell SET Cell_Manager = '$Cell_Manager' WHERE Cell_Num = 'Cell_Num'";
$sql3 = "DELETE FROM Cell WHERE Cell_Num='$Cell_Num'";
if ($button =="등록"){
        $result = mysqli_query($conn,$sql);
        }
if ($button=="수정") {
        echo $sql2;
        $result = mysqli_query($conn,$sql2);
}
if ($button=="삭제"){
        $result = mysqli_query($conn,$sql3);
}

if ($result == 1){
        echo '<a href="######">돌아가기</a>';
}
?>
