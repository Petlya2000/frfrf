<?php
    require_once 'conn.php';
   $sql_select="SELECT * FROM product INNER JOIN type ON product.type_id = type.type_id INNER JOIN category ON product.category_id = category.category_id;";
  $result=mysqli_query($con,$sql_select);
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">All DATA</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                              <th> ID</th>
                              <th> Name</th>  
                               <th>Fam</th>  
                           </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                                   <td><?php echo $row["product_ID"];?></td>  
                               <td><?php echo $row["product_name"];?></td>  
                               <td><?php echo $row["product_fam"]; ?></td>
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br /> 
                            <form method="post" action="form.php">
<br>
  <input id="submitback" type="submit" value="Добавить запись">
</form>
    <br/>
    <form method="post" action"read.php">
    <input id="Nknig" type='text' name='nk' placeholder="Идентификационный номер"><b><b>
<br/>
<input id='submitread'  type='submit' value='Читать...'><b><b>
</form>
<br/>
    <form method="post" action"sortType.php">
    <input id="Nknig" type='text' name='nk' placeholder="Тип"><b><b>
<br/>
<input id='submitavtr'  type='submit' value='Поиск по типу'><b><b>
</form>
<br/>
<form method='post' action='sortCategory.php'><b>
<input id="Nknig" type='text' name='nk' placeholder="Категория"><b><b>
<br>
<input id='submittitle'  type='submit' value='Поиск но категории'><b><b>
</form>
<br/>
</body>
</html>
