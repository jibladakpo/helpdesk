-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Octobre 2015 à 15:18
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `helpdesk`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `idCategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `idCategorie`) VALUES
(1, 'Réseau', NULL),
(2, 'Routage', 1),
(3, 'Serveurs', 1),
(4, 'Poste de travail', NULL),
(8, 'Système', NULL),
(9, 'Logiciels', NULL),
(10, 'Assistance', NULL),
(11, 'Helpdesk', 10),
(12, 'Identité et droits d''accès', 10);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idCategorie` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `version` varchar(20) NOT NULL DEFAULT '1.0',
  `popularity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`id`, `titre`, `contenu`, `dateCreation`, `idCategorie`, `idUser`, `version`, `popularity`) VALUES
(1, 'Comment formuler ', '<p>L&#39;adresse de l&#39;application est https://... L&#39;acc&egrave;s &agrave; l&#39;interface web du HelpDesk requiert votre connexion sur le service d&#39;authentification. Une fois connect&eacute;, vous retrouverez tout ce qui concerne votre demande : groupe attributaire, technicien charg&eacute; du traitement, suivis, solution, &hellip; Pour formuler une nouvelle demande, vous devez commencer par utiliser l&#39;entr&eacute;e du menu ou l&#39;ic&ocirc;ne associ&eacute;e &agrave; &laquo; Cr&eacute;er un ticket &raquo;. Dans le formulaire qui vous est alors propos&eacute;, seuls trois champs sont obligatoires : Cat&eacute;gorie : elle permet l&#39;attribution de votre demande au groupe concern&eacute; ; Titre : il est utilis&eacute; pour afficher l&#39;ensemble des demandes, aussi veillez &agrave; ce qu&#39;il soit concis, &agrave; la fois synth&eacute;tique et pr&eacute;cis Description : faites figurer ici toutes les informations que vous jugerez utiles pour permettre le traitement de votre demande. Des informations compl&eacute;mentaires pourront vous &ecirc;tre demand&eacute;es si n&eacute;cessaire. Les autres champs, bien qu&#39;optionnels, peuvent &ecirc;tre utiles voire n&eacute;cessaires au traitement de votre demande : Type : Incident (par d&eacute;faut) en cas de dysfonctionnement, ou simple demande Urgence : Elle est crois&eacute;e avec l&#39;impact &eacute;valu&eacute; par le technicien pour d&eacute;finir la priorit&eacute; utilis&eacute;e pour trier l&#39;ensemble des demandes. Suivi par courriel : Choisissez &laquo; Non &raquo; si vous ne souhaitez pas recevoir d&#39;information concernant votre demande par m&eacute;l. &Eacute;lement associ&eacute; : Si n&eacute;cessaire et s&#39;il est automatiquement identifi&eacute;, vous pourrez ici associer votre poste de travail ou l&#39;un de ses logiciels &agrave; votre demande. Fichier : &Agrave; utiliser pour joindre un fichier &agrave; votre demande. Une fois le formulaire rempli, cr&eacute;er votre ticket en cliquant sur le bouton &laquo; Envoyer message &raquo;. Un compte-rendu appara&icirc;t alors dans lequel figure le num&eacute;ro associ&eacute; &agrave; votre demande &ndash; le ticket &ndash; que vous pourrez utiliser pour obtenir des informations a posteriori.</p>\r\n', '2015-09-28 06:56:46', 11, 1, '1.0', 0),
(2, 'À quoi sert le HelpDesk ?\r\n', 'Le HelpDesk correspond au projet 2 « Évolution de l''outil d''assistance » du programme 6 « Accompagner la consolidation et la transformation de la fonction SI au sein de notre établissement ».\r\n\r\nL''un des objectifs stratégiques à l''origine du projet est d''homogénéiser la prestation d''assistance sur tous les sites et pour tous les usagers afin d''offrir un niveau de service équitablement accessible.\r\n\r\nEn termes opérationnels, l''outil développé permet de disposer d’un guichet d’assistance unique, de mettre en œuvre des outils et des procédures communes et d''identifier les problèmes redondants.\r\n\r\nDu point de vue de l''usager, il apporte l''assurance d''un enregistrement formel des demandes et des fonctionnalités d''information et de suivi systématiques.', '2015-05-14 10:43:57', 11, 1, '1.0', 5),
(3, 'Procédure de changement de mot de passe', '<h2>Objet</h2>\r\n\r\nCette procédure a pour but de fournir des conseils et des recommandations pour la création d''un mot de passe fort.\r\n\r\n<h2>Domaine d''application</h2>\r\n\r\nCette procédure s''adresse à tous les utilisateurs disposant d''un compte d''accès au système d''information\r\n\r\n<h2>Descriptif</h2>\r\n\r\n<h3>Pré-requis :</h3>\r\n\r\nUn bon mot de passe est un mot de passe suffisamment long, facile à retenir et très difficile à deviner. Votre mot de passse doit être constitué d''au moins 8 caractères dont une majuscule et un chiffre. Il peut contenir des lettres non accentuées, des chiffres, et certains caractères spéciaux : _ ! @ # $ % - + = < > ( ) { } [ ] | : ; , . ? ~ &\r\n\r\n<h3>Quelques procédés ou comment faire ?</h3>\r\n<ul>\r\n<li>Accoler mots et chiffres : Faire3Pas</li>\r\n<li>Créer un rébus : 71fame3MAIC&O (c''est un fameux 3 mâts Hisse et Ho)</li>\r\n<li>Pensez à une chanson ou un poème et extrayez les premières lettres : ottoc4ocR! (one, two, three, o''clock, four o''clock, rock !)</li>\r\n<li>Choisissez un mot de passe en y insérant des caractères spéciaux g1M2p#DUtI1 (j''ai un mot de passe différent du tien)</li>\r\n<li>Ne pas utiliser de mot de passe ayant un rapport avec soi (noms, dates de naissance,..)</li>\r\n<li>Vous avez tout intérêt à mélanger les possibilités offertes : lettres, chiffres et caractères spéciaux.</li>\r\n</ul>\r\n<h3>Respectez les règles</h3>\r\n\r\nVous êtes responsable de l''usage qui est fait de votre compte d''accès au système d''information. Pour garantir la sécurité de votre mot de passe, nous vous invitons à suivre les conseils ci-dessous:\r\n<ul>\r\n<li>Ne le communiquez à personne (il garantit votre identité et vous identifie personnellement dans notre système d''information</li>\r\n<li>Ne le notez pas sur un post-it</li>\r\n<li>Verrouillez ou fermez systématiquement votre session en quittant votre poste de travail</li>\r\n<li>Changez-le régulièrement</li>\r\n<li>N''utilisez pas le mot de passe de votre compte d''accès au système d''information pour un autre compte</li>\r\n</ul>', '2015-05-14 09:36:17', 12, 1, '1.0', 22),
(4, 'question ', 'test', '2015-09-22 12:33:45', 2, 2, '1.0', 0),
(5, 'test', 'testtt', '2015-09-22 12:39:35', 2, 1, '1.0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  `idTicket` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `Message` (`id`, `contenu`, `date`, `idUser`, `idTicket`) VALUES
(1, 'Reçu<br>\r\nPouvez-vous préciser le message affiché ?<br>\r\nMerci', '2015-05-10 22:55:31', 1, 1),
(2, 'Le message est <strong>`vidage de la mémoire physique...`</strong>', '2015-05-10 23:20:30', 2, 1),
(3, '<p>test</p>\r\n', '2015-10-01 07:37:37', 1, 1),
(5, '', '2015-10-01 07:38:54', 1, 2),
(6, '<p>test123</p>\r\n', '2015-10-01 07:43:34', 2, 2),
(7, '<p>testttttt</p>\r\n', '2015-10-01 07:46:20', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `Statut` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `ordre` int(11) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut`
--

