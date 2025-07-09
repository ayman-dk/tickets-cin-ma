-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 juin 2025 à 10:20
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project_pfe_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `prix`) VALUES
(1, 'VIP', '100.00'),
(2, 'Standard', '60.00');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duree` int(11) NOT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `realisateur` varchar(255) DEFAULT NULL,
  `acteurs` text DEFAULT NULL,
  `genres` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `affiche_url` varchar(255) DEFAULT NULL,
  `est_actif` tinyint(1) NOT NULL DEFAULT 1,
  `date_sortie` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `description`, `duree`, `classification`, `realisateur`, `acteurs`, `genres`, `affiche_url`, `est_actif`, `date_sortie`, `created_at`, `updated_at`) VALUES
(6, 'Avatar: fire and ash', 'Le troisième volet de la saga Avatar. Après avoir exploré la forêt luxuriante dans Avatar 1 et les océans dans Avatar 2 : La Voie de l’Eau, Avatar 3 : Feu et Cendres s’aventurera dans des paysages volcaniques à couper le souffle.', 192, 'PG-13', 'James Cameron', 'Sam Worthington, Zoe Saldaña, Sigourney Weaver, Stephen Lang, Kate Winslet, Cliff Curtis, Oona Chaplin, Jack Champion, Britain Dalton, Trinity Bliss', '\"Science-Fiction, Aventure, Fantastique\"', 'storage/affiches/PAg6GWI0yMSfedAznslhKO1vzRQLMgSEXmVyVbHv.jpg', 1, '2025-12-17', '2025-06-08 11:08:27', '2025-06-08 11:13:03'),
(7, 'Superman', 'James Gunn s\'attaque au super-héros original dans le nouvel univers DC réimaginé avec un mélange unique d\'action épique, d\'humour et d\'émotion, offrant un SUPERMAN animé par la compassion et une foi profonde en la bonté de l\'humanité.', 129, 'PG-13', 'James Gunn', 'David Corenswet, Rachel Brosnahan, Nicholas Hoult, Edi Gathegi, Anthony Carrigan, Nathan Fillion, Isabela Merced, Skyler Gisondo, Pruitt Taylor Vince, Neva Howell', '\"Action, Aventure, Science-Fiction\"', 'storage/affiches/Z8m25naDGcguxCC7pliRoqfCy1GTlkOY9tx7pHBz.jpg', 1, '2025-07-09', '2025-06-08 11:16:05', '2025-06-08 11:16:05'),
(8, 'Lilo & stitch', 'L’histoire touchante et drôle d’une petite fille hawaïenne solitaire et d’un extra-terrestre fugitif qui l’aide à renouer le lien avec sa famille.', 108, 'G', 'Dean Fleischer Camp', 'Maia Kealoha, Chris Sanders, Sydney Agudong, Billy Magnussen, Zach Galifianakis', '\"Familial, Com\\u00e9die, Science-Fiction, Action, Aventure\"', 'storage/affiches/zc9klGz0XoJNhBlfCg7kzcEHlPEZRBhK8pKoK0bd.jpg', 1, '2025-05-17', '2025-06-08 11:19:01', '2025-06-08 11:55:02'),
(9, 'Mortal kombat ii', 'Mortal kombat II est un film américain réalisé par Simon McQuoid dont la sortie est prévue en 2025. Il s\'agit d\'une suite de Mortal Kombat, du même réalisateur, sorti en 2021. Il s\'agit d\'une adaptation de la série de jeux vidéo Mortal Kombat.', 110, 'R', 'Simon McQuoid', 'Karl Urban, Jessica McNamee, Mehcad Brooks, Ludi Lin, Adeline Rudolph, Lewis Tan, Josh Lawson, Max Huang, Chin Han, Damon Herriman', '\"Action, Fantastique, Aventure\"', 'storage/affiches/PvqUftXjjGPHwHaeiy5nGGEDVvp5vJrtg4oEcUsC.jpg', 1, '2025-10-22', '2025-06-08 11:23:29', '2025-06-08 11:23:29'),
(10, 'Nobody', 'Hutch Mansell, un père de famille apparemment sans histoire, mène une vie monotone entre son travail et sa famille. Mais lorsqu’il subit un cambriolage sans riposter, il devient la risée de son entourage. Ce que personne ne sait, c’est qu’il cache un passé violent. Sa soif de justice réveille alors un ancien instinct, le menant dans une spirale de violence qu’il croyait enterrée.', 92, 'R', 'Ilya Naishuller', 'Bob Odenkirk, Connie Nielsen, Aleksey Serebryakov, Christopher Lloyd', '\"Action, Thriller, Crime\"', 'storage/affiches/BnXoBx5BMPT7qHatz0kayOgOPfWdpP6jvCBzeguT.jpg', 1, '2021-03-26', '2025-06-08 11:41:25', '2025-06-08 11:41:25'),
(11, 'Inception', 'Dom Cobb est un voleur expérimenté, le meilleur dans l\'art périlleux de l\'extraction : il s\'approprie les secrets enfouis au plus profond de l’inconscient pendant le rêve. Mais Cobb est aussi un fugitif, contraint à l’exil. L’occasion de se racheter se présente lorsqu’on lui propose une mission impossible : non plus voler une idée, mais en implanter une.', 148, 'PG-13', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page', '\"Science-fiction, Action, Thriller\"', 'storage/affiches/ygfZiAuH0pKhjI0biwppnbHbC6IKa7IT2KfrhC1R.jpg', 1, '2010-07-16', '2025-06-08 11:43:52', '2025-06-10 23:16:57'),
(12, 'Parasite', 'La famille Kim, pauvre et sans emploi, vit dans un semi-sous-sol minable à Séoul. Leur vie change lorsqu’un membre parvient à se faire engager comme professeur particulier dans une riche famille, les Park. Peu à peu, tous les membres infiltrent la maison, déclenchant une série d\'événements tragiques et imprévisibles.', 132, 'PG-13', 'Bong Joon-ho', 'Song Kang-ho, Choi Woo-shik, Park So-dam', '\"Thriller, Drame\"', 'storage/affiches/nmKqZg9f3wzjY8utsHgT6Xp7gUlLrDbTUIEFlMVM.jpg', 1, '2019-06-05', '2025-06-08 11:49:01', '2025-06-10 23:06:00'),
(13, 'Interstellar', 'Dans un futur proche, la Terre est menacée par des tempêtes de poussière et la famine. Cooper, ancien pilote de la NASA, accepte une mission spatiale avec une équipe de scientifiques : traverser un trou de ver pour trouver une nouvelle planète habitable. Mais chaque minute passée dans l’espace a des conséquences irréversibles sur le temps.', 169, 'PG-13', 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', '\"Science-fiction, Drame, Aventure\"', 'storage/affiches/T1j3KfIhKSPZV4Sj1EHnw7pkvSIsrHHrP05cFFlf.jpg', 1, '2014-11-05', '2025-06-08 11:53:34', '2025-06-08 11:54:53'),
(14, 'Le Roi Lion', 'Simba, un jeune lionceau, est destiné à devenir roi. Mais la trahison de son oncle Scar le pousse à l’exil. Aidé de ses nouveaux amis Timon et Pumbaa, il apprend à grandir loin de ses responsabilités. Un jour, il devra affronter son passé et reprendre sa place dans le cycle de la vie.', 89, 'G', 'Roger Allers, Rob Minkoff', 'Matthew Broderick, Jeremy Irons, James Earl Jones (VO)', '\"Animation, Aventure, Drame\"', 'storage/affiches/njTAF8I3jEtV4uoJfCgHkM1mpbwrRRt9WyGgPBox.jpg', 1, '1994-11-23', '2025-06-08 12:02:44', '2025-06-08 12:02:44'),
(15, 'The Creator', 'Dans un futur où l\'humanité est en guerre contre l\'intelligence artificielle, Joshua, un ancien soldat brisé, est recruté pour traquer \"le Créateur\", l\'architecte d\'une IA avancée censée avoir développé une arme capable de mettre fin à la guerre – et à l\'humanité. Ce qu\'il découvre remet en question tout ce qu’il croyait savoir sur les machines, les humains, et la notion même d’ennemi.', 133, 'PG-13', 'Gareth Edwards', 'John David Washington, Madeleine Yuna Voyles, Gemma Chan, Ken Watanabe', '\"Science-fiction, Action, Drame\"', 'storage/affiches/zqoE2BtVhFcx2EcGkI2cvFvphrKJIHoOl4dahj3o.jpg', 1, '2023-09-29', '2025-06-08 12:11:47', '2025-06-08 12:12:57'),
(16, 'Oppenheimer', 'Ce film retrace la vie de J. Robert Oppenheimer, le physicien américain chargé du projet Manhattan qui a mené à la création de la première bombe atomique. Un drame psychologique intense, où l’homme est confronté à sa conscience, aux enjeux politiques, et aux conséquences irréversibles de ses découvertes scientifiques.', 180, 'R', 'Christopher Nolan', 'Cillian Murphy, Emily Blunt, Matt Damon, Robert Downey Jr.', '\"Drame, Historique, Biographie\"', 'storage/affiches/L0IAjlcpoUwcyFiGyo35GpN7SNl67dFFfam2l6eU.jpg', 1, '2023-07-21', '2025-06-08 12:22:25', '2025-06-08 12:23:52'),
(17, 'Dune: Part Two', 'Après avoir survécu aux trahisons et aux batailles de la première partie, Paul Atréides s’unit avec les Fremen pour se venger de ceux qui ont détruit sa famille. Son ascension prend une dimension mythique, mais à quel prix ? Une épopée visuellement spectaculaire sur le pouvoir, le destin et le sacrifice.', 166, 'PG-13', 'Denis Villeneuve', 'Timothée Chalamet, Zendaya, Rebecca Ferguson, Austin Butler', '\"Science-fiction, Aventure, Drame\"', 'storage/affiches/0LbcUoEC0nT1wWaAtsepEOIwLyKpJZiRXiFfTmZH.jpg', 1, '2024-03-01', '2025-06-08 12:27:52', '2025-06-08 12:27:52'),
(18, 'Civil War', 'Dans un futur proche où les États-Unis sont plongés dans une guerre civile, une équipe de journalistes se lance dans un dangereux périple pour documenter les derniers jours du gouvernement central. Entre chaos, loyautés fracturées et violence omniprésente, ce voyage est un miroir tendu vers notre monde.', 109, 'R', 'Alex Garland', 'Kirsten Dunst, Wagner Moura, Cailee Spaeny, Stephen McKinley Henderson', '\"Drame, Guerre, Thriller\"', 'storage/affiches/NgjDlKtbhoWFwpjUPTcE3wWNmqHIie0zVGO2TRt7.jpg', 1, '2024-04-12', '2025-06-08 12:32:50', '2025-06-08 12:32:50'),
(19, 'Monkey Man', 'Un jeune homme récemment sorti de prison entre dans le monde clandestin des combats à mains nues à Mumbai. Habité par un traumatisme ancien et une soif de justice, il mène une lutte brutale contre un système corrompu. Inspiré par les récits mythologiques indiens, il incarne une figure de vengeance et d’espoir pour les opprimés.', 121, 'R', 'Dev Patel', 'Dev Patel, Sharlto Copley, Sobhita Dhulipala', '\"Action, Thriller, Drame\"', 'storage/affiches/lBWKEj7RfaxGzGbS4NPwsOFqrwKr2fzb1zg1L6o4.jpg', 1, '2024-04-05', '2025-06-08 12:40:10', '2025-06-08 12:40:10'),
(21, 'Mummies', 'Trois momies millénaires se retrouvent à Londres à la recherche d’un anneau royal. Ils doivent s’adapter au monde moderne tout en échappant aux aventures burlesques qui en découlent.', 90, 'PG', 'Juan Jesús García Galocha', NULL, '\"Aventure, Com\\u00e9die\"', 'storage/affiches/VOwLXaMkr5Bq8CMihuY9TGQwYe2peGAdXcz7j5Gc.jpg', 0, '2023-02-14', '2025-06-08 13:01:07', '2025-06-08 13:02:03'),
(22, 'The Wild Robot', 'Roz, un robot échoué sur une île sauvage, apprend à survivre en interagissant avec les animaux locaux, forgeant des liens émouvants avec une oie adoptive, tout en découvrant la vie en milieu naturel.', 102, 'PG', 'Chris Sanders', 'Lupita Nyong’o, Pedro Pascal, Kit Connor', '\"Aventure, Com\\u00e9die, Animation\"', 'storage/affiches/iSvhwgCceJCqMW1lHXXH7QzNbfHghTcUQz200HBq.jpg', 1, '2024-09-27', '2025-06-08 13:06:25', '2025-06-08 13:06:25'),
(23, 'Déserts', 'Deux hommes de villages reculés du Sud marocain parcourent les villages pour recouvrer des dettes. Leur relation, oscillant entre complicité et tension, dévoile la réalité sociale rurale marocaine.', 125, 'G', 'Faouzi Bensaïdi', 'Fehd Benchemsi, Abdelhadi Talbi, Hajar Graigaa', '\"Drame, Road\\u2011movie\"', 'storage/affiches/MV9HL77fwUFpsBJEy0k9U9NsRDnjNRA4glKFbyOB.jpg', 1, '2023-09-20', '2025-06-08 13:12:05', '2025-06-10 23:57:46'),
(24, 'Blonde', 'Une réinterprétation sombre et controversée de la vie de Marilyn Monroe, centrée sur son ascension et sa chute, avec des scènes très explicites qui soulèvent des questions sur l’exploitation hollywoodienne.', 137, 'NC‑17', 'Andrew Dominik', 'Ana de Armas', '\"Biographie, Drame\"', 'storage/affiches/jbZ9XVJohQ4sx2hLcvZ7m3lUwVMlLne3jJ2qkh4r.jpg', 1, '2022-09-16', '2025-06-08 13:18:40', '2025-06-10 23:15:35'),
(25, 'Kung Fu Panda 4', 'Po, désormais mentor et dragon guerrier, doit choisir un successeur lorsque surgit une sorcière maléfique cherchant à ressusciter les anciens ennemis. Une aventure riche en humour, en action, et en émotions, où Po explore à la fois ses responsabilités et son héritage.', 94, 'PG', 'Mike Mitchell, Stephanie Stine', 'Jack Black, Awkwafina, Viola Davis, Bryan Cranston, Ke Huy Quan', '\"Animation, Aventure, Com\\u00e9die\"', 'storage/affiches/WvMgmmQdq3HiscOjxozdMjKLcqUzKPf8KD1bcVak.jpg', 1, '2024-03-08', '2025-06-08 13:22:20', '2025-06-08 13:22:20'),
(26, 'Inside Out 2', 'iley, maintenant adolescente, est confrontée à de nouvelles émotions (Anxiété, Ennui, Embarras…) alors qu’elle entre au lycée. Ce deuxième film explore avec finesse et légèreté les défis de l’adolescence, entre rires, larmes et grandes leçons de vie.', 96, 'PG', 'Kelsey Mann', 'Amy Poehler, Maya Hawke, Ayo Edebiri, Adèle Exarchopoulos, Paul Walter Hauser…', '\"Animation, Famille, Drame\"', 'storage/affiches/ga0LfKsazK7IZHUXqjPUWJlknMbDIRWERg3tAQfX.jpg', 1, '2024-06-14', '2025-06-08 13:24:39', '2025-06-08 13:24:39'),
(29, 'Past Lives', 'Deux amis d’enfance coréens se retrouvent à New York. Un drame romantique touchant sur les regrets, le destin et les connexions perdues.', 106, 'PG-13', 'Celine Song', 'Greta Lee, Teo Yoo, John Magaro', '\"Drame, Romance\"', 'storage/affiches/2ns4Z2o85Pos7oZ2SA6svsUBTPODnTc8I8d3EykD.jpg', 1, '2023-06-02', '2025-06-10 23:21:15', '2025-06-10 23:21:15'),
(30, 'The Holdovers', 'Pendant les vacances de Noël des années 70, un professeur bourru reste sur le campus d’un pensionnat avec un élève abandonné par sa famille. Leur cohabitation forcée donnera lieu à une relation touchante, pleine de douleurs du passé et d’espoir inattendu.', 133, 'R', 'Alexander Payne', 'Paul Giamatti, Da\'Vine Joy Randolph', '\"Drame, Com\\u00e9die\"', 'storage/affiches/MdOgqFBDXkaTZcm8XB5R9x0OQkW1WA9i3VUH7smb.jpg', 1, '2023-11-10', '2025-06-10 23:29:09', '2025-06-10 23:29:09'),
(31, 'The Zone of Interest', 'À deux pas d’Auschwitz, Rudolf Höss vit une existence banale avec sa famille. Le contraste glaçant entre la normalité domestique et l’horreur absolue crée une expérience cinématographique saisissante.', 105, 'PG-13', 'Jonathan Glazer', 'Sandra Hüller, Christian Friedel', '\"Drame, Guerre, Historique\"', 'storage/affiches/epfNTjrmvbL9y1rXE7CvSqT67WY3q7IKtwSQWdrF.jpg', 1, '2023-12-15', '2025-06-10 23:31:08', '2025-06-10 23:31:08'),
(32, 'May December', 'Vingt ans après une liaison médiatisée, un couple fait face à son passé quand une actrice arrive pour interpréter la femme dans un film. Une étude troublante sur la vérité, la mémoire et les performances humaines.', 113, 'R', 'Todd Haynes', 'Natalie Portman, Julianne Moore', '\"Drame, Thriller psychologique\"', 'storage/affiches/rMMcWformfABKNrWOWW1bns2ZjHHvuNKuNzPqaxy.jpg', 1, '2023-11-17', '2025-06-10 23:33:32', '2025-06-10 23:33:32'),
(33, 'All of Us Strangers', 'Un scénariste solitaire développe une relation intense avec un voisin mystérieux, tout en revivant des souvenirs d’enfance. Le film explore le deuil, la mémoire et les amours fantômes avec tendresse et réalisme magique.', 105, 'R', 'Andrew Haigh', 'Andrew Scott, Paul Mescal', '\"Drame, Romance, Fantastique\"', 'storage/affiches/VHk54f9eYsaezbUYpjJJmWNFW0pIKaja3L1Fi64V.jpg', 1, '2023-12-22', '2025-06-10 23:35:50', '2025-06-10 23:35:50'),
(34, 'Memory', 'Une travailleuse sociale et un homme mystérieux liés par un souvenir commun doivent affronter un passé traumatique. Une histoire bouleversante sur la douleur, la rédemption et la guérison à travers l’autre.', 100, 'R', 'Michel Franco', 'Jessica Chastain, Peter Sarsgaard', '\"Drame, Romance\"', 'storage/affiches/deNMunQTsewwiDbRaErf3i47SSIWrGpNI9gGu1fa.jpg', 1, '2023-12-22', '2025-06-10 23:37:55', '2025-06-10 23:40:36'),
(35, 'Perfect Days', 'À Tokyo, Hirayama nettoie les toilettes publiques avec minutie. Derrière sa routine, une riche vie intérieure rythmée par la musique, la lecture et la nature. Un hommage poétique à la beauté des gestes simples.', 123, 'PG', 'Wim Wenders', 'Koji Yakusho', '\"Drame\"', 'storage/affiches/k10mAy45S6JRTfJHstQg2aJ9qFNdqS9dZa3qZcBF.jpg', 1, '2023-12-21', '2025-06-10 23:43:19', '2025-06-10 23:43:19'),
(36, 'Io Capitano', 'Deux adolescents sénégalais rêvent d’Europe et se lancent dans un périple périlleux à travers le désert, les prisons libyennes et la Méditerranée. Une odyssée humaniste, puissante et nécessaire.', 121, 'G', 'Matteo Garrone', 'Seydou Sarr, Moustapha Fall', '\"Drame, Aventure\"', 'storage/affiches/AIupYJJhu9fqjfZlUvsvZOWsWnBSAG2CE4ZHHhud.jpg', 1, '2023-09-06', '2025-06-10 23:45:50', '2025-06-10 23:45:50'),
(37, 'La Mère de tous les mensonges', 'Asmae cherche à comprendre un mensonge familial autour d’une photo et découvre des vérités sur la société marocaine et les traumatismes collectifs de 1981. Une autofiction poignante et audacieuse.', 97, 'G', 'Asmae El Moudir', 'Asmae El Moudir, Fatima El Moudir, Abdelilah El Moudir', '\"Documentaire, Drame\"', 'storage/affiches/XfaIX5ToEiBMKfQ8pj1DplvtHr8UKEukbZPWIDaH.jpg', 1, '2023-11-08', '2025-06-10 23:52:22', '2025-06-10 23:52:22'),
(38, 'Nimona', 'Dans un monde futuriste médiéval, Ballister Boldheart, un chevalier accusé à tort, fait équipe avec Nimona — une métamorphe rebelle et imprévisible. Ensemble, ils défient le système autoritaire pour rétablir la vérité. Drôle, émouvant et visuellement saisissant, Nimona casse les codes des récits héroïques traditionnels.', 101, 'PG', 'Nick Bruno, Troy Quane', 'Chloë Grace Moretz, Riz Ahmed, Eugene Lee Yang', '\"Animation, Science-fiction, Aventure\"', 'storage/affiches/DmBiLlGnzK8eMdkGEpoMtEpIQpemytLxr2UuLcx4.jpg', 1, '2023-06-30', '2025-06-10 23:55:41', '2025-06-10 23:55:41');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_06_155221_create_films_table', 1),
(6, '2025_06_06_155238_create_salles_table', 1),
(7, '2025_06_06_155250_create_seances_table', 1),
(8, '2025_06_06_155303_create_categories_table', 1),
(9, '2025_06_06_155315_create_reservations_table', 1),
(10, '2025_06_06_155329_create_reservation_categories_table', 1),
(12, '2025_06_09_181239_remove_nb_places_from_categories', 2),
(13, '2025_06_10_124603_add_paiement_confirme_to_reservations_table', 3),
(14, '2025_06_10_170333_add_places_disponibles_to_seances_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('aymandaki505@gmail.com', '$2y$10$QRIiTmjJ/yf41y8CHvoF7Ow8OGek4Z/xAAplSZece3cJa//KmoBRW', '2025-06-12 02:03:13');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seance_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `statut` enum('confirmée','annulée') NOT NULL DEFAULT 'confirmée',
  `date_reservation` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paiement_confirme` tinyint(1) NOT NULL DEFAULT 0,
  `montant_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `moyen_paiement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `seance_id`, `film_id`, `statut`, `date_reservation`, `created_at`, `updated_at`, `paiement_confirme`, `montant_total`, `moyen_paiement`) VALUES
