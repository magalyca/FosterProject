<?php

namespace Map;

use \Waitingparent;
use \WaitingparentQuery;
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
 * This class defines the structure of the 'waitingparent' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WaitingparentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.WaitingparentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'waitingparent';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Waitingparent';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Waitingparent';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the waitingParentId field
     */
    const COL_WAITINGPARENTID = 'waitingparent.waitingParentId';

    /**
     * the column name for the firstName field
     */
    const COL_FIRSTNAME = 'waitingparent.firstName';

    /**
     * the column name for the lastName field
     */
    const COL_LASTNAME = 'waitingparent.lastName';

    /**
     * the column name for the telephone field
     */
    const COL_TELEPHONE = 'waitingparent.telephone';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'waitingparent.email';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'waitingparent.address';

    /**
     * the column name for the dateApplied field
     */
    const COL_DATEAPPLIED = 'waitingparent.dateApplied';

    /**
     * the column name for the biologicalChild field
     */
    const COL_BIOLOGICALCHILD = 'waitingparent.biologicalChild';

    /**
     * the column name for the staffId field
     */
    const COL_STAFFID = 'waitingparent.staffId';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'waitingparent.gender';

    /**
     * the column name for the age field
     */
    const COL_AGE = 'waitingparent.age';

    /**
     * the column name for the formId field
     */
    const COL_FORMID = 'waitingparent.formId';

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
        self::TYPE_PHPNAME       => array('Waitingparentid', 'Firstname', 'Lastname', 'Telephone', 'Email', 'Address', 'Dateapplied', 'Biologicalchild', 'Staffid', 'Gender', 'Age', 'Formid', ),
        self::TYPE_CAMELNAME     => array('waitingparentid', 'firstname', 'lastname', 'telephone', 'email', 'address', 'dateapplied', 'biologicalchild', 'staffid', 'gender', 'age', 'formid', ),
        self::TYPE_COLNAME       => array(WaitingparentTableMap::COL_WAITINGPARENTID, WaitingparentTableMap::COL_FIRSTNAME, WaitingparentTableMap::COL_LASTNAME, WaitingparentTableMap::COL_TELEPHONE, WaitingparentTableMap::COL_EMAIL, WaitingparentTableMap::COL_ADDRESS, WaitingparentTableMap::COL_DATEAPPLIED, WaitingparentTableMap::COL_BIOLOGICALCHILD, WaitingparentTableMap::COL_STAFFID, WaitingparentTableMap::COL_GENDER, WaitingparentTableMap::COL_AGE, WaitingparentTableMap::COL_FORMID, ),
        self::TYPE_FIELDNAME     => array('waitingParentId', 'firstName', 'lastName', 'telephone', 'email', 'address', 'dateApplied', 'biologicalChild', 'staffId', 'gender', 'age', 'formId', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Waitingparentid' => 0, 'Firstname' => 1, 'Lastname' => 2, 'Telephone' => 3, 'Email' => 4, 'Address' => 5, 'Dateapplied' => 6, 'Biologicalchild' => 7, 'Staffid' => 8, 'Gender' => 9, 'Age' => 10, 'Formid' => 11, ),
        self::TYPE_CAMELNAME     => array('waitingparentid' => 0, 'firstname' => 1, 'lastname' => 2, 'telephone' => 3, 'email' => 4, 'address' => 5, 'dateapplied' => 6, 'biologicalchild' => 7, 'staffid' => 8, 'gender' => 9, 'age' => 10, 'formid' => 11, ),
        self::TYPE_COLNAME       => array(WaitingparentTableMap::COL_WAITINGPARENTID => 0, WaitingparentTableMap::COL_FIRSTNAME => 1, WaitingparentTableMap::COL_LASTNAME => 2, WaitingparentTableMap::COL_TELEPHONE => 3, WaitingparentTableMap::COL_EMAIL => 4, WaitingparentTableMap::COL_ADDRESS => 5, WaitingparentTableMap::COL_DATEAPPLIED => 6, WaitingparentTableMap::COL_BIOLOGICALCHILD => 7, WaitingparentTableMap::COL_STAFFID => 8, WaitingparentTableMap::COL_GENDER => 9, WaitingparentTableMap::COL_AGE => 10, WaitingparentTableMap::COL_FORMID => 11, ),
        self::TYPE_FIELDNAME     => array('waitingParentId' => 0, 'firstName' => 1, 'lastName' => 2, 'telephone' => 3, 'email' => 4, 'address' => 5, 'dateApplied' => 6, 'biologicalChild' => 7, 'staffId' => 8, 'gender' => 9, 'age' => 10, 'formId' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('waitingparent');
        $this->setPhpName('Waitingparent');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Waitingparent');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('waitingParentId', 'Waitingparentid', 'INTEGER', true, null, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('telephone', 'Telephone', 'VARCHAR', true, 32, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 64, null);
        $this->addColumn('address', 'Address', 'VARCHAR', true, 250, null);
        $this->addColumn('dateApplied', 'Dateapplied', 'VARCHAR', true, 128, null);
        $this->addColumn('biologicalChild', 'Biologicalchild', 'VARCHAR', true, 32, null);
        $this->addForeignKey('staffId', 'Staffid', 'INTEGER', 'staff', 'staffId', true, null, null);
        $this->addColumn('gender', 'Gender', 'VARCHAR', true, 24, null);
        $this->addColumn('age', 'Age', 'INTEGER', true, null, null);
        $this->addForeignKey('formId', 'Formid', 'INTEGER', 'personaldocument', 'documentId', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Personaldocument', '\\Personaldocument', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':formId',
    1 => ':documentId',
  ),
), null, null, null, false);
        $this->addRelation('Staff', '\\Staff', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':staffId',
    1 => ':staffId',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Waitingparentid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Waitingparentid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Waitingparentid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Waitingparentid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Waitingparentid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Waitingparentid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Waitingparentid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? WaitingparentTableMap::CLASS_DEFAULT : WaitingparentTableMap::OM_CLASS;
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
     * @return array           (Waitingparent object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WaitingparentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WaitingparentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WaitingparentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WaitingparentTableMap::OM_CLASS;
            /** @var Waitingparent $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WaitingparentTableMap::addInstanceToPool($obj, $key);
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
            $key = WaitingparentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WaitingparentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Waitingparent $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WaitingparentTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(WaitingparentTableMap::COL_WAITINGPARENTID);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_TELEPHONE);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_EMAIL);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_DATEAPPLIED);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_BIOLOGICALCHILD);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_STAFFID);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_GENDER);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_AGE);
            $criteria->addSelectColumn(WaitingparentTableMap::COL_FORMID);
        } else {
            $criteria->addSelectColumn($alias . '.waitingParentId');
            $criteria->addSelectColumn($alias . '.firstName');
            $criteria->addSelectColumn($alias . '.lastName');
            $criteria->addSelectColumn($alias . '.telephone');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.dateApplied');
            $criteria->addSelectColumn($alias . '.biologicalChild');
            $criteria->addSelectColumn($alias . '.staffId');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.formId');
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
        return Propel::getServiceContainer()->getDatabaseMap(WaitingparentTableMap::DATABASE_NAME)->getTable(WaitingparentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(WaitingparentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(WaitingparentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new WaitingparentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Waitingparent or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Waitingparent object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WaitingparentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Waitingparent) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WaitingparentTableMap::DATABASE_NAME);
            $criteria->add(WaitingparentTableMap::COL_WAITINGPARENTID, (array) $values, Criteria::IN);
        }

        $query = WaitingparentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WaitingparentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WaitingparentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the waitingparent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WaitingparentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Waitingparent or Criteria object.
     *
     * @param mixed               $criteria Criteria or Waitingparent object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WaitingparentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Waitingparent object
        }

        if ($criteria->containsKey(WaitingparentTableMap::COL_WAITINGPARENTID) && $criteria->keyContainsValue(WaitingparentTableMap::COL_WAITINGPARENTID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.WaitingparentTableMap::COL_WAITINGPARENTID.')');
        }


        // Set the correct dbName
        $query = WaitingparentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // WaitingparentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WaitingparentTableMap::buildTableMap();
