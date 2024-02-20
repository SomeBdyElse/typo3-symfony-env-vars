<?php

use SomeBdyElse\SymfonyEnvVariables\PlaceholderProcessor\EnvironmentVariablePlaceholderProcessor;

defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['yamlLoader']['placeholderProcessors'][EnvironmentVariablePlaceholderProcessor::class] = [
    'before' => [
        \TYPO3\CMS\Core\Configuration\Processor\Placeholder\EnvVariableProcessor::class,
    ],
];
