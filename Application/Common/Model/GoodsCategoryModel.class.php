<?php
namespace Common\Model;

class GoodsCategoryModel extends \Think\Model\RelationModel
{
    protected $_validate = [
        ['cate_name','require','分类名称必須'],
        ['cate_name','0,20','分类名称最长为20个字符',1,'length'],
		['cate_name','cate_name','分类名称不能重复',1,'unique'],
		['pid','require','请选择上级分类',1],
		['pid','number','上级分类不合法',1],
    ];
    
	protected $_link = [
		'goods_category' => [
			'mapping_type'  => self::BELONGS_TO ,
			'foreign_key' => 'pid'
		],
	];
}