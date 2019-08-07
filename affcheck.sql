/*
 Navicat Premium Data Transfer

 Source Server         : My PC
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : affcheck

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 06/08/2019 22:12:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for searches
-- ----------------------------
DROP TABLE IF EXISTS `searches`;
CREATE TABLE `searches`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `query` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `search_by` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `result` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'success',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of searches
-- ----------------------------
INSERT INTO `searches` VALUES (1, '212065', 1, '2019-08-06 15:41:00', '{\"status\":\"200\",\"msg\":\"Data collected\",\"DATA\":{\"EMPLOYEE_NUMBER\":\"212065\",\"FULL_NAME\":\"Mr. George E Tetteh\",\"SOCIAL_SECURITY_NUMBER\":\"C106707070011\",\"ORGANIZATION\":\"0115 Zenu KKD \'3\' JHS\",\"JOB\":\"Assistant.Director I Base Grade..GES\",\"GRADE\":\"SS.PSH19\",\"GRADE_STEP\":\"4\",\"MINISTRY\":\"Min Of Education\",\"DEPARTMENT\":\"GES\",\"REGION\":\"Greater Accra\",\"DISTRICT\":\"Kpone Katamanso Municipal Assembly\",\"CONTACTNO\":\"0244047374\",\"COUNTRYCODE\":\"233\",\"BIOPIC\":\"https:\\/\\/gogeservices.com\\/?token=\",\"EMAIL\":\"\",\"DATE_OF_BIRTH\":\"1967-07-07\",\"AFFORDABILITY\":441.07}}', 'success');
INSERT INTO `searches` VALUES (2, '212068', 1, '2019-08-06 15:41:00', '{\"status\":\"200\",\"msg\":\"Data collected\",\"DATA\":{\"EMPLOYEE_NUMBER\":\"212065\",\"FULL_NAME\":\"Mr. George E Tetteh\",\"SOCIAL_SECURITY_NUMBER\":\"C106707070011\",\"ORGANIZATION\":\"0115 Zenu KKD \'3\' JHS\",\"JOB\":\"Assistant.Director I Base Grade..GES\",\"GRADE\":\"SS.PSH19\",\"GRADE_STEP\":\"4\",\"MINISTRY\":\"Min Of Education\",\"DEPARTMENT\":\"GES\",\"REGION\":\"Greater Accra\",\"DISTRICT\":\"Kpone Katamanso Municipal Assembly\",\"CONTACTNO\":\"0244047374\",\"COUNTRYCODE\":\"233\",\"BIOPIC\":\"https:\\/\\/gogeservices.com\\/?token=\",\"EMAIL\":\"\",\"DATE_OF_BIRTH\":\"1967-07-07\",\"AFFORDABILITY\":441.07}}', 'success');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `mask_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'inactive',
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admins_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `admins_mask_id_unique`(`mask_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Kwei', 'Aikinson', 'nanaaikinson24@gmail.com', '$2y$10$.xin9gcz53vzz7qGR4xrVup1hy4IBotdzwTLI8mOVHwNWtnJA4FE6', NULL, NULL, NULL, NULL, '112233458', NULL, '2019-07-25 10:19:04', '2019-07-25 10:19:06', 'active', 'admin', '');
INSERT INTO `users` VALUES (9, 'Lloyd', 'Aikins', 'lloyd.o.aikins@gmail.com', '$2y$10$YCMSX1scoVCN7sI12Q1ozu8cNNN83yX54oRiajckKPhyeYUxniWs2', NULL, NULL, NULL, NULL, '152613215d4896c9f0e04', NULL, NULL, NULL, 'active', 'user', NULL);

SET FOREIGN_KEY_CHECKS = 1;
