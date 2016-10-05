/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных test_m1
CREATE DATABASE IF NOT EXISTS `test_m1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test_m1`;

-- Дамп структуры для таблица test_m1.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_m1.posts: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `content`, `created`, `modified`, `img`) VALUES
	(1, 'Пост1', '                                                            <span style="font-weight: normal;">               Дав<span style="font-style: italic;">но вы</span>яснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение ш</span><span style="font-style: normal; font-weight: bold;">аблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и р</span>едакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).                                                       ', '2016-10-05 17:17:02', '2016-10-05 16:31:44', ''),
	(2, 'Пост2', '<span style="font-weight: bold;">               Lorem Ipsum </span><span style="font-weight: normal;">- это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.           </span>', '2016-10-05 19:26:12', '2016-10-05 17:45:42', 'a1.jpg'),
	(3, 'пост3', '               йй<span style="text-decoration: underline;">йййййй</span>йййййййййййййййййй           ', '2016-10-05 16:32:22', '2016-10-05 17:20:25', '1475677203DsbovXI2Too.jpg'),
	(4, 'пост4', '               <span style="font-weight: normal;">                                             йй<span style="text-decoration: underline;">йййййй</span>йй2</span><span style="font-weight: bold;">2222</span>           ', '2016-10-05 16:33:23', '2016-10-05 17:24:01', '14756772711475207607157521948.gif');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
