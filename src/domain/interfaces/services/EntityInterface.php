<?php

namespace yii2bundle\i18n\domain\interfaces\services;

use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface EntityInterface
 * 
 * @package yii2bundle\i18n\domain\interfaces\services
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\EntityInterface $repository
 */
interface EntityInterface extends CrudInterface {

}
