<?php

use SomeBdyElse\SymfonyEnvVariables\PlaceholderProcessor\EnvironmentVariablePlaceholderProcessor;

defined('TYPO3_MODE') or die();

// Add processor to replace dynamic database record uid in the site configuration
$GLOBALS['TYPO3_CONF_VARS']['SYS']['yamlLoader']['placeholderProcessors'][EnvironmentVariablePlaceholderProcessor::class] = [
    'before' => [
        \TYPO3\CMS\Core\Configuration\Processor\Placeholder\EnvVariableProcessor::class,
    ],
];
