#----------------------
#- xjshop_db
#----------------------
drop database if exists xjshop_db;
create database if not exists xjshop_db default charset=utf8 collate utf8_general_ci;
use xjshop_db;

#----------------------
#- xianj_admin 后台管理员
#----------------------
drop table if exists xianj_admin;
create table if not exists xianj_admin (
id int unsigned not null auto_increment primary key comment '主键',
user_name varchar(25) not null comment '用户名',
password varchar(32) not null comment '密码',
ip varchar(25) not null default '' comment '最后登陆ip',
last_time int unsigned not null comment '最后登陆时间'
)engine=myisam;

#----------------------
#- xianj_goods_category 商品分类
#----------------------
drop table if exists xianj_goods_category;
create table if not exists xianj_goods_category (
id int unsigned not null auto_increment primary key comment '主键',
cate_name varchar(50) not null default '' comment '分类名称',
pid int unsigned not null default '0' comment '父级分类'
)engine=myisam;

#----------------------
#- xianj_brand 商品品牌
#----------------------
drop table if exists xianj_brand;
create table if not exists xianj_brand (
id int unsigned not null auto_increment primary key comment '主键',
brand_name varchar(50) not null default '' comment '品牌名称',
logo varchar(150) not null default '' comment '品牌logo',
abstract varchar(255) not null default '' comment '品牌简介'
)engine=myisam;

#----------------------
#- xianj_goods 商品表
#----------------------
drop table if exists xianj_goods;
create table if not exists xianj_goods (
id int unsigned not null auto_increment primary key comment '主键',
goods_name varchar(60) not null default '' comment '商品名称',
mobie_goods_name varchar(40) not null default '' comment '手机端商品名称',
cate_id int unsigned not null default '0' comment '分类',
brand_id int unsigned not null default '0' comment '品牌',
market_price dec(10,2) unsigned not null default '0' comment '市场价格',
shop_price dec(10,2) unsigned not null default '0' comment '商品价格',
pic varchar(180) not null default '' comment '商品主图',
create_time int unsigned not null default '0' comment '添加时间',
stock int unsigned not null default '0' comment '库存',
is_sale tinyint unsigned not null default '0' comment '是否上架',
keywords varchar(60) not null DEFAULT '' comment '关键字',
description varchar(120) not null DEFAULT '' comment '描述'
)engine=myisam;

#----------------------
#- xianj_goods_img 商品相册表
#----------------------
drop table if exists xianj_goods_img;
create table if not exists xianj_goods_img (
id int unsigned not null auto_increment primary key comment '主键',
goods_id int unsigned not null default '0' comment '商品id',
path varchar(180) not null default '' comment '相册路径'
)engine=myisam;

#----------------------
#- xianj_goods_desc 商品详情
#----------------------
drop table if exists xianj_goods_desc;
create table if not exists xianj_goods_desc (
id int unsigned not null auto_increment primary key comment '主键',
goods_id int unsigned not null default '0' comment '商品id',
content text not null default '' comment '商品详情'
)engine=myisam;

#----------------------
#- xianj_goods_spec 商品规格
#----------------------
drop table if exists xianj_goods_spec;
create table if not exists xianj_goods_spec (
id int unsigned not null auto_increment primary key comment '主键',
goods_id int unsigned not null default '0' comment '商品id',
spec_price dec(10,2) unsigned not null default '0' comment '规格价格',
spec_key varchar(80) not null default '' comment '规格套餐id',
spec_key_name varchar(250) not null default '' comment '规格套餐名称',
spec_stock int unsigned not null default '0' comment '规格库存',
spec_sku varchar(50) not null default '' comment '规格SKU'
)engine=myisam;

#----------------------
#- xianj_goods_attr 商品属性
#----------------------
drop table if exists xianj_goods_attr;
create table if not exists xianj_goods_attr (
id int unsigned not null auto_increment primary key comment '主键',
goods_id int unsigned not null default '0' comment '商品id',
attr_item_id int unsigned not null default '0' comment '属性id',
attr_value varchar(50) not null default '' comment '属性值'
)engine=myisam;

