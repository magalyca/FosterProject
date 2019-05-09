<?php

namespace Base;

use \Necessities as ChildNecessities;
use \NecessitiesQuery as ChildNecessitiesQuery;
use \Exception;
use \PDO;
use Map\NecessitiesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'necessities' table.
 *
 *
 *
 * @method     ChildNecessitiesQuery orderByNecessitiesid($order = Criteria::ASC) Order by the necessitiesId column
 * @method     ChildNecessitiesQuery orderByItemname($order = Criteria::ASC) Order by the itemName column
 * @method     ChildNecessitiesQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 *
 * @method     ChildNecessitiesQuery groupByNecessitiesid() Group by the necessitiesId column
 * @method     ChildNecessitiesQuery groupByItemname() Group by the itemName column
 * @method     ChildNecessitiesQuery groupByQuantity() Group by the quantity column
 *
 * @method     ChildNecessitiesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNecessitiesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNecessitiesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNecessitiesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNecessitiesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNecessitiesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNecessities findOne(ConnectionInterface $con = null) Return the first ChildNecessities matching the query
 * @method     ChildNecessities findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNecessities matching the query, or a new ChildNecessities object populated from the query conditions when no match is found
 *
 * @method     ChildNecessities findOneByNecessitiesid(int $necessitiesId) Return the first ChildNecessities filtered by the necessitiesId column
 * @method     ChildNecessities findOneByItemname(string $itemName) Return the first ChildNecessities filtered by the itemName column
 * @method     ChildNecessities findOneByQuantity(int $quantity) Return the first ChildNecessities filtered by the quantity column *

 * @method     ChildNecessities requirePk($key, ConnectionInterface $con = null) Return the ChildNecessities by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNecessities requireOne(ConnectionInterface $con = null) Return the first ChildNecessities matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNecessities requireOneByNecessitiesid(int $necessitiesId) Return the first ChildNecessities filtered by the necessitiesId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNecessities requireOneByItemname(string $itemName) Return the first ChildNecessities filtered by the itemName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNecessities requireOneByQuantity(int $quantity) Return the first ChildNecessities filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNecessities[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNecessities objects based on current ModelCriteria
 * @method     ChildNecessities[]|ObjectCollection findByNecessitiesid(int $necessitiesId) Return ChildNecessities objects filtered by the necessitiesId column
 * @method     ChildNecessities[]|ObjectCollection findByItemname(string $itemName) Return ChildNecessities objects filtered by the itemName column
 * @method     ChildNecessities[]|ObjectCollection findByQuantity(int $quantity) Return ChildNecessities objects filtered by the quantity column
 * @method     ChildNecessities[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NecessitiesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NecessitiesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Necessities', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNecessitiesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNecessitiesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNecessitiesQuery) {
            return $criteria;
        }
        $query = new ChildNecessitiesQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildNecessities|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NecessitiesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NecessitiesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNecessities A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT necessitiesId, itemName, quantity FROM necessities WHERE necessitiesId = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildNecessities $obj */
            $obj = new ChildNecessities();
            $obj->hydrate($row);
            NecessitiesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildNecessities|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildNecessitiesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NecessitiesTableMap::COL_NECESSITIESID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNecessitiesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NecessitiesTableMap::COL_NECESSITIESID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the necessitiesId column
     *
     * Example usage:
     * <code>
     * $query->filterByNecessitiesid(1234); // WHERE necessitiesId = 1234
     * $query->filterByNecessitiesid(array(12, 34)); // WHERE necessitiesId IN (12, 34)
     * $query->filterByNecessitiesid(array('min' => 12)); // WHERE necessitiesId > 12
     * </code>
     *
     * @param     mixed $necessitiesid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNecessitiesQuery The current query, for fluid interface
     */
    public function filterByNecessitiesid($necessitiesid = null, $comparison = null)
    {
        if (is_array($necessitiesid)) {
            $useMinMax = false;
            if (isset($necessitiesid['min'])) {
                $this->addUsingAlias(NecessitiesTableMap::COL_NECESSITIESID, $necessitiesid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($necessitiesid['max'])) {
                $this->addUsingAlias(NecessitiesTableMap::COL_NECESSITIESID, $necessitiesid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NecessitiesTableMap::COL_NECESSITIESID, $necessitiesid, $comparison);
    }

    /**
     * Filter the query on the itemName column
     *
     * Example usage:
     * <code>
     * $query->filterByItemname('fooValue');   // WHERE itemName = 'fooValue'
     * $query->filterByItemname('%fooValue%', Criteria::LIKE); // WHERE itemName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNecessitiesQuery The current query, for fluid interface
     */
    public function filterByItemname($itemname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NecessitiesTableMap::COL_ITEMNAME, $itemname, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNecessitiesQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(NecessitiesTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(NecessitiesTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NecessitiesTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNecessities $necessities Object to remove from the list of results
     *
     * @return $this|ChildNecessitiesQuery The current query, for fluid interface
     */
    public function prune($necessities = null)
    {
        if ($necessities) {
            $this->addUsingAlias(NecessitiesTableMap::COL_NECESSITIESID, $necessities->getNecessitiesid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the necessities table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NecessitiesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NecessitiesTableMap::clearInstancePool();
            NecessitiesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NecessitiesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NecessitiesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NecessitiesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NecessitiesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NecessitiesQuery
