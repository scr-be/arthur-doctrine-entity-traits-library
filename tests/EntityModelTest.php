<?php

/*
 * This file is part of the arthur-doctrine-entity-traits-library.
 *
 * (c) Scribe Inc. <scr@src.run>
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Doctrine\ORM\Model\Test\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Scribe\Doctrine\ORM\Mapping\Entity;
use Scribe\Wonka\Utility\Reflection\ClassReflectionAnalyser;
use Scribe\Wonka\Utility\UnitTest\WonkaTestCase;

/**
 * Class EntityModelTest.
 */
class EntityModelTest extends WonkaTestCase
{
    /**
     * @var string
     */
    const RUNTIME_OPERATIONS_CRUD = 'runBasicCrudOperations';

    /**
     * @var string
     */
    const RUNTIME_OPERATIONS_CRUD_ARRAYACCESS = 'runArrayAccessCrudOperations';

    /**
     * @var string
     */
    const VALUES_FOR_ENTITY = 'values-for-entity';

    /**
     * @var string
     */
    const VALUES_FOR_COLLECTION = 'values-for-collection';

    /**
     * @var string
     */
    const VALUES_FOR_STRING = 'values-for-string';

    /**
     * @var string
     */
    const VALUES_FOR_ARRAY = 'values-for-array';

    /**
     * @var string
     */
    const VALUES_FOR_INT = 'values-for-int';

    /**
     * @var ClassReflectionAnalyser
     */
    private $analyser;

