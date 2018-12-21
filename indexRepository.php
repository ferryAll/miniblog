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
       <?php while ($post = $req->fetch())
        {
        ?>
        <div class="news">
            <h3>
            <?php //var_dump($post)?> 
                <?= htmlspecialchars($post['titre']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['contenu'])) ?>
                <br />
                <em><a href="post.php?id=<?= $post['id'] ?>">Commentaires</a></em>
            </p>
        </div>

        
        <?php 
        
        }
        ?>

    </body>
</html>