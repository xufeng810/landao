# Host: localhost  (Version: 5.5.53)
# Date: 2018-01-08 17:56:49
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "risk_admin_pwdcount"
#

DROP TABLE IF EXISTS `risk_admin_pwdcount`;
CREATE TABLE `risk_admin_pwdcount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_ip` varchar(64) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `count_time` smallint(2) DEFAULT NULL COMMENT '此时',
  `updated_t` int(11) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员登录错误的密码次数';

#
# Data for table "risk_admin_pwdcount"
#

INSERT INTO `risk_admin_pwdcount` VALUES (1,'127.0.0.1','admin_vip',2,1514964558);

#
# Structure for table "risk_admin_user"
#

DROP TABLE IF EXISTS `risk_admin_user`;
CREATE TABLE `risk_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) DEFAULT NULL COMMENT '登录账户',
  `real_name` varchar(50) DEFAULT NULL COMMENT '真实名字',
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created_time` int(11) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL COMMENT '上次登录时间',
  `group_id` smallint(3) NOT NULL COMMENT '部门id',
  `sex` smallint(1) DEFAULT '2' COMMENT '1.男 2.女',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=191 DEFAULT CHARSET=utf8;

#
# Data for table "risk_admin_user"
#

/*!40000 ALTER TABLE `risk_admin_user` DISABLE KEYS */;
INSERT INTO `risk_admin_user` VALUES (134,'admin','管理员','123@qq.com','17521015201','14e1b600b1fd579f47433b88e8d85291',1,1510730889,1515402986,40,2),(190,'cccccc','cccccc','','','14e1b600b1fd579f47433b88e8d85291',1,1515131732,NULL,40,2);
/*!40000 ALTER TABLE `risk_admin_user` ENABLE KEYS */;

#
# Structure for table "risk_article"
#

DROP TABLE IF EXISTS `risk_article`;
CREATE TABLE `risk_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arcate_id` int(5) DEFAULT NULL COMMENT '文章的分类id',
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `key_words` varchar(255) DEFAULT NULL COMMENT '关键字',
  `main` text COMMENT '摘要',
  `contents` text COMMENT '主要内容',
  `author` varchar(50) DEFAULT '' COMMENT '作者',
  `from` varchar(255) DEFAULT NULL COMMENT '文章来源',
  `link` varchar(255) DEFAULT NULL COMMENT '文章外链接',
  `status` tinyint(3) DEFAULT '1' COMMENT '1.已提交 2.已发布  -1.已删除 3.已下线',
  `start_time` int(11) DEFAULT NULL COMMENT '发布开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '发布结束时间',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `on_time` int(11) DEFAULT NULL COMMENT '发布时间',
  `auid` int(11) DEFAULT NULL COMMENT '发布auid',
  `is_new` tinyint(1) DEFAULT '0' COMMENT '1.最新 0.不是',
  `is_hot` tinyint(1) DEFAULT '0' COMMENT '1.最热',
  `is_best` tinyint(1) DEFAULT '0' COMMENT '最好',
  `ord` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='文章管理';

#
# Data for table "risk_article"
#

/*!40000 ALTER TABLE `risk_article` DISABLE KEYS */;
INSERT INTO `risk_article` VALUES (25,3,'这是发布 的 文章','这是发布 的 文章','这是发布 的 文章','&lt;p&gt;这是发布 的 文章&lt;/p&gt;','小杜','','',3,1515427200,1517241600,1515387458,1515387686,134,1,1,1,12),(26,1,'wenzhang','','','&lt;p&gt;dddd&lt;br/&gt;&lt;/p&gt;','小杜','','',2,1515340800,1546358400,1515388844,1515393578,134,1,1,1,0),(27,1,'标题','','','','小杜','','',2,1515340800,1546444800,1515388983,1515392289,134,1,1,1,0);
/*!40000 ALTER TABLE `risk_article` ENABLE KEYS */;

#
# Structure for table "risk_article_cat"
#

