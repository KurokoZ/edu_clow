<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>农大直播间</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
    <meta name="Keywords" content="中国农业大学,会议直播">
    <meta name="description" content="中国农业大学,会议直播">
    
    <link type="text/css" rel="stylesheet" href="/admin/Public/direct/css/base.css" >
    
</head>
<body>
   
    <div style='margin:0 auto;width:0;height:0;overflow:hidden;'>
        <img src="http://www.clow.net.cn/admin/Public/direct/image/ICON.jpg">
    </div>
	<span class="share_content" style="display: none;"><?php echo ($list[0]['title']); ?></span>
   
    <div class="container">
        <header>

            <img src="/admin/Public/direct/image/first.jpg" >
            <div class="title">
                <span>正在直播</span>
                <marquee scrollamount="3"><?php echo ($list[0]['title']); ?></marquee>
            </div>

        </header>
        <p class="timedown"><span id="timedown">60</span> 秒后自动刷新</p>
    </div>
    <ul>
    	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            	<p class="timeline">#<span class="time"><?php echo (date("H:i",$vo['addtime'])); ?></span>&nbsp;&nbsp;&nbsp;<?php echo (date("m",$vo['addtime'])); ?>月<?php echo (date("d",$vo['addtime'])); ?>日</p>
            	<?php echo (htmlspecialchars_decode($vo['content'])); ?>
        	</li><?php endforeach; endif; else: echo "" ;endif; ?>
    	
        <footer>技术支持：校友团队 克洛网络</footer>
    </ul>
        
    <script>

    var time = 60;
    function timedown(){
        timeContent = document.querySelector("#timedown");
        timeContent.innerHTML = time ;
        if (time == 0) {
            window.location.reload();
        }
        time--;
    }
    setInterval(timedown,1000);
        
    </script>
    
    
</body>
</html>