(13, 5, 7, 13, 'confirmée', '2025-06-10 17:26:31', '2025-06-10 16:26:31', '2025-06-10 16:26:31', 0, '380.00', NULL),
(15, 5, 7, 13, 'annulée', '2025-06-10 17:43:30', '2025-06-10 16:43:30', '2025-06-10 17:25:57', 1, '100.00', 'Visa'),
(16, 5, 7, 13, 'annulée', '2025-06-10 17:43:30', '2025-06-10 16:43:30', '2025-06-10 17:10:28', 1, '100.00', 'Visa'),
(18, 5, 7, 13, 'confirmée', '2025-06-10 18:08:49', '2025-06-10 17:08:49', '2025-06-10 17:09:08', 1, '240.00', 'Visa'),
(19, 5, 7, 13, 'confirmée', '2025-06-10 22:58:38', '2025-06-10 21:58:38', '2025-06-10 21:59:35', 1, '220.00', 'Visa'),
(20, 5, 20, 35, 'annulée', '2025-06-11 02:39:23', '2025-06-11 01:39:23', '2025-06-12 00:59:52', 1, '200.00', 'Visa'),
(21, 6, 9, 38, 'annulée', '2025-06-11 12:28:49', '2025-06-11 11:28:49', '2025-06-11 11:29:34', 0, '160.00', NULL),
(22, 6, 18, 37, 'confirmée', '2025-06-11 12:29:51', '2025-06-11 11:29:51', '2025-06-11 11:32:48', 1, '200.00', 'Visa'),
(23, 1, 32, 7, 'confirmée', '2025-06-12 00:39:06', '2025-06-11 23:39:06', '2025-06-11 23:39:06', 0, '100.00', NULL),
(24, 5, 20, 35, 'confirmée', '2025-06-12 01:59:38', '2025-06-12 00:59:38', '2025-06-12 01:02:16', 1, '260.00', 'Visa'),
(25, 5, 23, 11, 'confirmée', '2025-06-12 12:49:43', '2025-06-12 11:49:43', '2025-06-12 11:51:23', 1, '260.00', 'Visa'),
(26, 5, 15, 16, 'annulée', '2025-06-12 20:01:53', '2025-06-12 19:01:53', '2025-06-12 19:02:52', 1, '60.00', 'Visa');