DROP TABLE IF EXISTS `risk_article_cat`;
CREATE TABLE `risk_article_cat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `ord` int(5) DEFAULT '0' COMMENT '排序',
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='文章分类';

#
# Data for table "risk_article_cat"
#

/*!40000 ALTER TABLE `risk_article_cat` DISABLE KEYS */;
INSERT INTO `risk_article_cat` VALUES (1,0,'新闻',1,0,NULL),(2,1,'国内新闻',1,1,NULL),(3,2,'上海 新闻',1,0,NULL);
/*!40000 ALTER TABLE `risk_article_cat` ENABLE KEYS */;

#
# Structure for table "risk_auth_group"
#

DROP TABLE IF EXISTS `risk_auth_group`;
CREATE TABLE `risk_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text COMMENT '规则id',
  `created_t` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='用户组表';

#
# Data for table "risk_auth_group"
#

/*!40000 ALTER TABLE `risk_auth_group` DISABLE KEYS */;
INSERT INTO `risk_auth_group` VALUES (40,'管理员',1,'178,179,180,183,181,182,184,185,186,187,188,222,215,190,189,223,224,226,225',1511681779,'这是管理员'),(46,'市场部',1,'178,185,186,187,188,189,215,190',1514964340,'这是市场部');
/*!40000 ALTER TABLE `risk_auth_group` ENABLE KEYS */;

#
# Structure for table "risk_auth_rule"
#

DROP TABLE IF EXISTS `risk_auth_rule`;
CREATE TABLE `risk_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `left_nav` smallint(1) NOT NULL DEFAULT '0' COMMENT '左侧导航菜单 1.是',
  `ord` int(5) DEFAULT '0' COMMENT '排序',
  `created_t` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=utf8 COMMENT='规则表';

#
# Data for table "risk_auth_rule"
#

/*!40000 ALTER TABLE `risk_auth_rule` DISABLE KEYS */;
INSERT INTO `risk_auth_rule` VALUES (178,0,'backend/Rule','权限控制',1,1,1,'1511694619'),(179,178,'backend/Rule/rule_list','权限管理',1,1,6,'1511694650'),(180,179,'backend/Rule/ruleadd','添加权限',1,0,0,'1511694769'),(181,178,'backend/Rule/grouplist','部门设置',1,1,7,'1511694769'),(182,181,'backend/Rule/groupadd','添加部门',1,0,0,NULL),(183,179,'backend/Rule/ruledelete','删除权限',1,0,0,NULL),(184,181,'backend/Rule/groupdelete','删除部门',1,0,0,NULL),(185,178,'backend/AdminUsers/adminlist','员工列表',1,1,9,NULL),(186,185,'backend/AdminUsers/adminstatus','管理员停用',1,0,0,NULL),(187,185,'backend/AdminUsers/adminadd','添加管理员',1,0,0,NULL),(188,185,'backend/AdminUsers/admindelete','删除管理员',1,0,0,NULL),(189,0,'backend/ConfigManage','系统设置',1,1,4,NULL),(190,222,'backend/AdminUsers/loglist','操作日志',1,1,3,NULL),(215,222,'backend/SystemManage/loginloglist','登录日志',1,1,0,'1513317229'),(222,0,'backend/log','日志管理',1,1,1,'1514965501'),(223,189,'backend/ConfigManage/index','网站设置',1,1,1,'1514966056'),(224,0,'backend/ArticleManage','文章管理',1,1,10,'1515056448'),(225,224,'backend/ArticleManage/articlelist','文章列表',1,1,1,'1515056482'),(226,224,'backend/ArticleCate/cateList','文章分类',1,1,0,'1515056577');
/*!40000 ALTER TABLE `risk_auth_rule` ENABLE KEYS */;

#
# Structure for table "risk_config"
#

DROP TABLE IF EXISTS `risk_config`;
CREATE TABLE `risk_config` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `name` varchar(50) DEFAULT NULL COMMENT '配置的key键名',
  `value` varchar(512) DEFAULT NULL COMMENT '配置的val值',
  `desc` varchar(50) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

#
# Data for table "risk_config"
#

INSERT INTO `risk_config` VALUES (1,'site_name','网站3',NULL),(2,'record_no','2333',NULL),(3,'site_keyword','333',NULL),(4,'contact','43',NULL),(5,'mobile','53',NULL),(6,'phone','63',NULL),(7,'address','736',NULL),(8,'qq','83',NULL),(9,'qq2','93',NULL),(10,'qq3','103',NULL),(11,'message_type','11',NULL),(12,'message_name','12',NULL),(13,'message_pwd','13',NULL);

#
# Structure for table "risk_entity_log"
#

DROP TABLE IF EXISTS `risk_entity_log`;
CREATE TABLE `risk_entity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL COMMENT '操作人id',
  `content` text,
  `created_t` int(11) DEFAULT NULL COMMENT '时间',
  `ip` varchar(50) NOT NULL COMMENT '操作ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日志';

