<?php

namespace yii2bundle\i18n\domain\interfaces\services;

use yii2bundle\i18n\domain\entities\ContentEntity;
use yii2rails\domain\interfaces\services\CrudInterface;

/**
 * Interface ContentInterface
 * 
 * @package yii2bundle\i18n\domain\interfaces\services
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\ContentInterface $repository
 */
interface ContentInterface extends CrudInterface {

    public function updateForObject(int $entityId, int $extId, array $value, string $lang = null);
    public function insertForObject(int $entityId, int $extId, array $value, string $lang = null);
    public function oneForObject(int $entityId, int $extId, string $langCode = null) : ContentEntity;
    public function allForCollection(int $entityId, array $extIdList, string $langCode = null) : array;
    public function translate(array $collection, int $entityId, string $langCode = null) : array;

}
