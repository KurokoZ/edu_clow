<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>统计分析</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="/admin/Public/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="/admin/Public/css/thin-admin.css" rel="stylesheet" media="screen">
<link href="/admin/Public/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="/admin/Public/style/style.css" rel="stylesheet">
<link href="/admin/Public/style/dashboard.css" rel="stylesheet">
<link href="/admin/Public/css/demo_page.css" rel="stylesheet">
<link href="/admin/Public/css/demo_table.css" rel="stylesheet">
<script src="/admin/Public/js/jquery.js"></script> 
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
  <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pu  ll-left" href="#"><i class="icon-reorder"></i> </a>
    <div class="brand pull-left"> <a href="<?php echo U('Index/index');?>"><img src="/admin/Public/images/logo.png" width="147" height="33"></a></div>
    <ul class="nav navbar-nav navbar-right  hidden-xs">
      <li class="dropdown user  hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class="username">Admin</span> <i class="icon-caret-down small"></i> </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo U('Login/logout');?>"><i class="icon-key"></i>安全退出</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
   
<div class="wrapper">
  <div class="left-nav">
    <div id="side-nav">
      <ul id="nav">
        <li> <a href="<?php echo U('OmronVote/index');?>"> <i class="icon-table"></i> 欧姆龙-投票 </a> </li>
        <li> <a href="<?php echo U('OmronAward/index');?>"> <i class="icon-trophy"></i> 欧姆龙-转盘抽奖 </a> </li>
        <li> <a href="<?php echo U('AutoRefresh/index');?>"> <i class="icon-refresh"></i> 图文直播 </a> </li> 
      </ul>
    </div>
  </div>
<script>
    $("#nav").find("li").each(function(){
        var href = $(this).find("a").attr("href");
        if(href == "<?php echo ($action_url); ?>"){
            $(this).addClass("current");
        }
    })
