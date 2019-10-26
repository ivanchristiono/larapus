<?php

namespace Psr\Log;

/**
 * This Logger can be used to avoid conditional log calls.
 *
 * Logging should always be optional, and if no logger is provided to your
 * library creating a NullLogger instance to have something to throw logs at
 * is a good way to avoid littering your code with `if ($this->logger) { }`
 * blocks.
 */
class NullLogger extends AbstractLogger
{
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
<<<<<<< HEAD
     *
     * @throws \Psr\Log\InvalidArgumentException
=======
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
     */
    public function log($level, $message, array $context = array())
    {
        // noop
    }
}
