<?php

namespace yii2bundle\i18n\domain\i18n;

use yii2bundle\i18n\domain\helpers\BundleHelper;
use yii2bundle\i18n\domain\helpers\LangHelper;

class I18N extends \yii\i18n\I18N
{
 
	public $translations = [];
	
	public function translate($category, $message, $params, $language) {
		$category = BundleHelper::register($category);
		return parent::translate($category, $message, $params, $language);
	}
 
	public function setAliases($aliases) {
		foreach($aliases as $name => $alias) {
			$translation = [
				'basePath' => $alias,
			];
			$this->translations[$name] = LangHelper::normalizeTranslation($translation);
		}
	}
	
}
