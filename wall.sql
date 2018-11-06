-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-20 09:46:23
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wall`
--

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE `test` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `t_main` text NOT NULL,
  `t_src` text NOT NULL,
  `t_file` varchar(30) NOT NULL,
  `tea_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `test`
--

INSERT INTO `test` (`t_id`, `t_name`, `t_main`, `t_src`, `t_file`, `tea_id`) VALUES
(1, '1', '2', '<embed src=\'http://player.youku.com/player.php/sid/XMjc5NTUzMzgw/v.swf\' allowFullScreen=\'true\' quality=\'high\' width=\'480\' height=\'400\' align=\'middle\' allowScriptAccess=\'always\' type=\'application/x-shockwave-flash\'></embed>', 'blank.gif', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wd_admin`
--

CREATE TABLE `wd_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_pw` text NOT NULL,
  `admin_logintime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_admin`
--

INSERT INTO `wd_admin` (`admin_id`, `admin_name`, `admin_pw`, `admin_logintime`) VALUES
(1, 'admin', '221221', '2017-04-18 18:07:00');

-- --------------------------------------------------------

--
-- 表的结构 `wd_news`
--

CREATE TABLE `wd_news` (
  `news_id` int(10) NOT NULL,
  `news_name` varchar(20) NOT NULL,
  `news_content` longtext NOT NULL,
  `news_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_news`
--

INSERT INTO `wd_news` (`news_id`, `news_name`, `news_content`, `news_time`) VALUES
(1, '新型MCU简化低功耗LCD应用设计', '全球领先的整合单片机、混合信号、模拟器件和闪存专利解决方案的供应商——Microchip Technology Inc.（美国微芯科技公司）日前推出了用于驱动液晶显示器（LCD）、集成独立于内核的外设（CIP）与智能模拟的全新低功耗单片机（MCU）系列产品。由9款器件组成的PIC16F19197家族包含了电池友好型LCD驱动电荷泵、带计算功能的12位模拟数字转换器（ADC2）、低功耗比较器以及高频振荡器的有源时钟调谐功能。它们是首个针对广受欢迎的低功耗、电池供电且带触摸功能的LCD应用而优化的8位MCU系列。\r\nPIC16F19197系列器件的引脚数从28到64不等，闪存最高达56 KB而RAM最高达4 KB。其备有的电荷泵确保了即使是在电池电压降低的情况下LCD屏幕也能保持一致的对比度。而ADC2可自动完成信号采集与处理任务，轻松实现强大的触摸按钮和滑块功能。此外，有源时钟调谐功能则可帮助客户确保振荡器能在整个电压和温度工作范围内平稳运行。PIC16F19197系列新器件可以完全在硬件环境中实现上述功能而无需依赖软件。 该系列器件还包含一个带电池备份与大电流I/O引脚的实时时钟和日历（RTCC），可直接驱动LCD背光。此外，其带有的空闲/打盹等低功耗模式以及外设模块禁用（PMD）功能可帮助延长电池使用寿命。同时，新器件还可以驱动多达360个LCD段。所有上述这些特点都使得PIC16F19197系列成为了由电池供电的LCD应用的理想选择。\r\n\r\nMicrochip 8位MCU部副总裁Steve Drehobl表示：“PIC16F19197系列的问世简化了低功耗LCD应用的设计工作。所有这些新功能都可以在MPLAB代码配置器（MCC）中进行设置，这大幅缩短了开发时间并加速了产品的上市步伐。”', '2017-06-21 00:00:00'),
(2, '原子厚度的微处理器', '维也纳大学的研究人员使用了一种特别的材料──过渡金属二硫属性元素（transition-metal dichalcogenide，TMD） ，来打造可以改变形状的微处理器，像是奇迹材料石墨烯一样，TMD 可以形成只有一个原子厚度的层状结构，打造出一个接近二维的表面，像是一张超级轻薄的纸，这就是为什么可以让电器产品变形的关键。\r\n\r\nNetwork World 报导，这处理器的功效远不及我们现在使用的那么强大，实际上，它只是一个具有 115 个晶体管的单一位（bit）处理器，只能执行 4 个指令。', '2017-06-21 00:00:00'),
(6, '原子厚度的微处理器', '维也纳大学的研究人员使用了一种特别的材料──过渡金属二硫属性元素（transition-metal dichalcogenide，TMD） ，来打造可以改变形状的微处理器，像是奇迹材料石墨烯一样，TMD 可以形成只有一个原子厚度的层状结构，打造出一个接近二维的表面，像是一张超级轻薄的纸，这就是为什么可以让电器产品变形的关键。\r\n\r\nNetwork World 报导，这处理器的功效远不及我们现在使用的那么强大，实际上，它只是一个具有 115 个晶体管的单一位（bit）处理器，只能执行 4 个指令。', '2017-06-21 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `wd_paper`
--

CREATE TABLE `wd_paper` (
  `paper_id` int(11) NOT NULL,
  `paper_main` text NOT NULL,
  `paper_an1` text NOT NULL,
  `paper_an2` text NOT NULL,
  `paper_an3` text NOT NULL,
  `paper_an4` text NOT NULL,
  `paper_an` int(11) NOT NULL,
  `tea_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_paper`
--

INSERT INTO `wd_paper` (`paper_id`, `paper_main`, `paper_an1`, `paper_an2`, `paper_an3`, `paper_an4`, `paper_an`, `tea_id`) VALUES
(1, '单片机的应用程序一般存放于（    ）中', 'RAM', 'ROM', '寄存器', 'CPU', 3, 1),
(2, '定时器0工作于计数方式,外加计数脉冲信号应接到（    ）引脚。 ', 'P3.2', 'P3.3', 'P3.4', 'P3.5', 3, 1),
(3, 'MCS51单片机在同一优先级的中断源同时申请中断时，CPU首先响应（    ）。 ', '外部中断0', '外部中断1 ', '定时器0   ', '定时器1', 2, 1),
(4, '定时器T2的中断服务程序入口地址为（    ）。', '000BH', '0000H', '001BH', '002BH', 1, 1),
(5, '定时器T2的中断服务程序入口地址为（    ）。', '000BH', '0000H', '001BH', '002BH', 1, 1),
(6, '定时器T2的中断服务程序入口地址为（    ）。', '000BH', '0000H', '001BH', '002BH', 1, 1),
(7, '单片机的应用程序一般存放于（    ）中', 'RAM', 'ROM', '寄存器', 'CPU', 3, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wd_repaper`
--

CREATE TABLE `wd_repaper` (
  `rep_id` int(11) NOT NULL,
  `stu_num` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `paper_an` int(11) NOT NULL,
  `paper_score` int(11) NOT NULL,
  `wn_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_repaper`
--

INSERT INTO `wd_repaper` (`rep_id`, `stu_num`, `paper_id`, `paper_an`, `paper_score`, `wn_id`) VALUES
(50, 2, 7, 3, 0, 8),
(49, 2, 2, 4, 0, 2),
(48, 2, 7, 4, 0, 2),
(47, 2, 7, 3, 11, 1),
(46, 2, 2, 3, 2, 2),
(45, 2, 1, 1, 2, 2),
(44, 2, 2, 2, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `wd_rework`
--

CREATE TABLE `wd_rework` (
  `rew_id` int(10) NOT NULL,
  `stu_num` int(10) NOT NULL,
  `work_id` varchar(20) NOT NULL,
  `paper_id` varchar(20) NOT NULL,
  `paper_an` datetime NOT NULL,
  `paper_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `wd_room`
--

CREATE TABLE `wd_room` (
  `room_id` int(10) NOT NULL,
  `room_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_room`
--

INSERT INTO `wd_room` (`room_id`, `room_name`) VALUES
(1, '艺术馆417'),
(2, '艺术馆502');

-- --------------------------------------------------------

--
-- 表的结构 `wd_stu`
--

CREATE TABLE `wd_stu` (
  `stu_id` int(10) NOT NULL,
  `stu_num` int(20) NOT NULL,
  `stu_name` varchar(20) NOT NULL,
  `stu_pw` text NOT NULL,
  `tea_id` int(10) NOT NULL,
  `stu_right` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_stu`
--

INSERT INTO `wd_stu` (`stu_id`, `stu_num`, `stu_name`, `stu_pw`, `tea_id`, `stu_right`) VALUES
(2, 2, 'wall', '221221', 1, 1),
(3, 1, '欧阳會東', '221221', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `wd_teacher`
--

CREATE TABLE `wd_teacher` (
  `tea_id` int(10) NOT NULL,
  `tea_name` varchar(20) NOT NULL,
  `tea_pw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_teacher`
--

INSERT INTO `wd_teacher` (`tea_id`, `tea_name`, `tea_pw`) VALUES
(0, '无', '111'),
(1, 'wanghua', '221221'),
(2, 'liyan', '221221'),
(5, '王老师', '221221');

-- --------------------------------------------------------

--
-- 表的结构 `wd_test`
--

CREATE TABLE `wd_test` (
  `test_id` int(10) NOT NULL,
  `test_num` int(11) NOT NULL,
  `test_time` int(11) NOT NULL,
  `test_main` varchar(11) NOT NULL,
  `tea_id` int(10) NOT NULL,
  `test_week` int(11) NOT NULL,
  `room_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_test`
--

INSERT INTO `wd_test` (`test_id`, `test_num`, `test_time`, `test_main`, `tea_id`, `test_week`, `room_id`) VALUES
(1, 1, 1, 'disabled', 1, 1, 1),
(2, 1, 1, 'disabled', 1, 2, 2),
(4, 1, 1, 'disabled', 1, 3, 2),
(5, 1, 1, 'disabled', 0, 4, 1),
(6, 1, 1, 'false', 0, 5, 2),
(7, 1, 1, 'disabled', 1, 6, 2),
(8, 1, 1, 'false', 0, 7, 1),
(9, 1, 2, 'disabled', 1, 1, 1),
(10, 1, 2, 'false', 0, 2, 2),
(11, 1, 2, 'disabled', 1, 3, 1),
(12, 1, 2, 'false', 0, 4, 2),
(13, 1, 2, 'false', 0, 5, 1),
(14, 1, 2, 'disabled', 1, 6, 1),
(15, 1, 2, 'disabled', 1, 7, 1),
(16, 1, 1, 'disabled', 1, 6, 1),
(17, 1, 1, 'disabled', 1, 3, 1),
(18, 1, 1, 'disabled', 1, 5, 1),
(19, 1, 1, 'disabled', 1, 2, 1),
(20, 1, 2, 'disabled', 1, 2, 1),
(21, 1, 2, 'disabled', 2, 4, 1),
(22, 1, 1, 'disabled', 2, 1, 2),
(23, 1, 1, 'false', 0, 4, 2),
(24, 1, 1, 'disabled', 2, 7, 2),
(25, 1, 2, 'disabled', 1, 1, 2),
(26, 1, 2, 'disabled', 1, 3, 2),
(27, 1, 2, 'disabled', 1, 5, 2),
(28, 1, 2, 'disabled', 1, 6, 2),
(29, 1, 2, 'disabled', 1, 7, 2);

-- --------------------------------------------------------

--
-- 表的结构 `wd_video`
--

CREATE TABLE `wd_video` (
  `video_id` int(10) NOT NULL,
  `video_name` varchar(20) NOT NULL,
  `video_src` text NOT NULL,
  `video_con` text NOT NULL,
  `video_file` varchar(11) NOT NULL,
  `tea_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_video`
--

INSERT INTO `wd_video` (`video_id`, `video_name`, `video_src`, `video_con`, `video_file`, `tea_id`) VALUES
(15, '理解马克思', '<iframe height=498 width=510 src=\'http://player.youku.com/embed/XMjc5NTUzMzgw\' frameborder=0 \'allowfullscreen\'></iframe>', '不管是赞同还是反对，卡尔 • 马克思（1818-1883）已经成为我们这个时代人类共有的精神财产。法国解构主义思想家雅克 • 德里达（1930-2004）因此宣称：“全世界的男男女女们，不论愿意与否，甚至知道与否，他们今天在某种程度上都是马克思和马克思主义的继承人。” \r\n', '1.ppt', 1),
(17, '2', '<embed src=\'http://player.youku.com/player.php/sid/XMjc5NTUzMzgw/v.swf\' allowFullScreen=\'true\' quality=\'high\' width=\'480\' height=\'400\' align=\'middle\' allowScriptAccess=\'always\' type=\'application/x-shockwave-flash\'></embed>', 'da', '1 (2).ppt', 1),
(18, '4', '<embed src=\'http://player.youku.com/player.php/sid/XMjc5NTUzMzgw/v.swf\' allowFullScreen=\'true\' quality=\'high\' width=\'480\' height=\'400\' align=\'middle\' allowScriptAccess=\'always\' type=\'application/x-shockwave-flash\'></embed>', '31', '111 (1).png', 1),
(19, '5', '<embed src=\'http://player.youku.com/player.php/sid/XMjc5NTUzMzgw/v.swf\' allowFullScreen=\'true\' quality=\'high\' width=\'480\' height=\'400\' align=\'middle\' allowScriptAccess=\'always\' type=\'application/x-shockwave-flash\'></embed>', '345', '333.png', 1),
(20, '534', '<embed src=\'http://player.youku.com/player.php/sid/XMjc5NTUzMzgw/v.swf\' allowFullScreen=\'true\' quality=\'high\' width=\'480\' height=\'400\' align=\'middle\' allowScriptAccess=\'always\' type=\'application/x-shockwave-flash\'></embed>', '457d', '111 (4).png', 1),
(21, 'dawda', '<embed src=\'http://player.youku.com/player.php/sid/XMjc5NTUzMzgw/v.swf\' allowFullScreen=\'true\' quality=\'high\' width=\'480\' height=\'400\' align=\'middle\' allowScriptAccess=\'always\' type=\'application/x-shockwave-flash\'></embed>', 'dsgfdg', '1 (2).ppt', 1),
(22, '1', 'wqeq', '21', 'blank.gif', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wd_work`
--

CREATE TABLE `wd_work` (
  `work_id` int(11) NOT NULL,
  `wn_id` int(10) NOT NULL,
  `tea_id` int(10) NOT NULL,
  `paper_id` text NOT NULL,
  `paper_score` text NOT NULL,
  `open_value` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_work`
--

INSERT INTO `wd_work` (`work_id`, `wn_id`, `tea_id`, `paper_id`, `paper_score`, `open_value`) VALUES
(6, 5, 1, '7', '3', 1),
(7, 1, 1, '7', '1', 1),
(8, 1, 1, '7', '2', 1),
(9, 2, 1, '7', '33', 1),
(10, 5, 1, '7', '3', 1),
(11, 1, 1, '7', '11', 1),
(12, 1, 1, '7', '11', 1),
(13, 1, 1, '7', '11', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wd_worknum`
--

CREATE TABLE `wd_worknum` (
  `wn_id` int(10) NOT NULL,
  `start_time` date NOT NULL,
  `stop_time` date NOT NULL,
  `tea_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wd_worknum`
--

INSERT INTO `wd_worknum` (`wn_id`, `start_time`, `stop_time`, `tea_id`) VALUES
(1, '2017-05-01', '2017-06-07', 1),
(2, '2017-05-01', '2017-05-08', 1),
(3, '2017-05-14', '2017-06-03', 1),
(5, '2017-05-14', '2017-06-22', 1),
(6, '2017-05-08', '2017-07-20', 1),
(11, '2017-06-14', '2017-06-27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `wd_admin`
--
ALTER TABLE `wd_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `wd_news`
--
ALTER TABLE `wd_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `wd_paper`
--
ALTER TABLE `wd_paper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `wd_repaper`
--
ALTER TABLE `wd_repaper`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `wd_rework`
--
ALTER TABLE `wd_rework`
  ADD PRIMARY KEY (`rew_id`),
  ADD KEY `stu_id` (`stu_num`),
  ADD KEY `stu_num` (`stu_num`);

--
-- Indexes for table `wd_room`
--
ALTER TABLE `wd_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `wd_stu`
--
ALTER TABLE `wd_stu`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `stu_id` (`stu_id`),
  ADD KEY `tea_id` (`tea_id`);

--
-- Indexes for table `wd_teacher`
--
ALTER TABLE `wd_teacher`
  ADD PRIMARY KEY (`tea_id`),
  ADD KEY `tea_id` (`tea_id`);

--
-- Indexes for table `wd_test`
--
ALTER TABLE `wd_test`
  ADD PRIMARY KEY (`test_id`),
  ADD UNIQUE KEY `work_id` (`test_id`),
  ADD KEY `tea_id` (`tea_id`);

--
-- Indexes for table `wd_video`
--
ALTER TABLE `wd_video`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `tea_id` (`tea_id`);

--
-- Indexes for table `wd_work`
--
ALTER TABLE `wd_work`
  ADD PRIMARY KEY (`work_id`),
  ADD KEY `tea_id` (`tea_id`);

--
-- Indexes for table `wd_worknum`
--
ALTER TABLE `wd_worknum`
  ADD PRIMARY KEY (`wn_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `wd_admin`
--
ALTER TABLE `wd_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `wd_news`
--
ALTER TABLE `wd_news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `wd_paper`
--
ALTER TABLE `wd_paper`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `wd_repaper`
--
ALTER TABLE `wd_repaper`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- 使用表AUTO_INCREMENT `wd_rework`
--
ALTER TABLE `wd_rework`
  MODIFY `rew_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `wd_room`
--
ALTER TABLE `wd_room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `wd_stu`
--
ALTER TABLE `wd_stu`
  MODIFY `stu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `wd_teacher`
--
ALTER TABLE `wd_teacher`
  MODIFY `tea_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `wd_test`
--
ALTER TABLE `wd_test`
  MODIFY `test_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- 使用表AUTO_INCREMENT `wd_video`
--
ALTER TABLE `wd_video`
  MODIFY `video_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用表AUTO_INCREMENT `wd_work`
--
ALTER TABLE `wd_work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 限制导出的表
--

--
-- 限制表 `wd_stu`
--
ALTER TABLE `wd_stu`
  ADD CONSTRAINT `wd_stu_ibfk_1` FOREIGN KEY (`tea_id`) REFERENCES `wd_teacher` (`tea_id`);

--
-- 限制表 `wd_video`
--
ALTER TABLE `wd_video`
  ADD CONSTRAINT `wd_video_ibfk_1` FOREIGN KEY (`tea_id`) REFERENCES `wd_teacher` (`tea_id`);

--
-- 限制表 `wd_work`
--
ALTER TABLE `wd_work`
  ADD CONSTRAINT `wd_work_ibfk_1` FOREIGN KEY (`tea_id`) REFERENCES `wd_teacher` (`tea_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
