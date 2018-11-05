/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 80013
Source Host           : 127.0.0.1:3306
Source Database       : todo

Target Server Type    : MYSQL
Target Server Version : 80013
File Encoding         : 65001

Date: 2018-11-05 13:16:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lists
-- ----------------------------
DROP TABLE IF EXISTS `lists`;
CREATE TABLE `lists` (
  `id` varchar(40) NOT NULL,
  `name` varchar(225) NOT NULL,
  `desc` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of lists
-- ----------------------------
INSERT INTO `lists` VALUES ('2ac84f0e-f723-4f24-878b-44e63e7ae580', 'Work', 'tasks for work');
INSERT INTO `lists` VALUES ('d290f1ee-6c54-4b01-90e6-d701748f0851', 'Home', 'tasks for home');

-- ----------------------------
-- Table structure for tasks
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` varchar(40) NOT NULL,
  `listId` varchar(40) NOT NULL,
  `name` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES ('0e2ac84f-f723-4f24-878b-44e63e7ae580', 'd290f1ee-6c54-4b01-90e6-d701748f0851', 'mow the yard', '1');
INSERT INTO `tasks` VALUES ('0e2ac84f-6c54-4b01-90e6-63e7ae58044e', 'd290f1ee-6c54-4b01-90e6-d701748f0851', 'clean the house', '0');
INSERT INTO `tasks` VALUES ('082d52fa-cdbc-4b4f-8124-2338be0c856c', '2ac84f0e-f723-4f24-878b-44e63e7ae580', 'test', '0');
