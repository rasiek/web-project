<?php
define('DB_PATH', $_SERVER['DOCUMENT_ROOT'] . '/bd/annonces.db');

// connexion à la base de données SQL
function connexion() {
    $pdo = new PDO('sqlite:' . DB_PATH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($pdo) {
        return $pdo;
    } else {
        return "failed";
    }
}

// création une table au bon format, pour contenir les annonces
function creationTable() {
    $pdo = connexion();

    $requeteSQLCreation = 'CREATE TABLE "annonces" (
        "id" INTEGER PRIMARY KEY AUTOINCREMENT,
        "titre" TEXT,
        "description" TEXT,
        "categorie" TEXT,
        "pseudo" TEXT,
        "prix" INTEGER,
        "photo" TEXT,
        "rdv_lat" REAL,
        "rdv_lon" REAL,
        "date" INTEGER DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (pseudo) REFERENCES user(username)
    );';
    // exécution de la requête
    $pdo->query($requeteSQLCreation);
}

function creationTableUser() {
    $pdo = connexion();

    $requeteSQLCreation = 'CREATE TABLE user (
        id INTEGER CONSTRAINT user_pk PRIMARY KEY,
        username TEXT UNIQUE,
        userPassword TEXT,
        nom TEXT,
        prenom TEXT,
        email TEXT,
        createdDate INTEGER DEFAULT CURRENT_TIMESTAMP
    );';
    // exécution de la requête
    $pdo->query($requeteSQLCreation);
}

// insertions de 4 petites annonces d'exemple

function insertionDonneesUser() {
    $pdo = connexion();
    $requeteSQLInsertionUsers = "INSERT INTO user (username, userPassword, nom, prenom, email) VALUES
    ('mila', 'thamila123', 'Iberoualene', 'Thamila', 'thamila123@gmail.com'),
    ('selma', 'selma123', 'Boukbir', 'Selma', 'selma123@gmail.com'),
    ('camilo', 'camilo123', 'Casierra', 'Camilo', 'camilo123@gmail.com')";
    $stmt = $pdo->prepare($requeteSQLInsertionUsers);
    // $stmt->debugDumpParams();
    return $stmt->execute();
}

function insertionDonneesExemple() {
    $pdo = connexion();
    $requeteSQLInsertionAnnon = "INSERT INTO annonces (titre, description, categorie, pseudo, prix, photo, rdv_lat, rdv_lon) VALUES
        ('Lot de 2 loutres en carton', 'Vends lot de deux loutres en carton, à construire soi-même.\nÉtat neuf.', 'decoration', 'mila', 17, 'https://p8.storage.canalblog.com/87/98/377716/28283932_p.jpg', 43.6175644, 3.8618377),
        ('gamos de daron tavu', 'paiement en liquide seulement', 'automobile', 'camilo', 39000, 'https://lautomobileancienne.com/wp-content/uploads/2020/03/Citroen-BX-GTI-4x4-2.jpg', 44.1256347, 4.0832189),
        ('Écrou de qualité supérieure', 'Vends écrou en inox de grande qualité, filetage ultrafin, couleur enchanteresse.\nPrix symbolique: 1€, pour cause de déménagement.\nPassionés uniquement, sur rendez-vous.', 'decoration', 'selma', 1, 'https://www.pieces-de-motoculture.fr/images/Image/ecrou.jpg', 43.6697239, 3.8577369),
        ('Courgettes', 'À saisir (à la poêle !) 2 kg de courgettes craquantes et fondantes à la fois.\nProduction locale sans pesticides', 'cuisine', 'camilo', 5, 'https://www.biendecheznous.be/sites/default/files/ps_image/istock_courgettes.jpg', 46.8206397, 29.6003248)
    ";
    $stmt = $pdo->prepare($requeteSQLInsertionAnnon);
    // $stmt->debugDumpParams();
    return $stmt->execute();
}
//affichage et visualisation des annonces

function visualisation() {
    $pdo = connexion();
    $requeteSQLSelect = " SELECT * from annonces ";
// exécution de la requête
$stm = $pdo->query($requeteSQLSelect);
// récupération du résultat
$infosannonces = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $infosannonces;
 
}
// vidage dela table : suppression de toutes les annonces
function vidageTable() {
    $pdo = connexion();
    $requeteSQLVidage = "DELETE FROM annonces";
    $pdo->query($requeteSQLVidage);
}

function getUser($userCredentials) {
    $pdo = connexion();

    $username = $userCredentials['username'];
    $password = $userCredentials['password'];

    $requeteSQLExist = "SELECT * FROM user WHERE username = '" . $username . "' AND userPassword = 
    '" . $password . "'";

    $stm = $pdo->query($requeteSQLExist);

    $infoUser = $stm->fetch(PDO::FETCH_ASSOC);

    if ($infoUser) {
        return $infoUser;
    } else {
        return false;
    }

};

function affichage($termes) {
    $pdo = connexion();
    if ($termes){ 
        $requeteSQLAffichage = " SELECT * from annonces WHERE titre LIKE '%$termes%' OR description LIKE '%$termes%' OR categorie LIKE '%$termes%' OR pseudo LIKE  '%$termes%' ";
    } else {  
        $requeteSQLAffichage = " SELECT * from annonces ";
    } 
    // exécution de la requête
$stm = $pdo->query($requeteSQLAffichage);
// récupération du résultat
$infosannonces = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $infosannonces;
 
}

function suppressionannonces($id) {
    $pdo = connexion();
    $requeteSQLDeletion = "DELETE FROM annonces WHERE ( id = :id )";
    $stmt = $pdo->prepare($requeteSQLDeletion);
 
    // $stmt->debugDumpParams();
    return $stmt->execute([ "id" => $id]);
}

function addannonces($donnees) {
    $pdo = connexion();
    
    $requeteSQLInsertion = "INSERT INTO annonces (titre, description, categorie, pseudo, prix, photo, rdv_lat, rdv_lon) VALUES (:titre, :description, :type, :pseudo, :prix, :image, :rdv_lat, :rdv_lon)";
    $stmt = $pdo->prepare($requeteSQLInsertion);
    // $stmt->debugDumpParams();
    return $stmt->execute($donnees);
}

