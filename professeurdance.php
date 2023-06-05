<html>
    <body>
        <form method="get">
            <select name="danse">
                <option value="">Select the dance</option>
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
            <input type="submit" value="OK">
        </form>

        <?php
        if (isset($_GET["danse"])) {
            $danseId = $_GET["danse"];
            
            $query = "SELECT * FROM professeur, dance WHERE professeur.ext_dance = $danseId AND dance.id_dance = $danseId";
            $stmt = $db->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "Professeur : " . $row["nom_professeur"] . "<br>";
                $imageSrc=$row['photo'];
                }
            } else {
                echo "<h2>Aucun professeur disponible pour la danse sélectionnée.</h2>";
            }
        }
        ?>
        <img src="<?php echo $imageSrc; ?>" alt="dance teacher" width="300">
    </body>
</html>
