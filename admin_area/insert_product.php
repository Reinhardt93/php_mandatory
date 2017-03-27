<!DOCTYPE>

<?
include('includes/db.php');
?>
<html>
  <head>
    <title> Inserting Product </title>
  </head>

  <body>

    <form action="insert_product.php" method="post" enctype="multipart/form-data">

      <table align="center" width="750px">
        <tr align="center">
          <td><h2>Insert New Product</h2></td>
        </tr>

        <tr>
          <td> Product title;</td>
          <td><input type="text" name="product_title"></td>
        </tr>
        <tr>
          <td> Product category: </td>
          <td>
            <select name="product_category">
              <option>Select a catagory</option>

              <?
              $getCategories = "SELECT * FROM categories";
              $runCategories  = mysqli_query($con, $getCategories);

              while($rowCategories = mysqli_fetch_array($runCategories)){
                $categoriesId = $rowCategories['id'];
                $categoriesTitle = $rowCategories['title'];

                echo "<option value='$categoriesId'>$categoriesTitle</option>";
              }
              ?>

            </select>


          </td>
        </tr>
        <tr>
          <td> Product brand: </td>
          <td>

            <select name="product_brand">
              <option> Select a brand</option>
            <?
            $getBrands = "SELECT * FROM brands";
            $runBrands  = mysqli_query($con, $getBrands);

            while($rowBrands = mysqli_fetch_array($runBrands)){
              $brandsId = $rowBrands['id'];
              $brandsTitle = $rowBrands['title'];

              echo "<option value='$brandsId'>$brandsTitle</option>";
            }
              ?>

            </select>

          </td>
        </tr>
        <tr>
          <td> Product price: </td>
          <td><input type="text" name="product_price"></td>
        </tr>
        <tr>
          <td> Product description: </td>
          <td><textarea name="product_description" cols="18" rows="4"></textarea></td>
        </tr>
        <tr>
          <td> Product image: </td>
          <td><input type="file" name="product_image"></td>
        </tr>
        <tr>
          <td> Product keywords: </td>
          <td><input type="text" name="product_keywords"></td>
        </tr>

        <tr>
          <td><input type="submit" name="insert_post" value="submit product"></td>
        </tr>
      </table>

    </form>

  </body>
</html>

<?php

  if(isset($_POST['insert_product'])) {

    // Get data from fields
    $product_title = $_POST['product_title'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_describe = $_POST['product_describe'];
    $product_keywords = $_POST['product_keywords'];

    // Get image
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $FILES['product_image']['tmp_name'];

    $insert_product = "INSERT INTO products (product_cat, product_brand, product_price, product_title, product_desc, product_keywords, product_image) VALUES ('$product_category', '$product_brand', '$product_title', '$product_price', '$product_describe', '$product_keywords', '$product_image')";
  }
?>
