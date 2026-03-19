-- Suppression conditionnelle des tables
DROP TABLE IF EXISTS panier;
DROP TABLE IF EXISTS commande;
DROP TABLE IF EXISTS formation;
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS signalement;
DROP TABLE IF EXISTS commentaire;

-- Création de la table : "utilisateur"
CREATE TABLE utilisateur (
    id_utilisateur BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    type_utilisateur VARCHAR(20)
);

-- Création de la table : "formation"
CREATE TABLE formation (
    id_formation BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    nom_formation VARCHAR(100) NOT NULL,
    prix_formation DOUBLE NOT NULL,
    informations_formation TEXT NOT NULL,
    img_formation BLOB,
    id_utilisateur BIGINT(20),
    categorie_formation VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
);


-- Création de la table : "panier"
CREATE TABLE panier (
    id_panier BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur BIGINT(20),
    id_formation BIGINT(20),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
);

-- Création de la table : "commande"
CREATE TABLE commande (
    id_commande BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur BIGINT(20),
    date_commande DATETIME,
    id_formation BIGINT(20),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
);

CREATE TABLE signalement (
    id_signalement BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    id_formation BIGINT(20),
    texte_signalement VARCHAR(255),
    FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
);

CREATE TABLE commentaire (
    id_commentaire BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    texte_commentaire VARCHAR(255) NOT NULL,
    id_formation BIGINT(20),
    id_utilisateur BIGINT(20),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
);
