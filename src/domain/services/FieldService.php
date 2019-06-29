<?php

namespace yii2bundle\i18n\domain\services;

use yii2bundle\i18n\domain\interfaces\services\FieldInterface;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class FieldService
 * 
 * @package yii2bundle\i18n\domain\services
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\FieldInterface $repository
 */
class FieldService extends BaseActiveService implements FieldInterface {

}
