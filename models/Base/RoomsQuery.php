<?php

namespace Base;

use \Rooms as ChildRooms;
use \RoomsQuery as ChildRoomsQuery;
use \Exception;
use \PDO;
use Map\RoomsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'rooms' table.
 *
 *
 *
 * @method     ChildRoomsQuery orderByRoomid($order = Criteria::ASC) Order by the roomId column
 * @method     ChildRoomsQuery orderByBuilding($order = Criteria::ASC) Order by the building column
 * @method     ChildRoomsQuery orderByFloor($order = Criteria::ASC) Order by the floor column
 * @method     ChildRoomsQuery orderByRoomnum($order = Criteria::ASC) Order by the roomNum column
 * @method     ChildRoomsQuery orderByCapacity($order = Criteria::ASC) Order by the capacity column
 * @method     ChildRoomsQuery orderByChildid($order = Criteria::ASC) Order by the childId column
 *
 * @method     ChildRoomsQuery groupByRoomid() Group by the roomId column
 * @method     ChildRoomsQuery groupByBuilding() Group by the building column
 * @method     ChildRoomsQuery groupByFloor() Group by the floor column
 * @method     ChildRoomsQuery groupByRoomnum() Group by the roomNum column
 * @method     ChildRoomsQuery groupByCapacity() Group by the capacity column
 * @method     ChildRoomsQuery groupByChildid() Group by the childId column
 *
 * @method     ChildRoomsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRoomsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRoomsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRoomsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRoomsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRoomsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRoomsQuery leftJoinChild($relationAlias = null) Adds a LEFT JOIN clause to the query using the Child relation
 * @method     ChildRoomsQuery rightJoinChild($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Child relation
 * @method     ChildRoomsQuery innerJoinChild($relationAlias = null) Adds a INNER JOIN clause to the query using the Child relation
 *
 * @method     ChildRoomsQuery joinWithChild($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Child relation
 *
 * @method     ChildRoomsQuery leftJoinWithChild() Adds a LEFT JOIN clause and with to the query using the Child relation
 * @method     ChildRoomsQuery rightJoinWithChild() Adds a RIGHT JOIN clause and with to the query using the Child relation
 * @method     ChildRoomsQuery innerJoinWithChild() Adds a INNER JOIN clause and with to the query using the Child relation
 *
 * @method     \ChildQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRooms findOne(ConnectionInterface $con = null) Return the first ChildRooms matching the query
 * @method     ChildRooms findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRooms matching the query, or a new ChildRooms object populated from the query conditions when no match is found
 *
 * @method     ChildRooms findOneByRoomid(int $roomId) Return the first ChildRooms filtered by the roomId column
 * @method     ChildRooms findOneByBuilding(string $building) Return the first ChildRooms filtered by the building column
 * @method     ChildRooms findOneByFloor(int $floor) Return the first ChildRooms filtered by the floor column
 * @method     ChildRooms findOneByRoomnum(int $roomNum) Return the first ChildRooms filtered by the roomNum column
 * @method     ChildRooms findOneByCapacity(int $capacity) Return the first ChildRooms filtered by the capacity column
 * @method     ChildRooms findOneByChildid(int $childId) Return the first ChildRooms filtered by the childId column *

 * @method     ChildRooms requirePk($key, ConnectionInterface $con = null) Return the ChildRooms by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRooms requireOne(ConnectionInterface $con = null) Return the first ChildRooms matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRooms requireOneByRoomid(int $roomId) Return the first ChildRooms filtered by the roomId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRooms requireOneByBuilding(string $building) Return the first ChildRooms filtered by the building column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRooms requireOneByFloor(int $floor) Return the first ChildRooms filtered by the floor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRooms requireOneByRoomnum(int $roomNum) Return the first ChildRooms filtered by the roomNum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRooms requireOneByCapacity(int $capacity) Return the first ChildRooms filtered by the capacity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRooms requireOneByChildid(int $childId) Return the first ChildRooms filtered by the childId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRooms[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRooms objects based on current ModelCriteria
 * @method     ChildRooms[]|ObjectCollection findByRoomid(int $roomId) Return ChildRooms objects filtered by the roomId column
 * @method     ChildRooms[]|ObjectCollection findByBuilding(string $building) Return ChildRooms objects filtered by the building column
 * @method     ChildRooms[]|ObjectCollection findByFloor(int $floor) Return ChildRooms objects filtered by the floor column
 * @method     ChildRooms[]|ObjectCollection findByRoomnum(int $roomNum) Return ChildRooms objects filtered by the roomNum column
 * @method     ChildRooms[]|ObjectCollection findByCapacity(int $capacity) Return ChildRooms objects filtered by the capacity column
 * @method     ChildRooms[]|ObjectCollection findByChildid(int $childId) Return ChildRooms objects filtered by the childId column
 * @method     ChildRooms[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RoomsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RoomsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Rooms', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRoomsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRoomsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRoomsQuery) {
            return $criteria;
        }
        $query = new ChildRoomsQuery();
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
     * @return ChildRooms|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RoomsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RoomsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildRooms A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT roomId, building, floor, roomNum, capacity, childId FROM rooms WHERE roomId = :p0';
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
            /** @var ChildRooms $obj */
            $obj = new ChildRooms();
            $obj->hydrate($row);
            RoomsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildRooms|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RoomsTableMap::COL_ROOMID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RoomsTableMap::COL_ROOMID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the roomId column
     *
     * Example usage:
     * <code>
     * $query->filterByRoomid(1234); // WHERE roomId = 1234
     * $query->filterByRoomid(array(12, 34)); // WHERE roomId IN (12, 34)
     * $query->filterByRoomid(array('min' => 12)); // WHERE roomId > 12
     * </code>
     *
     * @param     mixed $roomid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByRoomid($roomid = null, $comparison = null)
    {
        if (is_array($roomid)) {
            $useMinMax = false;
            if (isset($roomid['min'])) {
                $this->addUsingAlias(RoomsTableMap::COL_ROOMID, $roomid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roomid['max'])) {
                $this->addUsingAlias(RoomsTableMap::COL_ROOMID, $roomid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoomsTableMap::COL_ROOMID, $roomid, $comparison);
    }

    /**
     * Filter the query on the building column
     *
     * Example usage:
     * <code>
     * $query->filterByBuilding('fooValue');   // WHERE building = 'fooValue'
     * $query->filterByBuilding('%fooValue%', Criteria::LIKE); // WHERE building LIKE '%fooValue%'
     * </code>
     *
     * @param     string $building The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByBuilding($building = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($building)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoomsTableMap::COL_BUILDING, $building, $comparison);
    }

    /**
     * Filter the query on the floor column
     *
     * Example usage:
     * <code>
     * $query->filterByFloor(1234); // WHERE floor = 1234
     * $query->filterByFloor(array(12, 34)); // WHERE floor IN (12, 34)
     * $query->filterByFloor(array('min' => 12)); // WHERE floor > 12
     * </code>
     *
     * @param     mixed $floor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByFloor($floor = null, $comparison = null)
    {
        if (is_array($floor)) {
            $useMinMax = false;
            if (isset($floor['min'])) {
                $this->addUsingAlias(RoomsTableMap::COL_FLOOR, $floor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($floor['max'])) {
                $this->addUsingAlias(RoomsTableMap::COL_FLOOR, $floor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoomsTableMap::COL_FLOOR, $floor, $comparison);
    }

    /**
     * Filter the query on the roomNum column
     *
     * Example usage:
     * <code>
     * $query->filterByRoomnum(1234); // WHERE roomNum = 1234
     * $query->filterByRoomnum(array(12, 34)); // WHERE roomNum IN (12, 34)
     * $query->filterByRoomnum(array('min' => 12)); // WHERE roomNum > 12
     * </code>
     *
     * @param     mixed $roomnum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByRoomnum($roomnum = null, $comparison = null)
    {
        if (is_array($roomnum)) {
            $useMinMax = false;
            if (isset($roomnum['min'])) {
                $this->addUsingAlias(RoomsTableMap::COL_ROOMNUM, $roomnum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roomnum['max'])) {
                $this->addUsingAlias(RoomsTableMap::COL_ROOMNUM, $roomnum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoomsTableMap::COL_ROOMNUM, $roomnum, $comparison);
    }

    /**
     * Filter the query on the capacity column
     *
     * Example usage:
     * <code>
     * $query->filterByCapacity(1234); // WHERE capacity = 1234
     * $query->filterByCapacity(array(12, 34)); // WHERE capacity IN (12, 34)
     * $query->filterByCapacity(array('min' => 12)); // WHERE capacity > 12
     * </code>
     *
     * @param     mixed $capacity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByCapacity($capacity = null, $comparison = null)
    {
        if (is_array($capacity)) {
            $useMinMax = false;
            if (isset($capacity['min'])) {
                $this->addUsingAlias(RoomsTableMap::COL_CAPACITY, $capacity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($capacity['max'])) {
                $this->addUsingAlias(RoomsTableMap::COL_CAPACITY, $capacity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoomsTableMap::COL_CAPACITY, $capacity, $comparison);
    }

    /**
     * Filter the query on the childId column
     *
     * Example usage:
     * <code>
     * $query->filterByChildid(1234); // WHERE childId = 1234
     * $query->filterByChildid(array(12, 34)); // WHERE childId IN (12, 34)
     * $query->filterByChildid(array('min' => 12)); // WHERE childId > 12
     * </code>
     *
     * @see       filterByChild()
     *
     * @param     mixed $childid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByChildid($childid = null, $comparison = null)
    {
        if (is_array($childid)) {
            $useMinMax = false;
            if (isset($childid['min'])) {
                $this->addUsingAlias(RoomsTableMap::COL_CHILDID, $childid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($childid['max'])) {
                $this->addUsingAlias(RoomsTableMap::COL_CHILDID, $childid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RoomsTableMap::COL_CHILDID, $childid, $comparison);
    }

    /**
     * Filter the query by a related \Child object
     *
     * @param \Child|ObjectCollection $child The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRoomsQuery The current query, for fluid interface
     */
    public function filterByChild($child, $comparison = null)
    {
        if ($child instanceof \Child) {
            return $this
                ->addUsingAlias(RoomsTableMap::COL_CHILDID, $child->getChildid(), $comparison);
        } elseif ($child instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RoomsTableMap::COL_CHILDID, $child->toKeyValue('PrimaryKey', 'Childid'), $comparison);
        } else {
            throw new PropelException('filterByChild() only accepts arguments of type \Child or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Child relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function joinChild($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Child');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Child');
        }

        return $this;
    }

    /**
     * Use the Child relation Child object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ChildQuery A secondary query class using the current class as primary query
     */
    public function useChildQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinChild($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Child', '\ChildQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRooms $rooms Object to remove from the list of results
     *
     * @return $this|ChildRoomsQuery The current query, for fluid interface
     */
    public function prune($rooms = null)
    {
        if ($rooms) {
            $this->addUsingAlias(RoomsTableMap::COL_ROOMID, $rooms->getRoomid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the rooms table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RoomsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RoomsTableMap::clearInstancePool();
            RoomsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RoomsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RoomsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RoomsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RoomsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RoomsQuery
