<?php

namespace Tests\eXpansion\Bundle\LocalRecords\Services;

use eXpansion\Bundle\LocalRecords\Model\RecordQueryBuilder;
use eXpansion\Bundle\LocalRecords\Services\RecordHandler;
use eXpansion\Bundle\LocalRecords\Services\RecordHandlerFactory;
use eXpansion\Framework\PlayersBundle\Storage\PlayerDb;

class RecordHandlerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $recordQueryBuilder;

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $playerDbMock;

    protected function setUp()
    {
        parent::setUp();

        $this->recordQueryBuilder = $this->getMockBuilder(RecordQueryBuilder::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->playerDbMock = $this->getMockBuilder(PlayerDb::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testCreate()
    {
        $factory = new RecordHandlerFactory($this->recordQueryBuilder, $this->playerDbMock, RecordHandler::ORDER_ASC, 10);

        $this->assertInstanceOf(RecordHandler::class, $factory->create());

    }
}
