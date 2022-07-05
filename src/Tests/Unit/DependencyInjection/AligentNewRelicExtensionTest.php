<?php
/**
 * @category  Aligent
 * @package
 * @author    Chris Rossi <chris.rossi@aligent.com.au>
 * @copyright 2022 Aligent Consulting.
 * @license
 * @link      http://www.aligent.com.au/
 */
namespace Aligent\NewRelicBundle\Tests\Unit\DependencyInjection;

use Aligent\NewRelicBundle\DependencyInjection\AligentNewRelicExtension;
use Oro\Bundle\TestFrameworkBundle\Test\DependencyInjection\ExtensionTestCase;

class AligentNewRelicExtensionTest extends ExtensionTestCase
{
    public function testLoad(): void
    {
        $this->loadExtension(new AligentNewRelicExtension());

        // Services
        $expectedDefinitions = [
            'aligent_new_relic.transaction_extension'
        ];
        $this->assertDefinitionsLoaded($expectedDefinitions);
    }
}
