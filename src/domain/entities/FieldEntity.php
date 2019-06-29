<?php

namespace yii2bundle\i18n\domain\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class FieldEntity
 * 
 * @package yii2bundle\i18n\domain\entities
 * 
 * @property $id
 * @property $entity_id
 * @property $name
 * @property $title
 * @property $is_required
 */
class FieldEntity extends BaseEntity {

	protected $id;
	protected $entity_id;
	protected $name;
	protected $title;
	protected $is_required;

}
