<?php

namespace yii2bundle\i18n\domain\services;

use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii2bundle\i18n\domain\entities\ContentEntity;
use yii2bundle\i18n\domain\interfaces\services\ContentInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class ContentService
 * 
 * @package yii2bundle\i18n\domain\services
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\ContentInterface $repository
 */
class ContentService extends BaseActiveService implements ContentInterface {

    public function updateForObject(int $entityId, int $extId, array $value, string $lang = null) {
        $lang = $this->forgeLangCode($lang);
        try {
            $contentEntity = $this->oneForObject($entityId, $extId, $lang);
        } catch (NotFoundHttpException $e) {
            $this->insertForObject($entityId, $extId, $value, $lang);
            $contentEntity = $this->oneForObject($entityId, $extId, $lang);
            return $contentEntity;
        }
        $contentEntity->value = $value;
        return $this->update($contentEntity);
    }

    public function insertForObject(int $entityId, int $extId, array $value, string $lang = null) {
        $lang = $this->forgeLangCode($lang);
        $contentEntity = new ContentEntity;
        $contentEntity->entity_id = $entityId;
        $contentEntity->ext_id = $extId;
        $contentEntity->language_code = $lang;
        $contentEntity->value = $value;
        return $this->createEntity($contentEntity);
    }

    private function forgeLangCode($langCode) {
        if($langCode) {
            return $langCode;
        }
        $langEntity = \App::$domain->lang->language->oneCurrent();
        return $langEntity->code;
    }

    public function oneForObject(int $entityId, int $extId, string $langCode = null) : ContentEntity {
        $langCode = $this->forgeLangCode($langCode);
        $query = Query::forge();
        $query->andWhere([
            'entity_id' => $entityId,
            'ext_id' => $extId,
            'language_code' => $langCode,
        ]);
        return $this->one($query);
    }

    public function translate(array $collection, int $entityId, string $langCode = null) : array {
        $langCode = $this->forgeLangCode($langCode);
        $ids = ArrayHelper::getColumn($collection, 'id');
        $contentCollection = \App::$domain->i18n->content->allForCollection($entityId, $ids);
        foreach ($collection as $item) {
            $contentValue = ArrayHelper::getValue($contentCollection, $item->id . DOT . 'value');
            $item->name = ArrayHelper::getValue($contentValue, 'name');
            $item->description = ArrayHelper::getValue($contentValue, 'description');
        }
        return $collection;
    }

    public function allForCollection(int $entityId, array $extIdList, string $langCode = null) : array {
        $langCode = $this->forgeLangCode($langCode);
        $query = Query::forge();
        $query->andWhere([
            'entity_id' => $entityId,
            'ext_id' => $extIdList,
            'language_code' => $langCode,
        ]);
        $collection = $this->all($query);
        return ArrayHelper::index($collection, 'ext_id');
    }

}
