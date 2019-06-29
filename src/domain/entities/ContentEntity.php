<?php

namespace yii2bundle\i18n\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class ContentEntity
 * 
 * @package yii2bundle\i18n\domain\entities
 * 
 * @property $id
 * @property $entity_id
 * @property $ext_id
 * @property $language_code
 * @property $value
 */
class ContentEntity extends BaseEntity {

	protected $id;
	protected $entity_id;
	protected $ext_id;
	protected $language_code;
	protected $value;

}
