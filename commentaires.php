<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	    <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>
 


            <div class="news">
                <h3>
                  <?= htmlspecialchars($post['titre']); ?>
                  <em>le <?=  $post['creation_date_fr']; ?></em>
                 </h3>
    
                 <p>
                     <?= nl2br(htmlspecialchars($post['contenu'])) ?>
                 </p>
             </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
<p><strong><?= htmlspecialchars($comment['auteur']); ?></strong> le <?= $comment['date_commentaire_fr']; ?></p>
<p><?= nl2br(htmlspecialchars($comment['commentaire'])); ?></p>
<?php
} 
?>
</body>
</html>