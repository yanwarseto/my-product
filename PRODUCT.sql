/*
 Navicat Premium Data Transfer

 Source Server         : local-postgres
 Source Server Type    : PostgreSQL
 Source Server Version : 160000 (160000)
 Source Host           : localhost:5432
 Source Catalog        : postgres
 Source Schema         : PRODUCT

 Target Server Type    : PostgreSQL
 Target Server Version : 160000 (160000)
 File Encoding         : 65001

 Date: 18/12/2024 10:38:37
*/


-- ----------------------------
-- Table structure for DATA_PRODUCT
-- ----------------------------
DROP TABLE IF EXISTS "PRODUCT"."DATA_PRODUCT";
CREATE TABLE "PRODUCT"."DATA_PRODUCT" (
  "ID" int8 NOT NULL,
  "DETAIL_PROD" varchar(1000) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of DATA_PRODUCT
-- ----------------------------
INSERT INTO "PRODUCT"."DATA_PRODUCT" VALUES (99, 'speaker rusak');

-- ----------------------------
-- Primary Key structure for table DATA_PRODUCT
-- ----------------------------
ALTER TABLE "PRODUCT"."DATA_PRODUCT" ADD CONSTRAINT "DATA_PRODUCT_pkey" PRIMARY KEY ("ID");
