SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ingredients_names` (
  `id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `ingredients_count` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `recipes_ingredients` (
  `id` int(10) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ingredients_names`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `recipes_ingredients`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `ingredients`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `ingredients_names`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `recipes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `recipes_ingredients`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
