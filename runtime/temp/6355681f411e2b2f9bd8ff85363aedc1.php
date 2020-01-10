<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:60:"F:\journal\public/../application/index\view\index\index.html";i:1578562131;s:50:"F:\journal\application\index\view\public\head.html";i:1578463323;s:51:"F:\journal\application\index\view\public\right.html";i:1578636027;s:50:"F:\journal\application\index\view\public\foot.html";i:1578449367;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<link rel="stylesheet" href="http://www.journal.com/static/index/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://www.journal.com/static/index/css/index.css">
	<script src="http://www.journal.com/static/index/js/jquery.min.js"></script>
	<script src="http://www.journal.com/static/index/js/bootstrap.min.js"></script>

</head>
<body>
	<!-- head开始 -->
	<div class="header">
		<div class="banner">
		<img src="http://www.journal.com/static/index/picture/logo.png" alt="">
		</div>
			<div class="nav">
				<div class="navson">
				<span style="margin-right:50px;"><font style="line-height: 40px;color: #ffffff;font-size: 17px;">		2020年1月3日 星期五</font></span>
				<ul class="navMenu">
					<li><a href="<?php echo url('index/index'); ?>">首页</a></li>
					<li><a href="<?php echo url('page/desc'); ?>">学报简介</a></li>
					<li><a href="<?php echo url('artlist/news'); ?>">学报动态</a></li>
					<li><a href="<?php echo url('artlist/notice'); ?>">学报公告</a></li>
					<li><a href="<?php echo url('joulist/history'); ?>">过刊浏览</a></li>
					<li><a href="<?php echo url('search/search'); ?>">文章检索</a></li>
					<li><a href="<?php echo url('artlist/helps'); ?>">投稿指南</a></li>
					<li><a href="<?php echo url('page/call'); ?>">联系我们</a></li>
				 </ul>
				 </div>
   			</div>
</div>
	<!-- head结束 -->
	
<!-- content开始 -->
<div class="container">
	<div class="row">

	<!-- 左边 -->
		<div class="left-sidebar col-md-8" style="padding-right: 20px;">
	<!-- 轮播 -->
	<div class="lunbo block">
		<div class="content">
			<div id="imgs" data-interval="2000" data-ride="carousel" class="carousel slide" >
				<div class="carousel-inner">
					<div class="item active">
					<img src="http://www.journal.com/static/index/picture/1.jpg">
					<div class="carousel-caption"><a href="">标题1</a></div>
					</div>
					<div class="item">
					<img src="http://www.journal.com/static/index/picture/2.jpg">
					<div class="carousel-caption"><a href="">标题2</a></div>
					</div>
					<div class="item">
					<img src="http://www.journal.com/static/index/picture/3.jpg">
					<div class="carousel-caption"><a href="">标题3</a></div>
					</div>
					<div class="item">
					<img src="http://www.journal.com/static/index/picture/4.jpg">
					<div class="carousel-caption"><a href="">标题4</a></div>
					</div>

					<ul class="carousel-indicators">
					<li data-target="#imgs" data-slide-to="0" class="active"></li>
					<li data-target="#imgs" data-slide-to="1"></li>
					<li data-target="#imgs" data-slide-to="2"></li>
					<li data-target="#imgs" data-slide-to="3"></li>
					</ul>
				</div>
					<a href="#imgs" data-slide="prev" class="carousel-control left"><span class="center-block"><</span></a>
					<a href="#imgs" data-slide="next" class="carousel-control right"><span class="center-block">></span></a>
			</div>
		</div>
	</div>
			<!-- 滚动公告 -->
				<div class="notice block">
					<div class="title xbgg">
						<div class="title_1">学报公告 <a href="#" class="more">查看更多&gt;&gt;</a></div>
					</div>
					<div class="content">
						<ul style="height: 148px;">
			<marquee direction="up" height="148" width="100%" scrollamount="1" scrolldelay="100" onmouseout="this.start()" onmouseover="this.stop()">
				<li><i>1</i>
				<a href="">
					《上海大学学报（自然科学版）》第六届编辑委员会成立大会顺利召开
				</a>
				 <span class="date-time">(2019-08-22)</span>
				</li>

				<li><i>2</i>
				<a href="../column/item546.shtml">
					《上海大学学报（自然科学版）》已正式加入OSID开放科学计划
				</a>
				 <span class="date-time">(2019-07-05)</span>
				</li>

				<li><i>3</i>
				<a href="../column/item59.shtml">
					《上海大学学报（自然科学版）》第三届优秀审稿专家评选结果揭晓
				</a>
				 <span class="date-time">(2018-12-18)</span>
				</li>

				<li><i>4</i>
				<a href="../column/item58.shtml">
					喜讯！《上海大学学报（自然科学版）》被EBSCO学术数据库收录
				</a>
				 <span class="date-time">(2018-06-22)</span>
				</li>

				<li><i>5</i>
				<a href="../column/item60.shtml">
					《上海大学学报(自然科学版)》入选2017年全国“百强科技期刊”
				</a>
				 <span class="date-time">(2018-01-23)</span>
				</li>
			</marquee>
		</ul>
					</div>
				</div>
			<!-- 最新期列表 -->
				<div class="newlist block">
					<div class="title zxqlb" >
						<div class="title_1">最新期列表 
						
						<a href="#" class="more">查看更多&gt;&gt;</a></div>
					</div>
					<div class="content">
						<div class="jtitle">
							<div class="njq">2019年 第25卷 第6期 &nbsp;&nbsp; 刊出日期：2019-12-30</div>
						</div>
