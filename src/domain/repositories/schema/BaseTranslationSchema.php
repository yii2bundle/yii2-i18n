<?php

namespace yii2bundle\i18n\domain\repositories\schema;

use yii2rails\domain\enums\RelationEnum;
use yii2rails\domain\repositories\relations\BaseSchema;

/**
 * Class BaseTranslationSchema
 *
 * @package yii2bundle\i18n\domain\repositories\schema
 *
 */
abstract class BaseTranslationSchema extends BaseSchema
{
    public function relations()
    {
        return [
            'i18n' => [
                'type' => RelationEnum::MANY,
                'field' => 'id',
                'foreign' => [
                    'id' => 'i18n.content',
                    'field' => 'ext_id',
                ],
            ]
        ];
    }
}