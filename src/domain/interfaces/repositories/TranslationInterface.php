<?php

namespace yii2bundle\i18n\domain\interfaces\repositories;

interface TranslationInterface {

    /**
     * Возвращает ID из таблицы i18n.entity
     *
     * @return integer
     */
    public function get18nEntityId();

}
