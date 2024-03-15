<?php
 
    require_once 'conn.php';
     
    // mysqli_connect("servername","username","password","database_name")
  
    // Get all the categories from category table
    $sql = "SELECT * FROM `category`";
    $all_categories = mysqli_query($con,$sql);
    $sql1 = "SELECT * FROM `type`";
    $all_types = mysqli_query($con,$sql1);
  
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly
    if(isset($_POST['submit']))
    {
     if(isset($_POST['q1'])){
      
        // Store the Product name in a "name" variable
        $name = mysqli_real_escape_string($con,$_POST['Product_name']);
         // Store the Product fam in a "fam" variable
       $fam = mysqli_real_escape_string($con,$_POST['Product_fam']);
        // Store the Category ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['Category']); 
        
        $id1 = mysqli_real_escape_string($con,$_POST['Type']); 
        $q1=$_POST['q1'];
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `product`(`product_name`,`product_fam`,`living`, `category_id`,`type_id`)
            VALUES ('$name','$fam','$q1','$id','$id1')";
          
          // The following code attempts to execute the SQL query
          // if the query executes with no errors 
          // a javascript alert message is displayed
          // which says the data is inserted successfully
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Product added successfully")</script>';
        }
     }
    }
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html">
<link rel="stylesheet" href="style.css"  type="text/css">
</head>
<body>
    <form method="POST">
        <label>Name of Product:</label>
        <input type="text" name="Product_name" required><br>
     <label>Fam of Product:</label>
        <input type="text" name="Product_fam" required><br>
         <label>Select a Category</label>
        <select name="Category">
            <?php 
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $category["Category_ID"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $category["Category_Name"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        <br>
<label>Select a Type</label>
        <select name="Type">
            <?php 
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($type = mysqli_fetch_array(
                        $all_types,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $type["Type_ID"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $type["Type_Name"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        <br>
     <label>Status</label>
       <br>
     <input type="radio" name="q1" value="0"> Bad<br>
     <input type="radio" name="q1" value="1"> Good<br>
      <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
 <form method="post" action="alldata.php">
<input id="submitover" type="submit" value="Показать всех"><b/>
</form>
</body>
</html>
