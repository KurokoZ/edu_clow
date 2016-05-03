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
                            <th> 公司名称 </th>
                            <th> 联系人 </th>
                            <th> 联系方式 </th>
                            <th> 上传图片 </th>
                            <th> 导购式台数 </th>
                            <th> 面板式台数 </th>
                            <th> 奖品状态 </th>
                            <th> 奖品 </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeC">
                                <td><?php echo ($vo['id']); ?></td>
                                <td class="tab_name"><?php echo ($vo['orgname']); ?></td>
                                <td class="tab_name"><?php echo ($vo['username']); ?></td>
                                <td class="tab_name"><?php echo ($vo['telphone']); ?></td>
                                <td><img src="<?php echo ($vo['img']); ?>" class="tab_img"></td>
                                <td class="tab_name"><?php echo ($vo['num_1']); ?></td>
                                <td class="tab_name"><?php echo ($vo['num_2']); ?></td>
                                <td class="tab_name"><?php echo ($vo['awardstatus']); ?></td>
                                <td class="tab_name"><?php echo ($vo['awardname']); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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