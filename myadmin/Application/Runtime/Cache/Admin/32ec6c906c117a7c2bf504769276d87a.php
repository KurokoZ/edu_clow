<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title后台登录</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="/myadmin/Public/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="/myadmin/Public/css/thin-admin.css" rel="stylesheet" media="screen">
<link href="/myadmin/Public/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="/myadmin/Public/style/style.css" rel="stylesheet">
</head>
<body>
<div class="login-logo">
	<img src="/myadmin/Public/images/logo.png" width="147" height="33"> 
</div>
<div class="widget">
    <div class="login-content">
        <div class="widget-content" style="padding-bottom:0;">
            <form method="post" action="<?php echo U('Login/login');?>" class="no-margin ajaxForm" role="form">
                <h3 class="form-title">请输入帐号密码</h3>
                <fieldset>
                    <div class="form-group no-margin">
                        <label for="email">帐号</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" placeholder="请输入帐号" class="form-control input-lg" name="name" id="email">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="password">密码</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <i class="icon-lock"></i>
                            </span>
                            <input type="password" placeholder="请输入密码" class="form-control input-lg" name="password" id="password">
                        </div>

                    </div>
                </fieldset>
                <div class="form-actions" style="text-align:center;">
            	   <button class="btn btn-warning" type="button">
            	       Login <i class="m-icon-swapright m-icon-white"></i>
            	   </button>       
                </div>
            </form>
        </div>
   </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="/myadmin/Public/js/jquery.js"></script> 
<script src="/myadmin/Public/js/bootstrap.min.js"></script> 
<!-- AJAX表单 -->
<script src="/myadmin/Public/js/ajaxForm.js"></script>
<script src="/myadmin/Public/js/bootstrap3-validation.js"></script>
</body>
</html>
<script>
    //表单
    var type = '';
    $(document).on("blur",".form-control",function(){
        var val = $(this).val();
        var content = $(this).attr("placeholder");
        if(val == ''){
            $(this).parent().addClass("has-error");
            $(this).parent().removeClass("has-success");
            type = 'false';
            return type;
        }else{
            $(this).parent().removeClass("has-error");
            $(this).parent().addClass("has-success");
            type = 'true';
        }
    })

    //提交
    $(function() {
        $("form").validation();
    })
    $('button.btn-warning').on(
        'click',
        function(e) {
            e.preventDefault();
            var btn = $(this), form = btn.parents('form.ajaxForm');
            //ie处理placeholder提交问题
            form.ajaxSubmit({
                url : form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                dataType : 'json',
                beforeSubmit : function(arr, $form, options) {
                    $(".form-control").blur();
                    if(type == 'false'){
                        return false;
                    }
                    //按钮文案、状态修改
                    btn.text('登录中，请稍等...').prop('disabled', true).addClass(
                            'disabled');
                },
                success : function(data, statusText, xhr, $form) {
                    var text = btn.text();
                    //按钮文案、状态修改
                    btn.removeClass('disabled').text(
                            text.replace('登录中，请稍等...', 'Login '));
                    btn.removeAttr("disabled");
                    if(data.type == 'true'){
                        location.href = data.url;
                    }else{
                        $("#"+data.type).parent().addClass("has-error");
                        $("#"+data.type).parent().removeClass("has-success");
                        alert(data.info);
                    }
                }
            });
        });
</script>