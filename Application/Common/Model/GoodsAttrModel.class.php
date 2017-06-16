<?php
namespace Common\Model;

class GoodsAttrModel extends \Think\Model\RelationModel
{
    protected $_link = [
		'attr_items' => [
			'mapping_type' => self::BELONGS_TO,
			'foreign_key' => 'attr_item_id',
			'mapping_fields' => 'attr_id'
		]
	];
}