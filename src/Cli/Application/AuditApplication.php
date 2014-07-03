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

use Ftven\Build\Cli\Extension\Audit\AuditExtension;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class AuditApplication extends CliApplication
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct('audit', '@package_version@');

        $this->addExtension(new AuditExtension());
    }
}