SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Structure de la table `messages`
--
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pseudo_user` varchar(15) NOT NULL,
  `message` varchar(5000) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=153 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `pseudo_user`, `message`) VALUES
(102, 'Zoé', 'je recherche des informations'),
(103, 'Martin', 'j'' trouvé les informations ....'),
(104, 'Rémy', 'Ce sujet m''interesse'),
(105, 'Zoé', 'je recherche des informations'),
(106, 'Martin', 'j'' trouvé les informations ....'),
(107, 'Rémy', 'Ce sujet m''interesse'),
(108, 'Zoé', 'je recherche des informations'),
(109, 'Martin', 'j'' trouvé les informations ....'),
(110, 'Rémy', 'Ce sujet m''interesse'),
(111, 'Zoé', 'je recherche des informations'),
(112, 'Martin', 'j'' trouvé les informations ....'),
(113, 'Rémy', 'Ce sujet m''interesse'),
(114, 'Zoé', 'je recherche des informations'),
(115, 'Martin', 'j'' trouvé les informations ....'),
(116, 'Rémy', 'Ce sujet m''interesse'),
(117, 'Zoé', 'je recherche des informations'),
(118, 'Martin', 'j'' trouvé les informations ....'),
(119, 'Rémy', 'Ce sujet m''interesse'),
(120, 'Zoé', 'je recherche des informations'),
(152, 'Bernadette', 'J''hésite pour les multiplicités');


