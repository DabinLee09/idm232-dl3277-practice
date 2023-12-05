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
    consoleMsg("hahhahhahahaha");

    //Include env.php that holds global var with secret info
    require_once './env.php';
    consoleMsg("envS");

    //Include database.php conection code
    require_once './includes/database.php';
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

        <form action="index.php" method="POST">
            <div class="searchForm">
            <label for="search"></label>
            <input type="search" class="search" id="search" name="search" value="<?php echoSearchValue(); ?>" placeholder="Search recipe!">
            <button class="submit" type="submit" name="submit" value="submit"><i class="fi fi-br-search"></i></button>
            </div>
        </form>
        
    </div>

</section>




<!--filterConta-->
<!--filterConta-->
<section class="filterConta" id="filterConta">
    
    <a href="index.php?filter=beef">
    <div class="filter" id="filter">
        <img src="images/001-beef.png" alt="">
        <div class="info">
            <h3>BEEF</h3>
        </div>
    </div>
    </a>

    <a href="index.php?filter=pork">
    <div class="filter" id="filter">
        <img src="images/002-pork.png" alt="">
        <div class="info">
            <h3>Pork</h3>
        </div>
    </div>
    </a>

    <a href="index.php?filter=chicken">
    <div class="filter" id="filter">
        <img src="images/003-rooster.png" alt="">
        <div class="info">
            <h3>Chicken</h3>
        </div>
    </div>
    </a>

    <a href="index.php?filter=fish">
    <div class="filter" id="filter">
        <img src="images/004-tuna.png" alt="">
        <div class="info">
            <h3>Seafood</h3>
        </div>
    </div>
    </a>

    <a href="index.php?filter=vegitarian">
    <div class="filter" id="filter">
        <img src="images/006-lettuce.png" alt="">
        <div class="info">
            <h3>Vegan</h3>
        </div>
    </div>
    </a>

</section>




<form action="index.php" method="GET">
<section class="subFilterConta" id="subFilterConta">
    <div class="title">
        <span>Sub Filter</span>
    </div>    


    <div class="serving">
        <input type="radio" name="serving" value="" id="all" checked/>
        <label for="all" class= "all">
            <p>all</p>
        </label>

        <input type="radio" name="serving" value="2" id="twoPeople"/>
        <label for="twoPeople" class= "twoPeople">
            <p>two</p>
        </label>

        <input type="radio" name="serving" value="4" id="fourPeople"/>
        <label for="fourPeople" class= "fourPeople">
            <p>four</p>
        </label>

        <div class="peopleFilter"></div>
    </div>


    <div class="minSliderConta">
        <div class="subTitle">Min setting</div>
        <div class="minSlider">
            <input type="range" id="" min="20" max="60" value="30" oninput="minRangeValue.innerText = this.value" step="5" list="minMarkers">
            <datalist id="minMarkers">
                <option value="20" label="20"></option>
                <option value="25" label="25"></option>
                <option value="30" label="30"></option>
                <option value="35" label="35"></option>
                <option value="40" label="40"></option>
                <option value="45" label="45"></option>
                <option value="50" label="50"></option>
                <option value="55" label="55"></option>
                <option value="60" label="60"></option>
            </datalist>
        </div> 
        <div class="slideView">
            <span id="minRangeValue"> </span>
            <span>min</span>
        </div>
    </div> 

    <div class="calSliderConta">
        <div class="subTitle">cal setting</div>

        <div class="calSlider">
            <input type="range" name="calSlider" min="460" max="910" value="calRangeValue.innerText = this.value" oninput="calRangeValue.innerText = this.value" step="50">
        </div> 

        <div class="slideView">
            <span id="calRangeValue"> </span>
            <span>cal</span>
        </div>
    </div>

    <div class="subbtn">
    <button class="submitSubfilter" type="submit" name="submit" value="submit"><i class="fi fi-br-search"></i></button>
    </div>

    <div class="resetBtn">
    <button class="resetBtn" type="reset" name="reset" value="reset">reset</button>
    </div>
</section>
</form>




