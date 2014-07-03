<?php

namespace Ftven\Build\Audit\Feature;

use Phppro\Framework\Audit\Audit;
use Phppro\Framework\Audit\AuditFactory;
use Phppro\Framework\Audit\Result;

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