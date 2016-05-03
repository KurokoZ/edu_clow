<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>统计分析</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="/myadmin/Public/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="/myadmin/Public/css/thin-admin.css" rel="stylesheet" media="screen">
<link href="/myadmin/Public/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="/myadmin/Public/style/style.css" rel="stylesheet">
<link href="/myadmin/Public/style/dashboard.css" rel="stylesheet">
<link href="/myadmin/Public/css/demo_page.css" rel="stylesheet">
<link href="/myadmin/Public/css/demo_table.css" rel="stylesheet">
<script src="/myadmin/Public/js/jquery.js"></script> 
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
  <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pu  ll-left" href="#"><i class="icon-reorder"></i> </a>
    <div class="brand pull-left"> <a href="<?php echo U('Index/index');?>"><img src="/myadmin/Public/images/logo.png" width="147" height="33"></a></div>
    <ul class="nav navbar-nav navbar-right  hidden-xs">
      <li class="dropdown user  hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class="username">Admin</span> <i class="icon-caret-down small"></i> </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo U('Login/logout');?>"><i class="icon-key"></i>安全退出</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
   
<audio src="/myadmin/Public/music/ddl.mp3" autoplay="true"></audio>

                <div style="width:100%;text-align:center;color:red;padding:10px 0;">
					<p>伸开双手，我就是风</p><p>
					梦是世界最最不同的时空</p><p>
					心的海洋，爱的山峰</p><p>
					是你说的，人都不同</p><p>
					是你教我成长的感动</p><p>
					闭上眼睛随着你，飞向天空</p><p>
					我最爱的，豆豆龙，豆豆龙</p><p>
					豆豆龙，豆豆龙</p><p>
					世界什么都有，</p><p>
					只要你愿意自由感受</p><p>
					我最爱的，豆豆龙，豆豆龙</p><p>
					豆豆龙，豆豆龙</p><p>
					人人心中都有豆豆龙</p><p>
					童年就永远不会消失</p><p>
					爱是最美的拥有</p><p>
					伸开双手，我就是风</p><p>
					梦是世界最最不同的时空</p><p>
					心的海洋，爱的山峰</p><p>
					是你说的，人都不同</p><p>
					是你教我成长的感动</p><p>
					闭上眼睛随着你，飞向天空</p><p>
					我最爱的，豆豆龙，豆豆龙</p><p>
					豆豆龙，豆豆龙</p><p>
					世界什么都有，</p><p>
					只要你愿意自由感受</p><p>
					我最爱的，豆豆龙，豆豆龙</p><p>
					豆豆龙，豆豆龙</p><p>
					人人心中都有豆豆龙</p><p>
					童年就永远不会消失</p><p>
					爱是最美的拥有</p><p>
					豆豆龙，豆豆龙</p><p>
					豆豆龙，豆豆龙</p><p>
					世界什么都有，</p><p>
					只要你愿意自由感受</p><p>
					我最爱的，豆豆龙，豆豆龙</p><p>
					豆豆龙，豆豆龙</p><p>
					人人心中都有豆豆龙</p><p>
					童年就永远不会消失</p><p>
					爱是最美的拥有</p><p>
					豆豆龙，豆豆龙</p><p>
					豆豆龙，豆豆龙</p><p>
					世界什么都有，</p><p>
					只要你愿意自由感受</p><p>
					我最爱的，豆豆龙，豆豆龙</p><p>
					豆豆龙，豆豆龙</p><p>
					人人心中都有豆豆龙</p><p>
					童年就永远不会消失</p><p>
					爱是最美的拥有</p>
  </div>
</div>
<div class="bottom-nav footer"> 2015 &copy; 影冰辰の后台. </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="/myadmin/Public/js/jquery.js"></script> 
<script src="/myadmin/Public/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="/myadmin/Public/js/smooth-sliding-menu.js"></script>
<script type="text/javascript" language="javascript" src="/myadmin/Public/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="/myadmin/Public/js/jquery.dataTables.js"></script>
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
    <div class="predefined_styles"> <a class="styleswitch" rel="a" href=""><img alt="" src="/myadmin/Public/images/a.jpg"></a> <a class="styleswitch" rel="b" href=""><img alt="" src="/myadmin/Public/images/b.jpg"></a> <a class="styleswitch" rel="c" href=""><img alt="" src="/myadmin/Public/images/c.jpg"></a> <a class="styleswitch" rel="d" href=""><img alt="" src="/myadmin/Public/images/d.jpg"></a> <a class="styleswitch" rel="e" href=""><img alt="" src="/myadmin/Public/images/e.jpg"></a> <a class="styleswitch" rel="f" href=""><img alt="" src="/myadmin/Public/images/f.jpg"></a> <a class="styleswitch" rel="g" href=""><img alt="" src="/myadmin/Public/images/g.jpg"></a> <a class="styleswitch" rel="h" href=""><img alt="" src="/myadmin/Public/images/h.jpg"></a> <a class="styleswitch" rel="i" href=""><img alt="" src="/myadmin/Public/images/i.jpg"></a> <a class="styleswitch" rel="j" href=""><img alt="" src="/myadmin/Public/images/j.jpg"></a> </div>
  </div>
</div>
<!--switcher html end--> 
<script src="/myadmin/Public/assets/switcher/switcher.js"></script> 
<script src="/myadmin/Public/assets/switcher/moderziner.custom.js"></script>
<link href="/myadmin/Public/assets/switcher/switcher.css" rel="stylesheet">
<link href="/myadmin/Public/assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/a.css" title="a" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/b.css" title="b" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/c.css" title="c" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/d.css" title="d" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/e.css" title="e" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/f.css" title="f" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/g.css" title="g" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/h.css" title="h" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/i.css" title="i" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/myadmin/Public/assets/switcher/j.css" title="j" media="all" />
</body>
</html>