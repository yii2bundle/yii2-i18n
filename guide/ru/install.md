Установка
===

Устанавливаем зависимость:

```
composer require yii2module/yii2-lang
```

Объявляем common/config/main:

```php
use yii2bundle\i18n\domain\enums\LanguageEnum;

return [
    ...
	'language' => LanguageEnum::RU, // current Language
	'sourceLanguage' => LanguageEnum::SOURCE, // Language development
	...
	'bootstrap' => [..., 'language', ...],
	...
	'components' => [
        ...
	    'language' => 'yii2bundle\i18n\domain\components\Language',
	    'i18n' => [
			'class' => 'yii2bundle\i18n\domain\i18n\I18N',
			'translations' => [
				'*' => [
					'class' => 'yii2bundle\i18n\domain\i18n\PhpMessageSource',
					'basePath' => '@common/messages',
					'on missingTranslation' => ['yii2bundle\i18n\domain\handlers\TranslationEventHandler', 'handleMissingTranslation'],
				],
			],
		],
		...
	],
];
```

Обработчик недостающего перевода `on missingTranslation` желательно назначать всем источникам перевода,
чтобы обработка была единообразной.

Объявляем common модуль:

```php
return [
	'modules' => [
		...
		'i18n' => [
			'class' => 'yii2bundle\i18n\module\Module',
		],
        ...
	],
];
```

Объявляем домен:

```php
return [
		// ...
		'i18n' => 'yii2bundle\i18n\domain\Domain',
		// ...
];
```
