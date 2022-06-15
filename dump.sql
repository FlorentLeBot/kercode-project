-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table monprojet. articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.articles : ~4 rows (environ)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `title`, `content`, `img`, `created_at`, `img_name`) VALUES
	(23, 'As d&#039;or 2022', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe harum sed magni eligendi. Consectetur quia porro delectus dolorem. Nisi, quo libero provident aut ut placeat obcaecati architecto odio ex exercitationem.Nisi, quo libero provident aut ut placeat obcaecati architecto odio ex exercitationem.', '/public/upload/62aa168884a378.55171309.png', '2022-04-11 11:57:39', 'As d&#039;or 2022'),
	(41, 'Comment rendre les jeux de société plus éco-responsables ?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat non architecto numquam enim voluptas! Ipsam vitae incidunt reprehenderit qui omnis eius iure aliquid rerum voluptatem amet, ad repudiandae placeat vero iusto accusamus illo sit natus sunt dolore, tempore odit modi. Facere quae sequi quia molestias autem iusto quibusdam? Facere, neque, ad repudiandae placeat vero iusto accusamus illo sit natus sunt dolore, tempore odit modi. Facere quae sequi quia molestias autem iusto quibusdam? Facere, neque?', '/public/upload/62aa166d930482.46775953.jpg', '2022-06-06 14:34:38', 'Comment rendre les jeux de société plus éco-responsables'),
	(44, 'Le dernier fabricant de jeux d&#039;échecs en France relancé par une série Netflix', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit dignissimos at porro perspiciatis maxime quae eum minus illum, rem aspernatur totam officiis quas enim laborum nostrum. Cupiditate laboriosam architecto iusto?\r\nFugit dignissimos at porro perspiciatis maxime quae eum minus illum, rem aspernatur totam officiis quas enim laborum nostrum. Cupiditate laboriosam architecto iusto?', '/public/upload/62aa1642c2aa74.73599990.webp', '2022-06-15 14:06:04', 'Le dernier fabricant de jeux d&#039;échecs'),
	(45, 'As d&#039;or 2020', 'Nisi, quo libero provident aut ut placeat obcaecati architecto odio ex exercitationem.Nisi, quo libero provident aut ut placeat obcaecati architecto odio ex exercitationem.Nisi, quo libero provident aut ut placeat obcaecati architecto odio ex exercitationem.', '/public/upload/62aa16bd42f6a3.44433389.jpg', '2022-06-15 19:28:29', 'as d&#039;or 2020');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. article_tag
CREATE TABLE IF NOT EXISTS `article_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_tag_articles` (`article_id`),
  KEY `FK_article_tag_tags` (`tag_id`),
  CONSTRAINT `FK_article_tag_articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_article_tag_tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=443 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.article_tag : ~10 rows (environ)
/*!40000 ALTER TABLE `article_tag` DISABLE KEYS */;
INSERT INTO `article_tag` (`id`, `article_id`, `tag_id`) VALUES
	(433, 44, 2),
	(434, 44, 1),
	(435, 41, 2),
	(436, 41, 1),
	(437, 23, 3),
	(438, 23, 2),
	(439, 23, 1),
	(440, 45, 3),
	(441, 45, 2),
	(442, 45, 1);
/*!40000 ALTER TABLE `article_tag` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. board_games
CREATE TABLE IF NOT EXISTS `board_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.board_games : ~5 rows (environ)
/*!40000 ALTER TABLE `board_games` DISABLE KEYS */;
INSERT INTO `board_games` (`id`, `title`, `content`, `img`, `created_at`, `img_name`) VALUES
	(2, 'Les Loups-garous de Thiercelieux', ' Thiercelieux semble être un village normal, mais chaque nuit certains villageois se transforment en loups-garous pour dévorer d&#039;autres villageois. Chaque matin venu, les villageois découvrent une personne qui manque à l&#039;appel et se réunissent pour tenter de démasquer les loups-garous se cachant parmi eux.\r\n\r\nLe matériel de jeu est formé uniquement de cartes carrées représentant chacune une identité au recto et une même illustration pour toutes les cartes au verso. ', '/public/upload/62a9faccdfd3a6.41123322.jpg', '2022-04-13 08:33:01', 'Les Loups-garous de Thiercelieux'),
	(5, 'Dixit', ' Dixit est un jeu de société enchanteur qui vous invite à vous laisser porter par votre imagination. Découvrez 84 illustrations oniriques sur de grandes cartes sans texte et interprétez ces images énigmatiques. Accessible et familial, Dixit est un jeu idéal pour jouer en famille ou entre amis et découvrir votre entourage d’une nouvelle manière.', '/public/upload/62a9d9cf364857.40974609.jpg', '2022-04-26 12:29:19', 'Dixit'),
	(21, '6 qui surprend', ' Le but du jeu est de totaliser le moins de points possible à la fin de la partie. Pour cela, il ne faut pas ramasser de cartes Têtes de bœuf.\r\n\r\nLes cartes Têtes de bœuf sont numérotées de 1 à 104. Les cartes rapportent 1, 2, 3, 5 ou 7 points (en fonction du nombre de Têtes de bœuf présent) à celui qui les ramasse. ', '/public/upload/62a9d9bb4395e1.26755034.webp', '2022-06-06 14:20:21', '6 qui surprend'),
	(22, 'Vraiment très futé', ' Un jeu de roll and write (lancez les dés et écrivez) qui ravira les adeptes du genre. Après le grand succès du jeu &quot;Très futé&quot;, Wolfgang Warsch revient avec &quot;Vraiment très futé&quot;, où vous devrez être encore plus malins et stratégiques. Chaque joueur dispose d&#039;une feuille de jeu et d&#039;un crayon. À chaque tour, le joueur actif lance les 6 dés chiffrés de couleur. Il choisit un dé qu&#039;il place sur sa feuille de jeu et coche la case correspondante. Par exemple, si le dé est jaune, le joueur peut cocher la case jaune du numéro du dé ce qui lui permettra d&#039;obtenir des points, et même peut être un bonus renard ! Le joueur relance ensuite tous les dés de valeur supérieure à celui qu&#039;il vient de choisir, choisit un nouveau dé, coche la case correspondante, puis effectue un troisième et dernier lancé selon les mêmes règles. Chacun des autres joueurs choisit ensuite un dé parmi les dés restants, et coche une case de sa feuille de jeu. Chaque dé de couleur permet de gagner des points de façon bien distincte : on peut choisir la certitude de points facilement acquis dès le début du jeu, ou bien prendre plus de risques et espérer gagner le jackpot plus tard dans la partie. N&#039;oubliez pas d&#039;aller chercher les bonus qui pourront multiplier vos points, vous permettre de cocher des cases supplémentaires et déclencher des réactions en chaîne jouissives ! Un beau défi stratégique à tenter et retenter de multiples façons possibles.', '/public/upload/62a9d9a0b83427.28919719.jpg', '2022-06-06 14:23:08', 'Vraiment très futé'),
	(23, 'Pandemic', ' Quatre maladies mortelles menacent l’avenir de la planète! Avec votre équipe : combattez les redoutables virus!\r\n\r\nPandemic est un jeu de plateau et de stratégie. Vous et vos compagnons faites partie d&#039;une équipe d&#039;élite combattant quatre maladies mortelles. Dans ce jeu coopératif, tous les joueurs jouent ensemble contre le jeu lui-même. Relevez ce défi captivant et sauvez l&#039;humanité!', '/public/upload/62a9d98d15aa25.55872145.jpg', '2022-06-06 14:24:48', 'Pandemic');
/*!40000 ALTER TABLE `board_games` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. board_game_category
CREATE TABLE IF NOT EXISTS `board_game_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_game_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_board_game_category_board_games` (`board_game_id`),
  KEY `FK_board_game_category_categories` (`category_id`),
  CONSTRAINT `FK_board_game_category_board_games` FOREIGN KEY (`board_game_id`) REFERENCES `board_games` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_board_game_category_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.board_game_category : ~11 rows (environ)
/*!40000 ALTER TABLE `board_game_category` DISABLE KEYS */;
INSERT INTO `board_game_category` (`id`, `board_game_id`, `category_id`) VALUES
	(19, 23, 3),
	(20, 23, 2),
	(21, 22, 5),
	(22, 22, 2),
	(23, 21, 5),
	(24, 21, 1),
	(25, 5, 5),
	(26, 5, 3),
	(27, 5, 1),
	(28, 2, 5),
	(29, 2, 4);
/*!40000 ALTER TABLE `board_game_category` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.categories : ~5 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
	(1, 'cartes', '2022-04-04 14:17:26'),
	(2, 'dés', '2022-04-04 14:18:07'),
	(3, 'plateau', '2022-04-11 09:24:15'),
	(4, ' bluff', '2022-04-11 09:25:02'),
	(5, 'ambiance', '2022-04-11 09:25:18');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.contact : ~4 rows (environ)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `address`, `content`, `created_at`) VALUES
	(1, 'Florent', 'Le Bot', 'florent@gmail.com', '7 vers l&agrave; ', 'Bonjour', '2022-06-11 09:04:04'),
	(4, 'Florent', 'Le Bot', 'florent@gmail.com', '6 Rue Lecourbe 75015 Paris', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam ipsum veritatis earum atque ipsa aliquid totam similique tenetur, tempore consequatur sint quaerat, nostrum distinctio voluptas, excepturi minima voluptate! Nihil, error?', '2022-06-15 12:11:07');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.tags : ~4 rows (environ)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
	(1, 'événement', '2022-03-24 09:02:37'),
	(2, 'jeu', '2022-03-24 09:02:52'),
	(3, 'as d\'or', '2022-03-24 09:03:31'),
	(4, 'régle', '2022-03-24 09:03:51');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Listage de la structure de la table monprojet. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Listage des données de la table monprojet.users : ~1 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nom_utilisateur`, `mot_de_passe`, `created_at`, `admin`) VALUES
	(1, 'administrateur', '$2y$10$kiqZipmDnWorPvkkebT8GeSUXzWbI0mwr03DWG.rJnKGW53NsAf2C', '2022-03-23 16:03:32', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
