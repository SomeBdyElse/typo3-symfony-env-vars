<?php

namespace SomeBdyElse\SymfonyEnvVariables\PlaceholderProcessor;

use SomeBdyElse\SymfonyEnvVariables\EnvironmentVariables\EnvironmentVariableRetreiver;
use TYPO3\CMS\Core\Configuration\Processor\Placeholder\PlaceholderProcessorInterface;

class EnvironmentVariablePlaceholderProcessor implements PlaceholderProcessorInterface
{
    public function __construct(
        protected EnvironmentVariableRetreiver $environmentVariableRetreiver,
    ) {
    }

    public function canProcess(string $placeholder, array $referenceArray): bool
    {
        return str_starts_with($placeholder, '%env(') && str_ends_with($placeholder, ')%');
    }

    public function process(string $value, array $referenceArray): mixed
    {
        return $this->environmentVariableRetreiver->getEnv($value);
    }
}
