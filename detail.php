<!DOCTYPE html>
<html>

<head>
  <title>Cooksy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/detailStyle.css">
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
    // $query = "SELECT * FROM `recipes` WHERE `id` = 5";
    // $results = mysqli_query($db_conection, $query);
?>





<section class="cooksyPeasy">
    <h5>CooksyPeasy</h5>
</section>


<div class="card">
<section class="recipeCard">
    <?php
        $recID = $_GET['recID'];
        $query = "SELECT * FROM recipes WHERE id={$recID}";

        // $query = "SELECT * FROM `recipes` WHERE `id` = 5";
        $results = mysqli_query($db_connection, $query);
        if ($results->num_rows > 0) {
            consoleMsg("Query Sucessful! Number of row: @results-> num_rows");
            while ($oneRecipe = mysqli_fetch_array($results)) {
        
                echo '<div class="titleContent">';
                    echo '<h5>'.$oneRecipe['Title'].'</h5>';
                    echo '<h3>'.$oneRecipe['Subtitle'].'</h3>';
                echo '</div>';

                echo '<div class="recipeInfo">';
                    echo '<div class="iconInfo" id="proteinIcon">';
                    echo '<i class="fi fi-sr-room-service"></i><a>'.$oneRecipe['Proteine'].'</a></div>';
                    echo '<div class="iconInfo" id="cookTime">';
                    echo '<i class="fi fi-sr-alarm-clock"></i><a>'.$oneRecipe['CookTime'].'</a></div>';
                    echo '<div class="iconInfo" id="caloriesIcon">';
                    echo '<i class="fi fi-sr-clipboard-list-check"></i><a>'.$oneRecipe['Cal/Serving'].' Cal</a></div>';
                    echo '<div class="iconInfo" id="servingIcon">';
                    echo '<i class="fi fi-sr-user"></i><a>'.$oneRecipe['Servings'].' people</a></div>';
                echo '</div>';

                echo '<div class="plateOuter">';
                echo '<div class="plateInner">';
                echo '<img src="images/thumbnail/'.$oneRecipe['MainIMG'].'" alt="Dish Image">';
                echo '</div>';
                echo '</div>';

                echo '<p>'.$oneRecipe['Description'].'</p>';
            }}?>
</section>



<section class="ingreCard">
    <h5>ingredients</h5>
    <?php
    // $query = "SELECT * FROM `recipes` WHERE `id` = 5";
    $recID = $_GET['recID'];
    $query = "SELECT * FROM recipes WHERE id={$recID}";
    $results = mysqli_query($db_connection, $query);
    if ($results->num_rows > 0) {
        consoleMsg("Query Sucessful! Number of row: @results-> num_rows");
        while ($oneRecipe = mysqli_fetch_array($results)) {
            
            echo '<div class="plateOuter">';
            echo '<div class="plateInner">';
            echo '<img src="images/ING/'.$oneRecipe['IngredientsIMG'].'" alt="Ingredients Image">';
            echo '</div>';
            echo '</div>';
            
                echo '<div class="ingre">';
                    $str = $oneRecipe['AllIngredients'];
                    $words = explode('*' , $str); 
                    $cnt = count($words); 
                    for($i=0; $i<$cnt; $i++){
                        echo '<div class="checkboxConta">';
                        echo '<input type="checkbox" id="'.$i.'" name="ingreDetail">';
                        echo '<label for="'.$i.'"><i class="fi fi-br-check"></i></label>';
                        echo '<p> '.$words[$i].'</p><br></div>';
                        // echo '<span>'.$words[$i].'<br><span/>';
                    }
                echo '</div>';        
        }}?>
</section>
</div>



<section class="recipeStep">
    <div class="stepMain">
        <h5>Step by Stpe</h5>
        <h3>Follow the instruction</h3>
    </div>
  
    <?php
    echo '<div class="stepByStep">';
    $recID = $_GET['recID'];
    $query = "SELECT * FROM recipes WHERE id={$recID}";
    $results = mysqli_query($db_connection, $query);
    if ($results->num_rows > 0) {
        
      consoleMsg("Query Sucessful! Number of row: @results-> num_rows");
      while ($oneRecipe = mysqli_fetch_array($results)) {
        
        

    
        $words = explode('*' , $oneRecipe['AllSteps']); 

        $pics = explode('*' , $oneRecipe['StepIMGs']); 
    
        for($i=0; $i<count($words); $i++){
            
            $firstChar = substr($words[$i],0,1);
            consoleMsg("First Char is: $firstChar");
            echo '<div class="stepCard">';
            if (is_numeric($firstChar)) {
       
                consoleMsg("First Char is: $firstChar");
                echo '<div class="plateOuter">';
                echo '<div class="plateInner">';
                echo '<img src="./images/detail/' . $pics[$firstChar-1] . '" alt="Step Image">';
                echo '</div>';
                echo '</div>';

                // for ($j = $i; )


                echo '<h3>'. $words[$i] . '</h3>';
              } else {
                echo '<p>'. $words[$i] . '</p>';  
            }
           
        echo '</div>';  
        }

      }}
    
    ?>


</section>

  
<div class="backbtn">
    <a href="./index.php" class="btn">Back to menu</a>
</div>



</body>

</html>