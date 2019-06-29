<?php

namespace yii2bundle\i18n\domain\repositories\ar;

use yii2bundle\i18n\domain\interfaces\repositories\FieldInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class FieldRepository
 * 
 * @package yii2bundle\i18n\domain\repositories\ar
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 */
class FieldRepository extends BaseActiveArRepository implements FieldInterface {

	protected $schemaClass = true;

    public function tableName()
    {
        return 'localization_field';
    }

}
