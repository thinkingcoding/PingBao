CREATE DATABASE IF NOT EXISTS `pingbao`;

USE `pingbao`;

CREATE TABLE IF NOT EXISTS `user` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `name` VARCHAR(50) NOT NULL COMMENT '�û���',
    `email` VARCHAR(255) NOT NULL COMMENT '�û�����',
    `password` VARCHAR(50) NOT NULL COMMENT '�û�����',
    `avatar_file` VARCHAR(255) DEFAULT NULL COMMENT 'ͷ���ļ�',
    `verified` TINYINT NOT NULL COMMENT '�Ƿ���֤',
    `forbidden` TINYINT UNSIGNED NOT NULL COMMENT '�Ƿ��ֹ',
    `reg_time` DATETIME DEFAULT NULL COMMENT 'ע��ʱ��',
    `reg_ip` VARCHAR(15) DEFAULT NULL COMMENT 'ע��IP',
    `last_login` DATETIME DEFAULT NULL COMMENT '����¼ʱ��',
    `last_ip` VARCHAR(15) DEFAULT NULL COMMENT '����¼IP',
    PRIMARY KEY(`id`),
    KEY `name` (`name`),
    KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '�û���';

CREATE TABLE IF NOT EXISTS `goods` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '��ƷID',
    `name` VARCHAR(50) NOT NULL COMMENT '��Ʒ����',
    `category_id` INT UNSIGNED NOT NULL COMMENT '��Ʒ����',
    `avatar_file` VARCHAR(255) DEFAULT NULL COMMENT '��ƷͼƬ',
    `specification` VARCHAR(1023) DEFAULT NULL COMMENT '��Ʒ���������',
    `5star_count` INT UNSIGNED DEFAULT NULL COMMENT '������',
    `4star_count` INT UNSIGNED DEFAULT NULL COMMENT '������',
    `3star_count` INT UNSIGNED DEFAULT NULL COMMENT '������',
    `2star_count` INT UNSIGNED DEFAULT NULL COMMENT '������',
    `1star_count` INT UNSIGNED DEFAULT NULL COMMENT 'һ����',
    PRIMARY KEY(`id`),
    KEY `name` (`name`),
    KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '��Ʒ��';

CREATE TABLE IF NOT EXISTS `goods_histroy` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '��ƷID',
    `goods_id` INT UNSIGNED NOT NULL,
    `category_id` INT UNSIGNED NOT NULL COMMENT '��Ʒ����',
    `avatar_file` VARCHAR(255) DEFAULT NULL COMMENT '��ƷͼƬ',
    `specification` VARCHAR(1023) DEFAULT NULL COMMENT '��Ʒ���������',
    `uid` INT UNSIGNED NOT NULL COMMENT '������ID',
    `create_time` DATETIME DEFAULT NULL COMMENT '����ʱ��',
    PRIMARY KEY(`id`),
    KEY `goods_id` (`goods_id`),
    KEY `category_id` (`category_id`),
    KEY `uid` (`uid`),
    KEY `create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '��Ʒ�༭��ʷ��';

CREATE TABLE IF NOT EXISTS `review` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '����ID',
    `goods_id` INT UNSIGNED NOT NULL COMMENT '��ƷID',
    `pros` VARCHAR(1023) DEFAULT NULL COMMENT '��Ʒ�ŵ�',
    `cons` VARCHAR(1023) DEFAULT NULL COMMENT '��Ʒȱ��',
    `summary` VARCHAR(1023) DEFAULT NULL COMMENT '��Ʒ�ܽ�',
    `rate` TINYINT DEFAULT NULL COMMENT '��Ʒ����',
    `useful_count` INT UNSIGNED DEFAULT NULL COMMENT '������ô���',
    `unuseful_count` INT UNSIGNED DEFAULT NULL COMMENT '������ô���',
    `uid` INT UNSIGNED NOT NULL COMMENT '������',
    `create_time` DATETIME NOT NULL COMMENT '����ʱ��',
    PRIMARY KEY(`id`),
    KEY `goods_id` (`goods_id`),
    KEY `rate` (`rate`),
    KEY `uid` (`uid`),
    KEY `create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '��Ʒ���۱�';

CREATE TABLE IF NOT EXISTS `tag` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '��ǩ��';

CREATE TABLE IF NOT EXISTS `review_tag` (
    `review_id` INT UNSIGNED NOT NULL,
    `tag_id` INT UNSIGNED NOT NULL,
    PRIMARY KEY(`review_id`, `tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '���۱�ǩ��';

CREATE TABLE IF NOT EXISTS `comment` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `review_id` INT UNSIGNED NOT NULL,
    `parent_id` INT UNSIGNED NOT NULL, 
    `uid` INT UNSIGNED NOT NULL,
    `content` VARCHAR(255) DEFAULT NULL,
    `create_time` DATETIME DEFAULT NULL,
    PRIMARY KEY(`id`),
    KEY `review_id` (`review_id`),
    KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '�������۱�';

CREATE TABLE IF NOT EXISTS `category` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `parent_id` INT UNSIGNED NOT NULL,
    `name` VARCHAR(50) DEFAULT NULL,
    PRIMARY KEY(`id`),
    KEY `parent_id` (`parent_id`),
    KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '��Ʒ��Ŀ��';

CREATE TABLE IF NOT EXISTS `log` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `level` TINYINT NOT NULL DEFAULT '0',
    `content` VARCHAR(1023) DEFAULT NULL,
    `time` DATETIME DEFAULT NULL,
    PRIMARY KEY(`id`),
    KEY `level` (`level`),
    KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '��־��';