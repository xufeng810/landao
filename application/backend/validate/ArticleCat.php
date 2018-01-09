<?php
namespace app\backend\validate;
use think\Validate;
class ArticleCat extends Validate
{
    // 验证规则
    protected $rule = [
        ['title', 'require|unique:ArticleCat', '分类名称不能为空|分类名称已经存在了'],
        ['status', 'require', '状态不能为空！'],
    ];
    
    
}