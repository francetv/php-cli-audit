<?php

/*
 * This file is part of the Testing-CLI package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Cli\Extension\Audit;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class AuditExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $extension = new AuditExtension();

        $this->assertEquals('audit', $extension->getAlias());
    }
}