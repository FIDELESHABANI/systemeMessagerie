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