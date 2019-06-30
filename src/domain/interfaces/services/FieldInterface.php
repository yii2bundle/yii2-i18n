<?php

namespace yii2bundle\i18n\domain\interfaces\services;

use yii2bundle\i18n\domain\entities\FieldEntity;
use yii2rails\domain\data\Query;
use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface FieldInterface
 * 
 * @package yii2bundle\i18n\domain\interfaces\services
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\FieldInterface $repository
 */
interface FieldInterface extends CrudInterface {

    public function allByEntityId($entityId, Query $query = null) : array;

}
