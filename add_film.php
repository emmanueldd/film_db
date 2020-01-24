<?php
  // Je vérifie que j'ai bien récupéré la donnée passée via le fomulaire en post de index.php
  var_dump($_POST);
  // $_POST['name'] ==> Bad boys (nom du film)

  // Je verifie que $_POST['name'] est bien défini
  if(isset($_POST['name'])) {
    // Si c'est le cas, alors je le stocke dans $film_name
    $film_name = $_POST['name'];
  }

  // Je me connecte à ma base de données. $mysqli sauvegarde le résultat de la connexion à la base de données. ça me permet de voir si je suis bien connecté, puis de l'utiliser lorsque j'éxecute mysqli_query
  $mysqli = mysqli_connect('localhost', 'root', 'root', 'films');

  // Ici je vérifie la connexion à base de données
  if ($mysqli) {
    // J'execute la requete me permettamnt d'insérer mon film, en base de données. je passe ma variable dans la requete, grace à la concatenation.
    $query = mysqli_query($mysqli, "INSERT INTO films (name) VALUES ('" . $film_name . "')");
  } else {
    // Dans le cas contraire, je redirige vers index.php  avec pour paramètre d'url ?success=false.
    header("Location: index.php?success=false");
    exit;
  }

  // Si tout s'est bien passé, je suis redirigé vers index.php avec pour parametre d'url ?success=true
  header("Location: index.php?success=true");
  exit;
