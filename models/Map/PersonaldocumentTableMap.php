<?php

namespace Map;

use \Personaldocument;
use \PersonaldocumentQuery;
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
 * This class defines the structure of the 'personaldocument' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PersonaldocumentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PersonaldocumentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'personaldocument';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Personaldocument';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Personaldocument';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the documentId field
     */
    const COL_DOCUMENTID = 'personaldocument.documentId';

    /**
     * the column name for the childId field
     */
    const COL_CHILDID = 'personaldocument.childId';

    /**
     * the column name for the docType field
     */
    const COL_DOCTYPE = 'personaldocument.docType';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'personaldocument.description';

    /**
     * the column name for the dateEntered field
     */
    const COL_DATEENTERED = 'personaldocument.dateEntered';

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
        self::TYPE_PHPNAME       => array('Documentid', 'Childid', 'Doctype', 'Description', 'Dateentered', ),
        self::TYPE_CAMELNAME     => array('documentid', 'childid', 'doctype', 'description', 'dateentered', ),
        self::TYPE_COLNAME       => array(PersonaldocumentTableMap::COL_DOCUMENTID, PersonaldocumentTableMap::COL_CHILDID, PersonaldocumentTableMap::COL_DOCTYPE, PersonaldocumentTableMap::COL_DESCRIPTION, PersonaldocumentTableMap::COL_DATEENTERED, ),
        self::TYPE_FIELDNAME     => array('documentId', 'childId', 'docType', 'description', 'dateEntered', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Documentid' => 0, 'Childid' => 1, 'Doctype' => 2, 'Description' => 3, 'Dateentered' => 4, ),
        self::TYPE_CAMELNAME     => array('documentid' => 0, 'childid' => 1, 'doctype' => 2, 'description' => 3, 'dateentered' => 4, ),
        self::TYPE_COLNAME       => array(PersonaldocumentTableMap::COL_DOCUMENTID => 0, PersonaldocumentTableMap::COL_CHILDID => 1, PersonaldocumentTableMap::COL_DOCTYPE => 2, PersonaldocumentTableMap::COL_DESCRIPTION => 3, PersonaldocumentTableMap::COL_DATEENTERED => 4, ),
        self::TYPE_FIELDNAME     => array('documentId' => 0, 'childId' => 1, 'docType' => 2, 'description' => 3, 'dateEntered' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('personaldocument');
        $this->setPhpName('Personaldocument');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Personaldocument');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('documentId', 'Documentid', 'INTEGER', true, null, null);
        $this->addForeignKey('childId', 'Childid', 'INTEGER', 'child', 'childId', true, null, null);
        $this->addColumn('docType', 'Doctype', 'VARCHAR', true, 64, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 400, null);
        $this->addColumn('dateEntered', 'Dateentered', 'VARCHAR', true, 128, null);
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
        $this->addRelation('Waitingparent', '\\Waitingparent', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':formId',
    1 => ':documentId',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Documentid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Documentid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Documentid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Documentid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Documentid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Documentid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Documentid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? PersonaldocumentTableMap::CLASS_DEFAULT : PersonaldocumentTableMap::OM_CLASS;
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
     * @return array           (Personaldocument object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PersonaldocumentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PersonaldocumentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PersonaldocumentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PersonaldocumentTableMap::OM_CLASS;
            /** @var Personaldocument $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PersonaldocumentTableMap::addInstanceToPool($obj, $key);
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
            $key = PersonaldocumentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PersonaldocumentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Personaldocument $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PersonaldocumentTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PersonaldocumentTableMap::COL_DOCUMENTID);
            $criteria->addSelectColumn(PersonaldocumentTableMap::COL_CHILDID);
            $criteria->addSelectColumn(PersonaldocumentTableMap::COL_DOCTYPE);
            $criteria->addSelectColumn(PersonaldocumentTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(PersonaldocumentTableMap::COL_DATEENTERED);
        } else {
            $criteria->addSelectColumn($alias . '.documentId');
            $criteria->addSelectColumn($alias . '.childId');
            $criteria->addSelectColumn($alias . '.docType');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.dateEntered');
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
        return Propel::getServiceContainer()->getDatabaseMap(PersonaldocumentTableMap::DATABASE_NAME)->getTable(PersonaldocumentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PersonaldocumentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PersonaldocumentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PersonaldocumentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Personaldocument or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Personaldocument object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaldocumentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Personaldocument) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PersonaldocumentTableMap::DATABASE_NAME);
            $criteria->add(PersonaldocumentTableMap::COL_DOCUMENTID, (array) $values, Criteria::IN);
        }

        $query = PersonaldocumentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PersonaldocumentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PersonaldocumentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the personaldocument table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PersonaldocumentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Personaldocument or Criteria object.
     *
     * @param mixed               $criteria Criteria or Personaldocument object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaldocumentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Personaldocument object
        }

        if ($criteria->containsKey(PersonaldocumentTableMap::COL_DOCUMENTID) && $criteria->keyContainsValue(PersonaldocumentTableMap::COL_DOCUMENTID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PersonaldocumentTableMap::COL_DOCUMENTID.')');
        }


        // Set the correct dbName
        $query = PersonaldocumentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PersonaldocumentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PersonaldocumentTableMap::buildTableMap();