</script>   
<style>
  .tab_img{width:50px;height:50px;}
  td{color:#fff;}
</style>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <div class="widget">
            <div class="widget-content">
              <div class="example_alt_pagination">
                <div id="container">
                  <div class="full_width big"></div>
                  <div id="demo">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                      <thead>
                        <tr>
                          <th> 参赛人ID </th>
                          <th> 参赛人姓名 </th>
                          <th> 参赛人头像 </th>
                          <th> 参赛人票数 </th>
                        </tr>
                      </thead>
                      <tbody>
                        <!--  <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeC">
                              <td><?php echo ($vo['id']); ?></td>
                              <td class="tab_name"><?php echo ($vo['name']); ?></td>
                              <td><img src="<?php echo ($vo['img']); ?>" class="tab_img"></td>
                              <td><?php echo ($vo['num']); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>  -->
                        <tr class="gradeC">
                        	<td><?php echo ($users[0]['id']); ?></td>
                        	<td>商洪博</td>
                        	<td><img data-src="<?php echo ($users[0]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[0]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[1]['id']); ?></td>
                        	<td>崔新阳</td>
                        	<td><img data-src="<?php echo ($users[1]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[1]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[2]['id']); ?></td>
                        	<td>金卓雯</td>
                        	<td><img data-src="<?php echo ($users[2]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[2]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[3]['id']); ?></td>
                        	<td>方文超</td>
                        	<td><img data-src="<?php echo ($users[3]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[3]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[4]['id']); ?></td>
                        	<td>唐春玉</td>
                        	<td><img data-src="<?php echo ($users[4]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[4]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[5]['id']); ?></td>
                        	<td>陆金花&李洁</td>
                        	<td><img data-src="<?php echo ($users[5]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[5]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[6]['id']); ?></td>
                        	<td>黄安琪</td>
                        	<td><img data-src="<?php echo ($users[6]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[6]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[7]['id']); ?></td>
                        	<td>袁翠萍</td>
                        	<td><img data-src="<?php echo ($users[7]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[7]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[8]['id']); ?></td>
                        	<td>李莎</td>
                        	<td><img data-src="<?php echo ($users[8]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[8]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[9]['id']); ?></td>
                        	<td>刘阳</td>
                        	<td><img data-src="<?php echo ($users[9]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[9]['num']); ?></td>
                        </tr>
						<tr class="gradeC">
                        	<td><?php echo ($users[10]['id']); ?></td>
                        	<td>许丽蓉</td>
                        	<td><img data-src="<?php echo ($users[10]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[10]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[11]['id']); ?></td>
                        	<td>刘晨晨</td>
                        	<td><img data-src="<?php echo ($users[11]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[11]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[12]['id']); ?></td>
                        	<td>山本秀男</td>
                        	<td><img data-src="<?php echo ($users[12]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[12]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[13]['id']); ?></td>
                        	<td>魏明华</td>
                        	<td><img data-src="<?php echo ($users[13]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[13]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[14]['id']); ?></td>
                        	<td>费国强</td>
                        	<td><img data-src="<?php echo ($users[14]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[14]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[15]['id']); ?></td>
                        	<td>崔相哲</td>
                        	<td><img data-src="<?php echo ($users[15]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[15]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[16]['id']); ?></td>
                        	<td>许文婕</td>
                        	<td><img data-src="<?php echo ($users[16]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[16]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[17]['id']); ?></td>
                        	<td>徐超</td>
                        	<td><img data-src="<?php echo ($users[17]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[17]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[18]['id']); ?></td>
                        	<td>徐幼圆</td>
                        	<td><img data-src="<?php echo ($users[18]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[18]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[19]['id']); ?></td>
                        	<td>奚桔玲</td>
                        	<td><img data-src="<?php echo ($users[19]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[19]['num']); ?></td>
                        </tr>
						<tr class="gradeC">
                        	<td><?php echo ($users[20]['id']); ?></td>
                        	<td>商洪博</td>
                        	<td><img data-src="<?php echo ($users[20]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[20]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[21]['id']); ?></td>
                        	<td>金梁</td>
                        	<td><img data-src="<?php echo ($users[21]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[21]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[22]['id']); ?></td>
                        	<td>刘永进</td>
                        	<td><img data-src="<?php echo ($users[22]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[22]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[23]['id']); ?></td>
                        	<td>牛轩</td>
                        	<td><img data-src="<?php echo ($users[23]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[23]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[24]['id']); ?></td>
                        	<td>钟笔</td>
                        	<td><img data-src="<?php echo ($users[24]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[24]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[25]['id']); ?></td>
                        	<td>付凡</td>
                        	<td><img data-src="<?php echo ($users[25]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[25]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[26]['id']); ?></td>
                        	<td>成志彬</td>
                        	<td><img data-src="<?php echo ($users[26]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[26]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[27]['id']); ?></td>
                        	<td>张端阳</td>
                        	<td><img data-src="<?php echo ($users[27]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[27]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[28]['id']); ?></td>
                        	<td>宁浩鹏</td>
                        	<td><img data-src="<?php echo ($users[28]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[28]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[29]['id']); ?></td>
                        	<td>仲艳</td>
                        	<td><img data-src="<?php echo ($users[29]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[29]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[30]['id']); ?></td>
                        	<td>蔡海洋</td>
                        	<td><img data-src="<?php echo ($users[30]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[30]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[31]['id']); ?></td>
                        	<td>贺平</td>
                        	<td><img data-src="<?php echo ($users[31]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[31]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[32]['id']); ?></td>
                        	<td>潘逸琼</td>
                        	<td><img data-src="<?php echo ($users[32]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[32]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[33]['id']); ?></td>
                        	<td>邓家飞</td>
                        	<td><img data-src="<?php echo ($users[33]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[33]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[34]['id']); ?></td>
                        	<td>区志雄</td>
                        	<td><img data-src="<?php echo ($users[34]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[34]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[35]['id']); ?></td>
                        	<td>林彦相</td>
                        	<td><img data-src="<?php echo ($users[35]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[35]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[36]['id']); ?></td>
                        	<td>黄思慧</td>
                        	<td><img data-src="<?php echo ($users[36]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[36]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[37]['id']); ?></td>
                        	<td>朱正清</td>
                        	<td><img data-src="<?php echo ($users[37]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[37]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[38]['id']); ?></td>
                        	<td>王珍</td>
                        	<td><img data-src="<?php echo ($users[38]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[38]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[39]['id']); ?></td>
                        	<td>张慧</td>
                        	<td><img data-src="<?php echo ($users[39]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[39]['num']); ?></td>
                        </tr>
                        <tr class="gradeC">
                        	<td><?php echo ($users[40]['id']); ?></td>
                        	<td>顾荔荔</td>
                        	<td><img data-src="<?php echo ($users[40]['img']); ?>" class="tab_img"></td>
                        	<td><?php echo ($users[40]['num']); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bottom-nav footer"> 2015 &copy; 影冰辰の后台. </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="/admin/Public/js/jquery.js"></script> 
<script src="/admin/Public/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="/admin/Public/js/smooth-sliding-menu.js"></script>
<script type="text/javascript" language="javascript" src="/admin/Public/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="/admin/Public/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable( {
			"sPaginationType": "full_numbers"
		} );
	} );
