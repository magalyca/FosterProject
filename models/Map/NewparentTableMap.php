<?php

namespace Map;

use \Newparent;
use \NewparentQuery;
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
 * This class defines the structure of the 'newparent' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class NewparentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.NewparentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'newparent';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Newparent';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Newparent';

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
     * the column name for the newParentId field
     */
    const COL_NEWPARENTID = 'newparent.newParentId';

    /**
     * the column name for the firstName field
     */
    const COL_FIRSTNAME = 'newparent.firstName';

    /**
     * the column name for the lastName field
     */
    const COL_LASTNAME = 'newparent.lastName';

    /**
     * the column name for the childId field
     */
    const COL_CHILDID = 'newparent.childId';

    /**
     * the column name for the telephone field
     */
    const COL_TELEPHONE = 'newparent.telephone';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'newparent.email';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'newparent.address';

    /**
     * the column name for the dateApplied field
     */
    const COL_DATEAPPLIED = 'newparent.dateApplied';

    /**
     * the column name for the biologicalChild field
     */
    const COL_BIOLOGICALCHILD = 'newparent.biologicalChild';

    /**
     * the column name for the staffId field
     */
    const COL_STAFFID = 'newparent.staffId';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'newparent.gender';

    /**
     * the column name for the age field
     */
    const COL_AGE = 'newparent.age';

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
        self::TYPE_PHPNAME       => array('Newparentid', 'Firstname', 'Lastname', 'Childid', 'Telephone', 'Email', 'Address', 'Dateapplied', 'Biologicalchild', 'Staffid', 'Gender', 'Age', ),
        self::TYPE_CAMELNAME     => array('newparentid', 'firstname', 'lastname', 'childid', 'telephone', 'email', 'address', 'dateapplied', 'biologicalchild', 'staffid', 'gender', 'age', ),
        self::TYPE_COLNAME       => array(NewparentTableMap::COL_NEWPARENTID, NewparentTableMap::COL_FIRSTNAME, NewparentTableMap::COL_LASTNAME, NewparentTableMap::COL_CHILDID, NewparentTableMap::COL_TELEPHONE, NewparentTableMap::COL_EMAIL, NewparentTableMap::COL_ADDRESS, NewparentTableMap::COL_DATEAPPLIED, NewparentTableMap::COL_BIOLOGICALCHILD, NewparentTableMap::COL_STAFFID, NewparentTableMap::COL_GENDER, NewparentTableMap::COL_AGE, ),
        self::TYPE_FIELDNAME     => array('newParentId', 'firstName', 'lastName', 'childId', 'telephone', 'email', 'address', 'dateApplied', 'biologicalChild', 'staffId', 'gender', 'age', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Newparentid' => 0, 'Firstname' => 1, 'Lastname' => 2, 'Childid' => 3, 'Telephone' => 4, 'Email' => 5, 'Address' => 6, 'Dateapplied' => 7, 'Biologicalchild' => 8, 'Staffid' => 9, 'Gender' => 10, 'Age' => 11, ),
        self::TYPE_CAMELNAME     => array('newparentid' => 0, 'firstname' => 1, 'lastname' => 2, 'childid' => 3, 'telephone' => 4, 'email' => 5, 'address' => 6, 'dateapplied' => 7, 'biologicalchild' => 8, 'staffid' => 9, 'gender' => 10, 'age' => 11, ),
        self::TYPE_COLNAME       => array(NewparentTableMap::COL_NEWPARENTID => 0, NewparentTableMap::COL_FIRSTNAME => 1, NewparentTableMap::COL_LASTNAME => 2, NewparentTableMap::COL_CHILDID => 3, NewparentTableMap::COL_TELEPHONE => 4, NewparentTableMap::COL_EMAIL => 5, NewparentTableMap::COL_ADDRESS => 6, NewparentTableMap::COL_DATEAPPLIED => 7, NewparentTableMap::COL_BIOLOGICALCHILD => 8, NewparentTableMap::COL_STAFFID => 9, NewparentTableMap::COL_GENDER => 10, NewparentTableMap::COL_AGE => 11, ),
        self::TYPE_FIELDNAME     => array('newParentId' => 0, 'firstName' => 1, 'lastName' => 2, 'childId' => 3, 'telephone' => 4, 'email' => 5, 'address' => 6, 'dateApplied' => 7, 'biologicalChild' => 8, 'staffId' => 9, 'gender' => 10, 'age' => 11, ),
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
        $this->setName('newparent');
        $this->setPhpName('Newparent');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Newparent');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('newParentId', 'Newparentid', 'INTEGER', true, null, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addForeignKey('childId', 'Childid', 'INTEGER', 'child', 'childId', true, null, null);
        $this->addColumn('telephone', 'Telephone', 'VARCHAR', true, 32, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 32, null);
        $this->addColumn('address', 'Address', 'VARCHAR', true, 128, null);
        $this->addColumn('dateApplied', 'Dateapplied', 'VARCHAR', true, 64, null);
        $this->addColumn('biologicalChild', 'Biologicalchild', 'VARCHAR', true, 64, null);
        $this->addForeignKey('staffId', 'Staffid', 'INTEGER', 'staff', 'staffId', true, null, null);
        $this->addColumn('gender', 'Gender', 'VARCHAR', true, 16, null);
        $this->addColumn('age', 'Age', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Newparentid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Newparentid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Newparentid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Newparentid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Newparentid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Newparentid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Newparentid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? NewparentTableMap::CLASS_DEFAULT : NewparentTableMap::OM_CLASS;
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
     * @return array           (Newparent object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = NewparentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = NewparentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + NewparentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NewparentTableMap::OM_CLASS;
            /** @var Newparent $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            NewparentTableMap::addInstanceToPool($obj, $key);
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
            $key = NewparentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = NewparentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Newparent $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NewparentTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(NewparentTableMap::COL_NEWPARENTID);
            $criteria->addSelectColumn(NewparentTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(NewparentTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(NewparentTableMap::COL_CHILDID);
            $criteria->addSelectColumn(NewparentTableMap::COL_TELEPHONE);
            $criteria->addSelectColumn(NewparentTableMap::COL_EMAIL);
            $criteria->addSelectColumn(NewparentTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(NewparentTableMap::COL_DATEAPPLIED);
            $criteria->addSelectColumn(NewparentTableMap::COL_BIOLOGICALCHILD);
            $criteria->addSelectColumn(NewparentTableMap::COL_STAFFID);
            $criteria->addSelectColumn(NewparentTableMap::COL_GENDER);
            $criteria->addSelectColumn(NewparentTableMap::COL_AGE);
        } else {
            $criteria->addSelectColumn($alias . '.newParentId');
            $criteria->addSelectColumn($alias . '.firstName');
            $criteria->addSelectColumn($alias . '.lastName');
            $criteria->addSelectColumn($alias . '.childId');
            $criteria->addSelectColumn($alias . '.telephone');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.dateApplied');
            $criteria->addSelectColumn($alias . '.biologicalChild');
            $criteria->addSelectColumn($alias . '.staffId');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.age');
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
        return Propel::getServiceContainer()->getDatabaseMap(NewparentTableMap::DATABASE_NAME)->getTable(NewparentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(NewparentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(NewparentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new NewparentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Newparent or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Newparent object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(NewparentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Newparent) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NewparentTableMap::DATABASE_NAME);
            $criteria->add(NewparentTableMap::COL_NEWPARENTID, (array) $values, Criteria::IN);
        }

        $query = NewparentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            NewparentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                NewparentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the newparent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return NewparentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Newparent or Criteria object.
     *
     * @param mixed               $criteria Criteria or Newparent object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewparentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Newparent object
        }

        if ($criteria->containsKey(NewparentTableMap::COL_NEWPARENTID) && $criteria->keyContainsValue(NewparentTableMap::COL_NEWPARENTID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.NewparentTableMap::COL_NEWPARENTID.')');
        }


        // Set the correct dbName
        $query = NewparentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // NewparentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
NewparentTableMap::buildTableMap();
