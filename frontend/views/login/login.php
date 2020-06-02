﻿<?php
use yii\web\UrlManager;
?>
<style>
    .col-xs-3{
        width: 10%;
        margin-left:15%;
    }
    #slideBar{
        margin-left: 27%;
    }
    .form-horizontal{
        margin-top: 66px;
    }
</style>

<input type="hidden" id="TenantId" name="TenantId" value=""/>
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form action="" class="form form-horizontal" id="form1" name="form1" method="post">
            <div class="row cl" style="margin-top: 10px">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="loginform-username" name="LoginForm[username]" required="required" type="text"
                           placeholder="手机号" class="input-text size-L" value="">
                </div>
            </div>
            <div class="row cl" style="margin-top: 10px">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="loginform-password" name="LoginForm[password]" required="required" type="password"
                           placeholder="密码" class="input-text size-L" value="">
                </div>
            </div>
            <div class="row cl" style="margin-top: 10px">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe646;</i></label>
                <div id="slideBar"></div>
                <input id="yanZheng" hidden value="0">
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" id="submit" onclick="submit_form.submit();" type="button"
                           class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    window.onload=function (){
        yanzheng = $("#yanZheng");
        var dataList = ["0","1"];
        var options = {
            dataList: dataList,
            success:function(){
                yanzheng.val('1')
                // console.log("show");
            },
            fail: function(){
                yanzheng.val('0')
                // console.log("fail");
            }
        };
        SliderBar("slideBar", options,yanzheng);
    };
    var submit_form = {
        button_obj: {},
        resend_second: 0,
        resend_timer: 0,
        submit: function () {
            var csrf = "<?= Yii::$app->request->csrfToken; ?>";
            var phone = $("#loginform-username").val();
            var password = $("#loginform-password").val();
            var sms = $("#yanZheng").val();
            if (phone.length < 1 || password.length < 1) {
                layer.msg("账号或密码未填写!");
                return false;
            }
            if (sms == 0) {
                layer.msg("验证码未通过!");
                return false;
            }
            $.ajax({
                type: "POST",
                url: "<?=$url?>",
                data: {
                    'csrf':csrf,
                    'phone':phone,
                    'password':password,
                    'sms':sms,
                },
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        window.location.href = "<?=$re_url?>";
                    } else {
                        layer.msg(data.msg);
                    }
                },
                error: function (e) {
                    layer.close(index);
                    systemOperationMiscellaneous.requestPath=url;
                    systemOperationMiscellaneous.addAjaxErrorLog('POST',e.responseText,'public的ajax组件_xPost');
                    layer.alert('服务器返回异常错误!', {icon: 2});
                }
            });
        },
    }
</script>