#----------------------
#- xianj_goods_comment 商品评论
#----------------------
drop table if exists xianj_goods_comment;
create table if not exists xianj_goods_comment (
id int unsigned not null auto_increment primary key comment '主键',
goods_id int unsigned not null default '0' comment '商品id',
level tinyint unsigned not null default '5' comment '评论等级',
comment varchar(500) not null default '' comment '评论内容',
user_id int unsigned not null default '0' comment '用户id'
)engine=myisam;

#----------------------
#- xianj_attr 商品属性
#----------------------
drop table if exists xianj_attr;
create table if not exists xianj_attr (
id int unsigned not null auto_increment primary key comment '主键',
attr_name varchar(50) not null default '' comment '属性名称'
)engine=myisam;

#----------------------
#- xianj_attr_items 商品属性值
#----------------------
drop table if exists xianj_attr_items;
create table if not exists xianj_attr_items (
id int unsigned not null auto_increment primary key comment '主键',
attr_id int unsigned not null default '0' comment '属性名称id',
attr_value varchar(80) not null default '' comment '属性值'
)engine=myisam;

#----------------------
#- xianj_spec 商品规格
#----------------------
drop table if exists xianj_spec;
create table if not exists xianj_spec (
id int unsigned not null auto_increment primary key comment '主键',
spec_name varchar(50) not null default '' comment '属性名称'
)engine=myisam;

#----------------------
#- xianj_spec_items 商品规格选项
#----------------------
drop table if exists xianj_spec_items;
create table if not exists xianj_spec_items (
id int unsigned not null auto_increment primary key comment '主键',
spec_id int unsigned not null default '0' comment '属性名称id',
spec_value varchar(80) not null default '' comment '属性值'
)engine=myisam;

#----------------------
#- xianj_user 用户表
#----------------------
drop table if exists xianj_user;
create table if not exists xianj_user (
id int unsigned not null auto_increment primary key comment '主键',
user_name varchar(25) not null comment '用户名',
password varchar(32) not null comment '密码',
sex tinyint unsigned not null comment '密码',
ip varchar(25) not null default '' comment '最后登陆ip',
last_time int unsigned not null comment '最后登陆时间'
)engine=myisam;

#----------------------
#- xianj_article 文章表
#----------------------
drop table if exists xianj_article;
create table if not exists xianj_article (
id int unsigned not null auto_increment primary key comment '主键',
title varchar(80) not null comment '用户名',
content text not null comment '内容',
create_time int unsigned not null default '0' comment '添加时间',
cat_id int unsigned not null default '0' comment '分类',
author varchar(20) not null default '' comment '作者',
num int unsigned not null default '0' comment '阅读量'
)engine=myisam;

#----------------------
#- xianj_article_category 文章分类
#----------------------
drop table if exists xianj_article_category;
create table if not exists xianj_article_category (
id int unsigned not null auto_increment primary key comment '主键',
cate_name varchar(50) not null default '' comment '分类名称',
pid int unsigned not null default '0' comment '父级分类'
)engine=myisam;

#----------------------
#- xianj_site_config 网站配置
#----------------------
drop table if exists xianj_site_config;
create table if not exists xianj_site_config (
id int unsigned not null auto_increment primary key comment '主键',
site_name varchar(80) not null default '' comment '网站名称',
title varchar(80) not null default '' comment '标题',
keywords varchar(250) not null default '' comment '关键字',
description varchar(250) not null default '' comment '描述',
qq varchar(250) not null default '' comment 'qq',
tel varchar(25) not null default '' comment '电话',
address varchar(250) not null default '' comment '地址',
copyright varchar(50) not null default '' comment '版权'
)engine=myisam;





#----------------------
#- xianj_admin 数据
#----------------------
insert into xianj_admin (user_name,password) VALUES ('admin','21232f297a57a5a743894a0e4a801fc3');
