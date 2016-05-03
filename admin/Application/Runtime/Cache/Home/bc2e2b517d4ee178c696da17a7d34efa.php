<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset = utf-8" />

	<title>OMRON</title>

	<meta name="description" content="欧姆龙2015TOGA投票活动">
	<meta name="keywords" content="欧姆龙,2015TOGA,投票活动"/>

	<meta name="author" content="clow" />

    <!--对无线端进行适配，定义窗口宽度以设备宽度为基准，初始缩放比例为1.0 -->
	<meta content="width = device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" name="viewport">
	
	<link rel="stylesheet" href="/admin/Public/css/swiper.css">
	<link rel="stylesheet" href="/admin/Public/css/oumon-01.css">
	<link rel="stylesheet" href="/admin/Public/css/iconfont.css">
	
<!-- 样式重置 -->
<style type="text/css">

body,p,h1,h2,h3,h4,h5,h6,ol,ul,dl,dd,input{margin: 0;font-size: 12px;font-family: "微软雅黑";}
ol,ul{list-style: none;padding: 0;}
th,td{padding: 0;}
a{text-decoration: none;}
input,select,option{padding: 0;border: none;}
.popup_main,.rules,.popup_bg,.data_content,.success{display:none;}
/*
    
@media screen and (min-height:500px){
    .swiper-slide-content-middle{margin-top: 8%;}}
*/


</style>
</head>


