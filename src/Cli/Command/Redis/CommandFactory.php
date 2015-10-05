<?php
/**
 * File CommandFactory.php
 * @package PHP Tools
 */
namespace Cli\Command\Redis;

use Cli\Command\Input;
use Cli\Command\Redis;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class CommandFactory
 * @author Tuan Duong <duongthaso@gmail.com>
 * @package Cli\Command\Redis
 */
class CommandFactory
{
    /**
     * @param InputInterface $input
     * @return Base
     */
    public static function create(InputInterface $input)
    {
        $commandName = ucfirst(strtolower($input->getArgument(Redis::ARG_COMMAND)));
        $format = $input->getOption(Redis::OPT_FORMAT);
        try {
            $commandInput = new Input($input->getArgument(Redis::ARG_KEY), $input->getArgument(Redis::ARG_VALUE));
            $command = new Get($commandInput, $format);
            return $command;
        } catch (\Exception $ex) {
            throw new \InvalidArgumentException(
                sprintf('Command %s not found.', $commandName)
            );
        }
    }
}
