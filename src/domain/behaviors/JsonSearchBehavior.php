<?php

namespace yii2bundle\i18n\domain\behaviors;

use yii\helpers\ArrayHelper;
use yii2rails\domain\behaviors\query\SearchFilter;
use yii2rails\domain\data\Query;
use yii2rails\domain\repositories\BaseRepository;
use yii2rails\extension\common\helpers\StringHelper;

class JsonSearchBehavior extends SearchFilter
{
    public $jsonFields = [];

    public function prepareQuery(Query $query, BaseRepository $repository)
    {
        $search = $query->getWhere('search');
        if (!empty($search)) {
            $jsonFields = [];
            foreach ($search as $attrKey => $attrValue) {
                $attrValue = trim($attrValue);
                $attrValue = StringHelper::removeDoubleSpace($attrValue);
                if (in_array($attrKey, $this->jsonFields)) {
                    $jsonFields[$attrKey] = $attrValue;
                    unset($search[$attrKey]);
                }
            }
            if (!empty($jsonFields)) {
                $query->removeWhere($this->searchParamName);
                $ids = $this->getEntityIdsByJson($jsonFields);
                if (!empty($ids)) {
                    $query->andWhere(['id' => $ids]);
                }
            }
        }
        $query->addWhere($this->searchParamName, $search);
        parent::prepareQuery($query, $repository);

        return $query;
    }

    /**
     * Получаем ИД сущностей по имени
     * @param $jsonFields
     * @return array
     */
    protected function getEntityIdsByJson($jsonFields)
    {
        $content = \App::$domain->i18n->content->multipleSearchByJson($jsonFields);
        if (empty($content)){
            return [0];
        }

        return ArrayHelper::getColumn($content, 'ext_id');
    }
}
