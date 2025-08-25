<?php

use Bitrix\Main\Loader;

Loader::registerAutoloadClasses(
	'mrxikarosx.notebook_catalog',
	[
        'Mrxikarosx\NotebookCatalog\Main' => 'lib/Main.php',
        'Mrxikarosx\NotebookCatalog\BrandTable' => 'lib/Brand.php',
        'Mrxikarosx\NotebookCatalog\ModelTable' => 'lib/Model.php',
        'Mrxikarosx\NotebookCatalog\NotebookTable' => 'lib/Notebook.php',
        'Mrxikarosx\NotebookCatalog\OptionTable' => 'lib/Option.php',
        'Mrxikarosx\NotebookCatalog\NotebookOptionTable' => 'lib/NotebookOption.php',
    ]
);
