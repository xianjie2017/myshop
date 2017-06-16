<?php
namespace Common\Model;

class GoodsModel extends \Think\Model\RelationModel
{
    protected $_link = [
        'goods_category' => [
            'mapping_type' => self::BELONGS_TO,
            'foreign_key'  => 'cate_id'
        ],
        'brand' => [
            'mapping_type' => self::BELONGS_TO,
            'foreign_key'  => 'brand_id'
        ],
    ];


    protected $_validate = [
        //['user_name','require','用戶名必須'],
    ];
	
	protected $_auto = [
		['create_time','time',self::MODEL_INSERT,'function']
	];
}