-- --------------------------------------------------------

--
-- Structure de la table `reservation_categories`
--

CREATE TABLE `reservation_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation_categories`
--

INSERT INTO `reservation_categories` (`id`, `reservation_id`, `category_id`, `quantite`, `created_at`, `updated_at`) VALUES
(18, 13, 1, 2, '2025-06-10 16:26:31', '2025-06-10 16:26:31'),
(19, 13, 2, 3, '2025-06-10 16:26:31', '2025-06-10 16:26:31'),
(20, 15, 1, 1, '2025-06-10 16:43:30', '2025-06-10 16:43:30'),
(21, 16, 1, 1, '2025-06-10 16:43:30', '2025-06-10 16:43:30'),
(24, 18, 2, 4, '2025-06-10 17:08:49', '2025-06-10 17:08:49'),
(25, 19, 1, 1, '2025-06-10 21:58:38', '2025-06-10 21:58:38'),
(26, 19, 2, 2, '2025-06-10 21:58:38', '2025-06-10 21:58:38'),
(27, 20, 1, 2, '2025-06-11 01:39:23', '2025-06-11 01:39:23'),
(28, 21, 1, 1, '2025-06-11 11:28:49', '2025-06-11 11:28:49'),
(29, 21, 2, 1, '2025-06-11 11:28:49', '2025-06-11 11:28:49'),
(30, 22, 1, 2, '2025-06-11 11:29:51', '2025-06-11 11:29:51'),
(31, 23, 1, 1, '2025-06-11 23:39:06', '2025-06-11 23:39:06'),
(32, 24, 1, 2, '2025-06-12 00:59:38', '2025-06-12 00:59:38'),
(33, 24, 2, 1, '2025-06-12 00:59:38', '2025-06-12 00:59:38'),
(34, 25, 1, 2, '2025-06-12 11:49:43', '2025-06-12 11:49:43'),
(35, 25, 2, 1, '2025-06-12 11:49:43', '2025-06-12 11:49:43'),
(36, 26, 2, 1, '2025-06-12 19:01:53', '2025-06-12 19:01:53');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nb_places` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `nom`, `nb_places`, `created_at`, `updated_at`) VALUES
(1, 'SALLE 1', 80, '2025-06-08 15:31:48', '2025-06-08 15:46:24'),
(2, 'SALLE 2', 80, '2025-06-08 15:32:06', '2025-06-08 15:32:06'),
(3, 'SALLE 3', 80, '2025-06-08 15:32:22', '2025-06-08 15:32:22'),
(4, 'SALLE 4', 80, '2025-06-08 15:32:36', '2025-06-08 15:32:36'),
(5, 'SALLE MAJESTIC 1', 200, '2025-06-08 15:33:11', '2025-06-08 15:33:11'),
(6, 'SALLE MAJESTIC 2', 220, '2025-06-08 15:34:41', '2025-06-08 15:34:41'),
(8, 'STUDIO FESTIVAL', 100, '2025-06-08 15:37:28', '2025-06-08 15:37:28');

-- --------------------------------------------------------

--
-- Structure de la table `seances`
--

CREATE TABLE `seances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `salle_id` bigint(20) UNSIGNED NOT NULL,
  `date_heure` datetime NOT NULL,
  `places_disponibles` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `seances`
