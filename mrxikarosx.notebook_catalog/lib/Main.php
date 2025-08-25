<?php

namespace Mrxikarosx\NotebookCatalog;

class Main
{    
    public static function getTablesClass()
	{
		return [
			'Mrxikarosx\NotebookCatalog\BrandTable',
			'Mrxikarosx\NotebookCatalog\ModelTable',
			'Mrxikarosx\NotebookCatalog\NotebookTable',
			'Mrxikarosx\NotebookCatalog\OptionTable',
			'Mrxikarosx\NotebookCatalog\NotebookOptionTable',
		];
	}
}