<?php
    require_once 'conn.php';
$category = $_REQUEST['nk'];
if (!($category)) {
  echo("Введите категорию");
}
else {
   $sql_select="SELECT * FROM product INNER JOIN type ON product.type_id = type.type_id INNER JOIN category ON product.category_id = category.category_id WHERE category.Category_Name='$category';";
  $result=mysqli_query($con,$sql_select);
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">    
</head>
<body>
     <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Person Data</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                              <th> ID</th>
                              <th> Name</th>  
                               <th>Fam</th>
                            <th>Type</th>
                            <th>Category</th>
                           </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                                   <td><?php echo $row["Product_ID"];?></td>  
                               <td><?php echo $row["product_name"];?></td>  
                               <td><?php echo $row["product_fam"]; ?></td>
                            <td><?php echo $row["Type_Name"];?></td>  
                               <td><?php echo $row["Category_Name"]; ?></td>
                          </tr>  
                          <?php  
                               }  
                          }
}
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br /> 
                            <form method="post" action="alldata.php">
<br>
  <input id="submitback" type="submit" value="На главную">
</form>
</body>
</html>
