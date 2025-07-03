CREATE DATABASE Rubber DEFAULT CHARACTER SET utf16 
COLLATE utf16_general_ci;

USE Rubber;

-- ตารางผู้ใช้
CREATE TABLE users (
   u_id         INT UNSIGNED AUTO_INCREMENT NOT NULL,
   u_name       VARCHAR(50) COLLATE utf16_general_ci NOT NULL UNIQUE,
   u_lastname   VARCHAR(50) COLLATE utf16_general_ci NOT NULL UNIQUE,
   u_email      VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   u_pass       VARCHAR(50) COLLATE utf16_general_ci NOT NULL UNIQUE,
   u_phone      VARCHAR(15) COLLATE utf16_general_ci NOT NULL,
   CONSTRAINT PK_users PRIMARY KEY (u_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ตาราง Dirt
CREATE TABLE Dirt (
   dirt_id         INT UNSIGNED AUTO_INCREMENT NOT NULL,
   u_id            INT UNSIGNED NOT NULL,
   td_name         VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   filter_number   VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   B_mass          FLOAT(10, 6) NOT NULL,
   A_mass          FLOAT(10, 6) NOT NULL,
   W_mass          FLOAT(10, 6) NOT NULL,
   percentage      FLOAT(10, 6) NOT NULL,
   note            VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   Date_Time       DATE NOT NULL,
   Scale_number    VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   Hotair_number   VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   Boiler_number   VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   CONSTRAINT PK_dirt PRIMARY KEY (dirt_id),
   CONSTRAINT FK_dirt_user FOREIGN KEY (u_id) REFERENCES users(u_id)
     ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ตาราง Volatile_matter
CREATE TABLE Volatile_matter (
   volatile_id     INT UNSIGNED AUTO_INCREMENT NOT NULL,
   u_id            INT UNSIGNED NOT NULL,
   td_name         VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   M1_mass         FLOAT(10, 6) NOT NULL,
   M2_mass         FLOAT(10, 6) NOT NULL,
   M3_mass         FLOAT(10, 6) NOT NULL,
   M4_mass         FLOAT(10, 6) NOT NULL,
   thickness_mm    FLOAT(10, 6) NOT NULL,
   percentage      FLOAT(10, 6) NOT NULL,
   note            VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   Date_Time       DATE NOT NULL,
   Scale_number    VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   Hotair_number   VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   Thickness_number VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   CONSTRAINT PK_volatile PRIMARY KEY (volatile_id),
   CONSTRAINT FK_volatile_user FOREIGN KEY (u_id) REFERENCES users(u_id)
     ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ตาราง Nitrogen
CREATE TABLE Nitrogen (
   nitrogen_id     INT UNSIGNED AUTO_INCREMENT NOT NULL,
   u_id            INT UNSIGNED NOT NULL,
   td_name         VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   B_nitrate       FLOAT(10, 6) NOT NULL,
   A_nitrate       FLOAT(10, 6) NOT NULL,
   V1_nitrate      FLOAT(10, 6) NOT NULL,
   V2_nitrate      FLOAT(10, 6) NOT NULL,
   W_mass          FLOAT(10, 6) NOT NULL,
   percentage      FLOAT(10, 6) NOT NULL,
   note            VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   Date_Time       DATE NOT NULL,
   Scale_number    VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   shredder_number VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   temperature_number DECIMAL(5,2) NOT NULL,
   C_concentration FLOAT(10, 6) NOT NULL,
   CONSTRAINT PK_nitrogen PRIMARY KEY (nitrogen_id),
   CONSTRAINT FK_nitrogen_user FOREIGN KEY (u_id) REFERENCES users(u_id)
     ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ตาราง Ash
CREATE TABLE Ash (
   ash_id         INT UNSIGNED AUTO_INCREMENT NOT NULL,
   u_id           INT UNSIGNED NOT NULL,
   td_name        VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   filter_number  VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   B_mass         FLOAT(10, 6) NOT NULL,
   A_mass         FLOAT(10, 6) NOT NULL,
   W_mass         FLOAT(10, 6) NOT NULL,
   percentage     FLOAT(10, 6) NOT NULL,
   note           VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   Date_Time      DATE NOT NULL,
   Scale_number   VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   Hotair_number  VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   CONSTRAINT PK_ash PRIMARY KEY (ash_id),
   CONSTRAINT FK_ash_user FOREIGN KEY (u_id) REFERENCES users(u_id)
     ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ตาราง Color
CREATE TABLE Color (
   color_id                    INT UNSIGNED AUTO_INCREMENT NOT NULL,
   u_id                        INT UNSIGNED NOT NULL,
   td_name                     VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   read_color                  FLOAT(10, 6) NOT NULL,
   Density_mm                  FLOAT(10, 6) NOT NULL,
   note                        VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   Date_Time                   DATE NOT NULL,
   color_comparison_number     VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   Density_measurement_number  VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   CONSTRAINT PK_color PRIMARY KEY (color_id),
   CONSTRAINT FK_color_user FOREIGN KEY (u_id) REFERENCES users(u_id)
     ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ตาราง Solid
CREATE TABLE Solid (
   solid_id       INT UNSIGNED AUTO_INCREMENT NOT NULL,
   u_id           INT UNSIGNED NOT NULL,
   td_name        VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   Repeat_that    VARCHAR(20) COLLATE utf16_general_ci NOT NULL,
   A_mass         FLOAT(10, 6) NOT NULL,
   W1_mass        FLOAT(10, 6) NOT NULL,
   W2_mass        FLOAT(10, 6) NOT NULL,
   percentage     FLOAT(10, 6) NOT NULL,
   note           VARCHAR(50) COLLATE utf16_general_ci NOT NULL,
   Date_Time      DATE NOT NULL,
   CONSTRAINT PK_solid PRIMARY KEY (solid_id),
   CONSTRAINT FK_solid_user FOREIGN KEY (u_id) REFERENCES users(u_id)
     ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
