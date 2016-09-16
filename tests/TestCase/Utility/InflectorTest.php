<?php
/**
 * Created by javier
 * Date: 19/07/16
 * Time: 22:20
 */

namespace SpanishInflections\Test\TestCase\Utility;

use Cake\TestSuite\TestCase;
use Cake\Utility\Inflector;

/**
 * Class InflectorTest
 *
 * @package SpanishInflections\Test\TestCase\Utility
 */
class InflectorTest extends TestCase
{
    /**
     * 
     */
    public function setUp()
    {
        mb_internal_encoding('UTF-8');
        parent::setUp();
        include "../../../config/bootstrap.php";
    }
    
    /**
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        Inflector::reset();
    }
    
    /**
     * 
     */
    public function testPluralize()
    {
        $this->assertTextEquals('campos', Inflector::pluralize('campo'));
        $this->assertTextEquals('maíces', Inflector::pluralize('maíz'));
        $this->assertTextEquals('bananas', Inflector::pluralize('banana'));
        $this->assertTextEquals('países', Inflector::pluralize('país'));
        $this->assertTextEquals('calles', Inflector::pluralize('calle'));
        $this->assertTextEquals('faxes', Inflector::pluralize('fax'));
        $this->assertTextEquals('goles', Inflector::pluralize('gol'));
    }

    /**
     * 
     */
    public function testSingularize()
    {
        $this->assertTextEquals('campo', Inflector::singularize('campos'));
        $this->assertTextEquals('maíz', Inflector::singularize('maíces'));
        $this->assertTextEquals('banana', Inflector::singularize('bananas'));
        $this->assertTextEquals('país', Inflector::singularize('países'));
        $this->assertTextEquals('pobre', Inflector::singularize('pobres'));
        $this->assertTextEquals('calle', Inflector::singularize('calles'));
        $this->assertTextEquals('punch', Inflector::singularize('punches'));
        $this->assertTextEquals('fax', Inflector::singularize('faxes'));
        $this->assertTextEquals('gol', Inflector::singularize('goles'));
    }
}