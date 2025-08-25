<?php

namespace Mrxikarosx\NotebookCatalog;

use \Bitrix\Main\ORM\Data\DataManager;
use \Bitrix\Main\ORM\Fields\{IntegerField, FloatField, StringField};
use \Bitrix\Main\ORM\Fields\Relations\{Reference, ManyToMany};
use \Bitrix\Main\ORM\Query\Join;

class NotebookTable extends DataManager
{
	public static function getTableName()
	{
		return 'ns_notebook';
	}

	public static function getConnectionName()
	{
		return "default";
	}
	
	public static function getMap()
	{
		return [
            (new IntegerField('ID'))
				->configurePrimary(true)
				->configureAutocomplete(true),
			(new StringField('NAME')),
			(new StringField('YEAR')),
			(new FloatField('PRICE')),
			(new IntegerField('MODEL_ID')),
			(new Reference('MODEL', ModelTable::class,
				Join::on('this.MODEL_ID', 'ref.ID')
			)),
			(new ManyToMany('OPTIONS', OptionTable::class))
				->configureTableName(NotebookOptionTable::getTableName())
				->configureLocalPrimary('ID', 'NOTEBOOK_ID')
				->configureLocalReference('NOTEBOOK')
				->configureRemotePrimary('ID', 'OPTION_ID')
				->configureRemoteReference('OPTION')
        ];
	}
}