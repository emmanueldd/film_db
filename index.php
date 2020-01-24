<?php
  // Ici, on vérifie que le paramètre get que me renvoie add_film.php est à true, dans le cas contraire j'affiche un message m'indiquant que le film n'a pas été ajouté en base de données. isset me permet de vérifie si la clé success de la variable (tableau) $_GET est défini.
  if (isset($_GET['success'])) {
    if ($_GET['success'] == 'true') {
      echo '<p>Le film a bien été ajouté en base de données.</p>';
    } else {
      echo '<p>Le film n\'a pas été ajouté en base de données.</p>';
    }
  }

  // Ici, j'initialise ma connexion à ma base de données. Je stocke le résultat retournée par la fonction mysqli_connect dans $mysqli, pour pouvoir la réutiliser dans mysqli_query
  $mysqli = mysqli_connect('localhost', 'root', 'root', 'films');

  // Ici, j'execute une requete me retournant mes films en base de données
  $query = mysqli_query($mysqli, "SELECT * FROM films");

  // Ici j'initialise un tableau vide, qui va stocker les résultats
  $films = [];
  // Ici, j'utilise une boucle while pour itérer sur les résultats, car par défaut mysqli_fetch_assoc me retourne le premier résultat.
  while($film = mysqli_fetch_assoc($query)) {
    // Je stocke le résultat contenu dans la variable $film, dans la variable $films.
    $films[] = $film;
  }
  // Ici, je vérifie le contenu de ma variable $films.
  var_dump($films);


?>


<form action="add_film.php" method="post">
  <input type="text" name="name" value="" placeholder="Nom du film">
  <input type="submit" name="" value="Envoyer">
</form>
<ul>
  <?php
    // J'affiche mes résultats, en itérant sur la variable $films que j'ai alimenté plus haut.
    foreach ($films as $key => $film) {
      echo '<li>' . $film['name'] . '</li>';
    }
  ?>
</ul>
