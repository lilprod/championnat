-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 07 juin 2021 à 15:23
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `championnat`
--

-- --------------------------------------------------------

--
-- Structure de la table `accreditations`
--

DROP TABLE IF EXISTS `accreditations`;
CREATE TABLE IF NOT EXISTS `accreditations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_accreditation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_media` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_id` bigint(20) UNSIGNED DEFAULT NULL,
  `evenement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `journee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_match` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accreditations_type_accreditation_id_index` (`type_accreditation_id`),
  KEY `accreditations_stade_id_index` (`stade_id`),
  KEY `accreditations_media_id_index` (`media_id`),
  KEY `accreditations_type_media_id_index` (`type_media_id`),
  KEY `accreditations_user_id_index` (`user_id`),
  KEY `accreditations_ville_id_index` (`ville_id`),
  KEY `accreditations_evenement_id_index` (`evenement_id`),
  KEY `accreditations_journee_id_index` (`journee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accreditations`
--

INSERT INTO `accreditations` (`id`, `type_accreditation_id`, `stade_id`, `media_id`, `type_media_id`, `user_id`, `nom_media`, `slug`, `ville_id`, `evenement_id`, `journee_id`, `status`, `date_match`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 5, 1, 11, 'NAMIBIA TV', 'namibia-tv', 1, 2, 1, 0, '2021-05-08', '2021-05-07 11:52:53', '2021-05-07 11:52:53');

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_accreditation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `accreditation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_passport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_cni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_press_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cni_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `press_card_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agents_type_accreditation_id_index` (`type_accreditation_id`),
  KEY `agents_accreditation_id_index` (`accreditation_id`),
  KEY `agents_media_id_index` (`media_id`),
  KEY `agents_type_media_id_index` (`type_media_id`),
  KEY `agents_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `type_accreditation_id`, `accreditation_id`, `media_id`, `type_media_id`, `user_id`, `name`, `firstname`, `birth_date`, `slug`, `email`, `phone_number`, `address`, `profile_picture`, `city`, `state`, `postal_code`, `nationality`, `gender`, `profession`, `num_passport`, `num_cni`, `num_press_card`, `passport_image`, `cni_image`, `press_card_image`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 5, 1, NULL, 'ROUKIYA', 'Franck', '1978-04-12', NULL, NULL, NULL, 'Der salam, Namibia', 'image3_1620391973.jpg', NULL, NULL, NULL, 'Namibian', 'M', 'Reporter', '123456879', NULL, NULL, 'image1_1620391973.jpg', NULL, 'image2_1620391973.jpg', '2021-05-07 11:52:53', '2021-05-07 11:52:53');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pas de catégorie', 'pas-de-categorie', 'Pas de catégorie', '2021-04-12 17:40:06', '2021-04-12 17:40:06'),
(2, 'Articles', 'articles', 'Catégorie des articles', '2021-04-12 17:40:28', '2021-04-12 17:40:28');

-- --------------------------------------------------------

--
-- Structure de la table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_match` date DEFAULT NULL,
  `journee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `left_place` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evenements_journee_id_index` (`journee_id`),
  KEY `evenements_stade_id_index` (`stade_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `title`, `date_match`, `journee_id`, `stade_id`, `quota`, `left_place`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ASKO - SARA FC', '2021-05-08', 1, 3, 25, 23, 'asko-sara-fc', 'Rencontre de la première journée entre ASKO et SARA FC dont 25 places disponible pour les média.', 0, '2021-03-17 17:35:46', '2021-04-02 15:29:19'),
(2, 'TOGO - NAMIBIE', '2021-05-08', 1, 1, 20, 19, 'togo-namibie', 'Match amical TOGO - NAMIBIE', 0, '2021-05-07 11:48:55', '2021-05-07 11:52:53');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_media` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_id` bigint(20) UNSIGNED DEFAULT NULL,
  `evenement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `journee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inscriptions_type_media_id_index` (`type_media_id`),
  KEY `inscriptions_stade_id_index` (`stade_id`),
  KEY `inscriptions_ville_id_index` (`ville_id`),
  KEY `inscriptions_evenement_id_index` (`evenement_id`),
  KEY `inscriptions_journee_id_index` (`journee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `type_media_id`, `stade_id`, `nom_media`, `slug`, `ville_id`, `evenement_id`, `journee_id`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'TVT', 'tvt', 2, 1, 1, 'tvt@gmail.com', '+22898745632', '2021-03-18 12:28:08', '2021-03-18 12:28:08'),
(2, 1, 3, 'TV2', 'tv2', 2, 1, 1, 'tv2@gmail.com', '+22898745632', '2021-03-18 12:33:32', '2021-03-18 12:33:32');

-- --------------------------------------------------------

--
-- Structure de la table `journees`
--

DROP TABLE IF EXISTS `journees`;
CREATE TABLE IF NOT EXISTS `journees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `journees`
--

INSERT INTO `journees` (`id`, `title`, `code`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Journée 1', 'J1', 'journee-1', 'Première journée', 1, '2021-03-17 12:15:17', '2021-03-18 11:35:37'),
(2, 'Journée 2', 'J2', 'journee-2', 'Deuxième journée', 0, '2021-03-17 12:15:44', '2021-03-17 12:15:44');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_media` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_passport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_cni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_press_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cni_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `press_card_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_type_media_id_index` (`type_media_id`),
  KEY `media_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `type_media_id`, `user_id`, `nom_media`, `name`, `firstname`, `birth_date`, `slug`, `email`, `phone_number`, `address`, `profile_picture`, `city`, `state`, `postal_code`, `nationality`, `gender`, `profession`, `num_passport`, `num_cni`, `num_press_card`, `passport_image`, `cni_image`, `press_card_image`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'TVT', 'ROUKI', 'Jean', '1978-01-14', 'tvt', 'prodigegraphics@gmail.com', '+22822104596', 'Cotonou-Bénin', 'avatar_1617380935.jpg', NULL, NULL, NULL, 'Béninoise', 'M', 'Journaliste', '1231465987', NULL, NULL, 'image_1617380935.png', NULL, 'image1_1617380935.jpg', '2021-04-01 16:39:29', '2021-04-02 15:28:55'),
(4, 2, 10, 'SPORT FM', NULL, NULL, NULL, 'sport-fm', 'sportfm@gmail.com', '+22898745632', NULL, 'avatar.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-13 18:07:08', '2021-04-13 18:07:08'),
(5, 1, 11, 'NAMIBIA TV', NULL, NULL, NULL, 'namibia-tv', 'namibiatv@gmail.com', '+26432145698', NULL, 'avatar.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-07 11:49:55', '2021-05-07 11:49:55');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_03_17_085749_create_permission_tables', 1),
(10, '2021_03_17_102613_create_type_media_table', 1),
(11, '2021_03_17_102634_create_villes_table', 1),
(12, '2021_03_17_102648_create_stades_table', 1),
(18, '2021_03_17_102742_create_evenements_table', 3),
(14, '2021_03_17_103405_create_journees_table', 1),
(20, '2021_03_17_104146_create_inscriptions_table', 4),
(21, '2021_03_31_180831_create_media_table', 5),
(22, '2021_03_31_182507_create_type_accreditations_table', 5),
(25, '2021_03_31_182527_create_accreditations_table', 6),
(26, '2021_04_02_115940_create_saisons_table', 6),
(27, '2021_04_02_120211_create_divisions_table', 6),
(28, '2021_04_02_120224_create_poules_table', 6),
(29, '2021_04_02_120241_create_phases_table', 6),
(30, '2020_07_29_174724_create_categories_table', 7),
(31, '2020_08_04_165150_create_posts_table', 7),
(32, '2021_05_07_121038_create_agents_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'LqAiQWsNhoaRkEBwEBko30BAlcHyTGssHNxdtdb7', NULL, 'http://localhost', 1, 0, 0, '2021-03-17 10:51:14', '2021-03-17 10:51:14'),
(2, NULL, 'Laravel Password Grant Client', 'z98xk8ucLKDouNhWsjdBJfVOisjPZGzy6oi2cgIo', 'users', 'http://localhost', 0, 1, 0, '2021-03-17 10:51:14', '2021-03-17 10:51:14');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-17 10:51:14', '2021-03-17 10:51:14');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin Permissions', 'web', '2021-03-17 11:26:08', '2021-03-17 11:26:08'),
(2, 'Media Permissions', 'web', '2021-03-17 11:28:01', '2021-03-17 11:28:01'),
(3, 'Super Permissions', 'web', '2021-04-09 09:25:22', '2021-04-09 09:25:22');

-- --------------------------------------------------------

--
-- Structure de la table `phases`
--

DROP TABLE IF EXISTS `phases`;
CREATE TABLE IF NOT EXISTS `phases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` mediumtext COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `body`, `cover_image`, `attach_file`, `video_url`, `category_id`, `meta_keywords`, `meta_description`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Match de ASK et Sémassi', 'match-de-ask-et-semassi', 'Match de ASK et Sémassi', 'Match de ASK et Sémassi fut un grand mach', 'FTF-banner3_1618342138.png', NULL, NULL, 2, NULL, NULL, 1, 1, '2021-04-13 18:28:58', '2021-04-13 18:28:58');

-- --------------------------------------------------------

--
-- Structure de la table `poules`
--

DROP TABLE IF EXISTS `poules`;
CREATE TABLE IF NOT EXISTS `poules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-03-17 11:26:08', '2021-03-17 11:26:08'),
(2, 'Media', 'web', '2021-03-17 11:28:14', '2021-03-17 11:28:14'),
(3, 'Super', 'web', '2021-04-09 09:25:41', '2021-04-09 09:25:41');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `saisons`
--

DROP TABLE IF EXISTS `saisons`;
CREATE TABLE IF NOT EXISTS `saisons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `saisons_division_id_index` (`division_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stades`
--

DROP TABLE IF EXISTS `stades`;
CREATE TABLE IF NOT EXISTS `stades` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `ville_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stades_ville_id_index` (`ville_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stades`
--

INSERT INTO `stades` (`id`, `title`, `slug`, `description`, `ville_id`, `created_at`, `updated_at`) VALUES
(1, 'KEGUE', 'kegue', 'Stade de Kégué-Lomé', 1, '2021-03-17 12:35:51', '2021-03-17 12:35:51'),
(2, 'JCA', 'jca', 'Stade JCA Lomé', 1, '2021-03-17 12:37:01', '2021-03-17 12:37:01'),
(3, 'SOKODE', 'sokode', 'Stade de Sokodé', 2, '2021-03-17 17:34:12', '2021-03-17 17:34:12');

-- --------------------------------------------------------

--
-- Structure de la table `type_accreditations`
--

DROP TABLE IF EXISTS `type_accreditations`;
CREATE TABLE IF NOT EXISTS `type_accreditations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_accreditations`
--

INSERT INTO `type_accreditations` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Accréditation compétitions nationales', 'Gestion des accréditations concerne les compétitions nationales (Championnat de D1 etc.).', '2021-04-01 16:46:13', '2021-04-01 16:46:13'),
(2, 'Accréditation compétitions internationales', 'Gestion des compétitions internationales comme le tournoi zonal de l’UFOA…', '2021-04-01 16:47:55', '2021-04-01 16:47:55');

-- --------------------------------------------------------

--
-- Structure de la table `type_media`
--

DROP TABLE IF EXISTS `type_media`;
CREATE TABLE IF NOT EXISTS `type_media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_media`
--

INSERT INTO `type_media` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Télévision', 'Type Télévision', '2021-03-17 11:41:22', '2021-03-17 11:41:22'),
(2, 'Radio', 'Type Média Radio', '2021-03-17 18:29:20', '2021-03-17 18:29:20'),
(3, 'Presse écrite', 'Type Média Presse écrite', '2021-03-17 18:29:41', '2021-03-17 18:29:41'),
(4, 'Média en ligne', 'Type Média Média en ligne', '2021-03-17 18:30:02', '2021-03-17 18:30:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `username`, `email`, `phone_number`, `email_verified_at`, `password`, `address`, `profile_picture`, `role_id`, `code`, `is_activated`, `city`, `state`, `postal_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'KOSSIGAN', 'Prodige', NULL, 'pkossigan@gmail.com', '+22893343699', NULL, '$2y$10$ljJ4OOwhOEs9Tn7VFOptPetuixDWcyghvcvpnDgh6C.cw1H4BEIHy', 'Lomé-Togo', 'avatar.jpg', 3, NULL, 1, NULL, NULL, NULL, 'JQiao2kDCRpDUT459qE2P1ubwRu7JViTBYbJ8XzqhWbhAAL63vXeSnpxIKRG', '2021-03-17 11:19:38', '2021-04-09 09:35:35'),
(2, 'DJOBO', 'Izandine', NULL, 'izandine@gmail.com', '+22892054230', NULL, '$2y$10$O7HFDvDYdNOvyyETdkfC7.WMUxFogOfb00EBbEZuxDSFKGLzw7lEa', 'Lomé', 'avatar.jpg', 3, NULL, 1, NULL, NULL, NULL, NULL, '2021-03-17 12:39:32', '2021-03-17 12:39:32'),
(5, 'TVT', NULL, NULL, 'tvt@gmail.com', NULL, NULL, '$2y$10$2ecCF2ff7/EEOX.Abl0tCeZmn4AEltPnhUxCOpuYGqKcWd5Mx9UGq', NULL, 'avatar.jpg', 2, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-01 16:39:28', '2021-04-01 16:39:28'),
(7, 'KOUEVI', 'Aristide', NULL, 'aristidekuevidjin@hotmail.fr', '+22897856324', NULL, '$2y$10$XVorLbxRw8yEaWmh5NiLyOWmo5/p7wp3Ql3bGqO5gxkCsiny5jsqK', 'Lomé-Togo', 'avatar.jpg', 1, NULL, 0, NULL, NULL, NULL, NULL, '2021-04-12 14:23:52', '2021-04-12 14:23:52'),
(10, 'SPORT FM', NULL, NULL, 'sportfm@gmail.com', NULL, NULL, '$2y$10$GON.xFMIZdmLVmNJOxtCXuOmpVvOKnZj/xFQaIng6J6IeHnPEU4fa', NULL, 'avatar.jpg', 2, NULL, 1, NULL, NULL, NULL, NULL, '2021-04-13 18:07:08', '2021-04-13 18:27:34'),
(11, 'NAMIBIA TV', NULL, NULL, 'namibiatv@gmail.com', NULL, NULL, '$2y$10$.YJWgfApFdTvh6wq.zbzReqbHq.5PY1x0eNGWekDLvwlT0T4Zm/Uy', NULL, 'avatar.jpg', 2, NULL, 1, NULL, NULL, NULL, NULL, '2021-05-07 11:49:55', '2021-05-07 11:50:10');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'LOME', 'Ville de Lomé', '2021-03-17 11:56:52', '2021-03-17 11:56:52'),
(2, 'SOKODE', 'Ville de Sokodé', '2021-03-17 11:57:06', '2021-03-17 11:57:06'),
(3, 'KARA', 'Ville de Kara', '2021-03-17 11:57:17', '2021-03-17 11:57:17'),
(4, 'ATAKPAME', 'Ville d\'Atakpamé', '2021-03-17 11:57:41', '2021-03-17 11:57:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
