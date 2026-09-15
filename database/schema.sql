-- ============================================================
-- Scrap Buying Website — MySQL/MariaDB schema
-- utf8mb4, InnoDB. Import: mysql -u root -p < database/schema.sql
-- ============================================================

CREATE DATABASE IF NOT EXISTS `scrap_site`
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `scrap_site`;

-- Admin users (passwords stored with password_hash / bcrypt)
CREATE TABLE IF NOT EXISTS `users` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(100) NOT NULL,
    `email`         VARCHAR(190) NOT NULL,
    `password_hash` VARCHAR(255) NOT NULL,
    `active`        TINYINT(1)   NOT NULL DEFAULT 1,
    `last_login_at` DATETIME     NULL DEFAULT NULL,
    `created_at`    DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Contact requests — /actions/contact
CREATE TABLE IF NOT EXISTS `contact_requests` (
    `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(100) NOT NULL,
    `phone`      VARCHAR(30)  NOT NULL,
    `email`      VARCHAR(190) NOT NULL,
    `scrap_type` VARCHAR(100) NOT NULL DEFAULT '',
    `location`   VARCHAR(100) NOT NULL DEFAULT '',
    `message`    TEXT         NULL,
    `status`     ENUM('new','contacted','quoted','completed','spam') NOT NULL DEFAULT 'new',
    `created_at` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_contact_status` (`status`),
    KEY `idx_contact_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Pickup requests — /actions/pickup-request
CREATE TABLE IF NOT EXISTS `pickup_requests` (
    `id`               INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`             VARCHAR(100) NOT NULL,
    `phone`            VARCHAR(30)  NOT NULL,
    `whatsapp`         VARCHAR(30)  NOT NULL DEFAULT '',
    `scrap_type`       VARCHAR(100) NOT NULL,
    `description`      TEXT         NULL,
    `estimated_weight` VARCHAR(80)  NOT NULL DEFAULT '',
    `location`         VARCHAR(100) NOT NULL,
    `address`          VARCHAR(200) NOT NULL DEFAULT '',
    `pickup_date`      DATE         NULL,
    `pickup_time`      TIME         NULL,
    `message`          TEXT         NULL,
    `status`           ENUM('new','scheduled','completed','cancelled','spam') NOT NULL DEFAULT 'new',
    `created_at`       DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_pickup_status` (`status`),
    KEY `idx_pickup_date`   (`pickup_date`),
    KEY `idx_pickup_created`(`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Industrial requests — /actions/industrial-request
CREATE TABLE IF NOT EXISTS `industrial_requests` (
    `id`                 INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `company_name`       VARCHAR(150) NOT NULL,
    `contact_person`     VARCHAR(100) NOT NULL,
    `phone`              VARCHAR(30)  NOT NULL,
    `email`              VARCHAR(190) NOT NULL DEFAULT '',
    `scrap_type`         VARCHAR(100) NOT NULL,
    `estimated_quantity` VARCHAR(80)  NOT NULL DEFAULT '',
    `pickup_location`    VARCHAR(100) NOT NULL,
    `preferred_date`     DATE         NULL,
    `message`            TEXT         NULL,
    `status`             ENUM('new','contacted','scheduled','completed','spam') NOT NULL DEFAULT 'new',
    `created_at`         DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_ind_status` (`status`),
    KEY `idx_ind_created`(`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- Uploaded files (photos attached to requests)
CREATE TABLE IF NOT EXISTS `uploaded_files` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `request_type`  ENUM('contact','pickup','industrial') NOT NULL,
    `request_id`    INT NOT NULL,
    `file_path`     VARCHAR(500) NOT NULL,
    `original_name` VARCHAR(255) NOT NULL DEFAULT '',
    `mime_type`     VARCHAR(100) NOT NULL DEFAULT '',
    `file_size`     INT UNSIGNED NOT NULL DEFAULT 0,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_files_request` (`request_type`, `request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Site settings (optional overrides for config/site.php)
CREATE TABLE IF NOT EXISTS `settings` (
    `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `key_name`   VARCHAR(100) NOT NULL,
    `value`      TEXT NULL,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_settings_key` (`key_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- FAQs (admin-managed; scope = page route or 'global')
CREATE TABLE IF NOT EXISTS `faqs` (
    `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `scope`      VARCHAR(120) NOT NULL DEFAULT 'global',
    `question`   VARCHAR(300) NOT NULL,
    `answer`     TEXT NOT NULL,
    `sort_order` INT NOT NULL DEFAULT 0,
    `active`     TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_faqs_scope` (`scope`, `active`, `sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Testimonials (admin-managed; empty table = placeholder fallback)
CREATE TABLE IF NOT EXISTS `testimonials` (
    `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(100) NOT NULL,
    `role`       VARCHAR(100) NOT NULL DEFAULT '',
    `quote`      TEXT NOT NULL,
    `rating`     TINYINT UNSIGNED NOT NULL DEFAULT 5,
    `active`     TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_testimonials_active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Extra services (shown on the Services page, admin-managed)
CREATE TABLE IF NOT EXISTS `services` (
    `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `icon`       VARCHAR(60)  NOT NULL DEFAULT 'fa-truck-fast',
    `title`      VARCHAR(150) NOT NULL,
    `summary`    VARCHAR(500) NOT NULL DEFAULT '',
    `sort_order` INT NOT NULL DEFAULT 0,
    `active`     TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_services_active` (`active`, `sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Location extras (extra insight text shown on location pages)
CREATE TABLE IF NOT EXISTS `locations` (
    `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `slug`       VARCHAR(120) NOT NULL,
    `content`    TEXT NULL,
    `sort_order` INT NOT NULL DEFAULT 0,
    `active`     TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`),
    KEY `idx_locations_slug` (`slug`, `active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional seed data examples:
-- INSERT INTO settings (key_name, value) VALUES
--   ('site_name', 'Your Scrap Company'),
--   ('phone', '+966 13 000 0000');