<form id="AbstractList" action="" method=post target=_blank>
	<div id='art17047' class=noselectrow>
		<div class="wenzhang">
		<dl>							
			<div class="dqml_qbwz">
				<dd>
					<a target="_blank" href="<?php echo url('article/article'); ?>" class="biaoti">资本市场中公众企业信息披露的Nash均衡</a>						
				</dd>
				<dd class="zuozhe">马嘉萌, 郭苏稼, 李远勤</dd>
				<dd class="zhaiyao">
					<img src="http://www.journal.shu.edu.cn/images/1007-2861/abstract2.png" width="16" height="16"> 
					<a class="txt_zhaiyao1" href="javascript:void(0)" onclick="if (document.getElementById('Abstract17065').style.display=='block') document.getElementById('Abstract17065').style.display='none'; else document.getElementById('Abstract17065').style.display='block'">摘要</a> 
					( <font color="red">5</font> )&nbsp;&nbsp;
					<img src="http://www.journal.shu.edu.cn/images/1007-2861/pdf.png" width="16" height="16">
					<a class="txt_zhaiyao1" href="#1" onclick="lsdy1('PDF','17065','http://www.journal.shu.edu.cn','2019','1221');return false;">PDF</a> (664KB)
					(<font color="red">2</font>)&nbsp;&nbsp; 											
				</dd>
					<div id="Abstract17065" class="white_content zhaiyao">旨在探讨信息披露如何约束上市公司，为解释以前文献的争议提供思路.通过建立不同类型企业在融资过程中的博弈模型，考虑专业投资者的比例，对该模型中纯战略Nash均衡和混合战略Nash均衡展开分析，以揭示信息披露如何在保障资本市场正常运作中不可或缺.研究表明，懂得依据公司质量进行投资的专业投资者比例越小，强制信息披露带来的社会总收益增加越大；特别地，当专业投资者小于一定比例时，强制信息披露是维持市场稳定的必要机制，能有效避免市场的失灵.强制信息披露带来的社会总收益增加在以下情况中更大：投资回报率差异显著，投资规模较大，融资成本较高，市场对于不披露信息惩罚较大.</div>
			</div>
		</dl>
		</div>
	</div>
	<div class=noselectrow>
		<div class="wenzhang">
		<dl>							
			<div class="dqml_qbwz">
				<dd>
					<a target="_blank" href="http://www.journal.shu.edu.cn/CN/10.12066/j.issn.1007-2861.2117" class="biaoti">资本市场中公众企业信息披露的Nash均衡</a>						
				</dd>
				<dd class="zuozhe">马嘉萌, 郭苏稼, 李远勤</dd>
				<dd class="zhaiyao">
					<img src="http://www.journal.shu.edu.cn/images/1007-2861/abstract2.png" width="16" height="16"> 
					<a class="txt_zhaiyao1" href="javascript:void(0)" onclick="if (document.getElementById('Abstract17065').style.display=='block') document.getElementById('Abstract17065').style.display='none'; else document.getElementById('Abstract17065').style.display='block'">摘要</a> 
					( <font color="red">5</font> )&nbsp;&nbsp;
					<img src="http://www.journal.shu.edu.cn/images/1007-2861/pdf.png" width="16" height="16">
					<a class="txt_zhaiyao1" href="#1" onclick="lsdy1('PDF','17065','http://www.journal.shu.edu.cn','2019','1221');return false;">PDF</a> (664KB)
					(<font color="red">2</font>)&nbsp;&nbsp; 											
				</dd>
					<div id="Abstract17065" class="white_content zhaiyao">旨在探讨信息披露如何约束上市公司，为解释以前文献的争议提供思路.通过建立不同类型企业在融资过程中的博弈模型，考虑专业投资者的比例，对该模型中纯战略Nash均衡和混合战略Nash均衡展开分析，以揭示信息披露如何在保障资本市场正常运作中不可或缺.研究表明，懂得依据公司质量进行投资的专业投资者比例越小，强制信息披露带来的社会总收益增加越大；特别地，当专业投资者小于一定比例时，强制信息披露是维持市场稳定的必要机制，能有效避免市场的失灵.强制信息披露带来的社会总收益增加在以下情况中更大：投资回报率差异显著，投资规模较大，融资成本较高，市场对于不披露信息惩罚较大.</div>
			</div>
		</dl>
		</div>
	</div>
