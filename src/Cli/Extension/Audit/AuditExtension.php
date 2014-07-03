<?php

/*
 * This file is part of the AUDIT CLI package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Cli\Extension\Audit;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Ftven\Build\Cli\Extension\Core\Base\AbstractExtension;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class AuditExtension extends AbstractExtension
{
    /**
     * @param YamlFileLoader $loader
     *
     * @return $this|void
     */
    protected function registerConfigFiles(YamlFileLoader $loader)
    {
        $loader->load('services.yml');
    }
}