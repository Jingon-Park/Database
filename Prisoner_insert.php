<?php
$id = $_COOKIE['dbid'];
$pw = $_COOKIE['dbpw'];
$conn = new mysqli("127.0.0.1",$id,$pw,"pdb");
$button = $_POST["button"];
echo "$button";

$Prisoner_Num = $_POST['Prisoner_Num'];
$Prisoner_Name = $_POST['Prisoner_Name'];
$Entrance_Date = $_POST['Entrance_Date'];
$Exit_Date = $_POST['Exit_Date'];
$Crime_Type = $_POST['Crime_Type'];
$Crime_Level = $_POST['Crime_Level'];
$Cell_Num = $_POST['Cell_Num'];
$sql = "INSERT INTO Prisoner(Prisoner_Num, Prisoner_Name, Entrance_Date, Crime_Type, Cell_Num, Exit_Date, Crime_Level)
VALUES ('$Prisoner_Num','$Prisoner_Name','$Entrance_Date', '$Crime_Type','$Cell_Num', '$Exit_Date', '$Crime_Level')";
$sql2 = "UPDATE Prisoner SET Prisoner_Name = '$Prisoner_Name', Entrance_Date = '$Entrance_Date', Exit_Date = '$Exit_Date', Crime_Type = '$Crime_Type', Crime_Level = '$Crime_Level', Cell_Num = '$Cell_Num' WHERE Prisoner_Num = '$Prisoner_Num'";
$sql3 = "DELETE FROM Prisoner WHERE Prisoner_Num='$Prisoner_Num'";
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
        echo '<a href="http://18.207.204.19/jingon.html">돌아가기</a>';
}
?>