    /**
     * @var array
     */
    private $basicTraitAssertions = [
        'Activity\\ActivityCollection' => [
            'props' => ['activities'],
            'values' => [self::VALUES_FOR_COLLECTION],
        ],
        'Alias\\Alias' => [
            'props' => ['alias'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Alias\\Aliases' => [
            'props' => ['aliases'],
            'values' => [self::VALUES_FOR_ARRAY],
            'ops' => [self::RUNTIME_OPERATIONS_CRUD, self::RUNTIME_OPERATIONS_CRUD_ARRAYACCESS],
        ],
        'Set\\Attributes' => [
            'props' => ['attributes'],
            'values' => [self::VALUES_FOR_ARRAY],
        ],
        'Set\\Properties' => [
            'props' => ['properties'],
            'values' => [self::VALUES_FOR_ARRAY],
        ],
        'Set\\Categories' => [
            'props' => ['categories'],
            'values' => [self::VALUES_FOR_ARRAY],
        ],
        'Identity\\Code' => [
            'props' => ['code'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Type\\Context' => [
            'props' => ['context'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Number\\Count' => [
            'props' => ['count'],
            'values' => [self::VALUES_FOR_INT],
        ],
        'Number\\Weight' => [
            'props' => ['weight'],
            'values' => [self::VALUES_FOR_INT],
        ],
        'Number\\Order' => [
            'props' => ['order'],
            'values' => [self::VALUES_FOR_INT],
        ],
        'Text\\Description' => [
            'props' => ['description'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Name\\Name' => [
            'props' => ['name'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Set\\Parameters' => [
            'props' => ['parameters'],
            'values' => [self::VALUES_FOR_ARRAY],
        ],
        'Text\\Title' => [
            'props' => ['title'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Text\\Value' => [
            'props' => ['value'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Type\\Version' => [
            'props' => ['version'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Person\\Honorific' => [
            'props' => ['honorific'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Person\\FirstName' => [
            'props' => ['firstName'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Person\\MiddleName' => [
            'props' => ['middleName'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Person\\Surname' => [
            'props' => ['surname'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Person\\Suffix' => [
            'props' => ['suffix'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Phone\\Phone' => [
            'props' => ['number'],
            'values' => [['8004563333', '8505554444']],
        ],
        'Phone\\PhoneCollection' => [
            'props' => ['phones'],
            'values' => [self::VALUES_FOR_COLLECTION],
        ],
        'Phone\\Extension' => [
            'props' => ['extension'],
            'values' => [['19382', '444']],
        ],
        'Text\\Lead' => [
            'props' => ['lead'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Text\\Content' => [
            'props' => ['content'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Type\\Importance' => [
            'props' => ['importance'],
            'values' => [self::VALUES_FOR_INT],
        ],
        'Type\\Type' => [
            'props' => ['type'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Identity\\Slug' => [
            'props' => ['slug'],
            'values' => [['a-slug', 'second', 'some-really-long-slug', 'yeah---slug']],
        ],
        'Hierarchy\\ParentOwning' => [
            'props' => ['parent'],
            'values' => [self::VALUES_FOR_ENTITY],
        ],
        'Hierarchy\\ChildrenOwning' => [
            'props' => ['children'],
            'values' => [self::VALUES_FOR_ENTITY],
        ],
        'Address\\AddressCollection' => [
            'props' => ['addresses'],
            'values' => [self::VALUES_FOR_COLLECTION],
        ],
        'Address\\Address' => [
            'props' => ['address01', 'address02', 'address03', 'city', 'state', 'zip'],
            'values' => [self::VALUES_FOR_STRING, self::VALUES_FOR_STRING, self::VALUES_FOR_STRING, self::VALUES_FOR_STRING, self::VALUES_FOR_STRING, self::VALUES_FOR_STRING],
        ],
        'Citation\\Urls' => [
            'props' => ['urls'],
            'values' => [self::VALUES_FOR_ARRAY],
            'ops' => [self::RUNTIME_OPERATIONS_CRUD, self::RUNTIME_OPERATIONS_CRUD_ARRAYACCESS],
        ],
        'Hierarchy\\ParentCollection' => [
            'props' => ['parents'],
            'values' => [self::VALUES_FOR_COLLECTION],
        ],
        'Hierarchy\\ChildCollection' => [
            'props' => ['children'],
            'values' => [self::VALUES_FOR_COLLECTION],
        ],
        'Hierarchy\\Parent' => [
            'props' => ['parent'],
            'values' => [self::VALUES_FOR_ENTITY],
        ],
    ];

    private function setEntityBeforeTest($traitName)
    {
        $mockTrait = $this->getMockForTrait('Scribe\\Doctrine\\ORM\\Model\\'.$traitName.'MutatorsTrait');
        $this->analyser->setReflectionClassFromClassName($mockTrait);

        return $mockTrait;
    }

    private function clearEntityAfterTest()
    {
        $this->analyser->unsetReflectionClass();
        $this->analyser->setRequireFQN(true);
    }

    public function setUp()
    {
        parent::setUp();

        $this->analyser = new ClassReflectionAnalyser();
    }

    public function testEntityTraitHasActivityCollection()
    {
        $trait = 'Activity\\ActivityCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testAliasMutatorsTrait()
    {
        $trait = 'Alias\\Alias';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testHasAliasesMutatorsTrait()
    {
        $trait = 'Alias\\Aliases';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testPhoneMutatorsTrait()
    {
        $trait = 'Phone\\Phone';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $entity->setNumber('+1 123-123-1234');
        $this->assertSame('+1 (123) 123-1234', $entity->getNumberFormatted());
        $entity->setNumber('1 (123) 1231234');
        $this->assertSame('+1 (123) 123-1234', $entity->getNumberFormatted());

        $this->clearEntityAfterTest();
    }

    public function testPhoneCollectionMutatorsTrait()
    {
        $trait = 'Phone\\PhoneCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $this->clearEntityAfterTest();
    }

    public function testExtensionMutatorsTrait()
    {
        $trait = 'Phone\\Extension';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $this->clearEntityAfterTest();
    }

    public function testPropertiesMutatorsTest()
    {
        $trait = 'Set\\Properties';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $entity->setProperties(['key' => 'value']);
        $this->assertTrue($entity->hasPropertyKey('key'));
        $this->assertTrue($entity->hasPropertyValue('value'));
        $this->assertFalse($entity->hasPropertyKey('doesn-have-key'));
        $this->assertFalse($entity->hasPropertyValue('doesn-have-this-value'));
        $this->assertEquals('value', $entity->getPropertyValue('key'), 'Should return the value to the key.');
        $entity->setPropertyValue('key', 'different-value', false);
        $this->assertTrue($entity->hasPropertyKey('key'));
        $this->assertTrue($entity->hasPropertyValue('value'));
        $entity->setPropertyValue('key', 'different-value', true);
        $this->assertFalse($entity->hasPropertyValue('value'));
        $this->assertTrue($entity->hasPropertyKey('key'));
        $this->assertTrue($entity->hasPropertyValue('different-value'));
        $entity->clearProperties();
        $this->assertFalse($entity->hasPropertyKey('key'));
        $this->assertFalse($entity->hasPropertyValue('value'));
        $this->assertFalse($entity->hasPropertyValue('different-value'));
        $this->assertNull($entity->getPropertyValue('key'));

        $this->clearEntityAfterTest();
    }

    public function testAttributesMutatorTrait()
    {
        $trait = 'Set\\Attributes';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $entity->setAttributes(['key' => 'value']);
        $this->assertTrue($entity->hasAttributeKey('key'));
        $this->assertTrue($entity->hasAttributeValue('value'));
        $this->assertFalse($entity->hasAttributeKey('doesn-have-key'));
        $this->assertFalse($entity->hasAttributeValue('doesn-have-this-value'));
        $this->assertEquals('value', $entity->getAttributeValue('key'), 'Should return the value to the key.');
        $entity->setAttributeValue('key', 'different-value', false);
        $this->assertTrue($entity->hasAttributeKey('key'));
        $this->assertTrue($entity->hasAttributeValue('value'));
        $entity->setAttributeValue('key', 'different-value', true);
        $this->assertFalse($entity->hasAttributeValue('value'));
        $this->assertTrue($entity->hasAttributeKey('key'));
        $this->assertTrue($entity->hasAttributeValue('different-value'));
        $entity->clearAttributes();
        $this->assertFalse($entity->hasAttributeKey('key'));
        $this->assertFalse($entity->hasAttributeValue('value'));
        $this->assertFalse($entity->hasAttributeValue('different-value'));
        $this->assertNull($entity->getAttributeValue('key'));

        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasCategories()
    {
        $trait = 'Set\\Categories';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $entity->setCategories(['key' => 'value']);
        $this->assertTrue($entity->hasCategory('key'));
        $this->assertFalse($entity->hasCategory('doesn-have-key'));
        $this->assertEquals('value', $entity->getCategory('key'), 'Should return the value to the key.');
        $entity->clearCategories();
        $this->assertFalse($entity->hasCategory('key'));
        $this->assertNull($entity->getCategory('key'));

        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasCode()
    {
        $trait = 'Identity\\Code';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasContext()
    {
        $trait = 'Type\\Context';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasDescription()
    {
        $trait = 'Text\\Description';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasName()
    {
        $trait = 'Name\\Name';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasParameters()
    {
        $trait = 'Set\\Parameters';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();

        $entity->setParameters(['key' => 'value']);
        $this->assertTrue($entity->hasParameterKey('key'));
        $this->assertTrue($entity->hasParameterValue('value'));
        $this->assertFalse($entity->hasParameterKey('doesn-have-key'));
        $this->assertFalse($entity->hasParameterValue('doesn-have-this-value'));
        $this->assertEquals('value', $entity->getParameterValue('key'), 'Should return the value to the key.');
        $entity->setParameterValue('key', 'different-value', false);
        $this->assertTrue($entity->hasParameterKey('key'));
        $this->assertTrue($entity->hasParameterValue('value'));
        $entity->setParameterValue('key', 'different-value', true);
        $this->assertFalse($entity->hasParameterValue('value'));
        $this->assertTrue($entity->hasParameterKey('key'));
        $this->assertTrue($entity->hasParameterValue('different-value'));
        $entity->clearParameters();
        $this->assertFalse($entity->hasParameterKey('key'));
        $this->assertFalse($entity->hasParameterValue('value'));
        $this->assertFalse($entity->hasParameterValue('different-value'));
        $this->assertNull($entity->getParameterValue('key'));
    }

    public function testEntityTraitHasTitle()
    {
        $trait = 'Text\\Title';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasValue()
    {
        $trait = 'Text\\Value';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasVersion()
    {
        $trait = 'Type\\Version';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasCount()
    {
        $trait = 'Number\\Count';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $entity->setCount(5000);
        $entity->incrementCount();
        $this->assertEquals(5001, $entity->getCount());
        $entity->incrementCount(28);
        $this->assertEquals(5029, $entity->getCount());
        $entity->decrementCount();
        $this->assertEquals(5028, $entity->getCount());
        $entity->decrementCount(100);
        $this->assertEquals(4928, $entity->getCount());

        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasOrder()
    {
        $trait = 'Number\\Order';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $entity->setOrder(5000);
        $entity->incrementOrder();
        $this->assertEquals(5001, $entity->getOrder());
        $entity->incrementOrder(28);
        $this->assertEquals(5029, $entity->getOrder());
        $entity->decrementOrder();
        $this->assertEquals(5028, $entity->getOrder());
        $entity->decrementOrder(100);
        $this->assertEquals(4928, $entity->getOrder());

        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasWeight()
    {
        $trait = 'Number\\Weight';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $entity->setWeight(5000);
        $entity->incrementWeight();
        $this->assertEquals(5001, $entity->getWeight());
        $entity->incrementWeight(28);
        $this->assertEquals(5029, $entity->getWeight());
        $entity->decrementWeight();
        $this->assertEquals(5028, $entity->getWeight());
        $entity->decrementWeight(100);
        $this->assertEquals(4928, $entity->getWeight());

        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasPersonHonorific()
    {
        $trait = 'Person\\Honorific';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasPersonFirstName()
    {
        $trait = 'Person\\FirstName';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasPersonMiddleName()
    {
        $trait = 'Person\\MiddleName';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasPersonSurname()
    {
        $trait = 'Person\\Surname';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasPersonSuffix()
    {
        $trait = 'Person\\Suffix';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasPerson()
    {
        $trait = $this->setEntityBeforeTest('Person\\Person');
        $trait
            ->setHonorific('Mr.')
            ->setFirstName('Rob')
            ->setMiddleName('Martin')
            ->setSurname('Frawley')
            ->setSuffix('2nd');

        $this->assertEquals('Mr. Rob Martin Frawley 2nd', $trait->getFullName());
        $this->assertEquals('Rob M Frawley', $trait->getShortName());
        $this->assertEquals('RMF', $trait->getInitials());

        $trait = $this->setEntityBeforeTest('Person\\Person');
        $trait
            ->setFirstName('Dan')
            ->setMiddleName('F')
            ->setSurname('Corrigan');

        $this->assertEquals('Dan F Corrigan', $trait->getFullName());
        $this->assertEquals('Dan F Corrigan', $trait->getShortName());
        $this->assertEquals('DFC', $trait->getInitials());
    }

    public function testEntityTraitHasLead()
    {
        $trait = 'Text\\Lead';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasContent()
    {
        $trait = 'Text\\Content';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasImportance()
    {
        $trait = 'Type\\Importance';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $entity->setImportance($entity->getImportanceLevelByName('CRITICAL'));
        $this->assertEquals(40, $entity->getImportance());

        $this->assertNull($entity->getImportanceLevelByName('BADNAME'));
        $this->assertEquals('DEPRECATION', $entity->getImportanceLevelByInt(-10));
        $this->assertNull($entity->getImportanceLevelByInt(-10000));

        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasType()
    {
        $trait = 'Type\\Type';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasSlug()
    {
        $trait = 'Identity\\Slug';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasAddressCollection()
    {
        $trait = 'Address\\AddressCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasAddress()
    {
        $trait = 'Address\\Address';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasUrls()
    {
        $trait = 'Citation\\Urls';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasParentCollection()
    {
        $trait = 'Hierarchy\\ParentCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasChildCollection()
    {
        $trait = 'Hierarchy\\ChildCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitHasParent()
    {
        $trait = 'Hierarchy\\Parent';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testEntityTraitId()
    {
        $trait = 'Identity\\Id';
        $entity = $this->setEntityBeforeTest($trait);

        static::assertFalse($entity->hasId());

        $entity->initializeId();

        static::assertNull($entity->getId());

        $propReflect = new \ReflectionProperty($entity, 'id');
        $propReflect->setAccessible(true);
        $propReflect->setValue($entity, 1);

        static::assertTrue($entity->hasId());
        static::assertSame(1, $entity->getId());

        $this->clearEntityAfterTest();
    }

    /**
     * @param string                                   $traitName
     * @param \PHPUnit_Framework_MockObject_MockObject $entity
     */
    private function performRuntime($traitName, $entity)
    {
        $config = $this->basicTraitAssertions[$traitName];

        if (true !== array_key_exists('namespace', $config)) {
            $this->analyser->setRequireFQN(false);
        }

        if (!isset($config['ops']) || isCountableEmpty($config['ops'])) {
            $config['ops'] = [self::RUNTIME_OPERATIONS_CRUD];
        }

        foreach ($config['props'] as $property) {
            $this->assertTrue($this->analyser->hasProperty($property));
        }

        foreach ($config['ops'] as $operation) {
            $this->performOperation($operation, $traitName, $entity, $config);
        }
    }

    /**
     * @param string                                   $operation
     * @param string                                   $traitName
     * @param \PHPUnit_Framework_MockObject_MockObject $entity
     * @param array                                    $config
     */
    private function performOperation($operation, $traitName, $entity, array $config)
    {
        foreach ($config['props'] as $i => $prop) {
            if (!isset($config['methods']) || isCountableEmpty($config['methods'])) {
                $methods = $this->getCrudEntityMethodsDefault($traitName, $prop);
            } else {
                $methods = $config['methods'];
            }

            foreach ($methods as $j => $method) {
                if ($j > 4) {
                    continue;
                }

                $this->assertTrue($this->analyser->hasMethod($method), 'Should have method '.$method);
            }

            $values = $this->getCrudEntityValues($traitName, $config['values'], $i);

            $this->$operation($traitName, $entity, $methods, $values);
        }
    }

    /**
     * @param array  $values
     * @param string $for
     *
     * @return bool
     */
    private function isValuePreset($values, $for)
    {
        return isset($values[$for]) && is_array($values[$for]);
    }

    /**
     * @param array  $traitName
     * @param string $values
     * @param string $for
     *
     * @return array|ArrayCollection|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getCrudEntityValues($traitName, $values, $for)
    {
        return $this->isValuePreset($values, $for) ?
            $values[$for] : $this->getCrudEntityValuesForType($traitName, $values[$for]);
    }

    /**
     * @param string $traitName
     * @param string $selector
     *
     * @return array|ArrayCollection|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getCrudEntityValuesForType($traitName, $selector)
    {
        switch ($selector) {
            case self::VALUES_FOR_STRING:
                return ['123', 'something', 'anotherThing', 'This Is An Code!'];

            case self::VALUES_FOR_ARRAY:
                return [['1', '2', '3'], [1, 2, 3], [['a', 1], 0, 4], ['Some random String']];

            case self::VALUES_FOR_INT:
                return [-20, 0, 1000, 99, 38299201, 302, 3232, 4353, 34, 5, 0, 222];

            case self::VALUES_FOR_COLLECTION:
                return $this->getCrudEntityParametersMockedCollection($traitName);

            case self::VALUES_FOR_ENTITY:
                return $this->getCrudEntityParametersMocked($traitName);
        }

        $this->fail('No test values defined or configured!');
    }

    /**
     * @param array                                    $methods
     * @param \PHPUnit_Framework_MockObject_MockObject $entity
     * @param ArrayCollection                          $collection
     */
    private function runCollectionCrudOperations(array $methods, $entity, ArrayCollection $collection)
    {
        $removeMethod = array_pop($methods);
        $addMethod = array_pop($methods);
        $hasMethod = array_pop($methods);

        foreach ($collection as $item) {
            $this->assertFalse($entity->$hasMethod($item));
            $entity->$addMethod($item);
            $this->assertTrue($entity->$hasMethod($item));
            $entity->$removeMethod($item);
            $this->assertFalse($entity->$hasMethod($item));
        }
    }

    /**
     * @param string $traitName
     *
     * @return bool
     */
    private function isCollectionType($traitName)
    {
        return (bool) strpos($traitName, 'Collection');
    }

    /**
     * @param string $traitName
     *
     * @return string
     */
    private function getType($traitName, $short = false)
    {
        $type = preg_replace('{.*\\\}', '', $traitName);

        if ($short) {
            $type = str_replace('Collection', '', $type);
        }

        return $type;
    }

    /**
     * @param string $traitName
     * @param string $prop
     *
     * @return array
     */
    private function getCrudEntityMethodsDefault($traitName, $prop)
    {
        $prop = ucfirst($prop);
        $propSingular1 = substr($prop, 0, strlen($prop) - 1);
        $propSingular2 = substr($prop, 0, strlen($prop) - 2);

        $methods = [
            'initialize'.$prop,
            'set'.$prop,
            'get'.$prop,
            'has'.$prop,
            'clear'.$prop,
            'has'.$propSingular1,
            'add'.$propSingular1,
            'remove'.$propSingular1,
            'has'.$propSingular2,
            'add'.$propSingular2,
            'remove'.$propSingular2,
        ];

        if (!$this->isCollectionType($traitName)) {
            return $methods;
        }

        $typePlural = ucfirst($this->getType($traitName));
        $typeSingular = ucfirst($this->getType($traitName, true));

        return [
            'initialize'.$typePlural,
            'set'.$typePlural,
            'get'.$typePlural,
            'has'.$typePlural,
            'clear'.$typePlural,
            'has'.$typeSingular,
            'add'.$typeSingular,
            'remove'.$typeSingular,
        ];
    }

    /**
     * @param string $traitName
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getCrudEntityParametersMocked($traitName)
    {
        return [
            $this->getMockForAbstractClass('Scribe\\Doctrine\\ORM\\Mapping\\Entity'),
            $this->getMockForAbstractClass('Scribe\\Doctrine\\ORM\\Mapping\\Entity'),
            $this->getMockForAbstractClass('Scribe\\Doctrine\\ORM\\Mapping\\Entity'),
        ];
    }

    /**
     * @param string $traitName
     *
     * @return ArrayCollection
     */
    private function getCrudEntityParametersMockedCollection($traitName)
    {
        return [
            new ArrayCollection($this->getCrudEntityParametersMocked($traitName)),
            new ArrayCollection($this->getCrudEntityParametersMocked($traitName)),
            new ArrayCollection($this->getCrudEntityParametersMocked($traitName)),
        ];
    }

    /**
     * @param string                                   $traitName
     * @param \PHPUnit_Framework_MockObject_MockObject $entity
     * @param array                                    $methods
     * @param array                                    $values
     */
    private function runBasicCrudOperations($traitName, $entity, array $methods, array $values)
    {
        $initializer = array_shift($methods);
        $setter = array_shift($methods);
        $getter = array_shift($methods);
        $checker = array_shift($methods);
        $clearer = array_shift($methods);

        $this->assertEmpty($entity->$getter(), 'Property should be empty prior to initialization.');
        $entity->$initializer();

        for ($i = 0; $i < count($values); $i++) {
            $this->assertFalse($entity->$checker());
            $entity->$setter($values[$i]);
            $this->assertEquals($values[$i], $entity->$getter(),
                sprintf(
                    'Property should have value of "%s".',
                    (is_array($values[$i]) ? print_r($values[$i], true) : $values[$i])
                )
            );
            $this->assertTrue($entity->$checker());
            $entity->$clearer();
            $this->assertFalse($entity->$checker());

            if (!$this->isCollectionType($traitName) || false === ($values[$i] instanceof ArrayCollection)) {
                continue;
            }

            $this->runCollectionCrudOperations($methods, $entity, $values[$i]);
        }
    }

    /**
     * @param string                                   $traitName
     * @param \PHPUnit_Framework_MockObject_MockObject $entity
     * @param array                                    $methods
     * @param array                                    $values
     */
    private function runArrayAccessCrudOperations($traitName, $entity, array $methods, array $values)
    {
        $methods = array_slice($methods, 5);

        $hasMethod = array_shift($methods);
        $addMethod = array_shift($methods);
        $removeMethod = array_shift($methods);

        if (true !== in_array($removeMethod, get_class_methods($entity))) {
            $hasMethod = array_shift($methods);
            $addMethod = array_shift($methods);
            $removeMethod = array_shift($methods);
        }

        for ($i = 0; $i < count($values); $i++) {
            $this->assertFalse($entity->$hasMethod($values[$i]));
            $entity->$addMethod($values[$i]);
            $this->assertTrue($entity->$hasMethod($values[$i]));
            $entity->$removeMethod($values[$i]);
            $this->assertFalse($entity->$hasMethod($values[$i]));
        }
    }
}

/* EOF */
