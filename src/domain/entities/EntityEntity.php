<?php

namespace yii2bundle\i18n\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class EntityEntity
 * 
 * @package yii2bundle\i18n\domain\entities
 * 
 * @property $id
 * @property $domain_id
 * @property $name
 * @property $title
 */
class EntityEntity extends BaseEntity {

	protected $id;
	protected $domain_id;
	protected $name;
	protected $title;

}
