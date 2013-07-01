CREATE DATABASE IF NOT EXISTS `pingbao`;

USE `pingbao`;

CREATE TABLE IF NOT EXISTS `user` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `name` VARCHAR(50) NOT NULL COMMENT '用户名',
    `email` VARCHAR(255) NOT NULL COMMENT '用户邮箱',
    `password` VARCHAR(50) NOT NULL COMMENT '用户密码',
    `avatar_file` VARCHAR(255) DEFAULT NULL COMMENT '头像文件',
    `verified` TINYINT NOT NULL COMMENT '是否验证',
    `forbidden` TINYINT UNSIGNED NOT NULL COMMENT '是否禁止',
    `reg_time` DATETIME DEFAULT NULL COMMENT '注册时间',
    `reg_ip` VARCHAR(15) DEFAULT NULL COMMENT '注册IP',
    `last_login` DATETIME DEFAULT NULL COMMENT '最后登录时间',
    `last_ip` VARCHAR(15) DEFAULT NULL COMMENT '最后登录IP',
    PRIMARY KEY(`id`),
    KEY `name` (`name`),
    KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '用户表';

CREATE TABLE IF NOT EXISTS `goods` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品ID',
    `name` VARCHAR(50) NOT NULL COMMENT '商品名称',
    `category_id` INT UNSIGNED NOT NULL COMMENT '商品分类',
    `avatar_file` VARCHAR(255) DEFAULT NULL COMMENT '商品图片',
    `specification` VARCHAR(1023) DEFAULT NULL COMMENT '商品描述、规格',
    `5star_count` INT UNSIGNED DEFAULT NULL COMMENT '五星数',
    `4star_count` INT UNSIGNED DEFAULT NULL COMMENT '四星数',
    `3star_count` INT UNSIGNED DEFAULT NULL COMMENT '三星数',
    `2star_count` INT UNSIGNED DEFAULT NULL COMMENT '二星数',
    `1star_count` INT UNSIGNED DEFAULT NULL COMMENT '一星数',
    PRIMARY KEY(`id`),
    KEY `name` (`name`),
    KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '商品表';

CREATE TABLE IF NOT EXISTS `goods_histroy` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品ID',
    `goods_id` INT UNSIGNED NOT NULL,
    `category_id` INT UNSIGNED NOT NULL COMMENT '商品分类',
    `avatar_file` VARCHAR(255) DEFAULT NULL COMMENT '商品图片',
    `specification` VARCHAR(1023) DEFAULT NULL COMMENT '商品描述、规格',
    `uid` INT UNSIGNED NOT NULL COMMENT '更新者ID',
    `create_time` DATETIME DEFAULT NULL COMMENT '更新时间',
    PRIMARY KEY(`id`),
    KEY `goods_id` (`goods_id`),
    KEY `category_id` (`category_id`),
    KEY `uid` (`uid`),
    KEY `create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '商品编辑历史表';

CREATE TABLE IF NOT EXISTS `review` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '评价ID',
    `goods_id` INT UNSIGNED NOT NULL COMMENT '商品ID',
    `pros` VARCHAR(1023) DEFAULT NULL COMMENT '产品优点',
    `cons` VARCHAR(1023) DEFAULT NULL COMMENT '产品缺点',
    `summary` VARCHAR(1023) DEFAULT NULL COMMENT '产品总结',
    `rate` TINYINT DEFAULT NULL COMMENT '产品评分',
    `useful_count` INT UNSIGNED DEFAULT NULL COMMENT '标记有用次数',
    `unuseful_count` INT UNSIGNED DEFAULT NULL COMMENT '标记无用次数',
    `uid` INT UNSIGNED NOT NULL COMMENT '创建者',
    `create_time` DATETIME NOT NULL COMMENT '创建时间',
    PRIMARY KEY(`id`),
    KEY `goods_id` (`goods_id`),
    KEY `rate` (`rate`),
    KEY `uid` (`uid`),
    KEY `create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '商品评价表';

CREATE TABLE IF NOT EXISTS `tag` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '标签表';

CREATE TABLE IF NOT EXISTS `review_tag` (
    `review_id` INT UNSIGNED NOT NULL,
    `tag_id` INT UNSIGNED NOT NULL,
    PRIMARY KEY(`review_id`, `tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '评价标签表';

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '评价评论表';

CREATE TABLE IF NOT EXISTS `category` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `parent_id` INT UNSIGNED NOT NULL,
    `name` VARCHAR(50) DEFAULT NULL,
    PRIMARY KEY(`id`),
    KEY `parent_id` (`parent_id`),
    KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '商品类目表';

CREATE TABLE IF NOT EXISTS `log` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `level` TINYINT NOT NULL DEFAULT '0',
    `content` VARCHAR(1023) DEFAULT NULL,
    `time` DATETIME DEFAULT NULL,
    PRIMARY KEY(`id`),
    KEY `level` (`level`),
    KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '日志表';