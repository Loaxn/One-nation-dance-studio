<div class="base">
    <?php  
    include("connexion.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les valeurs du formulaire
        $email = $_POST['email'];
       $firstname = ucwords(strtolower($_POST['firstname']));
  $lastname = strtoupper($_POST['lastname']);

        $to = $email;
        $subject = 'Booking confirmation';
        $message = 'Hello future dancer ' . $firstname . ' ' . $lastname . ', thanks for your booking, your reservation has been confirmed successfully :)';
        $headers = 'From: onenationdancestudio@chalach.butmmi.o2switch.site'; 

        // Envoyer l'e-mail
        if (mail($to, $subject, $message, $headers)) {
            echo '<h1>Thank you for your booking! <br> <span>A confirmation email has been sent to the provided email address.<br>We look forward to dancing with you!</span></h1>
            <a href="index.php">Return Home</a>';
        } else {
            echo 'Error sending email.';
        }
        
        // envoi mail gestionaire
         $to_gest = "chalachloana@gmail.com";
        $subject_gest = 'New client';
        $message_gest =  "$firstname  $lastname has booked a class";
        $headers = 'From: onenationdancestudio@chalach.butmmi.o2switch.site'; 

        // Envoyer l'e-mail
        if (mail($to_gest, $subject_gest, $message_gest, $headers)) {
           
        } else {
            echo 'Error sending email.';
        }
    }
    ?>
</div>

<script>
// le code ne marche pas j'ignore pourquoi du coup j'ai décidé de le faire en php
    function formatNames() {
        var firstnameInput = document.getElementById('firstname');
        var lastnameInput = document.getElementById('lastname');

        var formattedFirstname = firstnameInput.value.charAt(0).toUpperCase() + firstnameInput.value.slice(1).toLowerCase();
        var formattedLastname = lastnameInput.value.toUpperCase();

        firstnameInput.value = formattedFirstname;
        lastnameInput.value = formattedLastname;
    }

    document.querySelector('.form').addEventListener('submit', function(event) {
        event.preventDefault();
        formatNames();
        this.submit();
    });
</script>




<style>
@font-face {
  font-family: 'threat';
  src: url(threat-font/Threat-2OAeX.woff2);
}
.base{
    background-color:#6f45d1;
    border-radius:30px;
    height:100%;
}
    h1{
        color:white;
        text-align:center;
        font-family:'threat';
        font-size:1.6rem;
        padding-top:250px;
    }
     .base a{
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
    
    

.base a:hover{
    border-radius:0;
    transform: scale(1.2);
    
}

.base span{
    font-family: "Poppins", Arial, sans-serif;
    font-size:1rem;
}
</style>