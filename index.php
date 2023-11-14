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

    //$query = "SELECT * FROM recipes";
    $query = "SELECT * FROM `recipes` WHERE `id` = 5";
    $results = mysqli_query($db_conection, $query);
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
<section class="recipeDetail">
    <div class="recipeTitle">
    <?php
        $query = "SELECT * FROM `recipes` WHERE `id` = 5";
        $results = mysqli_query($db_conection, $query);
        if ($results->num_rows > 0) {
            consoleMsg("Query Sucessful! Number of row: @results-> num_rows");
            while ($oneRecipe = mysqli_fetch_array($results)) {
        echo '<div class="titleContent">';
            echo '<h3>'.$oneRecipe['Title'].'</h3>';
            echo '<span>'.$oneRecipe['Subtitle'].'</span>';
        echo '</div>';

        echo '<div class="iconConta">';
            echo '<div class="iconInfo">';
                echo '<img src="image/006-lettuce.png" alt="">';
                echo '<div class="info">';
                echo '<h3>'.$oneRecipe['Proteine'].'</h3>';
                echo '</div>';
            echo '</div>';
            echo '<div class="iconInfo">';
                echo '<i class="fi fi-bs-hourglass-end"></i>';
                echo '<div class="info">';
                echo '<h3>'.$oneRecipe['CookTime'].'</h3>';
                echo '</div>';
            echo '</div>';
            echo '<div class="iconInfo">';
                echo '<i class="fi fi-sr-users-alt"></i>';
                echo '<div class="info">';
                echo '<h3>For '.$oneRecipe['Servings'].'</h3>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<h5>'.$oneRecipe['Description'].'</h5>';
        echo '</div>';
        echo '<div class="pic">';
        echo '<img src="../images/thumbnail/'.$oneRecipe['MainIMG'].'" alt="Dish Image">';
            }}?>
        </div>
</section>
<div class="secter">
    <div class="line"><hr></div>
    <div class="dot">...</div>
</div>




<section class="recipeIngredient">
<?php
    $query = "SELECT * FROM `recipes` WHERE `id` = 5";
    $results = mysqli_query($db_conection, $query);
    if ($results->num_rows > 0) {
        consoleMsg("Query Sucessful! Number of row: @results-> num_rows");
        while ($oneRecipe = mysqli_fetch_array($results)) {
            echo '<img src="../images/thumbnail/'.$oneRecipe['IngredientsIMG'].'" alt="Ingredients Image">';
            echo '<div class="ingreTitle">';
            echo '<h3>Ingredients</h3>';
            echo '<span>';
            echo '<ul class="ingre">';

            echo $oneRecipe['AllIngredients'];

            echo '</span>';
            echo '</div>';
        }}?>
</section>

<div class="secter">
    <div class="line"><hr></div>
    <div class="dot">...</div>
</div>




<section class="recipeStep">
    <div class="stepMain">
        <h3>Step by Stpe</h3>
        <span>Follow the instruction</span>
    </div>
  
    <?php
    echo '<div class="stepConta">';
    $query = "SELECT * FROM `recipes` WHERE `id` = 5";
    $results = mysqli_query($db_conection, $query);
    if ($results->num_rows > 0) {
      consoleMsg("Query Sucessful! Number of row: @results-> num_rows");
      while ($oneRecipe = mysqli_fetch_array($results)) {
        echo '<div class="step">';
        echo '<div class="pic">';
        echo '<img src="../images/thumbnail/'.$oneRecipe['StepIMGs'].'" alt="Ingredients Image">';
        echo '</div>';
        echo '<div class="stepText">';
        echo '<div class="stepTitle">';
        echo '<span class="num">1</span>';
        echo '<h4> Prepare the ingredients & season the tomato sauce:</h4>';
        echo '</div>';
        echo '<h5>Place an oven rack in the center of the oven, then preheat to 475F. Wash and dry the fresh produce. Cut off and discard the bottom 1/2 inch of the <strong>broccoli</strong> stem cut the broccoli into small pieces, keeping the florets intact. Peel and roughly chop the <strong>garlic.</strong> Halve the <strong>focaccia.</strong> Grate the <strong>asiago cheese</strong> on the large side of a box grater. Tear the <strong>mozzarella cheese</strong> into small pieces. In a bowl, combine the <strong>tomato sauce</strong> and <strong>Italian seasoning;</strong> season with salt and pepper to taste.</h5>
                </div>';
                echo '</div>';
                echo ' <div class="stepDot">.</div>';

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