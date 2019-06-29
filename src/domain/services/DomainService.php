<?php

namespace yii2bundle\i18n\domain\services;

use yii2bundle\i18n\domain\interfaces\services\DomainInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class DomainService
 * 
 * @package yii2bundle\i18n\domain\services
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\DomainInterface $repository
 */
class DomainService extends BaseActiveService implements DomainInterface {

}
