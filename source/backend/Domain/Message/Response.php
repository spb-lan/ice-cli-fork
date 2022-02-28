<?php

namespace Ifacesoft\Ice\Cli\Domain\Message;

use Ifacesoft\Ice\Core\Domain\Message\Response as IceCoreResponse;
use Ifacesoft\Ice\Core\Infrastructure\Stream\Writer;

final class Response extends IceCoreResponse
{
    protected function init($value)
    {
        $value = array_merge(
            $value,
            [
                'stream' => [
                    'resource' => Writer::STDOUT,
                    'mode' => 'wb'
                ]
            ]
        );

        return parent::init($value);
    }
}
