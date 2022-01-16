/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     1/12/2022 6:21:19 PM                         */
/*==============================================================*/


alter table MEMBER 
   drop foreign key FK_MEMBER_BELAJAR_CLASS;

alter table MENTOR 
   drop foreign key FK_MENTOR_MENGAJAR_CLASS;

alter table PELAJARAN 
   drop foreign key FK_PELAJARA_MEMILIKI_CLASS;

drop table if exists CLASS;


alter table MEMBER 
   drop foreign key FK_MEMBER_BELAJAR_CLASS;

drop table if exists MEMBER;


alter table MENTOR 
   drop foreign key FK_MENTOR_MENGAJAR_CLASS;

drop table if exists MENTOR;


alter table PELAJARAN 
   drop foreign key FK_PELAJARA_MEMILIKI_CLASS;

drop table if exists PELAJARAN;

/*==============================================================*/
/* Table: CLASS                                                 */
/*==============================================================*/
create table CLASS
(
   CLASS_ID             char(3) not null  comment '',
   NAMA_BIDANG          varchar(30) not null  comment '',
   JADWAL               varchar(20) not null  comment '',
   primary key (CLASS_ID)
);

/*==============================================================*/
/* Table: MEMBER                                                */
/*==============================================================*/
create table MEMBER
(
   NIM                  char(10) not null  comment '',
   CLASS_ID             char(3) not null  comment '',
   NAMA                 varchar(50) not null  comment '',
   KELAS                char(10) not null  comment '',
   SEMESTER             char(1) not null  comment '',
   NO_WA                char(12) not null  comment '',
   FOTO                 longblob not null  comment '',
   primary key (NIM)
);

/*==============================================================*/
/* Table: MENTOR                                                */
/*==============================================================*/
create table MENTOR
(
   NO_IDENTITY          varchar(16) not null  comment '',
   CLASS_ID             char(3) not null  comment '',
   NAMA                 varchar(50) not null  comment '',
   NO_WA                char(12) not null  comment '',
   FOTO                 longblob not null  comment '',
   primary key (NO_IDENTITY)
);

/*==============================================================*/
/* Table: PELAJARAN                                             */
/*==============================================================*/
create table PELAJARAN
(
   NO                   int not null  comment '',
   CLASS_ID             char(3) not null  comment '',
   JUDUL                varchar(50) not null  comment '',
   MEDIA                longblob not null  comment '',
   ARTIKEL              varchar(1024) not null  comment '',
   primary key (NO)
);

alter table MEMBER add constraint FK_MEMBER_BELAJAR_CLASS foreign key (CLASS_ID)
      references CLASS (CLASS_ID) on delete restrict on update restrict;

alter table MENTOR add constraint FK_MENTOR_MENGAJAR_CLASS foreign key (CLASS_ID)
      references CLASS (CLASS_ID) on delete restrict on update restrict;

alter table PELAJARAN add constraint FK_PELAJARA_MEMILIKI_CLASS foreign key (CLASS_ID)
      references CLASS (CLASS_ID) on delete restrict on update restrict;