--

INSERT INTO `seances` (`id`, `film_id`, `salle_id`, `date_heure`, `places_disponibles`, `created_at`, `updated_at`) VALUES
(7, 13, 5, '2025-06-19 14:30:00', 191, '2025-06-10 16:19:56', '2025-06-10 21:59:35'),
(8, 14, 1, '2025-06-15 19:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(9, 38, 2, '2025-06-12 19:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(10, 17, 8, '2025-06-21 18:00:00', 100, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(11, 8, 5, '2025-06-12 20:00:00', 200, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(12, 17, 2, '2025-06-14 14:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(13, 17, 2, '2025-06-15 12:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(14, 24, 3, '2025-06-20 22:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(15, 16, 4, '2025-06-18 10:30:00', 79, '2025-06-11 01:04:17', '2025-06-12 19:02:36'),
(16, 25, 8, '2025-06-16 14:00:00', 100, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(17, 24, 4, '2025-06-19 16:00:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(18, 37, 2, '2025-06-21 13:30:00', 78, '2025-06-11 01:04:17', '2025-06-11 11:32:48'),
(19, 16, 5, '2025-06-15 19:00:00', 200, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(20, 35, 4, '2025-06-21 11:00:00', 75, '2025-06-11 01:04:17', '2025-06-12 01:02:16'),
(21, 30, 4, '2025-06-15 18:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(22, 38, 5, '2025-06-14 10:00:00', 200, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(23, 11, 3, '2025-06-14 19:30:00', 77, '2025-06-11 01:04:17', '2025-06-12 11:51:23'),
(24, 11, 6, '2025-06-19 21:30:00', 220, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(25, 32, 1, '2025-06-18 13:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(26, 19, 2, '2025-06-13 17:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(27, 22, 2, '2025-06-11 10:30:00', 80, '2025-06-11 01:04:17', '2025-06-11 01:04:17'),
(28, 18, 6, '2025-06-17 18:30:00', 220, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(29, 6, 4, '2025-06-13 21:00:00', 80, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(30, 6, 8, '2025-06-20 22:30:00', 100, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(31, 30, 8, '2025-06-19 10:30:00', 100, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(32, 7, 3, '2025-06-14 17:00:00', 80, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(33, 7, 2, '2025-06-12 13:00:00', 80, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(34, 7, 6, '2025-06-11 11:30:00', 220, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(35, 11, 6, '2025-06-20 19:00:00', 220, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(36, 17, 3, '2025-06-15 19:00:00', 80, '2025-06-11 01:05:11', '2025-06-11 01:05:11'),
(37, 32, 1, '2025-06-18 10:30:00', 80, '2025-06-11 01:05:11', '2025-06-11 01:05:11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ayman', 'aymanedaki02@gmail.com', NULL, '$2y$10$HKI3VMj3iYiLjcNacKZ3j.QW6PMgpPh8Yiaq9JuMM5VaxyWwX/bXq', 'admin', NULL, '2025-06-07 18:33:59', '2025-06-07 18:33:59'),
(2, 'Adam', 'adamadam@gmail.com', NULL, '$2y$10$i1z364R334mU5q.6563rbeomBMv/17R0TjRe0qa8atpiJ4VGWAOiq', 'user', NULL, '2025-06-07 18:35:05', '2025-06-07 18:35:05'),
(3, 'Oussama', 'oussama@gmail.com', NULL, '$2y$10$/RuW3QbZg7L6kBpqb1ITpuq0S43x6YYddx2fUDtAEyuqiptdxAHKu', 'user', NULL, '2025-06-07 18:47:49', '2025-06-07 18:47:49'),
(4, 'Test User', 'user@example.com', '2025-06-09 15:41:49', '$2y$10$zbYxBbwTYvPHRrvToU77BuGpIpMzSIGYLBnwjgX8u92IxYKp05jJW', 'user', 'bt9GxRKuOZ', '2025-06-09 15:41:49', '2025-06-09 15:41:49'),
(5, 'Zaid', 'aymandaki505@gmail.com', NULL, '$2y$10$6lpk94N4wv6//qKOad/eR.JwsdlMl4zPFJUNmIXe7Kk.BLIgtwcZu', 'user', NULL, '2025-06-09 22:49:42', '2025-06-09 22:49:42'),
(6, 'Ismail', 'ismail100@gmail.com', NULL, '$2y$10$j4d0ms/3dUhFqrO9oKCnneOi95Z5L62jhafH0iY0MVTt9cPOS2b0G', 'user', NULL, '2025-06-11 11:14:51', '2025-06-11 11:14:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_seance_id_foreign` (`seance_id`),
  ADD KEY `reservations_film_id_foreign` (`film_id`);

--
-- Index pour la table `reservation_categories`
--
ALTER TABLE `reservation_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_categories_reservation_id_foreign` (`reservation_id`),
  ADD KEY `reservation_categories_category_id_foreign` (`category_id`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `seances`
--
ALTER TABLE `seances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seances_film_id_foreign` (`film_id`),
  ADD KEY `seances_salle_id_foreign` (`salle_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `reservation_categories`
--
ALTER TABLE `reservation_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `seances`
--
ALTER TABLE `seances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_seance_id_foreign` FOREIGN KEY (`seance_id`) REFERENCES `seances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservation_categories`
--
ALTER TABLE `reservation_categories`
  ADD CONSTRAINT `reservation_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_categories_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `seances`
--
ALTER TABLE `seances`
  ADD CONSTRAINT `seances_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `seances_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
