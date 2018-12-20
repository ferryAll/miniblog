<?php
function getBillets()
{
    $db = dbConnect();

    $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
   
    return $req;
}

function getPosts()
{
    // ... deja écrite
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
}



function getComments($postId)
{
    $db = dbConnect();

    $comments = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

//une nouvelle fonction

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8','root','');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}