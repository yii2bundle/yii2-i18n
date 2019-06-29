<?php

namespace yii2bundle\i18n\domain\repositories\ar;

use yii2bundle\i18n\domain\interfaces\repositories\EntityInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class EntityRepository
 * 
 * @package yii2bundle\i18n\domain\repositories\ar
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 */
class EntityRepository extends BaseActiveArRepository implements EntityInterface {

	protected $schemaClass = true;

    public function tableName()
    {
        return 'localization_entity';
    }

}
