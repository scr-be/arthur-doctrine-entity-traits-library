<?php

/*
 * This file is part of the `src-run/arthur-doctrine-traits-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Doctrine\ORM\Model\Test\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;
use SR\Doctrine\ORM\Mapping\Entity;
use SR\Doctrine\ORM\Model\Identity\IdMutableTrait;
use SR\Doctrine\ORM\Model\Identity\UuidMutableTrait;
use SR\Doctrine\ORM\Model\Number\CountTrait;
use SR\Doctrine\ORM\Model\Number\ImportanceTrait;
use SR\Doctrine\ORM\Model\Number\OrderTrait;
use SR\Doctrine\ORM\Model\Number\WeightTrait;
use SR\Doctrine\ORM\Model\Person\PersonTrait;
use SR\Doctrine\ORM\Model\Phone\PhoneTrait;
use SR\Doctrine\ORM\Model\Set\AttributesTrait;
use SR\Doctrine\ORM\Model\Set\CategoriesTrait;
use SR\Doctrine\ORM\Model\Set\ParametersTrait;
use SR\Doctrine\ORM\Model\Set\PropertiesTrait;
use SR\Doctrine\ORM\Model\Set\UrlsTrait;
use SR\Doctrine\ORM\Model\Version\VersionSemanticTrait;
use SR\Exception\InvalidArgumentException;
use SR\Reflection\Inspect;
use SR\Reflection\Introspection\ClassIntrospection;

/**
 * Class EntityModelTest.
 */
class EntityModelTest extends \PHPUnit_Framework_TestCase
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
     * @var string
     */
    const VALUES_FOR_UUID = 'values-for-uuid';

    /**
     * @var ClassIntrospection
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
        'Set\\Urls' => [
            'props' => ['urls'],
            'values' => [self::VALUES_FOR_ARRAY],
        ],
        'General\\Code' => [
            'props' => ['code'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Group\\Context' => [
            'props' => ['context'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Group\\Group' => [
            'props' => ['group'],
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
        'Text\\Name' => [
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
        'Version\\VersionString' => [
            'props' => ['version'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Version\\VersionSemantic' => [
            'props' => ['versionMajor', 'versionMinor', 'versionPatch'],
            'values' => [self::VALUES_FOR_INT, self::VALUES_FOR_INT, self::VALUES_FOR_INT],
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
            'values' => [['18004563333', '18505554444']],
        ],
        'Phone\\PhoneCollection' => [
            'props' => ['phones'],
            'values' => [self::VALUES_FOR_COLLECTION],
        ],
        'Phone\\PhoneExtension' => [
            'props' => ['extension'],
            'values' => [['19382', '444']],
        ],
        'Text\\ContentLead' => [
            'props' => ['lead'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Text\\Content' => [
            'props' => ['content'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Number\\Importance' => [
            'props' => ['importance'],
            'values' => [[-10, 0, 10, 20, 30, 40]],
        ],
        'Type\\Type' => [
            'props' => ['type'],
            'values' => [self::VALUES_FOR_STRING],
        ],
        'Identity\\SlugMutable' => [
            'props' => ['slug'],
            'values' => [['a-slug', 'second', 'some-really-long-slug', 'yeah---slug']],
        ],
        'Identity\\UuidMutable' => [
            'props' => ['uuid'],
            'values' => [self::VALUES_FOR_UUID],
        ],
        'Identity\\IdMutable' => [
            'props' => ['id'],
            'values' => [self::VALUES_FOR_INT],
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
            'props' => ['addressLine1', 'addressLine2', 'addressLine3', 'city', 'state', 'zip'],
            'values' => [
                self::VALUES_FOR_STRING,
                self::VALUES_FOR_STRING,
                self::VALUES_FOR_STRING,
                self::VALUES_FOR_STRING,
                self::VALUES_FOR_STRING,
                self::VALUES_FOR_STRING
            ],
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
        $mockName = 'SR\\Doctrine\\ORM\\Model\\'.$traitName.'MutatorsTrait';

        if (!trait_exists($mockName)) {
            $mockName = 'SR\\Doctrine\\ORM\\Model\\'.$traitName.'Trait';
        }

        $mockInstance = $this->getMockForTrait($mockName);
        $this->analyser = Inspect::thisTrait(str_replace('\\\\', '\\', $mockName));

        return $mockInstance;
    }

    private function clearEntityAfterTest()
    {
    }

    public function setUp()
    {
        parent::setUp();
    }

    public function testActivityCollectionTrait()
    {
        $trait = 'Activity\\ActivityCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testAliasTrait()
    {
        $trait = 'Alias\\Alias';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testAliasesTrait()
    {
        $trait = 'Alias\\Aliases';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|PhoneTrait
     */
    private function getPhoneTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testPhoneTrait()
    {
        $trait = 'Phone\\Phone';
        $entity = $this->getPhoneTrait($trait);
        $this->performRuntime($trait, $entity);

        $entity->setNumber('+1 123-123-1234');
        $this->assertSame('+1 (123) 123-1234', $entity->getNumberFormatted());
        $entity->setNumber('1 (123) 1231234');
        $this->assertSame('+1 (123) 123-1234', $entity->getNumberFormatted());

        $this->clearEntityAfterTest();
    }

    public function testPhoneCollectionTrait()
    {
        $trait = 'Phone\\PhoneCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $this->clearEntityAfterTest();
    }

    public function testPhoneExtensionTrait()
    {
        $trait = 'Phone\\PhoneExtension';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);

        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|PropertiesTrait
     */
    private function getPropertiesTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testPropertiesTrait()
    {
        $trait = 'Set\\Properties';
        $entity = $this->getPropertiesTrait($trait);
        $this->performRuntime($trait, $entity);

        $entity->setProperties(['key' => 'value']);
        $this->assertTrue($entity->hasProperty('key'));
        $this->assertTrue($entity->hasPropertyByValue('value'));
        $this->assertFalse($entity->hasProperty('doesn-have-key'));
        $this->assertFalse($entity->hasPropertyByValue('doesn-have-this-value'));
        $this->assertEquals('value', $entity->getProperty('key'), 'Should return the value to the key.');

        $entity->setProperty('different-value', 'key');
        $this->assertFalse($entity->hasPropertyByValue('value'));
        $this->assertTrue($entity->hasProperty('key'));
        $this->assertTrue($entity->hasPropertyByValue('different-value'));

        $entity->clearProperties();
        $this->assertFalse($entity->hasProperty('key'));
        $this->assertFalse($entity->hasPropertyByValue('value'));
        $this->assertFalse($entity->hasPropertyByValue('different-value'));
        $this->assertNull($entity->getProperty('key'));

        $entity->setProperty('no-index-value');
        $this->assertTrue($entity->hasPropertyByValue('no-index-value'));

        $entity->removePropertyByValue('no-index-value');
        $this->assertFalse($entity->hasPropertyByValue('no-index-value'));

        $entity->setProperty('a-value-example', 'an-index-example');
        $this->assertTrue($entity->hasProperty('an-index-example'));
        $this->assertTrue($entity->hasPropertyByValue('a-value-example'));

        $entity->removeProperty('an-index-example');
        $this->assertFalse($entity->hasProperty('an-index-example'));
        $this->assertFalse($entity->hasPropertyByValue('a-value-example'));

        $entity->clearProperties();
        $this->assertFalse($entity->hasProperties());

        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|AttributesTrait
     */
    private function getAttributesTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testAttributesTrait()
    {
        $trait = 'Set\\Attributes';
        $entity = $this->getAttributesTrait($trait);
        $this->performRuntime($trait, $entity);

        $entity->setAttributes(['key' => 'value']);
        $this->assertTrue($entity->hasAttribute('key'));
        $this->assertTrue($entity->hasAttributeByValue('value'));
        $this->assertFalse($entity->hasAttribute('doesn-have-key'));
        $this->assertFalse($entity->hasAttributeByValue('doesn-have-this-value'));
        $this->assertEquals('value', $entity->getAttribute('key'), 'Should return the value to the key.');

        $entity->setAttribute('different-value', 'key');
        $this->assertFalse($entity->hasAttributeByValue('value'));
        $this->assertTrue($entity->hasAttribute('key'));
        $this->assertTrue($entity->hasAttributeByValue('different-value'));

        $entity->clearAttributes();
        $this->assertFalse($entity->hasAttribute('key'));
        $this->assertFalse($entity->hasAttributeByValue('value'));
        $this->assertFalse($entity->hasAttributeByValue('different-value'));
        $this->assertNull($entity->getAttribute('key'));

        $entity->setAttribute('no-index-value');
        $this->assertTrue($entity->hasAttributeByValue('no-index-value'));

        $entity->removeAttributeByValue('no-index-value');
        $this->assertFalse($entity->hasAttributeByValue('no-index-value'));

        $entity->setAttribute('a-value-example', 'an-index-example');
        $this->assertTrue($entity->hasAttribute('an-index-example'));
        $this->assertTrue($entity->hasAttributeByValue('a-value-example'));

        $entity->removeAttribute('an-index-example');
        $this->assertFalse($entity->hasAttribute('an-index-example'));
        $this->assertFalse($entity->hasAttributeByValue('a-value-example'));

        $entity->clearAttributes();
        $this->assertFalse($entity->hasAttributes());

        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|CategoriesTrait
     */
    private function getCategoriesTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testCategoriesTrait()
    {
        $trait = 'Set\\Categories';
        $entity = $this->getCategoriesTrait($trait);
        $this->performRuntime($trait, $entity);

        $entity->setCategories(['key' => 'value']);
        $this->assertTrue($entity->hasCategory('key'));
        $this->assertTrue($entity->hasCategoryByValue('value'));
        $this->assertFalse($entity->hasCategory('doesn-have-key'));
        $this->assertFalse($entity->hasCategoryByValue('doesn-have-this-value'));
        $this->assertEquals('value', $entity->getCategory('key'), 'Should return the value to the key.');

        $entity->setCategory('different-value', 'key');
        $this->assertFalse($entity->hasCategoryByValue('value'));
        $this->assertTrue($entity->hasCategory('key'));
        $this->assertTrue($entity->hasCategoryByValue('different-value'));

        $entity->clearCategories();
        $this->assertFalse($entity->hasCategory('key'));
        $this->assertFalse($entity->hasCategoryByValue('value'));
        $this->assertFalse($entity->hasCategoryByValue('different-value'));
        $this->assertNull($entity->getCategory('key'));

        $entity->setCategory('no-index-value');
        $this->assertTrue($entity->hasCategoryByValue('no-index-value'));

        $entity->removeCategoryByValue('no-index-value');
        $this->assertFalse($entity->hasCategoryByValue('no-index-value'));

        $entity->setCategory('a-value-example', 'an-index-example');
        $this->assertTrue($entity->hasCategory('an-index-example'));
        $this->assertTrue($entity->hasCategoryByValue('a-value-example'));

        $entity->removeCategory('an-index-example');
        $this->assertFalse($entity->hasCategory('an-index-example'));
        $this->assertFalse($entity->hasCategoryByValue('a-value-example'));

        $entity->clearCategories();
        $this->assertFalse($entity->hasCategories());

        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|ParametersTrait
     */
    private function getParametersTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testParametersTrait()
    {
        $trait = 'Set\\Parameters';
        $entity = $this->getParametersTrait($trait);
        $this->performRuntime($trait, $entity);

        $entity->setParameters(['key' => 'value']);
        $this->assertTrue($entity->hasParameter('key'));
        $this->assertTrue($entity->hasParameterByValue('value'));
        $this->assertFalse($entity->hasParameter('doesn-have-key'));
        $this->assertFalse($entity->hasParameterByValue('doesn-have-this-value'));
        $this->assertEquals('value', $entity->getParameter('key'), 'Should return the value to the key.');

        $entity->setParameter('different-value', 'key');
        $this->assertFalse($entity->hasParameterByValue('value'));
        $this->assertTrue($entity->hasParameter('key'));
        $this->assertTrue($entity->hasParameterByValue('different-value'));

        $entity->clearParameters();
        $this->assertFalse($entity->hasParameter('key'));
        $this->assertFalse($entity->hasParameterByValue('value'));
        $this->assertFalse($entity->hasParameterByValue('different-value'));
        $this->assertNull($entity->getParameter('key'));

        $entity->setParameter('no-index-value');
        $this->assertTrue($entity->hasParameterByValue('no-index-value'));

        $entity->removeParameterByValue('no-index-value');
        $this->assertFalse($entity->hasParameterByValue('no-index-value'));

        $entity->setParameter('a-value-example', 'an-index-example');
        $this->assertTrue($entity->hasParameter('an-index-example'));
        $this->assertTrue($entity->hasParameterByValue('a-value-example'));

        $entity->removeParameter('an-index-example');
        $this->assertFalse($entity->hasParameter('an-index-example'));
        $this->assertFalse($entity->hasParameterByValue('a-value-example'));

        $entity->clearParameters();
        $this->assertFalse($entity->hasParameters());

        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|UrlsTrait
     */
    private function getUrlsTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testUrlsTrait()
    {
        $trait = 'Set\\Urls';
        $entity = $this->getUrlsTrait($trait);
        $this->performRuntime($trait, $entity);

        $entity->setUrls(['key' => 'value']);
        $this->assertTrue($entity->hasUrl('key'));
        $this->assertTrue($entity->hasUrlByValue('value'));
        $this->assertFalse($entity->hasUrl('doesn-have-key'));
        $this->assertFalse($entity->hasUrlByValue('doesn-have-this-value'));
        $this->assertEquals('value', $entity->getUrl('key'), 'Should return the value to the key.');

        $entity->setUrl('different-value', 'key');
        $this->assertFalse($entity->hasUrlByValue('value'));
        $this->assertTrue($entity->hasUrl('key'));
        $this->assertTrue($entity->hasUrlByValue('different-value'));

        $entity->clearUrls();
        $this->assertFalse($entity->hasUrl('key'));
        $this->assertFalse($entity->hasUrlByValue('value'));
        $this->assertFalse($entity->hasUrlByValue('different-value'));
        $this->assertNull($entity->getUrl('key'));

        $entity->setUrl('no-index-value');
        $this->assertTrue($entity->hasUrlByValue('no-index-value'));

        $entity->removeUrlByValue('no-index-value');
        $this->assertFalse($entity->hasUrlByValue('no-index-value'));

        $entity->setUrl('a-value-example', 'an-index-example');
        $this->assertTrue($entity->hasUrl('an-index-example'));
        $this->assertTrue($entity->hasUrlByValue('a-value-example'));

        $entity->removeUrl('an-index-example');
        $this->assertFalse($entity->hasUrl('an-index-example'));
        $this->assertFalse($entity->hasUrlByValue('a-value-example'));

        $entity->clearUrls();
        $this->assertFalse($entity->hasUrls());

        $this->clearEntityAfterTest();
    }

    public function testGeneralCodeTrait()
    {
        $trait = 'General\\Code';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testGroupTrait()
    {
        $trait = 'Group\\Group';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testGroupContextTrait()
    {
        $trait = 'Group\\Context';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testTextDescriptionTrait()
    {
        $trait = 'Text\\Description';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testTextNameTrait()
    {
        $trait = 'Text\\Name';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testTextTitleTrait()
    {
        $trait = 'Text\\Title';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testTextValueTrait()
    {
        $trait = 'Text\\Value';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testVersionStringTrait()
    {
        $trait = 'Version\\VersionString';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|VersionSemanticTrait
     */
    private function getVersionSemanticTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testVersionSemanticTrait()
    {
        $trait = 'Version\\VersionSemantic';
        $entity = $this->getVersionSemanticTrait($trait);
        $this->performRuntime($trait, $entity);

        $entity->clearVersionMajor();
        $entity->clearVersionMinor();
        $entity->clearVersionPatch();

        $this->assertSame('x.x.x', $entity->getVersion());

        $entity->setVersionMajor(123);
        $entity->setVersionMinor(456);
        $entity->setVersionPatch(789);

        $this->assertSame('123.456.789', $entity->getVersion());

        $entity->clearVersionMajor();
        $entity->clearVersionMinor();
        $entity->clearVersionPatch();

        $this->assertSame('x.x.x', $entity->getVersion());
        
        $entity->setVersion(123, 456, 789);

        $this->assertSame('123.456.789', $entity->getVersion());

        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|CountTrait
     */
    private function getNumberCountTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testNumberCountTrait()
    {
        $trait = 'Number\\Count';
        $entity = $this->getNumberCountTrait($trait);
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

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|OrderTrait
     */
    private function getNumberOrderTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testNumberOrderTrait()
    {
        $trait = 'Number\\Order';
        $entity = $this->getNumberOrderTrait($trait);
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

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|WeightTrait
     */
    private function getNumberWeightTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testNumberWeightTrait()
    {
        $trait = 'Number\\Weight';
        $entity = $this->getNumberWeightTrait($trait);
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

    public function testPersonHonorificTrait()
    {
        $trait = 'Person\\Honorific';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testPersonFirstNameTrait()
    {
        $trait = 'Person\\FirstName';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testPersonMiddleNameTrait()
    {
        $trait = 'Person\\MiddleName';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testPersonSurnameTrait()
    {
        $trait = 'Person\\Surname';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testPersonSuffixTrait()
    {
        $trait = 'Person\\Suffix';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    /**
     * @param string $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|PersonTrait
     */
    private function getPersonTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testPersonTrait()
    {
        $trait = $this->getPersonTrait('Person\\Person');
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

    public function testTextContentLeadTrait()
    {
        $trait = 'Text\\ContentLead';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testTextContentTrait()
    {
        $trait = 'Text\\Content';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    /**
     * @param $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|ImportanceTrait
     */
    private function getImportanceTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testNumberImportanceTrait()
    {
        $trait = 'Number\\Importance';
        $entity = $this->getImportanceTrait($trait);
        $this->performRuntime($trait, $entity);

        $entity->setImportance($entity->getImportanceLevelByName('CRITICAL'));
        $this->assertEquals(40, $entity->getImportance());

        $this->assertNull($entity->getImportanceLevelByName('BADNAME'));
        $this->assertEquals('DEPRECATION', $entity->getImportanceLevelByIndex(-10));
        $this->assertNull($entity->getImportanceLevelByIndex(-10000));

        $this->clearEntityAfterTest();
    }

    public function testTypeTrait()
    {
        $trait = 'Type\\Type';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testSlugTrait()
    {
        $trait = 'Identity\\SlugMutable';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    /**
     * @param string $trait
     * 
     * @return \PHPUnit_Framework_MockObject_MockObject|UuidMutableTrait
     */
    public function getIdentityUuidMutableTrait($trait)
    {
        return $this->setEntityBeforeTest($trait);
    }
    
    public function testIdentityUuidMutableTrait()
    {
        $trait = 'Identity\\UuidMutable';
        $entity = $this->getIdentityUuidMutableTrait($trait);
        $this->performRuntime($trait, $entity);
        
        foreach(['generateUuid1', 'generateUuid3', 'generateUuid4', 'generateUuid5'] as $method) {
            $entity->clearUuid();
            $this->assertFalse($entity->hasUuid());
            if ($method === 'generateUuid1') {
                call_user_func_array([$entity, $method], []);
            } else {
                call_user_func_array([$entity, $method], [Uuid::NAMESPACE_URL, 'https://src.run']);
            }
            $this->assertTrue($entity->hasUuid());
        }

        $entity->clearUuid();
        $this->assertFalse($entity->hasUuid());
        $uuid = Uuid::uuid1();
        $entity->setUuidFromString($uuid->toString());
        $this->assertTrue($entity->hasUuid());
        
        $this->expectException('SR\Doctrine\Exception\OrmException');
        $entity->setUuidFromString('invalid-uuid');

        $this->clearEntityAfterTest();
    }

    public function testHierarchyAddressCollectionTrait()
    {
        $trait = 'Address\\AddressCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testHierarchyAddressTrait()
    {
        $trait = 'Address\\Address';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testHierarchyParentCollectionTrait()
    {
        $trait = 'Hierarchy\\ParentCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testHierarchyChildCollectionTrait()
    {
        $trait = 'Hierarchy\\ChildCollection';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    public function testHierarchyParentTrait()
    {
        $trait = 'Hierarchy\\Parent';
        $entity = $this->setEntityBeforeTest($trait);
        $this->performRuntime($trait, $entity);
        $this->clearEntityAfterTest();
    }

    /**
     * @param $name
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|IdMutableTrait
     */
    private function getIdentityIdMutableTrait($name)
    {
        return $this->setEntityBeforeTest($name);
    }

    public function testIdentityIdMutableTrait()
    {
        $trait = 'Identity\\IdMutable';
        $entity = $this->getIdentityIdMutableTrait($trait);
        $this->performRuntime($trait, $entity);

        static::assertFalse($entity->hasId());
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
            //$this->analyser->setRequireFQN(false);
        }

        if (!isset($config['ops']) || count($config['ops']) === 0) {
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
            if (!isset($config['methods']) || count($config['methods']) === 0) {
                $methods = $this->getCrudEntityMethodsDefault($traitName, $prop);
            } else {
                $methods = $config['methods'];
            }

            $skipMethodCheckSet = [
                'Identity\IdMutable',
                'Identity\SlugMutable',
                'Identity\UuidMutable',
                'General\Code',
                'Address\Address',
                'Alias\Alias',
                'Hierarchy\Parent',
                'Name\Name',
                'Number\Count',
                'Number\Order',
                'Number\Weight',
            ];

            foreach ($methods as $j => $method) {
                if ($j > 4) {
                    continue;
                }

                if (in_array($traitName, $skipMethodCheckSet)) {
                    continue;
                }

                //$this->assertTrue($this->analyser->hasMethod($method) || $this->analyser->hasMethod('__'.$method), 'Should have method '.$method);
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

            case self::VALUES_FOR_UUID:
                return [Uuid::uuid1(), Uuid::uuid1(), Uuid::uuid1(), Uuid::uuid1()];

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

        return null;
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
            $this->getMockForAbstractClass('SR\\Doctrine\\ORM\\Mapping\\Entity'),
            $this->getMockForAbstractClass('SR\\Doctrine\\ORM\\Mapping\\Entity'),
            $this->getMockForAbstractClass('SR\\Doctrine\\ORM\\Mapping\\Entity'),
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

        $this->tryInitializerCall($entity, $initializer);

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
     * @param \PHPUnit_Framework_MockObject_MockObject $entity
     * @param string                                   $initializeMethod
     */
    private function tryInitializerCall(\PHPUnit_Framework_MockObject_MockObject $entity, $initializeMethod)
    {
        try {
            $this->initializerCall($entity, $initializeMethod);
        } catch (\Exception $e) {
        }
    }

    /**
     * @param \PHPUnit_Framework_MockObject_MockObject $entity
     * @param string                                   $initializeMethod
     */
    private function initializerCall(\PHPUnit_Framework_MockObject_MockObject $entity, $initializeMethod)
    {
        $inspector = Inspect::thisInstance($entity);
        try {
            $method = $inspector->getMethod($initializeMethod);
        } catch (InvalidArgumentException $e) {
            $initializeMethod = '__'.$initializeMethod;
            $method = $inspector->getMethod($initializeMethod);
        }

        $method->setAccessible(true);
        $method->invoke($entity);
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
