/*
 Navicat Premium Data Transfer

 Source Server         : 3360
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : ciprofile

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 11/09/2021 14:00:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for master_produk
-- ----------------------------
DROP TABLE IF EXISTS `master_produk`;
CREATE TABLE `master_produk`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `muatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bbm` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `servis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah_muatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah_produk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_produk
-- ----------------------------
INSERT INTO `master_produk` VALUES (1, 'Grand Max', 'Pick up', 'Barang', '42', '1 bulan', '800 kg', '1', 1);
INSERT INTO `master_produk` VALUES (2, 'Grand Max', 'Mobil', 'Orang', '40', '1 bulan', '11 penumpang', '1', 1);

-- ----------------------------
-- Table structure for master_profile
-- ----------------------------
DROP TABLE IF EXISTS `master_profile`;
CREATE TABLE `master_profile`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` tinyint(2) UNSIGNED NOT NULL DEFAULT 2 COMMENT '0 = admin,\r\n1 = approval,\r\n2 = user\r\n',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_profile
-- ----------------------------
INSERT INTO `master_profile` VALUES (2, 'Eki Ahmad', 'ekiahmad74@gmail.com', 'SH', '$2y$10$N3Yps9S4VbeLxC4OFYhJwONPzZl06l1iqR9X1DSPSVenv.AEFXcru', 2);
INSERT INTO `master_profile` VALUES (3, 'PZ', 'pz@mail.oz', 'ZH', '$2y$10$TLW.DJzwiCi/Itu.VJa6dOydLU7ubXwFEf6YwLeR37C5iEIVYLR7K', 2);
INSERT INTO `master_profile` VALUES (4, 'Apoo', 'approval@mail.sh', 'Approval', '$2y$10$gqN09FrgKYPD0O9fiCQp1OPJc/MtTs.gfUdY05YDe8OawAmw2QrMm', 1);
INSERT INTO `master_profile` VALUES (5, 'Administrator', 'admin@mail.sh', 'Admin', '$2y$10$iPuyaqSKQV3/OcF2J2qS9el.KyozWJ6PB7Ufwk6erkrtsY8ulhZjK', 0);
INSERT INTO `master_profile` VALUES (6, 'Customer', 'user@mail.sh', 'user', '$2y$10$FBOqpym573xJ6VkftyEidOqQJaiM/x2hAeWjf7nBn0qEBQdVy0om2', 2);

SET FOREIGN_KEY_CHECKS = 1;
