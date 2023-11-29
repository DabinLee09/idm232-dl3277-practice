<!DOCTYPE html>
<html>

<head>
  <title>Cooksy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
</head>

<body>
 <!--Import-->
 <!--Import--> 
  <?php
    //$msg = "HELLO";
    require_once './includes/fun.php';
    consoleMsg("hahhahhahahah");

    //Include env.php that holds global var with secret info
    require_once './env.php';
    consoleMsg("envS");

     //Include database.php conection code
    require_once './includes/database.php';

    $title = $oneRecipe['Title'];
    $subtitle = $oneRecipe['Subtitle'];
    $cookTime = $oneRecipe['CookTime'];
    $proteine = $oneRecipe['Proteine'];
    $mainIMG = $oneRecipe['MainIMG'];
?>




<!--header-->
<!--header-->
<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler">
        <i class="fi-sr-menu-burger"></i>
    </label>
    <a href="#" class="logo">Cooksy<span>.</span></a>
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#filterConta">filter</a>
        <a href="#recipes">recipes</a>
    </nav>
</header>



<!--Home-->
<!--Home-->
<section class="home" id="home"> 

    <div class="content">
        <h3>Cooksy</h3>
        <span>Make your cook easy</span>
        <p>Cook your favorite dishes with simple recipes</p>

        <div class="search">
            <div class="searchBar">
                <input type="text" placeholder="Search Recipes">
                <label for="" class="icon">
                    <i class="fi-br-search"></i>
                </label>
            </div>
        </div>
        
    </div>
</section>



<!--filterConta-->
<!--filterConta-->
<section class="filterConta">
    
    <div class="filter">
        <img src="images/001-beef.png" alt="">
        <div class="info">
            <h3>Beef</h3>
        </div>
    </div>

    <div class="filter">
        <img src="images/002-pork.png" alt="">
        <div class="info">
            <h3>Pork</h3>
        </div>
    </div>

    <div class="filter">
        <img src="images/003-rooster.png" alt="">
        <div class="info">
            <h3>Chicken</h3>
        </div>
    </div>

    <div class="filter">
        <img src="images/004-tuna.png" alt="">
        <div class="info">
            <h3>Seafood</h3>
        </div>
    </div>

    <div class="filter">
        <img src="images/006-lettuce.png" alt="">
        <div class="info">
            <h3>Vegan</h3>
        </div>
    </div>

</section>


<section class="recipes" id="recipes">
  <h1 class="heading">Popular <span>recipes</span></h1>
  
  
    <?php
    echo '<div class="recipeConta">';
    $query = "SELECT * FROM recipes";
    $results = mysqli_query($db_conection, $query);

    if ($results->num_rows > 0) {
      consoleMsg("Query Sucessful! Number of row: @results-> num_rows");
      while ($oneRecipe = mysqli_fetch_array($results)) {
        
        echo '<div class="recipe">';
          echo '<div class="recipeinfo">';
          echo '<span class="filterPro" id="chicken">Chicken</span>';
          echo '<span class="cookTime">';
          echo '<i class="fi fi-bs-hourglass-end"></i>'.$oneRecipe['CookTime'].'</span>';
        echo '</div>';
        echo '<img src="../alpha_mamp/images/thumbnail/'.$oneRecipe['MainIMG'].'" alt="Dish Image">';
        echo '<div class="content">';
          echo '<h3>'.$oneRecipe['Title'].'</h3>';
          echo '<span>'.$oneRecipe['Subtitle'].'</span>';
        echo '</div>';
        echo '</div>';

      }}
    
    ?>


</section>











  
  
<!--Footer-->
<!--Footer-->  
<footer>
  <div class="boxConta">

    <h3>Uicons by <a href="https://www.flaticon.com/uicons">Flaticon</a></h3>
    <h3>&copy; 2023 Dabin Lee</h3>
    <h3>dl3277@drexel.edu</h3>
  </div>
</footer>
 



</body>

</html>