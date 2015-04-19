<?php
namespace beeare\MockingStubbing;

/**
 * @see https://github.com/padraic/mockery/blob/master/docs/cookbook/mocking_hard_dependencies.rst
 * @see https://github.com/padraic/mockery/blob/master/docs/reference/instance_mocking.rst
 */
class InternalService
{
    public function callExternalService($param)
    {
        /** @noinspection PhpUndefinedClassInspection */
        $externalService = new ExternalService();
        /** @noinspection PhpUndefinedMethodInspection */
        $externalService->sendSomething($param);
        /** @noinspection PhpUndefinedMethodInspection */
        return $externalService->getSomething();
    }
}