</form>
					</div>
				</div>
		</div>
	<!-- 右边 -->
		<div class="right-sidebar col-md-4">
		<!-- 稿件处理系统 -->
			<div class="graft block">
				<div class="title gjclxt">
					<div class="title_2">稿件处理系统</div>
				</div>
				<div class="content">
					<div class="office-2">
                <div class="office-2-l">
                   <a href="<?php echo url('Login/signin'); ?>" target="_blank">
                        <div class="office-2-l-l">
                        	<img src="http://www.journal.shu.edu.cn/images/1007-2861/images/ico04.png">
                            
                        </div>
                        <div class="office-2-l-r">
                            用户登录
                        </div>
                    </a>
                </div>
                <div class="office-2-r">
                   <a href="<?php echo url('Register/signup'); ?>" target="_blank">
                        <div class="office-2-l-l">
                            <img src="http://www.journal.shu.edu.cn/images/1007-2861/images/ico02.png">
                        </div>
                        <div class="office-2-l-r">
                            作者注册
                        </div>
                    </a>
                </div>
                </div>
                <div class="office-2">
                <div class="office-2-l">
                    <a href="<?php echo url('Author/index'); ?>" target="_blank">
                        <div class="office-2-l-l">
                        	<img src="http://www.journal.shu.edu.cn/images/1007-2861/images/ico01.png">
                            
                        </div>
                        <div class="office-2-l-r">
                            在线投稿
                        </div>
                    </a>
                </div>
                <div class="office-2-r">
                    <a href="<?php echo url('Reviewers/index'); ?>" target="_blank">
                        <div class="office-2-l-l">
                            <img src="http://www.journal.shu.edu.cn/images/1007-2861/images/ico03.png">
                            </div>
                        <div class="office-2-l-r">
                            在线审稿
                        </div>
                    </a>
                </div>
            </div>
            
				</div>
			</div>
		<!-- 期刊信息 -->
			<div class="jmessage block">
				<div class="title qkxx">
					<div class="title_2 qkxx">期刊信息 </div>
				</div>
				<div class="content">
					<div class="qkxx_fm">
					<img src="http://www.journal.com/static/index/picture/20200102190358.jpg">
					</div>
					<div class="qkxx_xx">
				
					（双月刊，1995年创刊）<br>
					主管单位：上海市教育委员会<br>
					主办单位：上海大学<br>
					发行范围：公开<br>
					中国标准连续出版物号：<br>ISSN 1673-3851|CN 33-1338/TS

			</div>
				</div>
			</div>
		<!-- 投稿须知 -->
			<div class="dmessage block">
				<div class="title tgxz">
					<div class="title_1">投稿须知<a href="#" class="more-a">&gt;</a></div>
				</div>
				<div class="content tgxa-c">
				
				<ul>
					<li><a href="#" target="_blank" class="icon_list1">蓝牙4.0标准规范下的模糊指纹定位算法</a></li>
					<li><a href="#" target="_blank" class="icon_list1">叶片疲劳寿命神经网络近似计算模型数值实验</a></li>
					<li><a href="#" target="_blank" class="icon_list1">荷叶生物碱对胰脂肪酶的抑制作用</a></li>
					<li><a href="#" target="_blank" class="icon_list1">增强虚拟现实技术研究及其应用</a></li>
					<li><a href="#" target="_blank" class="icon_list1">轴流泵模拟中湍流模式可用性的研究</a></li>
				</ul>
				</div>
			</div>
		<!-- 友情链接 -->
			<div class="link">
				<div class="title yqlj">
					<div class="title_2">友情链接</div>
				</div>
				<div class="content yqlj-con">
							<dl>
				<dd>
				<a href="https://www.osid.org.cn/" target="_blank" class="lanse">
				<img src="http://www.journal.shu.edu.cn/fileup/1007-2861/ITEM/20190911132336.png" width="300" height="75">
				</a>
				</dd>
								<dd>
				<a href="http://www.cujs.com/" target="_blank" class="lanse">
				<img src="http://www.journal.shu.edu.cn/fileup/1007-2861/ITEM/20190813115825.png" width="300" height="75">
				</a>
				</dd>
								<dd>
				<a href="http://check.cnki.net/amlc/" target="_blank" class="lanse">
				<img src="http://www.journal.shu.edu.cn/fileup/1007-2861/ITEM/20190813115721.jpg" width="300" height="75">
				</a>
				</dd>
								<dd>
				<a href="http://www.journal.sh.cn/CN/model/index.shtml" target="_blank" class="lanse">
				<img src="http://www.journal.shu.edu.cn/fileup/1007-2861/ITEM/20190813115641.jpg" width="300" height="75">
				</a>
				</dd>
								<dd>
				<a href="http://www.shqkxh.org/" target="_blank" class="lanse">
				<img src="http://www.journal.shu.edu.cn/fileup/1007-2861/ITEM/20190813115523.jpg" width="300" height="75">
				</a>
				</dd>
							</dl>
				</div>
			</div>
		</div>
	<!-- 右边end -->
		
	</div>
</div>
<!-- content结束 -->

<!-- foot开始 -->
	<div class="foot">
		<div class="footer" style="background-color: pink;">
			<div class="banquan">
		<div class="banquan_xx_l">
			© 2019 上海大学学报（自然科学版）编辑部<br>
办公地址：上海大学新校区出版大楼203室 电话：021-66135508 传真：021-66132736 E-mail: xuebao@mail.shu.edu.cn<br>
通信地址：上海市上大路99号上海大学126信箱 邮编：200444<br>
本系统由北京玛格泰克科技发展有限公司设计开发 技术支持：support@magtech.com.cn
		</div>
		
		
		
	</div>
		</div>
	</div>
<!-- foot结束 -->

</body>
</html>