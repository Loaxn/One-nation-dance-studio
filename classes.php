<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="classes.css">
    <link rel="icon" href="images/ODNICO.png">
    <title>Courses</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="partie1">
            <a href="index.php">Home</a>
            <a href="Aboutus.html">About us</a>
            <a href="classes.php">Courses</a>
        </div>
       
        <form class="searchbar" method="GET" action="course.php">
            <label for="search">
                <input class="input" type="text" required=""  id="search">
                <span>search for a class</span>
                <div class="fancy-bg"></div>
                <div class="search">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="r-14j79pv r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-4wgw6l r-f727ji r-bnwqim r-1plcrui r-lrvibr">
                        <g>
                            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                        </g>
                    </svg>
                </div>
                <button class="close-btn" type="reset">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </label>
        </form>
    </div>   
            
         </div>
         
            <a href="index.php">
                 <img id="LOGO" src="images/one dance nation studio.gif" alt="aller ver l'Accueil">
           </a>
 </nav>
 
    
        <div class="bare">
            <div class="bookaplace1">
               <a href="classes.php"><button class="bookaplace2"> Book a class</button></a> 
            </div>
         </div>
    
   
       <BR>
       <BR>
       <BR>
       <BR> 
       <div class="title_courses">
    <div class="title">
        <h1> Courses </h1>
        <span>choose your classes below</span>
    </div>
</div>

<form class='classfiltre' method="get" style="padding: 20px; border: 5px solid aliceblue; ">
    <select name="danse" style="width: 300px; padding: 5px; font-family: Arial, sans-serif;">
        <option value="">Style of dance</option>
        <?php
        include("connexion.php");
        $query = "SELECT * FROM dance";
        $stmt = $db->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            echo "<option value=\"" . $row["id_dance"] . "\">" . $row["styles"] . "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Search" style="width: 100px;">
</form>

<?php
if (isset($_GET["danse"])) {
    $danseId = $_GET["danse"];
}
$query = "SELECT * FROM professeur, dance WHERE professeur.ext_dance = id_dance";
if (!empty($danseId)) {
    $query .= " AND id_dance= :danseId";
}
$stmt = $db->prepare($query);
if (!empty($danseId)) {
    $stmt->bindParam(":danseId", $danseId);
}
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo '<div style="position: relative; display: inline-block;">';
    echo '<a href="course.php?dance_id=' . $row['id_dance'] . '">';
    echo '<img src="' . $row['photo'] . '" alt="Professor Photo" width="300" height="400" style= margin:50px>';
    echo '<span style="position: absolute; top: 40%; left: 1%; color: rgba(109, 100, 242); font-size: 2rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); padding: 150px;">';
    echo $row['nom_professeur'];
    echo '</span>';
    echo '</div>';
    echo "</a>";
}

?>


</body>
</html>












        <footer>
           <div class="links">
      <a href="index.php">Home</a>
  <a href="credits.html">Credits</a>
  <a href="terms.html"> Terms and conditions</a>
  <a href="creator.html">Creator</a>

  </div>
            
        </footer> 