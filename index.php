<!DOCTYPE>

<?
include('functions/functions.php');
?>

<HTML>
  <head>
    <title>PHP Mandatory assignment</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
  </head>
  <body>
    <!-- Main wrapper starts here -->
    <div class="main_wrapper">

      <!-- Header area -->
      <div class="header">
        <img id="logo" src="images/logo.png"> <!-- Dummy logo -->
      </div>

      <div class="menu">
        <ul id="menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">My Account</a></li>
          <li><a href="#">Sign up</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>

        <div id="search_form">
          <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query">
            <input type="submit" name="search" value="Search">
          </form>
        </div>
      </div>



      <div class="content_wrapper">
        <div id="sidebar">
          <div id="sidebar_title">
            Categories
          </div>

          <ul id="categories_list">

            <? getAllCategories(); ?>

          </ul>


          <div id="sidebar_title">
            Brands
          </div>

          <ul id="categories_list">

            <? getAllBrands(); ?>

        </div>


        <div id="content_area">
          Add content
        </div>
        <div id="footer">
          <p>&copy; 2017 Fake Shop<p>
        </div>
      </div>
    </div>
    <!-- Main wrapper ends here -->

  </body>
</html>
