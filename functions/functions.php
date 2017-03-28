<?

// Conenct to the database
$con = mysqli_connect("localhost","root","root","ecommerce");

// Get the categories

function getAllCategories(){

  global $con;
  $getCategories = "SELECT * FROM categories";
  $runCategories  = mysqli_query($con, $getCategories);

  while($rowCategories = mysqli_fetch_array($runCategories)){
    $categoriesId = $rowCategories['category_id'];
    $categoriesTitle = $rowCategories['category_title'];

    echo "<li><a href='#'>$categoriesTitle</a></li>";
  }
}


function getAllBrands(){

  global $con;
  $getBrands = "SELECT * FROM brands";
  $runBrands  = mysqli_query($con, $getBrands);

  while($rowBrands = mysqli_fetch_array($runBrands)){
    $brandsId = $rowBrands['brand_id'];
    $brandsTitle = $rowBrands['brand_title'];

    echo "<li><a href='#'>$brandsTitle</a></li>";
  }
}
