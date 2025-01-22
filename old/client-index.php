<?php
require_once('classes/CRUD.php');

$crud = new CRUD;

$select = $crud->select('clients', 'id', 'ASC');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Travail Pratique 1 — Catalogue de produits ">
    <meta name="author" content="Samuel Dorneval - No d'étudiant: 0366635">
    <meta name="keywords" content="Page de catalogue de produits">
    <title>TP 1</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/script.js"></script>
</head>

<body>
    <nav role="menubar">
        <div class="topnav container" id="myTopnav">
            <a href="index.php" class="logo" role="menuitem"><img src="https://www.mitsubishi-motors.ca/content/dam/mitsubishi-motors/images/logos/nav-logo-black.svg" alt="logo"></a>
            <div class="liens-nav">
                <a href="index.php" role="menuitem">Accueil</a>
                <a href="index.php" role="menuitem">À propos</a>
                <div class="dropdown">
                    <bouton class="dropbtn">Nos véhicules ▾</bouton>
                    <div class="dropdown-content">
                        <a href="index.php" role="menuitem">Vehicules </a>
                        <a href="index.php" role="menuitem">Offres spéciales</a>
                        <a href="index.php" role="menuitem">Vehicules d'occasion</a>
                    </div>
                </div>
                <a href="index.php" role="menuitem">Contact</a>
            </div>
            <div class="search-user">
                <a href="order-index.php" class="search"><i class="fa fa-search"></i></a>
                <a href="client-index.php" class="user"><i class="fa fa-user"></i></a>
            </div>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
    </nav>

    <header class="entete">
        <section class="fil-ariane container">
            <span><a href="">Vehicules </a> > <a href=""> Tous les véhicules</a></span>
        </section>
    </header>

    <div class="container">

        <main>
            <h1>Clients</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID Clients</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Tel</th>
                        <th>courriel</th>
                        <th>Suppr.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($select as $row) {
                    ?>
                        <tr>
                            <td><a href="client-show.php?id=<?= $row['id']; ?>"><?= $row['id'] ?></a></td>
                            <td><?= $row['nom'] ?></td>
                            <td><?= $row['adresse'] ?></td>
                            <td><?= $row['code_postal'] ?></td>
                            <td><?= $row['tel'] ?></td>
                            <td><?= $row['courriel'] ?></td>
                            <td>
                                <form action="client-delete.php" method="post">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <button type="submit" class="bouton">X</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <p></p>
            <!-- <a href="order-create.php" class="bouton">Nouvelle commande</a> -->
            <a href="client-edit.php?id=<?= $row['id']; ?>" class="bouton">Modifier le dernier client</a>

        </main>

    </div>
    <footer id="pied-principal">
        <div>
            <a href="#" class="logo">
                <img src="https://www.mitsubishi-motors.ca/content/dam/mitsubishi-motors/images/logos/nav-logo-black.svg" alt="logo"></a>
            </a>
            <div class="reseaux-sociaux">
                <a href="#" class="fa fa-instagram"><span>Instagram</span></a>
                <a href="#" class="fa fa-facebook"><span>Facebook</span></a>
                <a href="#" class="fa fa-google"><span>Google</span></a>
            </div>
        </div>
        <div>
            <a href="#">Voir nos modèles</a>
            <a href="#">Aide</a>
            <a href="#">Profil</a>
            <a href="#">Prendre un rendez-vous</a>
            <a href="#">Heures d'ouverture</a>
            <a href="#">Trouver une succursale</a>
        </div>
        <div>
            <div>
                <a href="#">Contactez-nous</a>
                <a href="#">Termes et conditions</a>
                <a href="#">Langues</a>
                <a href="#">Membres</a>
            </div>

        </div>
    </footer>


</body>

</html>