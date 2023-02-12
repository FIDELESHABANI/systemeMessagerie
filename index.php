<?php
$bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;', 'root', '');
if(isset($_POST['Valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['message']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        $insererMessage = $bdd->prepare('INSERT INTO messages(pseudo,message) VALUES(?,?)');
        $insererMessage->execute(array($pseudo, $message));
    } else{
        echo "Veuillez Completer tous les champs!";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Système de Messagerie Instantané</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <form method="POST" action="" align="center">
          <label>Votre Pseudo</label>
            <input type="text" name="pseudo">
            <br>
            <br>
            <label>Votre Message</label>
           <textarea name="message"></textarea>
           <br> 
           <br>
           <input type="submit" name="Valider">
        </form>
            <section id="messages">
            <?php
    $bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;', 'root', '');
        $recupereMessage = $bdd->query('SELECT * FROM messages');
        while($message=$recupereMessage->fetch())
        {
           ?>
           <div class="message">
                <h4> <?= $message['pseudo']; ?></h4>
                <P> <?= $message['message']; ?> </P>
           </div>
           <?php 
        }

?>
            </section>


            
    </body>
</html>
