<?php

namespace Map;

use \Staff;
use \StaffQuery;
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
 * This class defines the structure of the 'staff' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class StaffTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.StaffTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'staff';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Staff';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Staff';

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
     * the column name for the staffId field
     */
    const COL_STAFFID = 'staff.staffId';

    /**
     * the column name for the firstName field
     */
    const COL_FIRSTNAME = 'staff.firstName';

    /**
     * the column name for the lastName field
     */
    const COL_LASTNAME = 'staff.lastName';

    /**
     * the column name for the position field
     */
    const COL_POSITION = 'staff.position';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'staff.email';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'staff.password';

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
        self::TYPE_PHPNAME       => array('Staffid', 'Firstname', 'Lastname', 'Position', 'Email', 'Password', ),
        self::TYPE_CAMELNAME     => array('staffid', 'firstname', 'lastname', 'position', 'email', 'password', ),
        self::TYPE_COLNAME       => array(StaffTableMap::COL_STAFFID, StaffTableMap::COL_FIRSTNAME, StaffTableMap::COL_LASTNAME, StaffTableMap::COL_POSITION, StaffTableMap::COL_EMAIL, StaffTableMap::COL_PASSWORD, ),
        self::TYPE_FIELDNAME     => array('staffId', 'firstName', 'lastName', 'position', 'email', 'password', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Staffid' => 0, 'Firstname' => 1, 'Lastname' => 2, 'Position' => 3, 'Email' => 4, 'Password' => 5, ),
        self::TYPE_CAMELNAME     => array('staffid' => 0, 'firstname' => 1, 'lastname' => 2, 'position' => 3, 'email' => 4, 'password' => 5, ),
        self::TYPE_COLNAME       => array(StaffTableMap::COL_STAFFID => 0, StaffTableMap::COL_FIRSTNAME => 1, StaffTableMap::COL_LASTNAME => 2, StaffTableMap::COL_POSITION => 3, StaffTableMap::COL_EMAIL => 4, StaffTableMap::COL_PASSWORD => 5, ),
        self::TYPE_FIELDNAME     => array('staffId' => 0, 'firstName' => 1, 'lastName' => 2, 'position' => 3, 'email' => 4, 'password' => 5, ),
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
        $this->setName('staff');
        $this->setPhpName('Staff');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Staff');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('staffId', 'Staffid', 'INTEGER', true, null, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('position', 'Position', 'VARCHAR', true, 64, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 32, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 32, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Child', '\\Child', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':staffId',
    1 => ':staffId',
  ),
), null, null, 'Children', false);
        $this->addRelation('Expenses', '\\Expenses', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':staffId',
    1 => ':staffId',
  ),
), null, null, 'Expensess', false);
        $this->addRelation('Newparent', '\\Newparent', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':staffId',
    1 => ':staffId',
  ),
), null, null, 'Newparents', false);
        $this->addRelation('Waitingparent', '\\Waitingparent', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':staffId',
    1 => ':staffId',
  ),
), null, null, 'Waitingparents', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? StaffTableMap::CLASS_DEFAULT : StaffTableMap::OM_CLASS;
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
     * @return array           (Staff object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = StaffTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = StaffTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + StaffTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StaffTableMap::OM_CLASS;
            /** @var Staff $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            StaffTableMap::addInstanceToPool($obj, $key);
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
            $key = StaffTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = StaffTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Staff $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StaffTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(StaffTableMap::COL_STAFFID);
            $criteria->addSelectColumn(StaffTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(StaffTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(StaffTableMap::COL_POSITION);
            $criteria->addSelectColumn(StaffTableMap::COL_EMAIL);
            $criteria->addSelectColumn(StaffTableMap::COL_PASSWORD);
        } else {
            $criteria->addSelectColumn($alias . '.staffId');
            $criteria->addSelectColumn($alias . '.firstName');
            $criteria->addSelectColumn($alias . '.lastName');
            $criteria->addSelectColumn($alias . '.position');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.password');
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
        return Propel::getServiceContainer()->getDatabaseMap(StaffTableMap::DATABASE_NAME)->getTable(StaffTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(StaffTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(StaffTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new StaffTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Staff or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Staff object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(StaffTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Staff) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StaffTableMap::DATABASE_NAME);
            $criteria->add(StaffTableMap::COL_STAFFID, (array) $values, Criteria::IN);
        }

        $query = StaffQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            StaffTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                StaffTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the staff table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return StaffQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Staff or Criteria object.
     *
     * @param mixed               $criteria Criteria or Staff object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StaffTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Staff object
        }

        if ($criteria->containsKey(StaffTableMap::COL_STAFFID) && $criteria->keyContainsValue(StaffTableMap::COL_STAFFID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.StaffTableMap::COL_STAFFID.')');
        }


        // Set the correct dbName
        $query = StaffQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // StaffTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
StaffTableMap::buildTableMap();