<body>
    <!--详情弹窗-->
    <div class="popup">
    	<!--点赞规则弹窗-->
	    <div class="rules">
	        <div class="rules_header">
	            <span class="rules_header_title">点赞规则</span>
	            <i id="rules_header_close" class="icon iconfont">&#xe604;</i>
	        </div>
	        
	        <!--详情-->
	        <div class="rules_list">
	            <div class="">
	                <div class="rules_list_title_bg"></div>
	                <div class="rules_list_title">点赞时间</div>
	            </div>
	            <div style="clear:both"></div>
	            <div class="rules_list_content">2016年1月8日17:00-1月14日16:00</div>
	        </div>
	        
	        <div class="rules_list">
	            <div class="">
	                <div class="rules_list_title_bg"></div>
	                <div class="rules_list_title">点赞次数</div>
	            </div>
	            <div style="clear:both"></div>
	            <div class="rules_list_content">每位员工可为一个项目点赞一次</div>
	        </div>
	        
	        <div class="rules_list">
	            <div class="">
	                <div class="rules_list_title_bg"></div>
	                <div class="rules_list_title">了解详情</div>
	            </div>
	            <div style="clear:both"></div>
	            <div class="rules_list_content">点击选手名片即可查看项目详情</div>
	        </div>
	        
	        <div class="rules_list">
	            <div class="">
	                <div class="rules_list_title_bg"></div>
	                <div class="rules_list_title">点赞方式</div>
	            </div>
	            <div style="clear:both"></div>
	            <div class="rules_list_content">点击选手名片下方的&nbsp;<i class="icon iconfont" style="color:#fff;">&#xe601;</i>&nbsp;标识</div>
	            <div class="rules_list_content">点开选手详情页面，点击“为Ta点赞”</div>
	        </div>
	        
	        <div class="rules_list">
	            <div class="">
	                <div class="rules_list_title_bg"></div>
	                <div class="rules_list_title">温馨提示</div>
	            </div>
	            <div style="clear:both"></div>
	            <div class="rules_list_content">请勿以任何形式分享或转发此点赞页面</div>
	        </div>
	    </div>
    	
        <div class="popup_main">
             <div class="popup_top">
                 <i id="close_popup" class="icon iconfont">&#xe603;</i>
             </div>
            <div class="popup_middle">
                <div class="popup_left">
                    <img />
                    <p class="popup_name"></p>
                    <p class="popup_department"></p>
                </div>
                <div class="popup_right">
                    <p class="popup_title"></p>
                    <div class="popup_content"></div>
                </div>
            </div>
            
            <div style="clear:both"></div>
            <div class="popup_bottom">
                <i id="tan_icon" class="icon iconfont"></i>
                <span>为Ta点赞</span>
            </div>
        </div>
    </div>
    <div class="popup_bg"></div>
    <div class="rules_bg"></div>
    <!--点赞成功-->
    <div class="success">
        <i id="success_icon" class="icon iconfont">&#xe600;</i>
        <span class="">点赞成功！</span>
    </div>
   
    <!--点赞规则-->
    <div class="zan_btn"><span >点/赞/规/则</span></div>
    
    <!--背景-->
    <div class="bg">
       <img id="bgtop" src="/admin/Public/img/omronvote/bg1.jpg" />
       <img id="bgbottom" src="/admin/Public/img/omronvote/bg2.jpg" />
    </div>
    
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
        	<!-- 1 -->
       		<div class="swiper-slide">
       			<?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--1号-->
	                <div class="swiper-slide-content">
	                    <div class="swiper-slide-content-top" onclick="top(this);">
	                        <div class="swiper-slide-content-top-img">
	                            <img data-src="<?php echo ($vo['img']); ?>">
	                        </div>
	                        <div class="swiper-slide-content-top-content">
                                <?php if($vo['key'] == 6): ?><p class="name" style="font-size:12px;"><b class="name_key"><?php echo ($vo['key']); ?></b>.&nbsp;<b class="name_name"><?php echo ($vo['name']); ?></b></p>
                                <?php else: ?>
                                    <p class="name"><b class="name_key"><?php echo ($vo['key']); ?></b>.&nbsp;<b class="name_name"><?php echo ($vo['name']); ?></b></p><?php endif; ?>
	                            <div class="marquee01">
	                            	<p class="department"><?php echo ($vo['department']); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="swiper-slide-content-middle marquee">
	                       <p>
	                       <?php echo ($vo['title']); ?>
	                       </p>
	                    </div>
	                    <p class="swiper-slide-content-bottom" id="content_<?php echo ($vo['key']); ?>">
	                        <?php if($vo['status'] == 'true'): ?><i class="icon iconfont">&#xe602;</i><?php else: ?><i class="icon iconfont">&#xe601;</i><?php endif; ?>
	                        
	                        <span class="majority"><?php echo ($vo['num']); ?></span>
	                    </p>
	                    <p class="data_content" oid="<?php echo ($vo['status']); ?>"><?php echo ($vo['content']); ?></p>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
       		</div>
       		<!-- 2 -->
       		<div class="swiper-slide">
       			<?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,6,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--1号-->
	                <div class="swiper-slide-content">
	                    <div class="swiper-slide-content-top">
	                        <div class="swiper-slide-content-top-img">
	                            <img data-src="<?php echo ($vo['img']); ?>">
	                        </div>
	                        <div class="swiper-slide-content-top-content">
	                            <p class="name"><b class="name_key"><?php echo ($vo['key']); ?></b>.&nbsp;<b class="name_name"><?php echo ($vo['name']); ?></b></p>
	                            <div class="marquee01">
	                            	<p class="department"><?php echo ($vo['department']); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="swiper-slide-content-middle marquee">
	                       <p>
	                        <?php echo ($vo['title']); ?>
	                       </p>
	                    </div>
	                    <p class="swiper-slide-content-bottom" id="content_<?php echo ($vo['key']); ?>">
	                        <?php if($vo['status'] == 'true'): ?><i class="icon iconfont">&#xe602;</i><?php else: ?><i class="icon iconfont">&#xe601;</i><?php endif; ?>
	                        
	                        <span class="majority"><?php echo ($vo['num']); ?></span>
	                    </p>
	                    <p class="data_content" oid="<?php echo ($vo['status']); ?>"><?php echo ($vo['content']); ?></p>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
       		</div>
       		<!-- 3 -->
       		<div class="swiper-slide">
       			<?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,12,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--1号-->
	                <div class="swiper-slide-content">
	                    <div class="swiper-slide-content-top">
	                        <div class="swiper-slide-content-top-img">
	                            <img data-src="<?php echo ($vo['img']); ?>">
	                        </div>
	                        <div class="swiper-slide-content-top-content">
	                            <p class="name"><b class="name_key"><?php echo ($vo['key']); ?></b>.&nbsp;<b class="name_name"><?php echo ($vo['name']); ?></b></p>
	                            <div class="marquee01">
	                            	<p class="department"><?php echo ($vo['department']); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="swiper-slide-content-middle marquee">
	                       <p>
	                        <?php echo ($vo['title']); ?>
	                       </p>
	                    </div>
	                    <p class="swiper-slide-content-bottom" id="content_<?php echo ($vo['key']); ?>">
	                        <?php if($vo['status'] == 'true'): ?><i class="icon iconfont">&#xe602;</i><?php else: ?><i class="icon iconfont">&#xe601;</i><?php endif; ?>
	                        
	                        <span class="majority"><?php echo ($vo['num']); ?></span>
	                    </p>
	                    <p class="data_content" oid="<?php echo ($vo['status']); ?>"><?php echo ($vo['content']); ?></p>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
       		</div>
       		<!-- 4 -->
       		<div class="swiper-slide">
       			<?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,18,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--1号-->
	                <div class="swiper-slide-content">
	                    <div class="swiper-slide-content-top">
	                        <div class="swiper-slide-content-top-img">
	                            <img data-src="<?php echo ($vo['img']); ?>">
	                        </div>
	                        <div class="swiper-slide-content-top-content">
	                            <p class="name"><b class="name_key"><?php echo ($vo['key']); ?></b>.&nbsp;<b class="name_name"><?php echo ($vo['name']); ?></b></p>
	                            <div class="marquee01">
	                            	<p class="department"><?php echo ($vo['department']); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="swiper-slide-content-middle marquee">
	                       <p>
	                       <?php echo ($vo['title']); ?>
	                       </p>
	                    </div>
	                    <p class="swiper-slide-content-bottom" id="content_<?php echo ($vo['key']); ?>">
	                        <?php if($vo['status'] == 'true'): ?><i class="icon iconfont">&#xe602;</i><?php else: ?><i class="icon iconfont">&#xe601;</i><?php endif; ?>
	                        
	                        <span class="majority"><?php echo ($vo['num']); ?></span>
	                    </p>
	                    <p class="data_content" oid="<?php echo ($vo['status']); ?>"><?php echo ($vo['content']); ?></p>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
       		</div>
       		<!-- 5 -->
       		<div class="swiper-slide">
       			<?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,24,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--1号-->
	                <div class="swiper-slide-content">
	                    <div class="swiper-slide-content-top">
	                        <div class="swiper-slide-content-top-img">
	                            <img data-src="<?php echo ($vo['img']); ?>">
	                        </div>
	                        <div class="swiper-slide-content-top-content">
	                            <p class="name"><b class="name_key"><?php echo ($vo['key']); ?></b>.&nbsp;<b class="name_name"><?php echo ($vo['name']); ?></b></p>
	                            <div class="marquee01">
	                            	<p class="department"><?php echo ($vo['department']); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="swiper-slide-content-middle marquee">
	                       <p>
	                       <?php echo ($vo['title']); ?>
	                       </p>
	                    </div>
	                    <p class="swiper-slide-content-bottom" id="content_<?php echo ($vo['key']); ?>">
	                        <?php if($vo['status'] == 'true'): ?><i class="icon iconfont">&#xe602;</i><?php else: ?><i class="icon iconfont">&#xe601;</i><?php endif; ?>
	                        
	                        <span class="majority"><?php echo ($vo['num']); ?></span>
	                    </p>
	                    <p class="data_content" oid="<?php echo ($vo['status']); ?>"><?php echo ($vo['content']); ?></p>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
       		</div>
       		<!-- 6 -->
       		<div class="swiper-slide">
       			<?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,30,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--1号-->
	                <div class="swiper-slide-content">
	                    <div class="swiper-slide-content-top">
	                        <div class="swiper-slide-content-top-img">
	                            <img data-src="<?php echo ($vo['img']); ?>">
	                        </div>
	                        <div class="swiper-slide-content-top-content">
	                            <p class="name"><b class="name_key"><?php echo ($vo['key']); ?></b>.&nbsp;<b class="name_name"><?php echo ($vo['name']); ?></b></p>
	                            <div class="marquee01">
	                            	<p class="department"><?php echo ($vo['department']); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="swiper-slide-content-middle marquee">
	                       <p>
	                       <?php echo ($vo['title']); ?>
	                       </p>
	                    </div>
	                    <p class="swiper-slide-content-bottom" id="content_<?php echo ($vo['key']); ?>">
	                        <?php if($vo['status'] == 'true'): ?><i class="icon iconfont">&#xe602;</i><?php else: ?><i class="icon iconfont">&#xe601;</i><?php endif; ?>
	                        
	                        <span class="majority"><?php echo ($vo['num']); ?></span>
	                    </p>
	                    <p class="data_content" oid="<?php echo ($vo['status']); ?>"><?php echo ($vo['content']); ?></p>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
       		</div>
       		<!-- 7 -->
       		<div class="swiper-slide">
       			<?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,36,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--1号-->
	                <div class="swiper-slide-content">
	                    <div class="swiper-slide-content-top">
	                        <div class="swiper-slide-content-top-img">
	                            <img data-src="<?php echo ($vo['img']); ?>">
	                        </div>
	                        <div class="swiper-slide-content-top-content">
	                            <p class="name"><b class="name_key"><?php echo ($vo['key']); ?></b>.&nbsp;<b class="name_name"><?php echo ($vo['name']); ?></b></p>
	                            <div class="marquee01">
	                            	<p class="department"><?php echo ($vo['department']); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="swiper-slide-content-middle marquee">
	                       <p>
	                       <?php echo ($vo['title']); ?>
	                       </p>
	                    </div>
	                    <p class="swiper-slide-content-bottom" id="content_<?php echo ($vo['key']); ?>">
	                        <?php if($vo['status'] == 'true'): ?><i class="icon iconfont">&#xe602;</i><?php else: ?><i class="icon iconfont">&#xe601;</i><?php endif; ?>
	                        
	                        <span class="majority"><?php echo ($vo['num']); ?></span>
	                    </p>
	                    <p class="data_content" oid="<?php echo ($vo['status']); ?>"><?php echo ($vo['content']); ?></p>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
       		</div>
        </div>
    <div class="swiper-pagination"></div>
