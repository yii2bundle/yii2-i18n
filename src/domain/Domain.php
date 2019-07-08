<?php

namespace yii2bundle\i18n\domain;

use yii2rails\domain\enums\Driver;

/**
 * Class Domain
 * 
 * @package yii2bundle\i18n\domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\RepositoriesInterface $repositories
 * @property-read \yii2bundle\i18n\domain\interfaces\services\LanguageInterface $language
 * @property-read \yii2bundle\i18n\domain\interfaces\services\EntityInterface $entity
 * @property-read \yii2bundle\i18n\domain\interfaces\services\FieldInterface $field
 * @property-read \yii2bundle\i18n\domain\interfaces\services\ContentInterface $content
 */
class Domain extends \yii2rails\domain\Domain {
	
	public function config() {
		return [
			'repositories' => [
				'entity' => Driver::ACTIVE_RECORD,
				'field' => Driver::ACTIVE_RECORD,
				'content' => Driver::ACTIVE_RECORD,
			],
			'services' => [
				'entity',
				'field',
				'content',
			],
		];
	}
	
}
