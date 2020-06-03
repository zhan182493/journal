/*
 Navicat Premium Data Transfer

 Source Server         : tp5
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : journal

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 03/06/2020 10:08:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for acate
-- ----------------------------
DROP TABLE IF EXISTS `acate`;
CREATE TABLE `acate`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT ' 编号',
  `acatename` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '类型名称',
  `desc` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '描述',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of acate
-- ----------------------------
INSERT INTO `acate` VALUES (1, '自然科学', '自然科学', 0, 0);
INSERT INTO `acate` VALUES (4, '人工智能', '人工智能简介', 0, 0);

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `atitle` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `number` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章编号\r\n\r\nXXXX－XXXX（YYYY）NN－PPPP－CC\r\n\r\nXXXX－XXXX为文章所在期刊的国际标准刊号(ISSN，参见GB 9999)，YYYY 为文章所在期刊的出版年，NN为文章所在期刊的期次，PPPP 为文章首页所在期刊页码，CC为文章页数，“-”为连字符。',
  `aid` mediumint(9) UNSIGNED NOT NULL COMMENT '作者id',
  `editor` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '编辑',
  `acateid` mediumint(9) UNSIGNED NOT NULL COMMENT '文章分类id',
  `keywords` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '关键字',
  `summary` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '摘要',
  `refrences` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '参考文献',
  `aclassid` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章分类号（中国图书馆图书分类法）',
  `idcode` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文献标识码\r\n文献标识码(Document code)是按照《中国学术期刊（光盘版）检索与评价数据规范》规定的分类码，作用在于对文章按其内容进行归类，以便于文献的统计、期刊评价、确定文献的检索范围，提高检索结果的适用性等。具体如下：A--理论与应用研究学术论文（包括综述报告）；B--实用性技术成果报告（科技）、理论学习与社会实践总结（社科）；C--业务指导与技术管理性文章（包括领导讲话、特约评论等）；D--一般动态性信息（通讯、报道、会议活动、专访等）；E--文件、资料（包括历史资料、统计资料、机构、人物、书刊、知识介绍等）。',
  `draftid` mediumint(9) UNSIGNED NOT NULL COMMENT '稿件id',
  `jid` mediumint(9) UNSIGNED NOT NULL COMMENT '所属期刊号',
  `juan` int(10) NOT NULL COMMENT '卷',
  `qishu` int(10) NOT NULL DEFAULT 0 COMMENT '所在第几期',
  `page` int(10) NOT NULL COMMENT '页数',
  `click` int(20) NOT NULL DEFAULT 0 COMMENT '浏览量',
  `download` int(20) NOT NULL DEFAULT 0 COMMENT '下载量',
  `is_use` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否发布：1--是、0--不是（默认）',
  `use_time` int(10) NOT NULL COMMENT '发布时间',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 54 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (34, '测试文章204', '1245-2356(2020)2-0-5', 48, '李斯', 1, '测试', '测试文章204摘要', '[参考文献1],[参考文献2],[参考文献3],[参考文献4]', 'N', 'E', 26, 5, 2, 2, 5, 1, 0, 1, 1587626000, 1587614230, 1587625968);
INSERT INTO `article` VALUES (35, '测试文章200', '1245-2356(2020)1-5-6', 48, '李斯', 1, '测试', '测试文章200摘要', '[参考文献1],[参考文献2],[参考文献3],[参考文献4],[参考文献5],', 'N', 'E', 23, 5, 2, 1, 6, 3, 7, 1, 1587625996, 1587614318, 1587614318);
INSERT INTO `article` VALUES (41, '测试文章205', '1245-2356(2020)3-22-8', 48, '李斯', 1, '测试', '测试文章205摘要测试文章205摘要测试文章205摘要d', '[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],', 'N', 'E', 27, 5, 2, 3, 8, 11, 5, 1, 1590671810, 1587624712, 1587708674);
INSERT INTO `article` VALUES (40, '测试文章203', '1245-2356(2020)2-18-4', 48, '李斯', 1, '测试，文章203', '测试文章203摘要', '[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],', 'N', 'E', 25, 5, 2, 2, 4, 0, 0, 1, 1587626000, 1587624670, 1587625935);
INSERT INTO `article` VALUES (39, '测试文章201', '1245-2356(2020)1-11-7', 48, '李斯', 1, '测试文章,201', '测试文章201摘要', '[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],', 'N', 'E', 24, 5, 2, 1, 7, 1, 1, 1, 1587625996, 1587624637, 1587625486);
INSERT INTO `article` VALUES (42, '地外文明', '1245-2356(2020)3-30-4', 54, '李斯', 1, '地外文明', '地外文明摘要地外文明摘要地外文明摘要地外文明摘要地外文明摘要地外文明摘要地外文明摘要地外文明摘要地外文明摘要地外文明摘要地外文明摘要地外文明摘要', '[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献]', 'N', 'E', 31, 5, 1, 1, 4, 0, 0, 1, 1555817792, 1555731392, 1555731392);
INSERT INTO `article` VALUES (43, 'RPA会计机器人', '1245-2356(2020)1-34-5', 54, '李斯', 4, 'RPA，会计机器人', 'RPA会计机器人摘要RPA会计机器人摘要RPA会计机器人摘要RPA会计机器人摘要RPA会计机器人摘要RPA会计机器人摘要RPA会计机器人摘要', '[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献]', 'N', 'E', 30, 5, 1, 1, 5, 0, 0, 1, 1555817792, 1555731392, 1555731392);
INSERT INTO `article` VALUES (44, '海底微生物', '1245-2356(2020)2-39-4', 54, '李斯', 1, '海底，微生物', '海底微生物摘要海底微生物摘要海底微生物摘要海底微生物摘要海底微生物摘要海底微生物摘要海底微生物摘要海底微生物摘要', '[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献]', 'N', 'E', 32, 5, 1, 2, 4, 0, 0, 1, 1558409792, 1558323392, 1558323392);
INSERT INTO `article` VALUES (45, '人工智能对当今社会影响', '1245-2356(2020)3-43-6', 54, '李斯', 4, '人工智能', '人工智能对当今社会影响摘要人工智能对当今社会影响摘要人工智能对当今社会影响摘要人工智能对当今社会影响摘要', '[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献]', 'N', 'E', 33, 5, 1, 3, 6, 0, 0, 1, 1561534289, 1561001792, 1561001792);
INSERT INTO `article` VALUES (46, 'fdsa', '1245-2356(2020)3-49-4', 48, '李斯', 1, 'fdsa', 'fdsa摘要fdsa摘要fdsa摘要fdsa摘要fdsa摘要fdsa摘要fdsa摘要', '[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献],[参考文献]\r\n', 'N', 'E', 28, 5, 2, 3, 4, 1, 1, 1, 1590672342, 1587886154, 1587886154);
INSERT INTO `article` VALUES (53, '测试文章502', '1245-2356(2020)3-75-6', 48, '李斯', 1, '测试文章', '测试文章502摘要测试文章502摘要测试文章502摘要测试文章502摘要测试文章502摘要', '参考文献参考文献参考文献参考文献参考文献参考文献参考文献参考文献', 'N', 'E', 35, 5, 2, 3, 6, 1, 2, 1, 1590671693, 1590651644, 1590651644);
INSERT INTO `article` VALUES (49, '人工智能走进生活', '1245-2356(2020)3-57-5', 55, '李斯', 4, '人工智能', '人工智能走进生活摘要人工智能走进生活摘要人工智能走进生活摘要人工智能走进生活摘要人工智能走进生活摘要', '参考文献 参考文献 参考文献 参考文献 参考文献 参考文献 参考文献 参考文献 参考文献 参考文献 ', 'N', 'E', 36, 5, 2, 3, 5, 1, 1, 1, 1590672335, 1590650603, 1590650603);
INSERT INTO `article` VALUES (50, '浅析人工智能对当今社会的影响', '1245-2356(2020)3-62-6', 55, '李斯', 4, '人工智能', '浅析人工智能对当今社会的影响摘要浅析人工智能对当今社会的影响摘要浅析人工智能对当今社会的影响摘要', '参考文献参考文献参考文献参考文献参考文献参考文献参考文献', 'N', 'E', 37, 5, 2, 3, 6, 0, 0, 1, 1590671829, 1590650661, 1590650661);
INSERT INTO `article` VALUES (51, '人工智能基础与进阶教学', '1245-2356(2020)3-68-7', 55, '李斯', 4, '人工智能，教学', '人工智能基础与进阶教学摘要人工智能基础与进阶教学摘要人工智能基础与进阶教学摘要人工智能基础与进阶教学摘要人工智能基础与进阶教学摘要', '参考文献参考文献参考文献参考文献参考文献参考文献参考文献', 'N', 'E', 38, 5, 2, 3, 7, 0, 0, 1, 1590672320, 1590650706, 1590650706);
INSERT INTO `article` VALUES (52, '人工智能与python', '1245-2356(2020)3-75-4', 55, '李斯', 4, '人工智能，python', '人工智能与python摘要人工智能与python摘要人工智能与python摘要人工智能与python摘要人工智能与python摘要', '参考文献参考文献参考文献参考文献参考文献参考文献参考文献', 'N', 'E', 39, 5, 2, 3, 4, 0, 0, 1, 1590672339, 1590650742, 1590650742);

-- ----------------------------
-- Table structure for auth_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `role` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 角色名',
  `rules` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '权限',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` VALUES (1, '主编', '7,9,10,11,151,17,153,19,121,122,128,130,131,132,157,135,136,137,138,139,140,156,158,173,141,154,143,144,145,146,155,147,148,149,168,169,170,171,172');
INSERT INTO `auth_group` VALUES (2, '编辑', '7,9,10,11,151,17,153,19,121,122,128,157,135,156,158,141,154,146,155,147,148,149,168,169,170,171,172');
INSERT INTO `auth_group` VALUES (3, '专家', '');
INSERT INTO `auth_group` VALUES (4, '作者', NULL);
INSERT INTO `auth_group` VALUES (13, '管理员', '7,9,10,11,151,8,160,164,163,162,161,12,14,15,16,152,123,124,125,126,127,17,153,19,121,122,128,130,131,132,133,134,157,135,136,137,138,139,140,156,158,173,141,154,143,144,145,146,155,147,148,149,168,169,170,171,172');
INSERT INTO `auth_group` VALUES (14, '助手', '7,151,17,153,128,131,132,133,134,157,135,156,158,141,154,146,155,159');

-- ----------------------------
-- Table structure for auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access`  (
  `uid` mediumint(9) UNSIGNED NOT NULL COMMENT '用户id',
  `group_id` mediumint(9) UNSIGNED NOT NULL COMMENT '角色id',
  PRIMARY KEY (`uid`) USING BTREE,
  UNIQUE INDEX `uid_group_id`(`uid`, `group_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of auth_group_access
-- ----------------------------
INSERT INTO `auth_group_access` VALUES (2, 2);
INSERT INTO `auth_group_access` VALUES (6, 3);
INSERT INTO `auth_group_access` VALUES (39, 1);
INSERT INTO `auth_group_access` VALUES (43, 4);
INSERT INTO `auth_group_access` VALUES (48, 4);
INSERT INTO `auth_group_access` VALUES (50, 13);
INSERT INTO `auth_group_access` VALUES (51, 3);
INSERT INTO `auth_group_access` VALUES (52, 3);
INSERT INTO `auth_group_access` VALUES (53, 3);
INSERT INTO `auth_group_access` VALUES (54, 4);
INSERT INTO `auth_group_access` VALUES (55, 4);
INSERT INTO `auth_group_access` VALUES (56, 4);

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT ' 编号',
  `cname` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 控制器/方法名',
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 权限名',
  `pid` mediumint(9) UNSIGNED NOT NULL COMMENT ' 上级id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 174 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES (154, 'Link/lst', '链接列表', 141);
INSERT INTO `auth_rule` VALUES (160, 'user', '用户管理', 8);
INSERT INTO `auth_rule` VALUES (164, 'User/del', '删除用户', 160);
INSERT INTO `auth_rule` VALUES (163, 'User/edit', '编辑用户', 160);
INSERT INTO `auth_rule` VALUES (162, 'User/add', '添加用户', 160);
INSERT INTO `auth_rule` VALUES (7, 'article', '文章管理', 0);
INSERT INTO `auth_rule` VALUES (155, 'Notice/lst', '公告列表', 146);
INSERT INTO `auth_rule` VALUES (9, 'Article/add', '添加文章', 7);
INSERT INTO `auth_rule` VALUES (10, 'Article/edit', '编辑文章', 7);
INSERT INTO `auth_rule` VALUES (11, 'Article/del', '删除文章', 7);
INSERT INTO `auth_rule` VALUES (12, 'role', '角色管理', 8);
INSERT INTO `auth_rule` VALUES (153, 'Acate/lst', '栏目列表', 17);
INSERT INTO `auth_rule` VALUES (14, 'Role/add', '添加角色', 12);
INSERT INTO `auth_rule` VALUES (15, 'Role/edit', '编辑角色', 12);
INSERT INTO `auth_rule` VALUES (16, 'Role/del', '删除角色', 12);
INSERT INTO `auth_rule` VALUES (8, 'person', '人员管理', 0);
INSERT INTO `auth_rule` VALUES (17, 'cate', '栏目管理', 0);
INSERT INTO `auth_rule` VALUES (152, 'Role/lst', '角色列表', 12);
INSERT INTO `auth_rule` VALUES (19, 'Acate/add', '添加栏目', 17);
INSERT INTO `auth_rule` VALUES (121, 'Acate/edit', '编辑类型', 17);
INSERT INTO `auth_rule` VALUES (122, 'Acate/del', '删除类型', 17);
INSERT INTO `auth_rule` VALUES (123, 'rule', '权限操作', 8);
INSERT INTO `auth_rule` VALUES (124, 'Rule/lst', '权限列表', 123);
INSERT INTO `auth_rule` VALUES (125, 'Rule/add', '添加权限', 123);
INSERT INTO `auth_rule` VALUES (126, 'Rule/edit', '编辑权限', 123);
INSERT INTO `auth_rule` VALUES (127, 'Rule/del', '删除权限', 123);
INSERT INTO `auth_rule` VALUES (128, 'draft', '稿件管理', 0);
INSERT INTO `auth_rule` VALUES (151, 'Article/lst', '文章列表', 7);
INSERT INTO `auth_rule` VALUES (130, 'Draft/del', '删除稿件', 128);
INSERT INTO `auth_rule` VALUES (131, 'pay', '稿件支付', 128);
INSERT INTO `auth_rule` VALUES (132, 'Pay/lst', '支付列表', 131);
INSERT INTO `auth_rule` VALUES (133, 'Pay/pay', '支付', 131);
INSERT INTO `auth_rule` VALUES (134, 'Pay/npay', '取消支付', 131);
INSERT INTO `auth_rule` VALUES (135, 'journal', '期刊管理', 0);
INSERT INTO `auth_rule` VALUES (136, 'Journal/qishufabu', '期次发布', 135);
INSERT INTO `auth_rule` VALUES (137, 'Journal/quxiaofabu', '取消发布', 135);
INSERT INTO `auth_rule` VALUES (138, 'Journal/add', '创建期刊', 135);
INSERT INTO `auth_rule` VALUES (139, 'Journal/edit', '编辑期刊', 135);
INSERT INTO `auth_rule` VALUES (140, 'Journal/del', '删除期刊', 135);
INSERT INTO `auth_rule` VALUES (141, 'link', '链接管理', 0);
INSERT INTO `auth_rule` VALUES (161, 'User/lst', '用户列表', 160);
INSERT INTO `auth_rule` VALUES (143, 'Link/add', '添加链接', 141);
INSERT INTO `auth_rule` VALUES (144, 'Link/edit', '编辑链接', 141);
INSERT INTO `auth_rule` VALUES (145, 'Link/del', '删除链接', 141);
INSERT INTO `auth_rule` VALUES (146, 'notice', '公告管理', 0);
INSERT INTO `auth_rule` VALUES (147, 'Notice/add', '添加公告', 146);
INSERT INTO `auth_rule` VALUES (148, 'Notice/edit', '编辑公告', 146);
INSERT INTO `auth_rule` VALUES (149, 'Notice/del', '删除公告', 146);
INSERT INTO `auth_rule` VALUES (156, 'Journal/lst', '期刊列表', 135);
INSERT INTO `auth_rule` VALUES (157, 'Draft/lst', '稿件列表', 128);
INSERT INTO `auth_rule` VALUES (158, 'Journal/juanlst', '卷次列表', 135);
INSERT INTO `auth_rule` VALUES (168, 'news', '动态管理', 0);
INSERT INTO `auth_rule` VALUES (169, 'News/lst', '动态列表', 168);
INSERT INTO `auth_rule` VALUES (170, 'News/add', '添加动态', 168);
INSERT INTO `auth_rule` VALUES (171, 'News/edit', '编辑动态', 168);
INSERT INTO `auth_rule` VALUES (172, 'News/del', '删除动态', 168);
INSERT INTO `auth_rule` VALUES (173, 'Journal/onefabu', '单个发布', 135);

-- ----------------------------
-- Table structure for draft
-- ----------------------------
DROP TABLE IF EXISTS `draft`;
CREATE TABLE `draft`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT ' 编号',
  `uid` mediumint(9) NOT NULL COMMENT '作者id',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 稿件路径',
  `fthumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '附件路径',
  `acateid` mediumint(9) UNSIGNED NOT NULL COMMENT '所属栏目id',
  `is_repeat` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否重投：1--是、0--不是（默认）',
  `is_check` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否审核：1--是、0--不是（默认）',
  `zjid` mediumint(9) UNSIGNED NOT NULL COMMENT '审稿专家id',
  `opinion` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '修改意见',
  `is_pass` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否通过：1--是、0--不是（默认）',
  `is_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否支付：1--是、0--不是（默认）',
  `is_use` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否采用：1--是、0--不是（默认）',
  `use_time` int(20) NOT NULL COMMENT '发布时间',
  `create_time` int(20) NOT NULL COMMENT '投稿时间',
  `update_time` int(20) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of draft
-- ----------------------------
INSERT INTO `draft` VALUES (31, 54, '地外文明', '/uploads/draft/地外文明-何洋.doc', NULL, 1, 0, 1, 52, '', 1, 1, 1, 1587880986, 1555731392, 1555731392);
INSERT INTO `draft` VALUES (30, 54, 'RPA会计机器人', '/uploads/draft/RPA会计机器人-何洋.doc', NULL, 4, 0, 1, 6, '', 1, 1, 1, 1587880986, 1555731392, 1555731392);
INSERT INTO `draft` VALUES (32, 54, '海底微生物', '/uploads/draft/海底微生物-何洋.doc', NULL, 1, 0, 1, 53, '', 1, 1, 1, 1587880991, 1557459392, 1557459392);
INSERT INTO `draft` VALUES (33, 54, '人工智能对当今社会影响', '/uploads/draft/人工智能对当今社会影响-何洋.doc', NULL, 4, 0, 1, 6, '', 1, 1, 1, 1587886379, 1560137792, 1560137792);
INSERT INTO `draft` VALUES (26, 48, '测试稿件204', '/uploads/draft/测试稿件204-詹德秋.doc', NULL, 1, 0, 1, 52, '', 1, 1, 1, 1587626000, 1587459660, 1587459660);
INSERT INTO `draft` VALUES (25, 48, '测试稿件203', '/uploads/draft/测试稿件203-詹德秋.doc', NULL, 1, 0, 1, 52, '', 1, 1, 1, 1587626000, 1587459616, 1587459616);
INSERT INTO `draft` VALUES (24, 48, '测试稿件201', '/uploads/draft/测试稿件201-詹德秋.doc', NULL, 1, 0, 1, 53, '', 1, 1, 1, 1587625996, 1587458371, 1587458371);
INSERT INTO `draft` VALUES (23, 48, '测试稿件200', '/uploads/draft/测试稿件200-詹德秋.doc', NULL, 1, 0, 1, 53, '', 1, 1, 1, 1587625996, 1587458348, 1587458348);
INSERT INTO `draft` VALUES (27, 48, '测试稿件205', '/uploads/draft/测试稿件205-詹德秋.doc', NULL, 1, 0, 1, 53, '', 1, 1, 1, 1590671810, 1587459684, 1587459684);
INSERT INTO `draft` VALUES (28, 48, 'fdsa', '/uploads/draft/fdsa-詹德秋.doc', NULL, 1, 0, 1, 52, '', 1, 1, 1, 1590672342, 1587530299, 1587530299);
INSERT INTO `draft` VALUES (34, 48, '测试稿件123', '/uploads/draft/测试稿件123-詹德秋.pdf', NULL, 1, 0, 1, 53, '需要改进', 0, 0, 0, 0, 1590587765, 1590587765);
INSERT INTO `draft` VALUES (35, 48, '测试稿件502', '/uploads/draft/测试稿件502-詹德秋.pdf', NULL, 1, 0, 1, 52, '', 1, 1, 1, 1590671693, 1590648277, 1590648277);
INSERT INTO `draft` VALUES (36, 55, '人工智能走进生活', '/uploads/draft/人工智能走进生活-徐东京.pdf', NULL, 4, 0, 1, 51, '', 1, 1, 1, 1590672335, 1590649886, 1590649886);
INSERT INTO `draft` VALUES (37, 55, '浅析人工智能对当今社会的影响', '/uploads/draft/浅析人工智能对当今社会的影响-徐东京.pdf', NULL, 4, 0, 1, 51, '', 1, 1, 1, 1590671829, 1590649941, 1590649941);
INSERT INTO `draft` VALUES (38, 55, '人工智能基础与进阶教学', '/uploads/draft/人工智能基础与进阶教学-徐东京.pdf', NULL, 4, 0, 1, 51, '', 1, 1, 1, 1590672320, 1590649977, 1590649977);
INSERT INTO `draft` VALUES (39, 55, '人工智能之python', '/uploads/draft/人工智能之python-徐东京.pdf', NULL, 4, 0, 1, 6, '', 1, 1, 1, 1590672339, 1590650078, 1590650078);
INSERT INTO `draft` VALUES (41, 48, '测试稿件456', '/uploads/draft/测试稿件456-詹德秋.pdf', NULL, 1, 0, 0, 53, '', 0, 0, 0, 0, 1590823149, 1590823149);

-- ----------------------------
-- Table structure for journal
-- ----------------------------
DROP TABLE IF EXISTS `journal`;
CREATE TABLE `journal`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `uid` mediumint(9) NOT NULL COMMENT ' 主编id',
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '期刊介绍',
  `pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面',
  `cycle` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '周期类型（周刊、旬刊、月刊、季刊、年刊。。。）',
  `issn` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '国际标准标号ISSN',
  `cn` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '国内统一刊号CN',
  `jclassid` mediumint(9) NOT NULL COMMENT '期刊分类号',
  `page` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '页码',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of journal
-- ----------------------------
INSERT INTO `journal` VALUES (5, '派斯学院学报', 39, '派斯学院学报', '/uploads/fengmian/20200415\\37f04b291f2b2dffbe01003d68df86b8.jpg', '月刊', '1245-2356', '1543/TD', 123, '', 1548659128, 1586930018);

-- ----------------------------
-- Table structure for link
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '名称',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接',
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES (4, '中国高校科技期刊研究会', 'www.cujs.com', '/uploads/fengmian/20200414\\60fa67045bc366666e3fbbda231ba604.png');
INSERT INTO `link` VALUES (5, '科技期刊学术不端检测系统', 'check.cnki.net/amlc', '/uploads/linkpic/20200414\\003e1cd68858d1f192556cbe408c5b9a.jpg');
INSERT INTO `link` VALUES (6, '中国科学技术期刊编辑学会', 'www.cessp.org.cn', '/uploads/fengmian/20200414\\0c173e4c9037b532bf1e39b7a71e2595.png');
INSERT INTO `link` VALUES (7, '重庆科学技术协会', 'www.cqast.cn', '/uploads/linkpic/20200414\\6e67ec8924fa59dc59d063d8bf597362.png');
INSERT INTO `link` VALUES (8, '重庆工商大学派斯学院', 'www.paisi.edu.cn', '/uploads/linkpic/20200414\\8ce54dae25bed6cf6b0ea26249d59651.jpg');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (1, '新一期投稿', '<p>新一期投稿通告：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p>&nbsp;请在2020年6月10日前完成本期投稿。</p>', 1586784747, 1590806964);
INSERT INTO `news` VALUES (2, '近期将开展期刊建设会议', '<p>&nbsp;&nbsp;&nbsp;&nbsp;近期将开展期刊建设会议&nbsp;&nbsp;&nbsp;&nbsp;</p><p>由编辑组人员开会商讨进一步加强期刊建设方案。。</p>', 1586784747, 1590806982);
INSERT INTO `news` VALUES (12, '关于投稿须知条款更改', '<p style=\"text-align: center;\">关于投稿须知条款更改：</p><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p>投稿须在本期截止日前进行</p></li><li><p>投稿需以pdf\\wps\\doc文件投递</p></li><li><p>如未及时支付稿费请联系我们。</p></li></ol>', 1586784747, 1590806994);
INSERT INTO `news` VALUES (9, '文章征集', '<p>&nbsp;&nbsp;&nbsp;&nbsp;今日起截至2020年4月20日，&nbsp;&nbsp;&nbsp;&nbsp;</p><p>开始征集关于“我劳动我光荣”主题文章，&nbsp;&nbsp;&nbsp;&nbsp;</p><p>请广大作者们积极投稿。</p>', 1586784747, 1590807031);
INSERT INTO `news` VALUES (7, '劳动节写作大赛', '<p>&nbsp; &nbsp; &nbsp; 为倡导劳动光荣，我们将举行劳动节写作大赛，获得名次有丰厚奖品，大家快快快参与。</p>', 1586784747, 1590807043);
INSERT INTO `news` VALUES (14, '测试动态', '<p>测试动态测试动态测试动态测试动态测试动态测试动态测试动态测试动态测试动态测试动态测试动态测试动态测试动态</p>', 1586784837, 1590807066);

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES (1, '关于新一期投稿通告1', '<p>新一期投稿通告：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p>&nbsp;请在2020年4月10日前完成本期投稿。</p>', 1586784747, 1586784797);
INSERT INTO `notice` VALUES (2, '近期将开展期刊建设会议1', '<p>&nbsp;&nbsp;&nbsp;&nbsp;近期将开展期刊建设会议&nbsp;&nbsp;&nbsp;&nbsp;</p><p>由编辑组人员开会商讨进一步加强期刊建设方案。</p>', 1586784747, 1586784803);
INSERT INTO `notice` VALUES (12, '关于投稿须知条款更改1', '<p style=\"text-align: center;\">关于投稿须知条款更改：</p><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p>投稿须在本期截止日前进行</p></li><li><p>投稿需以pdf\\wps\\doc文件投递</p></li><li><p>如未及时支付稿费请联系我们</p></li></ol>', 1586784747, 1586784789);
INSERT INTO `notice` VALUES (9, '征文啦1', '<p>&nbsp;&nbsp;&nbsp;&nbsp;今日起截至2020年4月20日，&nbsp;&nbsp;&nbsp;&nbsp;</p><p>开始征集关于“我劳动我光荣”主题文章，&nbsp;&nbsp;&nbsp;&nbsp;</p><p>请广大作者们积极投稿</p>', 1586784747, 1586784813);
INSERT INTO `notice` VALUES (7, '5*1劳动节写作大赛火热进行中', '<p>&nbsp; &nbsp; &nbsp; 为倡导劳动光荣，我们将举行劳动节写作大赛，获得名次有丰厚奖品，大家快快快参与bb</p>', 1586784747, 1586784776);
INSERT INTO `notice` VALUES (14, '测试公告1', '<p>测试公告1测试公告1测试公告1测试公告1测试公告1测试公告1测试公告1测试公告1测试公告1</p><p><br/></p>', 1586784837, 1590807093);
INSERT INTO `notice` VALUES (15, '测试公告2', '<p>测试公告2测试公告测试公告测试公告测试公告</p><p>测试公告2测试公告测试公告测试公告</p><p>测试公告2测试公告测试公告测试公告测试公告</p><p>测试公告2测试公告测试公告测试公告</p><p>测试公告2测试公告测试公告测试公告测试公告</p>', 1587291526, 1590807104);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '真实姓名',
  `uname` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '账号用户名',
  `pwd` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `email` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  `tel` char(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '电话',
  `idnum` char(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 身份证号',
  `sex` tinyint(1) NOT NULL DEFAULT 1 COMMENT '性别：1--男、2--女（默认男）',
  `age` int(10) NOT NULL COMMENT '年龄',
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '籍贯',
  `nowaddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '现住址',
  `edu` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学历',
  `profession` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 专业',
  `company` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '工作单位',
  `position` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 职称',
  `direction` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '研究方向',
  `question` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '安全问题（用于找回密码）',
  `answer` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '答案',
  `acateid` mediumint(9) UNSIGNED NOT NULL COMMENT '审核类型（专家特有）',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (2, '李斯', 'lisi', '5b2e25c1d63faed1016d4a644161870e', 'lisi@mail.com', '13422221111', '', 1, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0);
INSERT INTO `user` VALUES (6, '赵柳', 'zhaoliu', '3fe241b92dabdee69f249a9791f30b90', '123@qwe.com', '15012547863', '', 1, 0, '', '', '', '', '', '', '', '', '', 4, 0, 1587532749);
INSERT INTO `user` VALUES (50, '管理员', 'admin', '9a5aa10bc6d1afd20fb43f942d0152ec', '123@gmail.com', '15045122356', '', 1, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0);
INSERT INTO `user` VALUES (39, '彭于晏', 'pengyuyan', '69d415b307b534a5d50aabe0b25005ef', '123@ww.com', '15023564578', '', 1, 0, '', '', '', '', '', '', '', '', '', 0, 0, 0);
INSERT INTO `user` VALUES (48, '詹德秋', 'zhandeqiu', 'b4afe72d9eb59d89b59a791aaad97c47', '1277813326@qq.com', '15223317716', '422828199710022919', 1, 22, '湖北鹤峰', '湖北鹤峰', '本科', '计算机', '华龙网', 'PHP程序员', '网站开发', '生日', '1220', 0, 1586769909, 1587531908);
INSERT INTO `user` VALUES (54, '何洋', 'Young', 'b872741bc7aadd26dc3154e7e1cae961', '1806180333@qq.com', '18983518366', '500236199807170022', 2, 21, '重庆奉节', '湖北恩施', '本科', '会计学', '无', '无', '资本结构优化', '123', '456', 0, 1587529207, 1587532271);
INSERT INTO `user` VALUES (51, '王五', 'wangwu', 'f5890f526a5c8bdbc37fbc2a7fdebfea', 'wangwu@gmail.com', '18945122356', '', 1, 0, '', '', '', '', '', '', '', '', '', 4, 0, 0);
INSERT INTO `user` VALUES (52, '张三', 'zhangsan', 'd090871b5cddf8124a2a0434c0c716cf', 'zhangsan@gmail.com', '13545124578', '', 1, 0, '', '', '', '', '', '', '', '', '', 1, 0, 0);
INSERT INTO `user` VALUES (53, '李二', 'lier', '6e476c93d92eca495d6af0fc8e0aa0e9', 'lier@gmail.com', '18045562348', '', 1, 0, '', '', '', '', '', '', '', '', '', 1, 0, 0);
INSERT INTO `user` VALUES (55, '徐东京', 'xudongjing', '7dfd7cf28c52ccbeaa65f98e89c379e1', 'xdj@qq.com', '15236547845', '500115199704154555', 1, 0, '新疆', '河南', '本科', '计算机', '无', '无', '网站开发', '寝室', '115', 0, 0, 1590649843);
INSERT INTO `user` VALUES (56, '作者', 'zuozhe', '5cc6625158fc77c524693ed56422eb68', 'zuozhe@qq.com', '15233145568', '422828199710022951', 1, 22, '湖北鹤峰', '湖北鹤峰', '本科', '计算机', '华龙网', 'PHP程序员', '网站开发', '宿舍', '115', 0, 1590799642, 1590799642);

SET FOREIGN_KEY_CHECKS = 1;
