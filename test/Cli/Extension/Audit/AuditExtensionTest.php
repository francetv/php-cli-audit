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