# LuLu CMS2
1、LuLu CMS 2

one powerful and modularity CMS. based on Yii2



2、在线演示Live Demo

frontend: http://www.lulucms.com/

backend(demo/demo): http://www.lulucms.com/admin.php



3、安装:

1)、先下载 lulucms2

2)、然后新建数据库

3)、然后通过web打开lulucms根据提示安装即可


4、Note:

建议在二次开发的时候在后台【设置】->【模块设置】中增加新模块，全部模块化。这样如果框架有更新也不会影响到模块

【一】、添加权限

在后台添加模块后需要在【用户】->【权限管理】中新建对这个模块的访问权限。

主要参数如下：

标识：模块ID/控制器ID

表单类型：多选

默认值/选项：这个里面写的是action id，如

index|首页——代表可执行action为index的get方法和post方法，显示文字为“首页”

update:get|更新(GET)——代表可执行action为update的get方法，不可执行post方法（也就是只能查看，不能提交），显示文字为“更新(GET)”

update:post|更新(POST)——代表可执行action为update的post方法，不可执行get方法（也就是只能提交，不能查看），显示文字为“更新(POST)”

使用规则：选择“对控制器中Action判断” 即可

【二】、给角色设置权限。

把刚刚在【一】里面添加的权限赋值为相应的角色后就可以在后台访问了。