</script>
<!--switcher html start-->
<div class="demo_changer active" style="right: 0px;">
  <div class="demo-icon"></div>
  <div class="form_holder">
    <div class="predefined_styles"> <a class="styleswitch" rel="a" href=""><img alt="" src="/admin/Public/images/a.jpg"></a> <a class="styleswitch" rel="b" href=""><img alt="" src="/admin/Public/images/b.jpg"></a> <a class="styleswitch" rel="c" href=""><img alt="" src="/admin/Public/images/c.jpg"></a> <a class="styleswitch" rel="d" href=""><img alt="" src="/admin/Public/images/d.jpg"></a> <a class="styleswitch" rel="e" href=""><img alt="" src="/admin/Public/images/e.jpg"></a> <a class="styleswitch" rel="f" href=""><img alt="" src="/admin/Public/images/f.jpg"></a> <a class="styleswitch" rel="g" href=""><img alt="" src="/admin/Public/images/g.jpg"></a> <a class="styleswitch" rel="h" href=""><img alt="" src="/admin/Public/images/h.jpg"></a> <a class="styleswitch" rel="i" href=""><img alt="" src="/admin/Public/images/i.jpg"></a> <a class="styleswitch" rel="j" href=""><img alt="" src="/admin/Public/images/j.jpg"></a> </div>
  </div>
</div>
<!--switcher html end--> 
<script src="/admin/Public/assets/switcher/switcher.js"></script> 
<script src="/admin/Public/assets/switcher/moderziner.custom.js"></script>
<link href="/admin/Public/assets/switcher/switcher.css" rel="stylesheet">
<link href="/admin/Public/assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/a.css" title="a" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/b.css" title="b" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/c.css" title="c" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/d.css" title="d" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/e.css" title="e" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/f.css" title="f" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/g.css" title="g" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/h.css" title="h" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/i.css" title="i" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/admin/Public/assets/switcher/j.css" title="j" media="all" />
</body>
</html>
 
<script>
	function img(){
		$(".tab_img").each(function(){
			var img = $(this).attr("data-src");
			$(this).attr("src",img);
		})
		$(".paginate_button").attr("onclick","img()");
		$(".paginate_active").attr("onclick","img()");
	}

	$(function(){ 
		img();
		
		$("select[name='example_length']").change(function(){
			img();
		})
		
		$("th").click(function(){
			img();
		})
		
		$(document).on("keyup","input[placeholder='随意搜']",function(){
			img();
		})
	})
</script>