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

 Date: 18/02/2020 11:32:12
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of acate
-- ----------------------------
INSERT INTO `acate` VALUES (1, '自然科学', NULL);
INSERT INTO `acate` VALUES (2, '哲学', NULL);
INSERT INTO `acate` VALUES (3, '物理', NULL);
INSERT INTO `acate` VALUES (4, '人工智能', NULL);
INSERT INTO `acate` VALUES (5, '但是官方v的', '广泛的官方');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `atitle` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `number` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章编号\r\n\r\nXXXX－XXXX（YYYY）NN－PPPP－CC\r\n\r\nXXXX－XXXX为文章所在期刊的国际标准刊号(ISSN，参见GB 9999)，YYYY 为文章所在期刊的出版年，NN为文章所在期刊的期次，PPPP 为文章首页所在期刊页码，CC为文章页数，“-”为连字符。',
  `aid` mediumint(9) UNSIGNED NOT NULL COMMENT '作者id',
  `eid` mediumint(9) UNSIGNED NOT NULL COMMENT '编辑id',
  `acateid` mediumint(9) UNSIGNED NOT NULL COMMENT '文章分类id',
  `keywords` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '关键字',
  `aclassid` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章分类号（中国图书馆图书分类法）',
  `idcode` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文献标识码\r\n文献标识码(Document code)是按照《中国学术期刊（光盘版）检索与评价数据规范》规定的分类码，作用在于对文章按其内容进行归类，以便于文献的统计、期刊评价、确定文献的检索范围，提高检索结果的适用性等。具体如下：A--理论与应用研究学术论文（包括综述报告）；B--实用性技术成果报告（科技）、理论学习与社会实践总结（社科）；C--业务指导与技术管理性文章（包括领导讲话、特约评论等）；D--一般动态性信息（通讯、报道、会议活动、专访等）；E--文件、资料（包括历史资料、统计资料、机构、人物、书刊、知识介绍等）。',
  `draftid` mediumint(9) UNSIGNED NOT NULL COMMENT '稿件id',
  `jid` mediumint(9) UNSIGNED NOT NULL COMMENT '所属期刊号',
  `qishu` int(10) NOT NULL DEFAULT 0 COMMENT '所在第几期',
  `click` int(20) NOT NULL DEFAULT 0 COMMENT '浏览量',
  `download` int(20) NOT NULL DEFAULT 0 COMMENT '下载量',
  `is_use` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否发布：1--是、0--不是（默认）',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  `edittime` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES (1, 'asd', 'gfdsgfs', 5, 2, 4, 'rtetre', 'gfds', 'bvxc', 3, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (2, 'rewgfdsgf', 'gfsd', 4, 4, 4, 'fdsaf', 'gfs', 'gfs', 40, 1, 2, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (3, 'rgvdstre', 'tre', 2, 4, 5, 'tre', 'gfds', 'hgdf', 5, 1, 3, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (4, 'regdfs', 'fdsgfds', 0, 0, 3, 'hgfd', 'hgddg', 'trew', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (5, 'gfdgf', '', 0, 0, 2, '', '', '', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (6, 'bfee', '', 0, 0, 2, '', '', '', 0, 1, 2, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (7, 'berrt', '', 0, 0, 2, '', '', '', 0, 1, 2, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (8, 'htr4n4e', '', 0, 0, 2, '', '', '', 0, 1, 3, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (9, 'bvcnb', '', 0, 0, 2, '', '', '', 0, 3, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (10, 'trew', '', 0, 0, 2, '', '', '', 0, 3, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (11, 'kjhgv', '', 0, 0, 2, '', '', '', 0, 3, 2, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (12, 'kjhgv', '', 0, 0, 2, '', '', '', 0, 3, 2, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (13, 'mnb', '', 0, 0, 2, '', '', '', 0, 3, 3, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (14, 'uygds', '', 0, 0, 2, '', '', '', 0, 3, 4, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (15, 'nbvcx', '', 0, 0, 2, '', '', '', 0, 3, 5, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (16, 'nbvc', '', 0, 0, 2, '', '', '', 0, 3, 6, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (17, 'hgre', '', 0, 0, 2, '', '', '', 0, 3, 7, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (18, 'fdsfdsa', '', 0, 0, 2, '', '', '', 0, 3, 8, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (19, 'bfsd', '', 0, 0, 2, '', '', '', 0, 3, 9, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (20, 'mutr', '', 0, 0, 2, '', '', '', 0, 3, 10, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (21, 'brte', '', 0, 0, 2, '', '', '', 0, 3, 11, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (22, 'gfds', '', 0, 0, 2, '', '', '', 0, 3, 12, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `article` VALUES (23, 'gfada', '', 0, 0, 2, '', '', '', 0, 3, 13, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for auth_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `role` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 角色名',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 状态：1--启用、0--禁用',
  `rules` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '权限',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` VALUES (1, '主编', 1, '7,8,9,21,10,11,17,18,19');
INSERT INTO `auth_group` VALUES (2, '编辑', 1, '7,8,9,21,10,11');
INSERT INTO `auth_group` VALUES (3, '专家', 1, NULL);
INSERT INTO `auth_group` VALUES (4, '作者', 1, NULL);

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
INSERT INTO `auth_group_access` VALUES (27, 1);
INSERT INTO `auth_group_access` VALUES (28, 4);
INSERT INTO `auth_group_access` VALUES (37, 1);

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT ' 编号',
  `cname` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 控制器/方法名',
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 权限名',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 状态：1--启用、2--禁用',
  `pid` mediumint(9) UNSIGNED NOT NULL COMMENT ' 上级id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 120 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES (3, 'user/lst', '用户列表', 1, 2);
INSERT INTO `auth_rule` VALUES (2, 'user', '用户操作', 1, 1);
INSERT INTO `auth_rule` VALUES (4, 'user/add', '添加用户', 1, 2);
INSERT INTO `auth_rule` VALUES (5, 'user/edit', '编辑用户', 1, 2);
INSERT INTO `auth_rule` VALUES (6, 'user/del', '删除用户', 1, 2);
INSERT INTO `auth_rule` VALUES (7, 'article', '文章管理', 1, 0);
INSERT INTO `auth_rule` VALUES (8, 'article/lst', '文章列表', 1, 7);
INSERT INTO `auth_rule` VALUES (9, 'article/add', '添加文章', 1, 7);
INSERT INTO `auth_rule` VALUES (10, 'article/edit', '编辑文章', 1, 7);
INSERT INTO `auth_rule` VALUES (11, 'article/del', '删除文章', 1, 7);
INSERT INTO `auth_rule` VALUES (12, 'role', '角色管理', 1, 1);
INSERT INTO `auth_rule` VALUES (13, 'role/lst', '角色列表', 1, 12);
INSERT INTO `auth_rule` VALUES (14, 'role/add', '添加角色', 1, 12);
INSERT INTO `auth_rule` VALUES (15, 'role/edit', '编辑角色', 1, 12);
INSERT INTO `auth_rule` VALUES (16, 'role/del', '删除角色', 1, 12);
INSERT INTO `auth_rule` VALUES (1, 'person', '人员管理', 1, 0);
INSERT INTO `auth_rule` VALUES (17, 'cate', '栏目管理', 1, 0);
INSERT INTO `auth_rule` VALUES (18, 'cate/lst', '栏目列表', 1, 17);
INSERT INTO `auth_rule` VALUES (19, 'cate/add', '添加栏目', 1, 17);
INSERT INTO `auth_rule` VALUES (21, 'fds', 'fdsfsd', 1, 9);

-- ----------------------------
-- Table structure for draft
-- ----------------------------
DROP TABLE IF EXISTS `draft`;
CREATE TABLE `draft`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT ' 编号',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `author` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '作者',
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 稿件路径',
  `fthumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '附件路径',
  `acateid` mediumint(9) UNSIGNED NOT NULL COMMENT '所属栏目id',
  `summary` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '摘要',
  `refrences` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '参考文献(文献之间用  英文逗号  分隔)',
  `is_repeat` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否重投：1--是、0--不是（默认）',
  `is_check` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否审核：1--是、0--不是（默认）',
  `position` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '修改意见',
  `is_pass` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否通过：1--是、0--不是（默认）',
  `is_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否支付：1--是、0--不是（默认）',
  `is_use` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否采用：1--是、0--不是（默认）',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `juan` int(10) NOT NULL COMMENT '卷',
  `page` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '页码',
  `is_use` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否出版：1--是、0--不是（默认）',
  `usetime` datetime NULL DEFAULT NULL COMMENT '出版日期',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  `edittime` datetime NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of journal
-- ----------------------------
INSERT INTO `journal` VALUES (1, '派斯科技报', 1, '犯得上法国大使馆犯得上', '/uploads/fengmian/20200209\\6af88c812c6c7a59184124c600116e1d.jpg', '月刊', '123543', '123543', 1235543, 0, '', 0, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `journal` VALUES (3, '范德萨范德萨', 0, '和官方回复', '/uploads/fengmian/20200209\\4d2b5726efd5382e72683ff2257e6d19.jpg', '月刊', '4325', '54325432', 5432, 0, '', 0, NULL, '0000-00-00 00:00:00', NULL);

-- ----------------------------
-- Table structure for link
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '名称',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '链接',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES (1, '百度', 'www.baidu.com');
INSERT INTO `link` VALUES (2, '淘宝', 'www.taobao.com');

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `addtime` datetime NULL DEFAULT NULL COMMENT '添加时间',
  `edittime` datetime NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES (1, '个v发的', '<p>fndusibfdsjkfds<p>', '0000-00-00 00:00:00', NULL);
INSERT INTO `notice` VALUES (2, '放', '<p>111111<p>', NULL, NULL);
INSERT INTO `notice` VALUES (12, '宝宝幅度不大舒服', '<p style=\"text-align: center;\">分grew房Gregg热个人</p><ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p>范德萨范德萨</p></li><li><p>米都散发开来</p></li><li><p>发呢我i发你看到我</p></li></ol><p><img width=\"530\" height=\"340\" src=\"http://api.map.baidu.com/staticimage?center=116.404,39.915&zoom=10&width=530&height=340&markers=116.404,39.915\"/></p>', NULL, NULL);
INSERT INTO `notice` VALUES (9, '犯得上发射点', '<ol class=\" list-paddingleft-2\" style=\"list-style-type: decimal;\"><li><p>在干嘛范德萨</p></li><li><p>辅导班服务日</p></li><li><p>会特别费</p></li><li><p>减肥哦角<br/></p></li></ol>', NULL, NULL);
INSERT INTO `notice` VALUES (7, '轼', '<p>和他人妇<br/></p>', NULL, NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '真实姓名',
  `uname` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '账号用户名',
  `pwd` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `email` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  `tel` char(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '电话',
  ` idnum` char(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 身份证号',
  ` sex` tinyint(1) NOT NULL DEFAULT 1 COMMENT '性别：1--男、2--女（默认男）',
  ` age` int(10) NOT NULL COMMENT '年龄',
  ` address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '籍贯',
  ` nowaddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '现住址',
  ` edu` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学历',
  ` profession` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 专业',
  ` company` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '工作单位',
  ` position` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT ' 职称',
  ` direction` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '研究方向',
  `acateid` mediumint(9) UNSIGNED NOT NULL COMMENT '审核类型（专家特有）',
  ` addtime` datetime NOT NULL COMMENT '添加时间',
  ` edittime` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (2, '李斯', 'lisi', '132', '', '13422221111', '', 1, 0, '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES (6, '赵柳', 'zhaoliu', '312', '', '15012547863', '', 1, 0, '', '', '', '', '', '', '', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES (28, 'vcxbr', 'vcxzf', 'fdsa', '', '15223317716', '', 1, 0, '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES (37, '主编张三', 'fdsfds', '123', '', '123', '', 1, 0, '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES (27, '主编李四', 'gfdsafd', 'fda', '', '1522331771', '', 1, 0, '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
