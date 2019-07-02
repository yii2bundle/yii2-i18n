<?php

namespace yii2bundle\i18n\domain\services;

use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii2bundle\i18n\domain\entities\ContentEntity;
use yii2bundle\i18n\domain\interfaces\services\ContentInterface;
use yii2rails\domain\data\Query;
use yii2rails\domain\services\base\BaseActiveService;
use yii2rails\domain\values\BoolValue;

/**
 * Class ContentService
 * 
 * @package yii2bundle\i18n\domain\services
 * 
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 * @property-read \yii2bundle\i18n\domain\interfaces\repositories\ContentInterface $repository
 */
class ContentService extends BaseActiveService implements ContentInterface 
{
    /**
     * Поиск по name
     * @param string $search_string
     * @param string|null $lang
     * @return array|mixed|null
     */
    public function searchByName(string $search_string, string $lang = null)
    {
        return $this->search('name', $search_string, $lang);
    }

    /**
     * Поиск по Json полю
     * @param $attrs смотри Query::setJsonbCondition
     * @param string $search_string
     * @param string|null $lang
     * @return array|mixed|null
     */
    public function search($attrs, string $search_string, string $lang = null)
    {
        $query = Query::forge();
        if ($lang === false){
            $langCode = $this->forgeLangCode($lang);
            if($langCode) {
                $condition['language_code'] = $langCode;
            }
            $query->andWhere($condition);
        }
        $query->setJsonbCondition($attrs, $search_string, 'like');

        return $this->all($query);
    }



    public function deleteForObject(int $entityId, int $extId, string $lang = null) {
        $condition = [
            'entity_id' => $entityId,
            'ext_id' => $extId,
        ];
        if($lang) {
            $condition['language_code'] = $langCode;
        }
        $query = Query::forge();
        $query->andWhere($condition);
        /** @var ContentEntity[] $collection */
        $collection = $this->all($query);
        foreach ($collection as $contentEntity) {
            $this->deleteById($contentEntity->id);
        }
    }

    private function filterFields(int $entityId, array $value) {
        $fieldCollection = \App::$domain->i18n->field->allByEntityId($entityId);
        $fieldNames = ArrayHelper::getColumn($fieldCollection, 'name');
        $value = ArrayHelper::filter($value, $fieldNames);
        return $value;
    }

    public function updateOrInsertForObject(int $entityId, int $extId, array $value, string $lang = null) {
        $lang = $this->forgeLangCode($lang);
        try {
            return $this->updateForObject($entityId, $extId, $value, $lang);
        } catch (NotFoundHttpException $e) {
            $this->insertForObject($entityId, $extId, $value, $lang);
            $contentEntity = $this->oneForObject($entityId, $extId, $lang);
            return $contentEntity;
        }
    }

    public function updateForObject(int $entityId, int $extId, array $value, string $lang = null) {
        $value = $this->filterFields($entityId, $value);
        $contentEntity = $this->oneForObject($entityId, $extId, $lang);
        $contentEntity->value = $value;
        return $this->update($contentEntity);
    }

    public function insertForObject(int $entityId, int $extId, array $value, string $lang = null) {
        $value = $this->filterFields($entityId, $value);
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
