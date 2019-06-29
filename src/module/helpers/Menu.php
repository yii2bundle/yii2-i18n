<?php

namespace yii2bundle\i18n\module\helpers;

use yii2rails\extension\menu\interfaces\MenuInterface;
use yii2bundle\i18n\domain\enums\LangPermissionEnum;

class Menu implements MenuInterface {
	
	public function toArray() {
		return [
			'label' => ['i18n/main', 'title'],
			'url' => 'i18n/manage',
			'module' => 'i18n',
			//'icon' => 'language',
			'access' => LangPermissionEnum::MANAGE,
		];
	}

}
