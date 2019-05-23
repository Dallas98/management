/*
 Navicat MySQL Data Transfer

 Source Server         : user
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost:3306
 Source Schema         : school

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : 65001

 Date: 01/06/2018 01:07:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for c
-- ----------------------------
DROP TABLE IF EXISTS `c`;
CREATE TABLE `c`  (
                      `kh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                      `km` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xf` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `yxh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      PRIMARY KEY (`kh`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of c
-- ----------------------------
INSERT INTO `c` VALUES ('01', '离散数学', '4', '40', '01');
INSERT INTO `c` VALUES ('02', '数据库原理', '4', '50', '01');
INSERT INTO `c` VALUES ('03', '数据结构', '4', '50', '01');
INSERT INTO `c` VALUES ('04', '系统结构', '6', '60', '01');
INSERT INTO `c` VALUES ('05', '分子物理学', '4', '40', '03');
INSERT INTO `c` VALUES ('06', '通信学', '3', '30', '02');
INSERT INTO `c` VALUES ('07', '编译原理', '5', '50', '01');
INSERT INTO `c` VALUES ('08', '生产实习', '2', '10', '01');
INSERT INTO `c` VALUES ('09', '暑期实践', '2', '10', '01');

-- ----------------------------
-- Table structure for count1
-- ----------------------------

DROP TABLE IF EXISTS `count1`;
CREATE TABLE `count1`  (
    `num` int(11) DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of count1
-- ----------------------------

INSERT INTO `count1` VALUES (4);

-- ----------------------------
-- Table structure for d
-- ----------------------------
DROP TABLE IF EXISTS `d`;
CREATE TABLE `d`  (
                      `yxh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                      `mc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `dz` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `lxdh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      PRIMARY KEY (`yxh`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of d
-- ----------------------------
INSERT INTO `d` VALUES ('01', '计算机学院', '上大东校区三号楼', '65347567');
INSERT INTO `d` VALUES ('02', '通信学院', '上大东校区二号楼', '65341234');
INSERT INTO `d` VALUES ('03', '材料学院', '上大东校区四号楼', '65347890');

-- ----------------------------
-- Table structure for e
-- ----------------------------
DROP TABLE IF EXISTS `e`;
CREATE TABLE `e`  (
                      `xh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `kh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `gh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `pscj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `kscj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `zpcj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of e
-- ----------------------------
INSERT INTO `e` VALUES ('16121783', '2018-2019冬季', '07', '101', '80', '80', '80');
INSERT INTO `e` VALUES ('16121783', '2018-2019冬季', '01', '101 ', '80', '80', '80');
INSERT INTO `e` VALUES ('16121666', '2018-2019冬季', '07', '101', '90', '98', '87');
INSERT INTO `e` VALUES ('16120000', '2018-2019春季', '05', '103', '100', '0', '0');
INSERT INTO `e` VALUES ('16120000', '2018-2019春季', '06', '104', '80', '76', '78');
INSERT INTO `e` VALUES ('16122693', '2018-2019秋季', '01', '102', '80', '80', '80');
INSERT INTO `e` VALUES ('16122693', '2018-2019春季', '02', '101', '80', '80', '80');
INSERT INTO `e` VALUES ('16122693', '2018-2019冬季', '07', '101', '60', '60', '60');
INSERT INTO `e` VALUES ('16121783', '2018-2019夏季', '09', '101', '0', '0', '0');

-- ----------------------------
-- Table structure for o
-- ----------------------------
DROP TABLE IF EXISTS `o`;
CREATE TABLE `o`  (
                      `xq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `kh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `gh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `sksj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xkrs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of o
-- ----------------------------
INSERT INTO `o` VALUES ('2018-2019秋季', '01', '102', '星期一1-2', NULL);
INSERT INTO `o` VALUES ('2018-2019秋季', '03', '101', '星期二1-2', NULL);
INSERT INTO `o` VALUES ('2018-2019冬季', '05', '103', '星期二5-8', NULL);
INSERT INTO `o` VALUES ('2018-2019冬季', '06', '104', '星期四5-8', NULL);
INSERT INTO `o` VALUES ('2018-2019冬季', '07', '101', '星期五1-2', NULL);
INSERT INTO `o` VALUES ('2018-2019冬季', '01', '101', '星期六5-8', NULL);
INSERT INTO `o` VALUES ('2018-2019春季', '02', '101', '星期三5-6', NULL);
INSERT INTO `o` VALUES ('2018-2019春季', '04', '104', '星期四5-8', NULL);
INSERT INTO `o` VALUES ('2018-2019春季', '05', '103', '星期五5-8', NULL);
INSERT INTO `o` VALUES ('2018-2019春季', '06', '104', '星期二5-8', NULL);
INSERT INTO `o` VALUES ('2018-2019春季', '01', '101', '星期三4-5', NULL);
INSERT INTO `o` VALUES ('2018-2019夏季', '08', '101', '星期三4-5', NULL);
INSERT INTO `o` VALUES ('2018-2019夏季', '09', '101', '星期三7-8', NULL);

-- ----------------------------
-- Table structure for r
-- ----------------------------
DROP TABLE IF EXISTS `r`;
CREATE TABLE `r`  (
                      `gh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xm` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of r
-- ----------------------------
INSERT INTO `r` VALUES ('admin1', '管理员1', 'admin1');
INSERT INTO `r` VALUES ('admin2', '管理员2', 'admin2');

-- ----------------------------
-- Table structure for s
-- ----------------------------
DROP TABLE IF EXISTS `s`;
CREATE TABLE `s`  (
                      `xh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xm` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `csrq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `jg` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `sjhm` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `yxh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of s
-- ----------------------------
INSERT INTO `s` VALUES ('16121783', '阳鹏', '男', '1998-01-27', '四川', '13262665507', '01', 'Yp19980127');
INSERT INTO `s` VALUES ('16121666', '徐文', '男', '1998-08-22', '重庆', '18801234567', '01', '16121666');
INSERT INTO `s` VALUES ('16122693', '郑芷烨', '女', '1997-10-19', '贵州', '13981234567', '01', '16122693');
INSERT INTO `s` VALUES ('16120000', '张三', '男', '1998-01-01', '新疆', '12345678901', '02', '16120000');

-- ----------------------------
-- Table structure for t
-- ----------------------------
DROP TABLE IF EXISTS `t`;
CREATE TABLE `t`  (
                      `gh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xm` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `csrq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `xl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `jgbz` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `yxh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t
-- ----------------------------
INSERT INTO `t` VALUES ('101', '宋安平', '男', '1973-03-06', '教授', '3567', '01', '101');
INSERT INTO `t` VALUES ('102', '沈文枫', '男', '1972-12-08', '副教授', '2845', '01', '102');
INSERT INTO `t` VALUES ('103', '赵物理', '女', '1960-01-05', '教授', '4200', '03', '103');
INSERT INTO `t` VALUES ('104', '张通信', '女', '1980-11-06', '讲师', '2554', '02', '104');

-- ----------------------------
-- Table structure for term
-- ----------------------------
DROP TABLE IF EXISTS `term`;
CREATE TABLE `term`  (
                         `id` int(11) NOT NULL,
                         `xq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                         PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of term
-- ----------------------------
INSERT INTO `term` VALUES (0, '2018-2019秋季');
INSERT INTO `term` VALUES (1, '2018-2019冬季');
INSERT INTO `term` VALUES (2, '2018-2019春季');
INSERT INTO `term` VALUES (3, '2018-2019夏季');

-- ----------------------------
-- Procedure structure for jia
-- ----------------------------
DROP PROCEDURE IF EXISTS `jia`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `jia`()
BEGIN
    update count1 set num=num+1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sub
-- ----------------------------
DROP PROCEDURE IF EXISTS `sub`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sub`()
BEGIN
    update count1 set num=num-1;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table s
-- ----------------------------
DROP TRIGGER IF EXISTS `s_AFTER_INSERT`;
delimiter ;;
CREATE DEFINER = `root`@`localhost` TRIGGER `s_AFTER_INSERT` AFTER INSERT ON `s` FOR EACH ROW BEGIN
    call jia();
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table s
-- ----------------------------
DROP TRIGGER IF EXISTS `s_AFTER_DELETE`;
delimiter ;;
CREATE DEFINER = `root`@`localhost` TRIGGER `s_AFTER_DELETE` AFTER DELETE ON `s` FOR EACH ROW BEGIN
    call sub();
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
