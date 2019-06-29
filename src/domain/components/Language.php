<?php

namespace yii2bundle\i18n\domain\components;

use yii\base\Component;
use yii2rails\domain\helpers\DomainHelper;

class Language extends Component
{

	public function init()
	{
		if(\App::$domain->has('i18n')) {
            \App::$domain->lang->language->initCurrent();
        }
	}

}