INSERT INTO `Statut` (`id`, `libelle`, `ordre`, `icon`) VALUES
(1, 'Nouveau', 0, 'flag'),
(2, 'Attribué', 1, 'user'),
(3, 'En attente', 2, 'hourglass'),
(4, 'Résolu', 3, 'check'),
(5, 'Clos', 5, 'off');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE IF NOT EXISTS `Ticket` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `type` set('demande','incident') NOT NULL DEFAULT 'demande',
  `idCategorie` int(11) NOT NULL,
  `description` text NOT NULL,
  `idUser` int(11) NOT NULL,
  `idStatut` int(11) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ticket`
--

INSERT INTO `Ticket` (`id`, `titre`, `type`, `idCategorie`, `description`, `idUser`, `idStatut`, `dateCreation`) VALUES
(1, 'Ecran bleu', '', 8, '<p>Ecran bleu sur ouverture session windows</p>\r\n', 2, 3, '2015-05-10 16:27:29'),
(2, 'impossible de se connecter', 'incident', 12, 'Impossible de se connecter à mon compte :\r\nLe message affiché est "Les informations de compte n''ont pas permis votre authentification".\r\n\r\nJe n''ai pas trouvé la procédure de récupération de mot de passe.', 3, 1, '2015-05-14 10:40:40'),
(3, 'logiciel défectueux', '', 9, '<p>Le logiciel ne marche pas. 2</p>\r\n', 2, 1, '2015-09-17 09:38:13'),
(4, 'réseau', '', 8, '<p>marche pas&nbsp;</p>\r\n', 1, 1, '2015-09-28 08:40:33');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `User` (`id`, `login`, `password`, `mail`, `admin`) VALUES
(1, 'admin', 'admin', 'admin@local.fr', 1),
(2, 'user', 'user', 'user@local.fr', 0),
(3, 'autreUser', 'autreuser', 'autreuser@local.fr', 0),
(4, 'moi', '123456789', 'moi@local.fr', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id`), ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `faq`
--
ALTER TABLE `Faq`
  ADD PRIMARY KEY (`id`), ADD KEY `idCategorie` (`idCategorie`,`idUser`), ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`id`), ADD KEY `idUser` (`idUser`), ADD KEY `idTicket` (`idTicket`);

--
-- Index pour la table `statut`
--
ALTER TABLE `Statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`id`), ADD KEY `idCategorie` (`idCategorie`), ADD KEY `idStatut` (`idStatut`,`idUser`), ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `Faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `Message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `Statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `Ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `Categorie`
ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `faq`
--
ALTER TABLE `Faq`
ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `faq_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `Message`
ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `Ticket`
ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idStatut`) REFERENCES `statut` (`id`),
ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
