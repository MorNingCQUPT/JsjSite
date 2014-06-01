/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : jsjsite

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2014-06-01 22:54:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jsj_article
-- ----------------------------
DROP TABLE IF EXISTS `jsj_article`;
CREATE TABLE `jsj_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id号',
  `article_plate_id` int(11) NOT NULL COMMENT '该文章所属板块（栏目）',
  `article_column_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL COMMENT '文章标题',
  `article_postuser` varchar(255) NOT NULL COMMENT '文章作者（发布管理员）',
  `article_postdate` datetime NOT NULL COMMENT '发布时间',
  `article_modifieduser` varchar(255) DEFAULT NULL,
  `article_modifieddate` datetime DEFAULT NULL COMMENT '最后一次修改时间',
  `article_content` varchar(255) DEFAULT NULL COMMENT '文章内容',
  `isshow` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jsj_article
-- ----------------------------
INSERT INTO `jsj_article` VALUES ('1', '1', '1', '标题1', 'admin', '2014-05-28 00:00:00', null, '2014-05-28 09:58:42', '内容1', null);
INSERT INTO `jsj_article` VALUES ('2', '1', '2', '标题2', 'admin', '2014-05-30 09:34:31', null, '2014-05-30 09:34:35', '内容2', null);
INSERT INTO `jsj_article` VALUES ('3', '1', '3', '标题3', 'admin', '2014-05-30 09:34:55', null, '2014-05-30 09:34:59', '内容3', null);
INSERT INTO `jsj_article` VALUES ('4', '2', '1', '标题1', 'admin', '2014-05-30 09:35:21', null, '2014-05-30 09:35:26', '内容4', null);
INSERT INTO `jsj_article` VALUES ('5', '1', '1', '标题xx', 'admin', '2014-06-01 10:08:30', null, '2014-06-01 10:08:36', '内容5', null);
INSERT INTO `jsj_article` VALUES ('6', '1', '1', '标题xc', 'admin', '2014-06-01 10:08:54', null, '2014-06-01 10:08:59', '内容6', null);

-- ----------------------------
-- Table structure for jsj_attachment
-- ----------------------------
DROP TABLE IF EXISTS `jsj_attachment`;
CREATE TABLE `jsj_attachment` (
  `attachment_id` int(11) NOT NULL,
  `attachment_name` varchar(255) NOT NULL,
  `attachment_type` varchar(255) NOT NULL,
  `attachment_path` varchar(255) NOT NULL,
  `attachment_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jsj_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for jsj_column
-- ----------------------------
DROP TABLE IF EXISTS `jsj_column`;
CREATE TABLE `jsj_column` (
  `column_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `column_name` varchar(255) NOT NULL COMMENT '栏目名称',
  `column_of_plate_id` int(11) NOT NULL COMMENT '栏目所属板块id',
  `isshow` varchar(255) NOT NULL,
  PRIMARY KEY (`column_id`,`column_of_plate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jsj_column
-- ----------------------------
INSERT INTO `jsj_column` VALUES ('1', '学院新闻', '1', '');
INSERT INTO `jsj_column` VALUES ('1', '学生活动', '2', '');
INSERT INTO `jsj_column` VALUES ('1', '教师主页', '3', '');
INSERT INTO `jsj_column` VALUES ('1', '招聘信息', '4', '');
INSERT INTO `jsj_column` VALUES ('2', '工作概况', '1', '');
INSERT INTO `jsj_column` VALUES ('2', 'IT动态', '2', '');
INSERT INTO `jsj_column` VALUES ('2', '教师著作', '3', '');
INSERT INTO `jsj_column` VALUES ('2', '招生简章', '4', '');
INSERT INTO `jsj_column` VALUES ('3', '通知公告', '1', '');

-- ----------------------------
-- Table structure for jsj_plate
-- ----------------------------
DROP TABLE IF EXISTS `jsj_plate`;
CREATE TABLE `jsj_plate` (
  `plate_id` int(11) NOT NULL AUTO_INCREMENT,
  `plate_name` varchar(255) NOT NULL,
  `isshow` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`plate_id`),
  KEY `id` (`plate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jsj_plate
-- ----------------------------
INSERT INTO `jsj_plate` VALUES ('1', '学院动态', null);
INSERT INTO `jsj_plate` VALUES ('2', '学生之家', null);
INSERT INTO `jsj_plate` VALUES ('3', '教师风采', null);
INSERT INTO `jsj_plate` VALUES ('4', '招生就业', null);

-- ----------------------------
-- Table structure for jsj_user
-- ----------------------------
DROP TABLE IF EXISTS `jsj_user`;
CREATE TABLE `jsj_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '账户编号',
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `user_password` varchar(255) NOT NULL COMMENT '密码',
  `authority` varchar(255) NOT NULL COMMENT '权限配置',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jsj_user
-- ----------------------------
INSERT INTO `jsj_user` VALUES ('1', 'admin', 'admin', 'a:2:{s:8:\"is_admin\";s:1:\"1\";s:6:\"rights\";a:2:{i:0;i:1;i:1;i:2;}}');
