<?php

namespace SomeBdyElse\SymfonyEnvVariables\EnvironmentVariables;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\EnvVarProcessor;
use Symfony\Component\DependencyInjection\EnvVarProcessorInterface;
use Symfony\Component\DependencyInjection\ServiceLocator;

class EnvironmentVariableRetreiver
{
    protected \Closure $getEnv;

    public function __construct(
        protected ContainerInterface $container,
        protected ServiceLocator $processors,
    ) {
        $this->getEnv = \Closure::fromCallable([$this, 'getEnv']);
    }

    public function getEnv(string $expression): mixed
    {
        $parts = explode(':', $expression, 2);
        if (count($parts) > 1) {
            [$prefix, $tail] = $parts;
        } else {
            $prefix = 'string';
            $tail = $expression;
        }

        $processor = $this->processors->has($prefix) ? $this->processors->get($prefix) : new EnvVarProcessor($this->container);
        if (! $processor instanceof EnvVarProcessorInterface) {
            throw new \LogicException('processor must implement ' . EnvVarProcessorInterface::class, 1673782753594);
        }

        return $processor->getEnv($prefix, $tail, $this->getEnv);
    }
}
