<?php

namespace Map;

use \Rooms;
use \RoomsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'rooms' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RoomsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RoomsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'rooms';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Rooms';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Rooms';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the roomId field
     */
    const COL_ROOMID = 'rooms.roomId';

    /**
     * the column name for the building field
     */
    const COL_BUILDING = 'rooms.building';

    /**
     * the column name for the floor field
     */
    const COL_FLOOR = 'rooms.floor';

    /**
     * the column name for the roomNum field
     */
    const COL_ROOMNUM = 'rooms.roomNum';

    /**
     * the column name for the capacity field
     */
    const COL_CAPACITY = 'rooms.capacity';

    /**
     * the column name for the childId field
     */
    const COL_CHILDID = 'rooms.childId';

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
        self::TYPE_PHPNAME       => array('Roomid', 'Building', 'Floor', 'Roomnum', 'Capacity', 'Childid', ),
        self::TYPE_CAMELNAME     => array('roomid', 'building', 'floor', 'roomnum', 'capacity', 'childid', ),
        self::TYPE_COLNAME       => array(RoomsTableMap::COL_ROOMID, RoomsTableMap::COL_BUILDING, RoomsTableMap::COL_FLOOR, RoomsTableMap::COL_ROOMNUM, RoomsTableMap::COL_CAPACITY, RoomsTableMap::COL_CHILDID, ),
        self::TYPE_FIELDNAME     => array('roomId', 'building', 'floor', 'roomNum', 'capacity', 'childId', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Roomid' => 0, 'Building' => 1, 'Floor' => 2, 'Roomnum' => 3, 'Capacity' => 4, 'Childid' => 5, ),
        self::TYPE_CAMELNAME     => array('roomid' => 0, 'building' => 1, 'floor' => 2, 'roomnum' => 3, 'capacity' => 4, 'childid' => 5, ),
        self::TYPE_COLNAME       => array(RoomsTableMap::COL_ROOMID => 0, RoomsTableMap::COL_BUILDING => 1, RoomsTableMap::COL_FLOOR => 2, RoomsTableMap::COL_ROOMNUM => 3, RoomsTableMap::COL_CAPACITY => 4, RoomsTableMap::COL_CHILDID => 5, ),
        self::TYPE_FIELDNAME     => array('roomId' => 0, 'building' => 1, 'floor' => 2, 'roomNum' => 3, 'capacity' => 4, 'childId' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('rooms');
        $this->setPhpName('Rooms');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Rooms');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('roomId', 'Roomid', 'INTEGER', true, null, null);
        $this->addColumn('building', 'Building', 'VARCHAR', true, 11, null);
        $this->addColumn('floor', 'Floor', 'INTEGER', true, null, null);
        $this->addColumn('roomNum', 'Roomnum', 'INTEGER', true, null, null);
        $this->addColumn('capacity', 'Capacity', 'INTEGER', true, null, null);
        $this->addForeignKey('childId', 'Childid', 'INTEGER', 'child', 'childId', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Child', '\\Child', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':childId',
    1 => ':childId',
  ),
), null, null, null, false);
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Roomid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Roomid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Roomid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Roomid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Roomid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Roomid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Roomid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? RoomsTableMap::CLASS_DEFAULT : RoomsTableMap::OM_CLASS;
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
     * @return array           (Rooms object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RoomsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RoomsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RoomsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RoomsTableMap::OM_CLASS;
            /** @var Rooms $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RoomsTableMap::addInstanceToPool($obj, $key);
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
            $key = RoomsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RoomsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Rooms $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RoomsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(RoomsTableMap::COL_ROOMID);
            $criteria->addSelectColumn(RoomsTableMap::COL_BUILDING);
            $criteria->addSelectColumn(RoomsTableMap::COL_FLOOR);
            $criteria->addSelectColumn(RoomsTableMap::COL_ROOMNUM);
            $criteria->addSelectColumn(RoomsTableMap::COL_CAPACITY);
            $criteria->addSelectColumn(RoomsTableMap::COL_CHILDID);
        } else {
            $criteria->addSelectColumn($alias . '.roomId');
            $criteria->addSelectColumn($alias . '.building');
            $criteria->addSelectColumn($alias . '.floor');
            $criteria->addSelectColumn($alias . '.roomNum');
            $criteria->addSelectColumn($alias . '.capacity');
            $criteria->addSelectColumn($alias . '.childId');
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
        return Propel::getServiceContainer()->getDatabaseMap(RoomsTableMap::DATABASE_NAME)->getTable(RoomsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RoomsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RoomsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RoomsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Rooms or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Rooms object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(RoomsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Rooms) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RoomsTableMap::DATABASE_NAME);
            $criteria->add(RoomsTableMap::COL_ROOMID, (array) $values, Criteria::IN);
        }

        $query = RoomsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RoomsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RoomsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the rooms table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RoomsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Rooms or Criteria object.
     *
     * @param mixed               $criteria Criteria or Rooms object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RoomsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Rooms object
        }

        if ($criteria->containsKey(RoomsTableMap::COL_ROOMID) && $criteria->keyContainsValue(RoomsTableMap::COL_ROOMID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.RoomsTableMap::COL_ROOMID.')');
        }


        // Set the correct dbName
        $query = RoomsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RoomsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RoomsTableMap::buildTableMap();
