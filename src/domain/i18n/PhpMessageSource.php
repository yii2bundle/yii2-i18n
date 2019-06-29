<?php

namespace yii2bundle\i18n\domain\i18n;

use yii\i18n\MessageSource;
use yii2bundle\i18n\domain\behaviors\MissingTranslationBehavior;
use yii2bundle\i18n\domain\enums\LanguageEnum;

class PhpMessageSource extends \yii\i18n\PhpMessageSource
{
 
	public $forceTranslation = true;
	public $sourceLanguage = LanguageEnum::SOURCE;

	public function behaviors()
    {
        return [
            'missingTranslation' => MissingTranslationBehavior::class,
        ];
    }

}
