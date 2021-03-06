<?php

declare(strict_types=1);

namespace Everlution\Navigation;

use Everlution\Navigation\Filter\NavigationFilterInterface;

/**
 * Interface FilteredContainerInterface.
 *
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
interface FilteredContainerInterface extends MutableContainerInterface
{
    /**
     * @return NavigationFilterInterface[]
     */
    public function getFilters(): array;
}
