<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/ODNICO.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Courses</title>
</head>
<body>
<style>
         .container {
            font-family: "Poppins", Arial, sans-serif;
            background-color: aliceblue;
            height: 650px;
            width:100vw;
            border-radius: 60px;
            position: relative;
           
            
        }
.container p{
    margin-left:30px;
    margin-top:10px;
}
.containerelement {
    width:600px
}
.containerelement span {
    font-size:1.5vw;
}
.containerelement strong {
    color:#6f45d1;
}
  
.reserve a{
    font-family:'threat';
    font-size:2rem;
    text-decoration:none;
    background-color:rgb(21, 255, 0);
    padding:20px;
    border-radius:20px;
    position:absolute;
    left:30%;
    bottom:10%;
    transition: all 2s ease-in-out;
}
    
    

.reserve a:hover{
    border-radius:0;
    transform: scale(1.2);
    
}
           
.noresult span{
    position: absolute;
    top:50%;
    left:10%;
    font-size:2rem;
    font-family:'threat';
    color:PURPLE;
}
       

       
    </style>
<nav>
        <div class="partie1">
            <a href="index.php">Home</a>
            <a href="Aboutus.html">About us</a>
            <a href="classes.php">courses</a>
        </div>
       
        <form class="searchbar" method="GET" action="course.php">
            <label for="search">
                <input class="input" type="text" required="" name="search">
                <span>search for a class</span>
                <div class="fancy-bg"></div>
                <div class="search">
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="r-14j79pv r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-4wgw6l r-f727ji r-bnwqim r-1plcrui r-lrvibr">
                        <g>
                            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                        </g>
                    </svg>
                </div>
                <button class="close-btn" type="reset" name="reset">
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
    
    

         <div class="container">
    <?php
    include("connexion.php");

    
        
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $sql = "SELECT cours.*, professeur.nom_professeur, professeur.photo 
                    FROM cours 
                    INNER JOIN professeur ON cours.ext_professeur = professeur.id_professeur 
                    WHERE cours.type LIKE :searchTerm";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
            $stmt->execute();
        
            $rowCount = $stmt->rowCount();
        
            if ($rowCount > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $prof = $row['nom_professeur'];
                $photo = isset($row['photo']) ? $row['photo'] : 'default.jpg';
                $duree = $row['duree'];
                $date = $row['date'];
                $heure = $row['heure'];
                $tarif = $row['tarif'].'€';
                $type = $row['type'];
                $description = $row['description'];
                echo "<div class='containerelement'>";
                echo "<BR>";
                echo "<p><strong>Style: </strong><span>$type<span></p>";
                echo "<p><strong>Instructor: </strong> <span>" . $row["nom_professeur"] . "</span></p>";
                echo "<p><strong>Description: </strong><span> $description</span></p>";
                echo "<p><strong>Date: </strong><span> $date<span/></p>";
                echo "<p><strong>Starting hour: </strong><span> $heure</span></p>";
                echo "<p><strong>Duration: </strong><span> $duree</span></p>";
                echo "<p><strong>Price: </strong><span> $tarif<span></p>";
                echo "</div>";     
                $imageSrc = $row['photo'];
            } else {
                echo "<div class='noresult'>";
                echo "<span>No results found:(<br>
                try typing hiphop instead</span>";
                echo "</div>";
               
            }
        
        }
        
    
    if (isset($_GET['dance_id'])) {
        $danceId = $_GET['dance_id'];
        $sql = "SELECT cours.*, professeur.nom_professeur, professeur.photo 
        FROM cours 
        INNER JOIN professeur ON cours.ext_professeur = professeur.id_professeur 
        WHERE cours.ext_dance = :danceId";
$stmt = $db->prepare($sql);
$stmt->bindParam(':danceId', $danceId, PDO::PARAM_INT);
$stmt->execute();

$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$prof = $row['nom_professeur'];
$photo = isset($row['photo']) ? $row['photo'] : 'default.jpg';
$duree = $row['duree'];
$date = $row['date'];
$heure = $row['heure'];
$tarif = $row['tarif'].'€';
$type = $row['type'];
$description = $row['description'];
echo "<div class=containerelement>";
echo "<BR>";
echo "<p><strong>Style: </strong><span>$type<span></p>";
echo "<p><strong>Instructor: </strong> <span>" . $row["nom_professeur"] . "</span></p>";
echo "<p><strong>Description: </strong><span> $description</span></p>";
echo "<p><strong>Date: </strong><span> $date<span/></p>";
echo "<p><strong>Starting hour: </strong><span> $heure</span></p>";
echo "<p><strong>Duration: </strong><span> $duree</span></p>";
echo "<p><strong>Price: </strong><span> $tarif<span></p>";
echo "<div/>";     
$imageSrc = $row['photo'];

} 

    }
    

?>

    

  <div style="border-radius: 20px ;position:absolute ;left:60%;top:10%;">
    <img src="<?php echo isset($photo) ? $photo : ''; ?>" width="300">
</div>

<div class="reserve">
    <a href=booking_formulaire.php>reserve</a>
</div>



   
</body>
</html>
