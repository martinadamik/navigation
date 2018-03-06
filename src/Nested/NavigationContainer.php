<?php

declare(strict_types=1);

namespace Everlution\Navigation\Nested;

use Everlution\Navigation\ContainerInterface;
use Everlution\Navigation\Nested\Container\ContainerNotFoundException;
use Everlution\Navigation\Nested\Container\NestableContainerInterface;

/**
 * Class NavigationContainer.
 *
 * @author Martin Lutter <martin.lutter@everlution.sk>
 */
abstract class NavigationContainer implements AdvancedNavigationInterface
{
    /** @var NestableContainerInterface[] */
    private $containers = [];

    public function add(NestableContainerInterface $container): void
    {
        $this->containers[get_class($container)] = $container;
    }

    /**
     * @return ContainerInterface[]
     */
    public function getNavigationContainers(): array
    {
        return $this->containers;
    }

    /**
     * @param string $name
     *
     * @return NestableContainerInterface
     *
     * @throws ContainerNotFoundException
     */
    public function get(string $name): NestableContainerInterface
    {
        if (false === isset($this->containers[$name])) {
            throw new ContainerNotFoundException($name);
        }

        return $this->containers[$name];
    }
}
