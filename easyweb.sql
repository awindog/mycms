-- MySQL dump 10.13  Distrib 5.5.61, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: easyweb
-- ------------------------------------------------------
-- Server version	5.5.61-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `a_news`
--

DROP TABLE IF EXISTS `a_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verify` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_news`
--

LOCK TABLES `a_news` WRITE;
/*!40000 ALTER TABLE `a_news` DISABLE KEYS */;
INSERT INTO `a_news` VALUES (4,1,1,'等保的重要历史作用','2007年我国信息安全等级保护制度正式实施，通过十余年的时间的发展与实践，成为了我国非涉密信息系统网络安全建设的重要标准。<br>等保标准具有很强的实用性：它是监管部门合规执法检查的依据，是我国诸多网络信息安全标准制度的重要参考体系架构，是行业主管部门对于下级部门网络安全建设的指引标准的重要依据和参考体系，由此标准衍生了诸多行业标准：例如人社行业等保标准、金融行业等保标准、能源行业（电力）等保标准、教育行业等保标准等行业标准。总的来说，等保制度是网络安全从业者开展网络安全工作的重要指导体系和制度。'),(3,1,1,'等保制度的发展历程','等保制度从2007信息安全等级保护制度正式发布执行。2014年全国安标委秘书处下达对《信息安全技术信息系统等级保护基本要求》（&nbsp;GB/T&nbsp;22239—2008）进行修订的任务，修订工作由公安部第三研究所（公安部信息安全等保护评估中心）主要承担。<br>2016第五届全国信息安全等级保护大会提出国家对等级保护制度提出了新的要求，等级保护制度将进入2.0时代。2017年信安标委开展网络安全等级保护标准的制修订工作，17年1月形成征求意见稿。2017年《网络安全法》正式执行明确了网络安全等级保护制度作为落实网络安全法网络安全建设的重要标准依据。2018年6月网络安全等级保护条例（征求意见稿）发布。2019年5月网络安全等级保护2.0标准正式发布。'),(2,1,1,'等保2.0变化的几个关键点','首先是意义的变化：由信息安全等级保护→网络安全等级保护，强调网络空间安全。网络安全法第21条、第31条明确规定了网络运营者和关键信息基础设施运营者，都应该按网络安全等级保护制度的要求对系统进行安全保护，以法律的形式确定等级保护工作为国家网络安全的基本国策，并在法律层面确立了其在网络安全领域的基础、核心地位。<br>第二，是对象的变化。新等保实现了保护对象的全覆盖，更具普适性与指导性，对象扩大了（包括基础网络），通用要求加扩展要求（工控、云计算、大数据、物联网、移动互联），更适应当前信息化高速发展所面临的新问题新挑战。<br>第三，定级上的变化，三级系统的定级新增了一类受侵害客体：对于公民、法人和其他组织的合法权益造成严重影响的应定为三级。<br>第四，是测评标准的变化。测评要求的【测评单元】中增加了【测评对象】项，进一步明确了测评的对象。测评条件更具适应性但是要求更严格（复测评周期、测评控制项的减少、合规基线上调测评75分以上合格，当然这部分要求在部分地区部分行业主管单位现行等保标准也有基于现状及预期效果有弹性要求、例如个别地区卫健委要求医院等保初次等保测评合格分数基线为80分，复测评合格分数基线为85分）、某省金融行业等保测评合格分数基线为90分。四级及以上系统复测评周期延长，改为一年为复测评周期，兼顾考虑了实际等级保护工作的所面临的复杂情况，更符合实际工作的场景。<br>等保2.0在定级备案实施也发生了变化，在备案环节原30天内备案的时间缩短为10个工作日。等保2.0的定级，不是自主定级，到公安机关定级备案前要新增两个关键环节，确保定级备案的严谨与准确，第一对于定级对象的等级要经过专家评审，第二要经得主管部门审核通过，才能到公安机关备案确定最终等级保护对象的级别，整体定级更加严格。新建的第三级以上定级对象，通过等级测评后方可投入运行，加强“同步性”原则。<br>从等级保护2.0框架中能够体现“一个中心，三重防护”的思想得以升华，等保2.0标准体系相比现行等保标准的安全体系更注重动态防御（变被动防护为主动防护，变静态防护为动态防护，变单点防护为整体防控，变粗放防护为精准防护），强调事前预防、事中响应、事后审计。等级保护2.0体系中要求应依据国家网络安全等级保护政策和标准，开展组织管理、机制建设、安全规划、安全监测、通报预警、应急处置、态势感知、能力建设、监督检查、技术检测、安全可控、队伍建设、教育培训和经费保障等工作。<br>等保2.0首次加入了可信计算的相关要求并分级逐级提出可采用可信验证的要求。注意是可采用不是应采用。另外在恶意代码防范方面三级系统要求或采用主动免疫可信验证机制。四级以上恶意代码防范方面要求应采用主动免疫可信验证机制。<br>等保2.0新增个人信息保护内容，个人信息安全做为网络安全法的内容在等保要求控制项中也独立出现，在当前政务互通、人物互联，个人信息被广泛采集的商业、政务环境下，意指提升个人信息保护的重要性和必要性。'),(1,1,1,'解读','在过去10余年的等级保护实施建设中，等级保护工作给社会各界带来了示范性、标准化的指导和积极影响，等级保护制度是一套相对严谨有效的网络安全标准制度。但是，对于等级保护标准制度的实施与建设仍然还有部分地区部分网络安全从业者存在理解上的误区和疑问，我来说一下自己的看法。<br>等保是否是免责的安全牌？<br>事实上从网络安全法实施以来的各类处罚案例来看，并不应该把获得等保合规证书作为网络信息安全工作免责的目标，而是应该理解、使用网络安全等级保护制度标准，结合业务的特点开展体系化的网络安全管理工作。<br>是否购买了符合等保技术要求的网络安全设备就能够有效抵御网络风险？<br>网络安全产品是最低成本、最高效率、解决最基本网络安全问题的手段和工具，但是工具购置齐全后如何利用工具开展有效的网络安全防护规划与执行是至关重要的，所以只是从标定合规要求购置网络安全产品的角度开展等级保护工作是看似简单实际却是错误的方法。<br>实际工作中是否为了保障业务的连续性要牺牲网络安全建设的完整性？<br>从保密性、完整性和可用性三个属性的角度看，其存在相互协同又相互制约的可能，实际工作中我们会面对的安全防护体系给业务带来不便的情况，建议在此类情况发生时切勿单独从业务或者安全单一维度看待影响和解决方案，业务与安全的融合至关重要，单纯IT资产角度看待网络安全风险的局限性已经显现，所以业务安全与网络安全制度、标准的共同融合将有效解决安全与业务的制约与矛盾。<br>等保2.0什么时候算正式实施？东软能提供什么服务？<br>2019年12月1日正式实施，在此之前仍然有近半年的过渡期。等保2.0依然在整个实施流程上由五个标准环节构成：定级、备案、建设整改、等级测评、监督检查五个方面。<br>东软网络安全结合网络安全产品、安全服务、咨询规划服务三大类业务能力：<br>在定级、备案、建设整改前期、监督检查环节以一体化咨询服务结合十余年等保项目经验，东软网络安全为客户提供全面的咨询规划与现场服务；<br>在建设整改环节，东软网络安全为客户提供网络安全产品、攻防渗透服务、咨询规划服务与集成交付实施服务等，东软网络安全为客户提供全面交付服务；<br>在等级测评前期，东软网络安全为客户提供合规预评估、辅助测评服务，保障高效、顺利通过等级测评；<br>在监督检查环节，东软网络安全为客户开展巡检、故障处置、应急处置等服务工作；<br>最后东软网络安全针对已按照等保1.0建设的客户提供复测评、1.0向2.0升级实施规划、等保2.0复测评等内容提供专业的咨询服务、产品及安全服务。');
/*!40000 ALTER TABLE `a_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_users`
--

DROP TABLE IF EXISTS `a_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(200) DEFAULT '0',
  `ip` varchar(10) DEFAULT NULL,
  `personal` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_users`
--

LOCK TABLES `a_users` WRITE;
/*!40000 ALTER TABLE `a_users` DISABLE KEYS */;
INSERT INTO `a_users` VALUES (1,'admin','$2a$08$bWhJ53e9ljj8YKiSjRukdOyubyq8QqHXlVgEWUQE3YSHVjcgpnzYu','1.png',NULL,'我是管理员'),(4,'user123','$2a$08$4YCiq4RGHa2vklffdJBVhuEnTpZsldmCJLV18i7.pdf6BEp6coOi.','0','172.17.0.1',NULL);
/*!40000 ALTER TABLE `a_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-23 14:17:21
