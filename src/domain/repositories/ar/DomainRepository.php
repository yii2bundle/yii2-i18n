<?php

namespace yii2bundle\i18n\domain\repositories\ar;

use yii2bundle\i18n\domain\interfaces\repositories\DomainInterface;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class DomainRepository
 * 
 * @package yii2bundle\i18n\domain\repositories\ar
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 */
class DomainRepository extends BaseActiveArRepository implements DomainInterface {

	protected $schemaClass = true;

    public function tableName()
    {
        return 'localization_domain';
    }

}
