<?php

namespace yii2bundle\i18n\domain\services;

use yii2bundle\i18n\domain\interfaces\services\EntityInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class EntityService
 * 
 * @package yii2bundle\i18n\domain\services
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\EntityInterface $repository
 */
class EntityService extends BaseActiveService implements EntityInterface {

}
