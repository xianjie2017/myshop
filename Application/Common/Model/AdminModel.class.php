<?php
namespace Common\Model;

class AdminModel extends \Think\Model
{
    protected $_validate = [
        ['user_name','require','用戶名必須'],
    ];
}