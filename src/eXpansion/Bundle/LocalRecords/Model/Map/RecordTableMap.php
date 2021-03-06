<?php

namespace eXpansion\Bundle\LocalRecords\Model\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use eXpansion\Bundle\LocalRecords\Model\Record;
use eXpansion\Bundle\LocalRecords\Model\RecordQuery;


/**
 * This class defines the structure of the 'record' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RecordTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src\eXpansion\Bundle\LocalRecords.Model.Map.RecordTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'expansion';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'record';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\eXpansion\\Bundle\\LocalRecords\\Model\\Record';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'src\eXpansion\Bundle\LocalRecords.Model.Record';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'record.id';

    /**
     * the column name for the mapUid field
     */
    const COL_MAPUID = 'record.mapUid';

    /**
     * the column name for the nbLaps field
     */
    const COL_NBLAPS = 'record.nbLaps';

    /**
     * the column name for the score field
     */
    const COL_SCORE = 'record.score';

    /**
     * the column name for the nbFinish field
     */
    const COL_NBFINISH = 'record.nbFinish';

    /**
     * the column name for the avgScore field
     */
    const COL_AVGSCORE = 'record.avgScore';

    /**
     * the column name for the checkpoints field
     */
    const COL_CHECKPOINTS = 'record.checkpoints';

    /**
     * the column name for the player_id field
     */
    const COL_PLAYER_ID = 'record.player_id';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'record.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'record.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Mapuid', 'Nblaps', 'Score', 'Nbfinish', 'Avgscore', 'Checkpoints', 'PlayerId', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'mapuid', 'nblaps', 'score', 'nbfinish', 'avgscore', 'checkpoints', 'playerId', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(RecordTableMap::COL_ID, RecordTableMap::COL_MAPUID, RecordTableMap::COL_NBLAPS, RecordTableMap::COL_SCORE, RecordTableMap::COL_NBFINISH, RecordTableMap::COL_AVGSCORE, RecordTableMap::COL_CHECKPOINTS, RecordTableMap::COL_PLAYER_ID, RecordTableMap::COL_CREATED_AT, RecordTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'mapUid', 'nbLaps', 'score', 'nbFinish', 'avgScore', 'checkpoints', 'player_id', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mapuid' => 1, 'Nblaps' => 2, 'Score' => 3, 'Nbfinish' => 4, 'Avgscore' => 5, 'Checkpoints' => 6, 'PlayerId' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mapuid' => 1, 'nblaps' => 2, 'score' => 3, 'nbfinish' => 4, 'avgscore' => 5, 'checkpoints' => 6, 'playerId' => 7, 'createdAt' => 8, 'updatedAt' => 9, ),
        self::TYPE_COLNAME       => array(RecordTableMap::COL_ID => 0, RecordTableMap::COL_MAPUID => 1, RecordTableMap::COL_NBLAPS => 2, RecordTableMap::COL_SCORE => 3, RecordTableMap::COL_NBFINISH => 4, RecordTableMap::COL_AVGSCORE => 5, RecordTableMap::COL_CHECKPOINTS => 6, RecordTableMap::COL_PLAYER_ID => 7, RecordTableMap::COL_CREATED_AT => 8, RecordTableMap::COL_UPDATED_AT => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mapUid' => 1, 'nbLaps' => 2, 'score' => 3, 'nbFinish' => 4, 'avgScore' => 5, 'checkpoints' => 6, 'player_id' => 7, 'created_at' => 8, 'updated_at' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('record');
        $this->setPhpName('Record');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\eXpansion\\Bundle\\LocalRecords\\Model\\Record');
        $this->setPackage('src\eXpansion\Bundle\LocalRecords.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mapUid', 'Mapuid', 'VARCHAR', false, 255, null);
        $this->addColumn('nbLaps', 'Nblaps', 'INTEGER', false, null, null);
        $this->addColumn('score', 'Score', 'INTEGER', false, null, null);
        $this->addColumn('nbFinish', 'Nbfinish', 'INTEGER', false, null, null);
        $this->addColumn('avgScore', 'Avgscore', 'INTEGER', false, null, null);
        $this->addColumn('checkpoints', 'Checkpoints', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('player_id', 'PlayerId', 'INTEGER', 'player', 'id', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Player', '\\eXpansion\\Framework\\PlayersBundle\\Model\\Player', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':player_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? RecordTableMap::CLASS_DEFAULT : RecordTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Record object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RecordTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RecordTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RecordTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RecordTableMap::OM_CLASS;
            /** @var Record $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RecordTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = RecordTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RecordTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Record $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RecordTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(RecordTableMap::COL_ID);
            $criteria->addSelectColumn(RecordTableMap::COL_MAPUID);
            $criteria->addSelectColumn(RecordTableMap::COL_NBLAPS);
            $criteria->addSelectColumn(RecordTableMap::COL_SCORE);
            $criteria->addSelectColumn(RecordTableMap::COL_NBFINISH);
            $criteria->addSelectColumn(RecordTableMap::COL_AVGSCORE);
            $criteria->addSelectColumn(RecordTableMap::COL_CHECKPOINTS);
            $criteria->addSelectColumn(RecordTableMap::COL_PLAYER_ID);
            $criteria->addSelectColumn(RecordTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(RecordTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mapUid');
            $criteria->addSelectColumn($alias . '.nbLaps');
            $criteria->addSelectColumn($alias . '.score');
            $criteria->addSelectColumn($alias . '.nbFinish');
            $criteria->addSelectColumn($alias . '.avgScore');
            $criteria->addSelectColumn($alias . '.checkpoints');
            $criteria->addSelectColumn($alias . '.player_id');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(RecordTableMap::DATABASE_NAME)->getTable(RecordTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RecordTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RecordTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RecordTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Record or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Record object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RecordTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \eXpansion\Bundle\LocalRecords\Model\Record) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RecordTableMap::DATABASE_NAME);
            $criteria->add(RecordTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = RecordQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RecordTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RecordTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the record table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RecordQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Record or Criteria object.
     *
     * @param mixed               $criteria Criteria or Record object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RecordTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Record object
        }

        if ($criteria->containsKey(RecordTableMap::COL_ID) && $criteria->keyContainsValue(RecordTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RecordTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = RecordQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RecordTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RecordTableMap::buildTableMap();
