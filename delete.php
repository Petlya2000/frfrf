<?php
    require_once 'conn.php';
$id = $_REQUEST['nk'];
if (!($id)) {
  echo("Введите id");
}
else {
   $sql_delete="DELETE * FROM product WHERE product.Product_ID='$id';";
  $result=mysqli_query($con,$sql_delete);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Удалить</title>
</head>
<body>
<?php
if (($result)) {
  echo("Запись $id удалена"):
    }
else { echo ("Запись не удалена"); }
}
?>
<form method='post' action='allauthor.php'><b/>
<input id='submitread'  type='submit' value="Вернуться к поиску"><b/><b/>
</form>
<form method="post" action="form.php">
<input id="submitback" type="submit" value="На главную">
</form>
</body>
</html>