#
# Data for table "risk_entity_log"
#


#
# Structure for table "risk_login_log"
#

DROP TABLE IF EXISTS `risk_login_log`;
CREATE TABLE `risk_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=222 DEFAULT CHARSET=utf8 COMMENT='登录日志';

#
# Data for table "risk_login_log"
#

/*!40000 ALTER TABLE `risk_login_log` DISABLE KEYS */;
INSERT INTO `risk_login_log` VALUES (197,134,'127.0.0.1',1514964139),(198,134,'127.0.0.1',1514965135),(199,134,'127.0.0.1',1514965386),(200,134,'127.0.0.1',1514965539),(201,134,'127.0.0.1',1514965574),(202,134,'127.0.0.1',1514966081),(203,134,'127.0.0.1',1514967126),(204,134,'127.0.0.1',1514968976),(205,134,'127.0.0.1',1514968997),(206,134,'127.0.0.1',1514971724),(207,134,'127.0.0.1',1515029926),(208,134,'127.0.0.1',1515055082),(209,134,'127.0.0.1',1515056373),(210,134,'127.0.0.1',1515056612),(211,134,'127.0.0.1',1515114560),(212,134,'127.0.0.1',1515123776),(213,134,'127.0.0.1',1515142794),(214,134,'127.0.0.1',1515373841),(215,134,'127.0.0.1',1515373961),(216,134,'127.0.0.1',1515395357),(217,134,'127.0.0.1',1515402891),(218,134,'127.0.0.1',1515402900),(219,134,'127.0.0.1',1515402915),(220,134,'127.0.0.1',1515402950),(221,134,'127.0.0.1',1515402986);
/*!40000 ALTER TABLE `risk_login_log` ENABLE KEYS */;

#
# Structure for table "risk_order"
#

DROP TABLE IF EXISTS `risk_order`;
CREATE TABLE `risk_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `newphone` varchar(50) DEFAULT NULL COMMENT '新号码',
  `msn` varchar(200) DEFAULT NULL COMMENT '卡号',
  `express` tinyint(2) DEFAULT NULL COMMENT '1.中通 2.圆 3.汇通 4.申通',
  `express_sn` varchar(50) DEFAULT NULL COMMENT '快递单号',
  `status` int(1) DEFAULT '1' COMMENT '1.未发货 2.发货',
  `desc` text COMMENT '备注',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `uptime` varchar(255) DEFAULT NULL COMMENT '更新时间',
  `uid` int(11) DEFAULT NULL COMMENT '所属员工',
  `del` smallint(6) DEFAULT '1' COMMENT '0.删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COMMENT='订单表';

#
# Data for table "risk_order"
#

/*!40000 ALTER TABLE `risk_order` DISABLE KEYS */;
INSERT INTO `risk_order` VALUES (6,'小杜','175210152011','上海','12500000008663','9864856152',1,'66086608',2,'客户1',1514550445,'1514710615',142,0);
/*!40000 ALTER TABLE `risk_order` ENABLE KEYS */;

#
# Structure for table "risk_order_iccid"
#

DROP TABLE IF EXISTS `risk_order_iccid`;
CREATE TABLE `risk_order_iccid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` varchar(255) DEFAULT NULL,
  `iccid` varchar(50) DEFAULT NULL,
  `status` smallint(1) DEFAULT '1' COMMENT '1.待收货 2.已收货 2.已激活',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  `jh_time` int(11) DEFAULT NULL COMMENT '激活时间',
  `jh_phone` varchar(50) DEFAULT NULL COMMENT '激活的手机号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=239 DEFAULT CHARSET=utf8 COMMENT='订单和iccid号';

#
# Data for table "risk_order_iccid"
#

/*!40000 ALTER TABLE `risk_order_iccid` DISABLE KEYS */;
/*!40000 ALTER TABLE `risk_order_iccid` ENABLE KEYS */;
