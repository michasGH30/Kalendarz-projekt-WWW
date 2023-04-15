<?php
echo md5("tu jest hasło do zaszyfrowania, nic tu nie ma");
echo "<br>";
echo "<br>";
$path = "img/";
$picture = "aaa.png";
$path = $path . $picture;

echo $path;
echo "<br>";
echo "<br>";

var_dump($_POST);

?>

<form action="test.php" method="post">
    <input type="number" name="1" id="1" value="1">
</form>

<form action="test.php" method="post">
    <input type="number" name="2" id="2" value="2">
    <input type="submit" value="Rzuć mnom">
</form>