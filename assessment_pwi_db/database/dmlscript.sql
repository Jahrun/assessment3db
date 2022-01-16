
Setting environment for using XAMPP for Windows.
MUHAMMAD TAUFIQ@LAPTOP-MBN0S074 d:\xampp
# mysql -u root
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 35
Server version: 10.4.21-MariaDB mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> showdatabases;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'showdatabases' at line 1
MariaDB [(none)]> show databases;
+--------------------+
| Database           |
+--------------------+
| ass_2              |
| classicmodels      |
| db7708201081       |
| hr                 |
| information_schema |
| mysql              |
| performance_schema |
| phpmyadmin         |
| tugas06            |
+--------------------+
9 rows in set (0.001 sec)

MariaDB [(none)]> create database SG_LearnCenter;
Query OK, 1 row affected (0.001 sec)

MariaDB [(none)]> show databases;
+--------------------+
| Database           |
+--------------------+
| ass_2              |
| classicmodels      |
| db7708201081       |
| hr                 |
| information_schema |
| mysql              |
| performance_schema |
| phpmyadmin         |
| sg_learncenter     |
| tugas06            |
+--------------------+
10 rows in set (0.001 sec)

MariaDB [(none)]> use sg_learncenter;
Database changed
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> /* DBMS name:      MySQL 5.0                                    */
MariaDB [sg_learncenter]> /* Created on:     1/12/2022 6:21:19 PM                         */
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table MEMBER
    ->    drop foreign key FK_MEMBER_BELAJAR_CLASS;
ERROR 1146 (42S02): Table 'sg_learncenter.member' doesn't exist
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table MENTOR
    ->    drop foreign key FK_MENTOR_MENGAJAR_CLASS;
ERROR 1146 (42S02): Table 'sg_learncenter.mentor' doesn't exist
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table PELAJARAN
    ->    drop foreign key FK_PELAJARA_MEMILIKI_CLASS;
ERROR 1146 (42S02): Table 'sg_learncenter.pelajaran' doesn't exist
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> drop table if exists CLASS;
Query OK, 0 rows affected, 1 warning (0.000 sec)

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table MEMBER
    ->    drop foreign key FK_MEMBER_BELAJAR_CLASS;
ERROR 1146 (42S02): Table 'sg_learncenter.member' doesn't exist
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> drop table if exists MEMBER;
Query OK, 0 rows affected, 1 warning (0.001 sec)

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table MENTOR
    ->    drop foreign key FK_MENTOR_MENGAJAR_CLASS;
ERROR 1146 (42S02): Table 'sg_learncenter.mentor' doesn't exist
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> drop table if exists MENTOR;
Query OK, 0 rows affected, 1 warning (0.000 sec)

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table PELAJARAN
    ->    drop foreign key FK_PELAJARA_MEMILIKI_CLASS;
ERROR 1146 (42S02): Table 'sg_learncenter.pelajaran' doesn't exist
MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> drop table if exists PELAJARAN;
Query OK, 0 rows affected, 1 warning (0.000 sec)

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> /* Table: CLASS                                                 */
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> create table CLASS
    -> (
    ->    CLASS_ID             char(3) not null  comment '',
    ->    NAMA_BIDANG          varchar(30) not null  comment '',
    ->    JADWAL               varchar(20) not null  comment '',
    ->    primary key (CLASS_ID)
    -> );
Query OK, 0 rows affected (0.017 sec)

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> /* Table: MEMBER                                                */
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> create table MEMBER
    -> (
    ->    NIM                  char(10) not null  comment '',
    ->    CLASS_ID             char(3) not null  comment '',
    ->    NAMA                 varchar(50) not null  comment '',
    ->    KELAS                char(10) not null  comment '',
    ->    SEMESTER             char(1) not null  comment '',
    ->    NO_WA                char(12) not null  comment '',
    ->    FOTO                 longblob not null  comment '',
    ->    primary key (NIM)
    -> );
Query OK, 0 rows affected (0.018 sec)

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> /* Table: MENTOR                                                */
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> create table MENTOR
    -> (
    ->    NO_IDENTITY          varchar(16) not null  comment '',
    ->    CLASS_ID             char(3) not null  comment '',
    ->    NAMA                 varchar(50) not null  comment '',
    ->    NO_WA                char(12) not null  comment '',
    ->    FOTO                 longblob not null  comment '',
    ->    primary key (NO_IDENTITY)
    -> );
