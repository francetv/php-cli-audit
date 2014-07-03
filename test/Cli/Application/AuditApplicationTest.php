<?php

/*
 * This file is part of the AUDIT CLI package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Cli\Application;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class AuditApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $app = new AuditApplication();
        $this->assertEquals('audit', $app->getName());
        $this->assertEquals('@package_version@', $app->getVersion());
    }
}