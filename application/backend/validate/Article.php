<?php
namespace app\backend\validate;
use think\Validate;
class Article extends Validate
{
    // 验证规则
    protected $rule = [
        ['title', 'require|max:252', '标题不能为空！|标题长度不能超过252'],
        ['key_words', 'max:252', '关键字长度不能超过252'],
        ['link', 'max:252', '外链接长度不能超过252'],
        ['from', 'max:252', '来源地址不能超过252'],
       
    ];
    
    
}