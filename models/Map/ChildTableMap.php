<?php

namespace Map;

use \Child;
use \ChildQuery;
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
 * This class defines the structure of the 'child' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ChildTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ChildTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'child';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Child';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Child';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the childId field
     */
    const COL_CHILDID = 'child.childId';

    /**
     * the column name for the firstName field
     */
    const COL_FIRSTNAME = 'child.firstName';

    /**
     * the column name for the lastName field
     */
    const COL_LASTNAME = 'child.lastName';

    /**
     * the column name for the dateOfBirth field
     */
    const COL_DATEOFBIRTH = 'child.dateOfBirth';

    /**
     * the column name for the age field
     */
    const COL_AGE = 'child.age';

    /**
     * the column name for the gender field
     */
    const COL_GENDER = 'child.gender';

    /**
     * the column name for the roomNumber field
     */
    const COL_ROOMNUMBER = 'child.roomNumber';

    /**
     * the column name for the adopted field
     */
    const COL_ADOPTED = 'child.adopted';

    /**
     * the column name for the staffId field
     */
    const COL_STAFFID = 'child.staffId';

    /**
     * the column name for the dateEntered field
     */
    const COL_DATEENTERED = 'child.dateEntered';

    /**
     * the column name for the emergencyContact field
     */
    const COL_EMERGENCYCONTACT = 'child.emergencyContact';

    /**
     * the column name for the medicalRecordId field
     */
    const COL_MEDICALRECORDID = 'child.medicalRecordId';

    /**
     * the column name for the personalDocId field
     */
    const COL_PERSONALDOCID = 'child.personalDocId';

    /**
     * the column name for the height field
     */
    const COL_HEIGHT = 'child.height';

    /**
     * the column name for the weight field
     */
    const COL_WEIGHT = 'child.weight';

    /**
     * the column name for the bioParentId field
     */
    const COL_BIOPARENTID = 'child.bioParentId';

    /**
     * the column name for the newParentId field
     */
    const COL_NEWPARENTID = 'child.newParentId';

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
        self::TYPE_PHPNAME       => array('Childid', 'Firstname', 'Lastname', 'Dateofbirth', 'Age', 'Gender', 'Roomnumber', 'Adopted', 'Staffid', 'Dateentered', 'Emergencycontact', 'Medicalrecordid', 'Personaldocid', 'Height', 'Weight', 'Bioparentid', 'Newparentid', ),
        self::TYPE_CAMELNAME     => array('childid', 'firstname', 'lastname', 'dateofbirth', 'age', 'gender', 'roomnumber', 'adopted', 'staffid', 'dateentered', 'emergencycontact', 'medicalrecordid', 'personaldocid', 'height', 'weight', 'bioparentid', 'newparentid', ),
        self::TYPE_COLNAME       => array(ChildTableMap::COL_CHILDID, ChildTableMap::COL_FIRSTNAME, ChildTableMap::COL_LASTNAME, ChildTableMap::COL_DATEOFBIRTH, ChildTableMap::COL_AGE, ChildTableMap::COL_GENDER, ChildTableMap::COL_ROOMNUMBER, ChildTableMap::COL_ADOPTED, ChildTableMap::COL_STAFFID, ChildTableMap::COL_DATEENTERED, ChildTableMap::COL_EMERGENCYCONTACT, ChildTableMap::COL_MEDICALRECORDID, ChildTableMap::COL_PERSONALDOCID, ChildTableMap::COL_HEIGHT, ChildTableMap::COL_WEIGHT, ChildTableMap::COL_BIOPARENTID, ChildTableMap::COL_NEWPARENTID, ),
        self::TYPE_FIELDNAME     => array('childId', 'firstName', 'lastName', 'dateOfBirth', 'age', 'gender', 'roomNumber', 'adopted', 'staffId', 'dateEntered', 'emergencyContact', 'medicalRecordId', 'personalDocId', 'height', 'weight', 'bioParentId', 'newParentId', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Childid' => 0, 'Firstname' => 1, 'Lastname' => 2, 'Dateofbirth' => 3, 'Age' => 4, 'Gender' => 5, 'Roomnumber' => 6, 'Adopted' => 7, 'Staffid' => 8, 'Dateentered' => 9, 'Emergencycontact' => 10, 'Medicalrecordid' => 11, 'Personaldocid' => 12, 'Height' => 13, 'Weight' => 14, 'Bioparentid' => 15, 'Newparentid' => 16, ),
        self::TYPE_CAMELNAME     => array('childid' => 0, 'firstname' => 1, 'lastname' => 2, 'dateofbirth' => 3, 'age' => 4, 'gender' => 5, 'roomnumber' => 6, 'adopted' => 7, 'staffid' => 8, 'dateentered' => 9, 'emergencycontact' => 10, 'medicalrecordid' => 11, 'personaldocid' => 12, 'height' => 13, 'weight' => 14, 'bioparentid' => 15, 'newparentid' => 16, ),
        self::TYPE_COLNAME       => array(ChildTableMap::COL_CHILDID => 0, ChildTableMap::COL_FIRSTNAME => 1, ChildTableMap::COL_LASTNAME => 2, ChildTableMap::COL_DATEOFBIRTH => 3, ChildTableMap::COL_AGE => 4, ChildTableMap::COL_GENDER => 5, ChildTableMap::COL_ROOMNUMBER => 6, ChildTableMap::COL_ADOPTED => 7, ChildTableMap::COL_STAFFID => 8, ChildTableMap::COL_DATEENTERED => 9, ChildTableMap::COL_EMERGENCYCONTACT => 10, ChildTableMap::COL_MEDICALRECORDID => 11, ChildTableMap::COL_PERSONALDOCID => 12, ChildTableMap::COL_HEIGHT => 13, ChildTableMap::COL_WEIGHT => 14, ChildTableMap::COL_BIOPARENTID => 15, ChildTableMap::COL_NEWPARENTID => 16, ),
        self::TYPE_FIELDNAME     => array('childId' => 0, 'firstName' => 1, 'lastName' => 2, 'dateOfBirth' => 3, 'age' => 4, 'gender' => 5, 'roomNumber' => 6, 'adopted' => 7, 'staffId' => 8, 'dateEntered' => 9, 'emergencyContact' => 10, 'medicalRecordId' => 11, 'personalDocId' => 12, 'height' => 13, 'weight' => 14, 'bioParentId' => 15, 'newParentId' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('child');
        $this->setPhpName('Child');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Child');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('childId', 'Childid', 'INTEGER', true, null, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 32, null);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 32, null);
        $this->addColumn('dateOfBirth', 'Dateofbirth', 'VARCHAR', true, 64, null);
        $this->addColumn('age', 'Age', 'INTEGER', true, null, null);
        $this->addColumn('gender', 'Gender', 'VARCHAR', true, 16, null);
        $this->addColumn('roomNumber', 'Roomnumber', 'INTEGER', true, null, null);
        $this->addColumn('adopted', 'Adopted', 'VARCHAR', true, 16, null);
        $this->addForeignKey('staffId', 'Staffid', 'INTEGER', 'staff', 'staffId', true, null, null);
        $this->addColumn('dateEntered', 'Dateentered', 'VARCHAR', true, 64, null);
        $this->addColumn('emergencyContact', 'Emergencycontact', 'VARCHAR', true, 32, null);
        $this->addColumn('medicalRecordId', 'Medicalrecordid', 'INTEGER', true, null, null);
        $this->addColumn('personalDocId', 'Personaldocid', 'INTEGER', true, null, null);
        $this->addColumn('height', 'Height', 'INTEGER', true, null, null);
        $this->addColumn('weight', 'Weight', 'INTEGER', true, null, null);
        $this->addColumn('bioParentId', 'Bioparentid', 'INTEGER', true, null, null);
        $this->addColumn('newParentId', 'Newparentid', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Staff', '\\Staff', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':staffId',
    1 => ':staffId',
  ),
), null, null, null, false);
        $this->addRelation('Biologicalparent', '\\Biologicalparent', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':childName',
    1 => ':childId',
  ),
), null, null, 'Biologicalparents', false);
        $this->addRelation('Medicalrecord', '\\Medicalrecord', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':childId',
    1 => ':childId',
  ),
), null, null, 'Medicalrecords', false);
        $this->addRelation('Newparent', '\\Newparent', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':childId',
    1 => ':childId',
  ),
), null, null, 'Newparents', false);
        $this->addRelation('Personaldocument', '\\Personaldocument', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':childId',
    1 => ':childId',
  ),
), null, null, 'Personaldocuments', false);
        $this->addRelation('Rooms', '\\Rooms', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':childId',
    1 => ':childId',
  ),
), null, null, 'Roomss', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Childid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Childid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Childid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Childid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Childid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Childid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Childid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ChildTableMap::CLASS_DEFAULT : ChildTableMap::OM_CLASS;
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
     * @return array           (Child object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ChildTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ChildTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ChildTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ChildTableMap::OM_CLASS;
            /** @var Child $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ChildTableMap::addInstanceToPool($obj, $key);
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
            $key = ChildTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ChildTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Child $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ChildTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ChildTableMap::COL_CHILDID);
            $criteria->addSelectColumn(ChildTableMap::COL_FIRSTNAME);
            $criteria->addSelectColumn(ChildTableMap::COL_LASTNAME);
            $criteria->addSelectColumn(ChildTableMap::COL_DATEOFBIRTH);
            $criteria->addSelectColumn(ChildTableMap::COL_AGE);
            $criteria->addSelectColumn(ChildTableMap::COL_GENDER);
            $criteria->addSelectColumn(ChildTableMap::COL_ROOMNUMBER);
            $criteria->addSelectColumn(ChildTableMap::COL_ADOPTED);
            $criteria->addSelectColumn(ChildTableMap::COL_STAFFID);
            $criteria->addSelectColumn(ChildTableMap::COL_DATEENTERED);
            $criteria->addSelectColumn(ChildTableMap::COL_EMERGENCYCONTACT);
            $criteria->addSelectColumn(ChildTableMap::COL_MEDICALRECORDID);
            $criteria->addSelectColumn(ChildTableMap::COL_PERSONALDOCID);
            $criteria->addSelectColumn(ChildTableMap::COL_HEIGHT);
            $criteria->addSelectColumn(ChildTableMap::COL_WEIGHT);
            $criteria->addSelectColumn(ChildTableMap::COL_BIOPARENTID);
            $criteria->addSelectColumn(ChildTableMap::COL_NEWPARENTID);
        } else {
            $criteria->addSelectColumn($alias . '.childId');
            $criteria->addSelectColumn($alias . '.firstName');
            $criteria->addSelectColumn($alias . '.lastName');
            $criteria->addSelectColumn($alias . '.dateOfBirth');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.gender');
            $criteria->addSelectColumn($alias . '.roomNumber');
            $criteria->addSelectColumn($alias . '.adopted');
            $criteria->addSelectColumn($alias . '.staffId');
            $criteria->addSelectColumn($alias . '.dateEntered');
            $criteria->addSelectColumn($alias . '.emergencyContact');
            $criteria->addSelectColumn($alias . '.medicalRecordId');
            $criteria->addSelectColumn($alias . '.personalDocId');
            $criteria->addSelectColumn($alias . '.height');
            $criteria->addSelectColumn($alias . '.weight');
            $criteria->addSelectColumn($alias . '.bioParentId');
            $criteria->addSelectColumn($alias . '.newParentId');
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
        return Propel::getServiceContainer()->getDatabaseMap(ChildTableMap::DATABASE_NAME)->getTable(ChildTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ChildTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ChildTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ChildTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Child or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Child object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ChildTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Child) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ChildTableMap::DATABASE_NAME);
            $criteria->add(ChildTableMap::COL_CHILDID, (array) $values, Criteria::IN);
        }

        $query = ChildQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ChildTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ChildTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the child table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ChildQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Child or Criteria object.
     *
     * @param mixed               $criteria Criteria or Child object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChildTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Child object
        }

        if ($criteria->containsKey(ChildTableMap::COL_CHILDID) && $criteria->keyContainsValue(ChildTableMap::COL_CHILDID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ChildTableMap::COL_CHILDID.')');
        }


        // Set the correct dbName
        $query = ChildQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ChildTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ChildTableMap::buildTableMap();
