<?php
namespace app\backend\validate;
use think\Validate;
class AdminUser extends Validate
{
    // 验证规则
    protected $rule = [
        ['admin_name', 'require|unique:AdminUser', '登录账号不能为空|登录账号已经存在了'],
        ['admin_password', 'require|confirm:password2', '密码不能为空|两次密码输入不一致'],
        ['status', 'require', '状态不能为空！'],
    ];
    
    
}