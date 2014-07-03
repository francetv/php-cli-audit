<?php

/*
 * This file is part of the AUDIT CLI package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Audit\Feature;

use Phppro\Framework\Audit\Audit;
use Phppro\Framework\Audit\AuditFactory;
use Phppro\Framework\Audit\Result;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait PhpproAuditFactoryAwareTrait
{
    /**
     * @var AuditFactory
     */
    protected $auditFactory;
    /**
     * @param AuditFactory $auditFactory
     *
     * @return $this
     */
    public function setAuditFactory($auditFactory)
    {
        $this->auditFactory = $auditFactory;

        return $this;
    }
    /**
     * @return AuditFactory
     *
     * @throws \RuntimeException
     */
    public function getAuditFactory()
    {
        if (null === $this->auditFactory) {
            throw new \RuntimeException('Audit factory not set', 500);
        }

        return $this->auditFactory;
    }
    /**
     * @param array $definition
     *
     * @return Audit
     */
    protected function createAudit($definition)
    {
        return $this->getAuditFactory()->createFromDefinition($definition);
    }
    /**
     * @param array $definition
     *
     * @return Result
     */
    protected function executeAudit($definition)
    {
        return $this->createAudit($definition)->run();
    }
}