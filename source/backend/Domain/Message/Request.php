<?php

namespace Ifacesoft\Ice\Cli\Domain\Message;

use Exception;
use Ifacesoft\Ice\Core\Domain\Data\Dto;
use Ifacesoft\Ice\Core\Domain\Message\Request as IceCoreRequest;

final class Request extends IceCoreRequest
{
    const METHOD_CLI = 'CLI';

    const PARAMS_CLI = 'cli';

    /**
     * @return string
     * @throws Exception
     */
    public function getMethod()
    {
        return $this->get('method', strtoupper(php_sapi_name()));
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getUri()
    {
        return $this->get('uri', $_SERVER['argv'][1] ?? '/');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getProtocol()
    {
        return $this->get('protocol', $_SERVER['argv'][0] ?? $_SERVER['PHP_SELF']);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getTime()
    {
        return $this->get('time', $_SERVER['REQUEST_TIME_FLOAT']);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getAgent()
    {
        return $this->get('agent', $_SERVER['SHELL'] ?? 'cli-agent');
    }

    /**
     * @param null $paramsNames
     * @param string $type
     * @return array|Dto
     */
    final public function getParams($paramsNames = [], $type = 'all')
    {
        $cliParams = [];

        foreach ($_SERVER['argv'] as $args) {
            if (($pos = mb_strpos($args, '=')) !== false) {
                $cliParams[mb_substr($args, 0, $pos)] = mb_substr($args, $pos + 1);
            }  else {
                $cliParams[] = $args;
            }
        }

        $params = [
            self::PARAMS_CLI => Dto::create($cliParams),
            self::PARAMS_GET => Dto::create(['test' => 'get']),
        ];

        $params[self::PARAMS_ALL] = Dto::create(
            array_merge_recursive(
                $params[self::PARAMS_CLI]->get(),
                $params[self::PARAMS_GET]->get()
            )
        );

        return $type
            ? $this->get(['params'], ['params' => $params])['params'][$type]->get($paramsNames, true)
            : $params;
    }
}