Query OK, 0 rows affected (0.016 sec)

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> /* Table: PELAJARAN                                             */
MariaDB [sg_learncenter]> /*==============================================================*/
MariaDB [sg_learncenter]> create table PELAJARAN
    -> (
    ->    NO                   int not null  comment '',
    ->    CLASS_ID             char(3) not null  comment '',
    ->    JUDUL                varchar(50) not null  comment '',
    ->    MEDIA                longblob not null  comment '',
    ->    ARTIKEL              varchar(1024) not null  comment '',
    ->    primary key (NO)
    -> );
Query OK, 0 rows affected (0.020 sec)

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table MEMBER add constraint FK_MEMBER_BELAJAR_CLASS foreign key (CLASS_ID)
    ->       references CLASS (CLASS_ID) on delete restrict on update restrict;
Query OK, 0 rows affected (0.041 sec)
Records: 0  Duplicates: 0  Warnings: 0

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table MENTOR add constraint FK_MENTOR_MENGAJAR_CLASS foreign key (CLASS_ID)
    ->       references CLASS (CLASS_ID) on delete restrict on update restrict;
Query OK, 0 rows affected (0.033 sec)
Records: 0  Duplicates: 0  Warnings: 0

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> alter table PELAJARAN add constraint FK_PELAJARA_MEMILIKI_CLASS foreign key (CLASS_ID)
    ->       references CLASS (CLASS_ID) on delete restrict on update restrict;
Query OK, 0 rows affected (0.039 sec)
Records: 0  Duplicates: 0  Warnings: 0

MariaDB [sg_learncenter]>
MariaDB [sg_learncenter]> show tables;
+--------------------------+
| Tables_in_sg_learncenter |
+--------------------------+
| class                    |
| member                   |
| mentor                   |
| pelajaran                |
+--------------------------+
4 rows in set (0.001 sec)

MariaDB [sg_learncenter]> desc class;
+-------------+-------------+------+-----+---------+-------+
| Field       | Type        | Null | Key | Default | Extra |
+-------------+-------------+------+-----+---------+-------+
| CLASS_ID    | char(3)     | NO   | PRI | NULL    |       |
| NAMA_BIDANG | varchar(30) | NO   |     | NULL    |       |
| JADWAL      | varchar(20) | NO   |     | NULL    |       |
+-------------+-------------+------+-----+---------+-------+
3 rows in set (0.011 sec)

MariaDB [sg_learncenter]> INSERT INTO class (class_id, nama_bidang, jadwal) VALUES ("UU1","Usert Interface User Xperience","Setiap hari Senin"),
    -> ("WP1","WEB Programing","Setiap hari Selasa"),
    -> ("GP1","Game Programing","Setiap hari Rabu");
Query OK, 3 rows affected (0.005 sec)
Records: 3  Duplicates: 0  Warnings: 0

MariaDB [sg_learncenter]> select * from class;
+----------+--------------------------------+--------------------+
| CLASS_ID | NAMA_BIDANG                    | JADWAL             |
+----------+--------------------------------+--------------------+
| GP1      | Game Programing                | Setiap hari Rabu   |
| UU1      | Usert Interface User Xperience | Setiap hari Senin  |
| WP1      | WEB Programing                 | Setiap hari Selasa |
+----------+--------------------------------+--------------------+
3 rows in set (0.001 sec)

MariaDB [sg_learncenter]> desc mentor;
+-------------+-------------+------+-----+---------+-------+
| Field       | Type        | Null | Key | Default | Extra |
+-------------+-------------+------+-----+---------+-------+
| NO_IDENTITY | varchar(16) | NO   | PRI | NULL    |       |
| CLASS_ID    | char(3)     | NO   | MUL | NULL    |       |
| NAMA        | varchar(50) | NO   |     | NULL    |       |
| NO_WA       | char(12)    | NO   |     | NULL    |       |
| FOTO        | longblob    | NO   |     | NULL    |       |
+-------------+-------------+------+-----+---------+-------+
5 rows in set (0.017 sec)

MariaDB [sg_learncenter]>