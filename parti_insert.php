<?php
$id = $_COOKIE['dbid'];
$pw = $_COOKIE['dbpw'];
//$conn = new mysqli("127.0.0.1",$id,$pw,"pdb");
$conn = new mysqli("127.0.0.1","#ID#","#pass#","pdb");
$button = $_POST["button"];
echo "$button";

$Program_Num = $_POST['Program_Num'];
$Prisoner_Num = $_POST['Prisoner_Num'];
$Program_Name = $_POST['Program_Name'];
$sql = "INSERT INTO Participate (Program_Num, Prisoner_Num, Program_Name) VALUES('$Program_Num', '$Prisoner_Num', '$Program_Name')";
$sql2 = "UPDATE Participate SET Program_Num = '$Program_Num', Prisoner_Num = '$Prisoner_Num', Program_Name = '$Program_Name' WHERE (Program_Num = '$Program_Num')";
$sql3 = "DELETE FROM Participate WHERE (Program_Num='$Program_Num' and Prisoner_Num = '$Prisoner_Num')";
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
        echo '<a href="########">돌아가기</a>';
}
?>
