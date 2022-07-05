<?php
/**
 *
 *
 * @category  Aligent
 * @package
 * @author    Adam Hall <adam.hall@aligent.com.au>
 * @copyright 2019 Aligent Consulting.
 * @license
 * @link      http://www.aligent.com.au/
 */

namespace Aligent\NewRelicBundle\Consumption\Extension;

use Oro\Component\MessageQueue\Client\Config;
use Oro\Component\MessageQueue\Consumption\AbstractExtension;
use Oro\Component\MessageQueue\Consumption\Context;
use Oro\Component\MessageQueue\Transport\MessageInterface;

class TransactionExtension extends AbstractExtension
{
    const DEFAULT_APPLICATION_NAME = 'Oro Application';

    /**
     * @param Context $context
     */
    public function onPreReceived(Context $context): void
    {
        $this->startTransaction($context->getMessage());
    }

    /**
     * @param Context $context
     */
    public function onPostReceived(Context $context): void
    {
        $this->endTransaction();
    }

    /**
     * @param Context $context
     */
    public function onInterrupted(Context $context): void
    {
        $this->endTransaction();
    }

    /**
     * @param MessageInterface $message
     */
    public function startTransaction(MessageInterface $message): void
    {
        if (extension_loaded('newrelic')) { // Ensure PHP agent is available
            newrelic_end_transaction(); // stop recording the current transaction
            // start recording a new transaction
            newrelic_start_transaction(
                ini_get("newrelic.appname") ?: self::DEFAULT_APPLICATION_NAME
            );
            newrelic_background_job(); // mark as a background job

            // Name the transaction
            newrelic_name_transaction($message->getProperty(Config::PARAMETER_PROCESSOR_NAME));
        }
    }

    /**
     * End any current transaction
     */
    public function endTransaction(): void
    {
        if (extension_loaded('newrelic')) {
            newrelic_end_transaction();
        }
    }
}