<!--recipes-->
<!--recipes-->
<section class="recipes" id="recipes">
  <h1 class="heading">Popular <span>recipes</span></h1>
  
  
    <?php

    $search = $_POST['search'];
    consoleMsg("Search is: $search");

    $filter = $_GET['filter'];
    consoleMsg("Filter is: $filter");

    // $servingNum = $_GET['serving'];
    // consoleMsg("serving is: $servingNum");

    if(isset($_GET['serving'])) {
        $servingNum = $_GET['serving'];
        consoleMsg("serving is: $servingNum");
    } else {
        consoleMsg("serving is NOT working: $servingNum");
    }	 

    if(isset($_GET['calSlider'])) {
        $calValue = $_GET['calSlider'];
        consoleMsg("CalSlider is: $calValue");
    } else {
        consoleMsg("calSlider is NOT working: $calValue");
    }

    if (!empty($search)) {
        consoleMsg("Doing a SEARCH");
        // $query = "select * FROM recipes WHERE title LIKE '%{$search}%'";
        $query = "select * FROM recipes WHERE title LIKE '%{$search}%' OR subtitle LIKE '%{$search}%'";
        $result = mysqli_query($db_connection, $query);
      } elseif (!empty($filter)) {
        consoleMsg("Doing a FILTER");
        $query = "select * FROM recipes WHERE Proteine LIKE '%{$filter}%'";
      } elseif (!empty($servingNum)) {
        consoleMsg("Doing a serving");
        $query = "select * FROM recipes WHERE servings LIKE '%{$servingNum}%'";
        $result = mysqli_query($db_connection, $query);
      } elseif (!empty($calValue)){
        consoleMsg("Doing a cal");
        echo 'is_int('.$value.')'.is_int($value).'anwe';
        $query = "SELECT * FROM `recipes` WHERE `Cal/Serving` <= '$calValue'";
        $result = mysqli_query($db_connection, $query);
        $calValue  = 'none';
        consoleMsg("calvelue is $calValue");

      } else {
        consoleMsg("Loading ALL RECIPES");
        $query = "SELECT * FROM recipes";
      }




    echo '<div class="recipeConta">';
    // $query = "SELECT * FROM recipes";

    $results = mysqli_query($db_connection, $query);
    if ($results->num_rows > 0) {
      consoleMsg("Query Sucessful! Number of row: @results-> num_rows");
      while ($oneRecipe = mysqli_fetch_array($results)) {
        $id = $oneRecipe['id'];
        echo '<a href="./detail.php?recID='. $id .'">';
        echo '<div class="recipe">';

            echo '<div class="plateOuter">';
            echo '<div class="plateInner">';
                echo '<img src="images/thumbnail/'.$oneRecipe['MainIMG'].'" alt="Dish Image">';
            echo '</div>';
            echo '</div>';

            echo '<div class="recipeInfo">';
                echo '<div class="iconInfo" id="proteinIcon">';
                echo '<i class="fi fi-sr-room-service"></i><a>'.$oneRecipe['Proteine'].'</a></div>';
                echo '<div class="iconInfo" id="cookTime">';
                echo '<i class="fi fi-sr-alarm-clock"></i><a>'.$oneRecipe['CookTime'].'</a></div>';
                echo '<div class="iconInfo" id="caloriesIcon">';
                echo '<i class="fi fi-sr-clipboard-list-check"></i><a>'.$oneRecipe['Cal/Serving'].' Cal</a></div>';
            echo '</div>';

            echo '<div class="content">';
                echo '<h3>'.$oneRecipe['Title'].'</h3>';
                echo '<span>'.$oneRecipe['Subtitle'].'</span>';
            echo '</div>';
        echo '</div>';
        echo '</a>';
      }
      consoleMsg("Done");
    }else {
        consoleMsg("QUERY ERROR");
      }
    
    ?>


</section>











  
  
<!--Footer-->
<!--Footer-->  
<footer>
  <div class="boxConta">

    <h3>Icons by <a href="https://www.flaticon.com/uicons">Flaticon</a></h3>
    <h3>&copy; 2023 Dabin Lee</h3>
    <h3>dl3277@drexel.edu</h3>
  </div>
</footer>
 



</body>

</html>