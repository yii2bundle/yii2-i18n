<?php

namespace yii2bundle\i18n\domain\repositories\ar;

use domain\article\v1\entities\CategoryEntity;
use yii2bundle\i18n\domain\interfaces\repositories\ContentInterface;
use yii2bundle\i18n\domain\interfaces\repositories\TranslationInterface;
use yii2rails\domain\BaseEntity;
use yii2rails\domain\data\Query;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class BaseTranslationRepository
 *
 * @package yii2bundle\i18n\domain\repositories\ar
 *
 * @property-read \yii2bundle\i18n\domain\Domain $domain
 */
abstract class BaseTranslationRepository extends BaseActiveArRepository implements TranslationInterface
{
    protected $schemaClass = true;

    public function all(Query $query = null)
    {
        $collection = parent::all($query);
        $collection = \App::$domain->i18n->content->translate($collection, $this->get18nEntityId());
        return $collection;
    }

    public function update(BaseEntity $entity)
    {
        parent::update($entity);
        $i18nData = $entity->toArray();
        \App::$domain->i18n->content->updateOrInsertForObject($this->get18nEntityId(), $entity->id, $i18nData);
    }

    public function insert(BaseEntity $entity)
    {
        $entity = parent::insert($entity);
        $i18nData = $entity->toArray();
        \App::$domain->i18n->content->updateOrInsertForObject($this->get18nEntityId(), $entity->id, $i18nData);
        return $entity;
    }

    public function delete(BaseEntity $entity)
    {
        parent::delete($entity);
        \App::$domain->i18n->content->deleteForObject($this->get18nEntityId(), $entity->id);
    }


}