</div>

    <script src="/admin/Public/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/admin/Public/js/jquery.ez-bg-resize.js" type="text/javascript" charset="utf-8"></script>
   
    <!-- Swiper JS -->
    <script src="/admin/Public/js/swiper.js"></script>
    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
    });
    </script>
	<script>
		$(function(){
			$(".swiper-slide").each(function(){
                $(this).find(".swiper-slide-content").each(function(){
                    var img = $(this).find(".swiper-slide-content-top").find(".swiper-slide-content-top-img").find("img").attr("data-src");
                    $(this).find(".swiper-slide-content-top").find(".swiper-slide-content-top-img").find("img").attr("src",img);
                })
            })
            
			$("#close_popup").click(function(){
				$('.popup_main').hide();
				$(".popup_bg").hide();
			})
            
            $("#rules_header_close").click(function(){
                $(".rules").hide();
                $(".rules_bg").hide();
            })
		})
	</script>
	<script>
		$(".swiper-slide-content-top").click(function(){
			var img = $(this).find(".swiper-slide-content-top-img").find("img").attr("data-src");
			var name = $(this).find(".swiper-slide-content-top-content").find("p[class='name']").find(".name_name").html();
			var key = $(this).find(".swiper-slide-content-top-content").find("p[class='name']").find(".name_key").html();
			var department = $(this).find(".swiper-slide-content-top-content").find(".marquee01").find("p[class='department']").html();
			var desc = $(this).next().find("p").html();
			var content = $(this).siblings('*:last').html();
			var status = $(this).siblings('*:last').attr("oid");
			if(status == 'true'){
				var i = "&#xe602;";
			}else{
				var i = "&#xe601;";
			}
			$("#tan_icon").html(i);
			$(".popup_left").find("img").attr("src",img);
			$(".popup_left").find("p[class='popup_name']").html(name);
			$(".popup_left").find("p[class='popup_department']").html(department);
			$(".popup_title").html(desc);
			$(".popup_content").html(content);
			$(".popup_bottom").attr("oid",key);
			$('.popup_main').show();
			$(".popup_bg").show();
		})
		
		$(".swiper-slide-content-middle").click(function(){
			var img = $(this).prev().find(".swiper-slide-content-top-img").find("img").attr("data-src");
			var name = $(this).prev().find(".swiper-slide-content-top-content").find("p[class='name']").find(".name_name").html();
			var key = $(this).prev().find(".swiper-slide-content-top-content").find("p[class='name']").find(".name_key").html();
			var department = $(this).prev().find(".swiper-slide-content-top-content").find(".marquee01").find("p[class='department']").html();
			var desc = $(this).find("p").html();
			var content = $(this).siblings('*:last').html();
			var status = $(this).siblings('*:last').attr("oid");
			if(status == 'true'){
				var i = "&#xe602;";
			}else{
				var i = "&#xe601;";
			}
			$("#tan_icon").html(i);
			$(".popup_left").find("img").attr("src",img);
			$(".popup_left").find("p[class='popup_name']").html(name);
			$(".popup_left").find("p[class='popup_department']").html(department);
			$(".popup_title").html(desc);
			$(".popup_content").html(content);
			$(".popup_bottom").attr("oid",key);
			$('.popup_main').show();
			$(".popup_bg").show();
		})

		$(".zan_btn").click(function(){
            $(".rules").show();
            $(".rules_bg").show();
        })
		
		$(".popup_bottom").click(function(){
			var key = $(this).attr("oid");
			add_click(key);
		})
		
		$(".swiper-slide-content-bottom").click(function(){
			var key = $(this).prev().prev().find(".swiper-slide-content-top-content").find("p[class='name']").find(".name_key").html();
			add_click(key);
		})
		
		function add_click(key){
			$.ajax({
	             type: "POST",
	             url: "<?php echo U('Omron/poll');?>",
	             data: "key="+key,
	             dataType: "json",
	             success: function(data){
	            	 $('.popup_main').hide();
	 				 $(".popup_bg").hide();
	 				 if(data.type == "true"){
	 					 $("#content_"+data.key).find("i[class='icon iconfont']").html("&#xe602;");
		 				 var num = parseInt($("#content_"+data.key).find(".majority").html()) + 1;
		 				 $("#content_"+data.key).find(".majority").html(num);
		 				 $("#content_"+data.key).next().attr("oid",data.type);
		 				 $(".success").find("span").html(data.info);
		 				 time();
	 				 }else if(data.type == "error"){
	 					 location.href = data.url;
	 				 }else{
	 					 $(".success").find("span").html(data.info);
	 					 time();
	 				 }
	             }
	       })
		}
		
		function time(){
			$(".success").fadeIn(1000).delay(1500).fadeOut(1000);
		}
	</script>
</body>
</html>