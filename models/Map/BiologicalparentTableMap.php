<?php

namespace Map;

use \Biologicalparent;
use \BiologicalparentQuery;
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
 * This class defines the structure of the 'biologicalparent' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BiologicalparentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BiologicalparentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'biologicalparent';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Biologicalparent';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Biologicalparent';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the bioParentId field
     */
    const COL_BIOPARENTID = 'biologicalparent.bioParentId';

    /**
     * the column name for the firstName field
     */
    const COL_FIRSTNAME = 'biologicalparent.firstName';

    /**
     * the column name for the lastName field
     */
    const COL_LASTNAME = 'biologicalparent.lastName';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'biologicalparent.gender';

    /**
     * the column name for the childName field
     */
    const COL_CHILDNAME = 'biologicalparent.childName';

    /**
     * the column name for the alive field
     */
    const COL_ALIVE = 'biologicalparent.alive';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'biologicalparent.description';

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
        self::TYPE_PHPNAME       => array('Bioparentid', 'Firstname', 'Lastname', 'Gender', 'Childname', 'Alive', 'Description', ),
        self::TYPE_CAMELNAME     => array('bioparentid', 'firstname', 'lastname', 'gender', 'childname', 'alive', 'description', ),
        self::TYPE_COLNAME       => array(BiologicalparentTableMap::COL_BIOPARENTID, BiologicalparentTableMap::COL_FIRSTNAME, BiologicalparentTableMap::COL_LASTNAME, BiologicalparentTableMap::COL_GENDER, BiologicalparentTableMap::COL_CHILDNAME, BiologicalparentTableMap::COL_ALIVE, BiologicalparentTableMap::COL_DESCRIPTION, ),
        self::TYPE_FIELDNAME     => array('bioParentId', 'firstName', 'lastName', 'gender', 'childName', 'alive', 'description', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Bioparentid' => 0, 'Firstname' => 1, 'Lastname' => 2, 'Gender' => 3, 'Childname' => 4, 'Alive' => 5, 'Description' => 6, ),
        self::TYPE_CAMELNAME     => array('bioparentid' => 0, 'firstname' => 1, 'lastname' => 2, 'gender' => 3, 'childname' => 4, 'alive' => 5, 'description' => 6, ),
        self::TYPE_COLNAME       => array(BiologicalparentTableMap::COL_BIOPARENTID => 0, BiologicalparentTableMap::COL_FIRSTNAME => 1, BiologicalparentTableMap::COL_LASTNAME => 2, BiologicalparentTableMap::COL_GENDER => 3, BiologicalparentTableMap::COL_CHILDNAME => 4, BiologicalparentTableMap::COL_ALIVE => 5, BiologicalparentTableMap::COL_DESCRIPTION => 6, ),
        self::TYPE_FIELDNAME     => array('bioParentId' => 0, 'firstName' => 1, 'lastName' => 2, 'gender' => 3, 'childName' => 4, 'alive' => 5, 'description' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('biologicalparent');
        $this->setPhpName('Biologicalparent');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Biologicalparent');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('bioParentId', 'Bioparentid', 'INTEGER', true, null, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('gender', 'Gender', 'VARCHAR', true, 28, null);
        $this->addForeignKey('childName', 'Childname', 'INTEGER', 'child', 'childId', true, null, null);
        $this->addColumn('alive', 'Alive', 'VARCHAR', true, 24, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 400, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Child', '\\Child', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':childName',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bioparentid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bioparentid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bioparentid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bioparentid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bioparentid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Bioparentid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Bioparentid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? BiologicalparentTableMap::CLASS_DEFAULT : BiologicalparentTableMap::OM_CLASS;
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
     * @return array           (Biologicalparent object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BiologicalparentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BiologicalparentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BiologicalparentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BiologicalparentTableMap::OM_CLASS;
            /** @var Biologicalparent $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BiologicalparentTableMap::addInstanceToPool($obj, $key);
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
            $key = BiologicalparentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BiologicalparentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Biologicalparent $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BiologicalparentTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BiologicalparentTableMap::COL_BIOPARENTID);
            $criteria->addSelectColumn(BiologicalparentTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(BiologicalparentTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(BiologicalparentTableMap::COL_GENDER);
            $criteria->addSelectColumn(BiologicalparentTableMap::COL_CHILDNAME);
            $criteria->addSelectColumn(BiologicalparentTableMap::COL_ALIVE);
            $criteria->addSelectColumn(BiologicalparentTableMap::COL_DESCRIPTION);
        } else {
            $criteria->addSelectColumn($alias . '.bioParentId');
            $criteria->addSelectColumn($alias . '.firstName');
            $criteria->addSelectColumn($alias . '.lastName');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.childName');
            $criteria->addSelectColumn($alias . '.alive');
            $criteria->addSelectColumn($alias . '.description');
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
        return Propel::getServiceContainer()->getDatabaseMap(BiologicalparentTableMap::DATABASE_NAME)->getTable(BiologicalparentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BiologicalparentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BiologicalparentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BiologicalparentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Biologicalparent or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Biologicalparent object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BiologicalparentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Biologicalparent) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BiologicalparentTableMap::DATABASE_NAME);
            $criteria->add(BiologicalparentTableMap::COL_BIOPARENTID, (array) $values, Criteria::IN);
        }

        $query = BiologicalparentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BiologicalparentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BiologicalparentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the biologicalparent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BiologicalparentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Biologicalparent or Criteria object.
     *
     * @param mixed               $criteria Criteria or Biologicalparent object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BiologicalparentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Biologicalparent object
        }

        if ($criteria->containsKey(BiologicalparentTableMap::COL_BIOPARENTID) && $criteria->keyContainsValue(BiologicalparentTableMap::COL_BIOPARENTID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BiologicalparentTableMap::COL_BIOPARENTID.')');
        }


        // Set the correct dbName
        $query = BiologicalparentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BiologicalparentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BiologicalparentTableMap::buildTableMap();
