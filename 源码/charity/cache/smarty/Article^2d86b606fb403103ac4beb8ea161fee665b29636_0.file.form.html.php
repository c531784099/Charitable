<?php /* Smarty version 3.1.27, created on 2016-07-05 23:27:04
         compiled from "C:\xampp\htdocs\charity\charity\application\views\article\form.html" */ ?>
<?php
/*%%SmartyHeaderCode:15876577bd1c89ed202_67216547%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d86b606fb403103ac4beb8ea161fee665b29636' => 
    array (
      0 => 'C:\\xampp\\htdocs\\charity\\charity\\application\\views\\article\\form.html',
      1 => 1467512833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15876577bd1c89ed202_67216547',
  'variables' => 
  array (
    'row' => 0,
    'companyOption' => 0,
    'statusOption' => 0,
    'count' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_577bd1c8a457c7_63581920',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_577bd1c8a457c7_63581920')) {
function content_577bd1c8a457c7_63581920 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15876577bd1c89ed202_67216547';
echo $_smarty_tpl->getSubTemplate ("common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<link href="/public/js/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<style>
    #right .nav-tabs { margin-bottom:0;}
    #right .tab-content { border:1px solid #ddd; border-top:none; padding:20px 20px 0;}
    .news{display:none;}
    .img_left { position: relative; float: left; margin-right: 10px;}
    .img_left .order { margin-top: 5px; line-height: 30px;}
    .img_left .order span { margin-right: 5px;}
    .img_left a { position: absolute; top: 14px; right: 2px; display: block; width: 20px; height: 20px; background: #fff; color: #fff; text-align: center; line-height: 20px; font-size: 12px;  border-radius: 999px; opacity: .8;}
</style>
<div class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("common/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <div id="right">
        <!--面包屑导航-->
        <ol class="breadcrumb">
            <li><a href="/article/index">慈善动态新闻管理 </a></li>
            <li class="active">动态新闻列表</li>
        </ol>

        <div class="right_con">

            <form class="form-horizontal" id="form-save" action="/ajax/article/save/">
                <div class="tab-pane active" id="basic_right">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label">所在机构</label>
                        <div class="col-sm-4">
                            <select datatype="*" nullmsg="请选择所在机构" class="form-control" id="c_id" name="c_id" >
                                <?php echo $_smarty_tpl->tpl_vars['companyOption']->value;?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="a_title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_title'];?>
" placeholder="标题" datatype="*" nullmsg="请填写标题" style="width: 500px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-4">
                            <textarea name="a_content" id="a_content" style="width:800px; height:250px;" ><?php echo $_smarty_tpl->tpl_vars['row']->value['a_content'];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">排序</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="a_order" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_order'];?>
" placeholder="排序" datatype="*" nullmsg="请填写排序" style="width: 100px;"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">封面</label>
                    <div class="col-sm-4">
                        <input type="file" name="upload" id="upload" onchange="return ajaxFileUpload();" />
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['a_img']) {?>
                        <div style="padding-top:10px;"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_img'];?>
" id="upload-img" style="max-width:200px;"/></div>
                        <input type="hidden" name="a_img" id="file"  value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_img'];?>
" datatype="*" nullmsg="请上传封面"/>
                        <?php } else { ?>
                        <input type="hidden" name="a_img" id="file" datatype="*" nullmsg="请上传封面" />
                        <div style="padding-top:10px;"><img src="" id="upload-img" style="max-width:200px; display:none"/></div>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">状态</label>
                    <div class="col-sm-4">
                        <select datatype="*"  nullmsg="请选择状态" id="a_status" name="a_status" class="form-control">
                            <?php echo $_smarty_tpl->tpl_vars['statusOption']->value;?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button class="btn btn-primary" type="submit">保存</button>
                    </div>
                </div>
            </form>
        </div>

        <!--&lt;!&ndash;弹窗&ndash;&gt;-->
        <!--<form class="form-horizontal" action="/ajax/case/save/" method="post">-->
        <!--<div class="modal fade" id="adminModal" tabindex="-1" role="dialog"></div>-->
        <!--</form>-->
    </div>
    <div class="clear"></div>
</div>
<?php echo '<script'; ?>
 src="/public/js/umeditor/umeditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/umeditor/umeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/umeditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/jquery.ajaxfileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/bootstrap-customfile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/public/js/bootstrap-datetimepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var editor =  '';
    var count  =  '<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
';
    var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
    $(function(){
        UM.getEditor('a_content');
        $("#upload").customFileInput();
    });

    $("#form-save").Validform({
        ajaxPost: true,
        tipSweep: true,
        tiptype:function(msg,o,cssctl){
            if(o.type == 3)
                $.dialog.tips(msg);
        },
        beforeSubmit:function(curform){
        },
        callback:function(response){
            $.dialog.tips(response.info);
            if ( response.status == 'y' ) {
                window.setTimeout(function(){
                    if(url){
                        location.href = url;
                    }else{
                        location.reload();
                    }

                }, 2000)
            }
        }
    });

    var processing = false;
    function ajaxFileUpload() {
        if ( processing == true ) {
            return false;
        }

        var dialog = $.dialog.loading('上传中，请稍等！').show();
        processing = true;
        $.ajaxFileUpload({
            url:'/article/upload/',
            secureuri:false,
            fileElementId:'upload',
            dataType: 'json',
            success: function (data, status){
                setTimeout( function() {
                    processing = false;
                }, 500);
                dialog.close();

                if ( data.status == 'y' ) {
                    $("#upload-img").attr('src', data.info.http).show();
                    $('#file').val(data.info.http);
                    return;
                }

                $.dialog.error(data.info);
                return false;
            },
            error: function (data, status, e){
                $.dialog.error(e);
            }
        });
    }
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>