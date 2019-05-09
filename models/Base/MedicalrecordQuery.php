<?php

namespace Base;

use \Medicalrecord as ChildMedicalrecord;
use \MedicalrecordQuery as ChildMedicalrecordQuery;
use \Exception;
use \PDO;
use Map\MedicalrecordTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'medicalrecord' table.
 *
 *
 *
 * @method     ChildMedicalrecordQuery orderByMedrecordid($order = Criteria::ASC) Order by the medRecordId column
 * @method     ChildMedicalrecordQuery orderByChildid($order = Criteria::ASC) Order by the childId column
 * @method     ChildMedicalrecordQuery orderByRecordtype($order = Criteria::ASC) Order by the recordType column
 * @method     ChildMedicalrecordQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildMedicalrecordQuery orderByDateentered($order = Criteria::ASC) Order by the dateEntered column
 *
 * @method     ChildMedicalrecordQuery groupByMedrecordid() Group by the medRecordId column
 * @method     ChildMedicalrecordQuery groupByChildid() Group by the childId column
 * @method     ChildMedicalrecordQuery groupByRecordtype() Group by the recordType column
 * @method     ChildMedicalrecordQuery groupByDescription() Group by the description column
 * @method     ChildMedicalrecordQuery groupByDateentered() Group by the dateEntered column
 *
 * @method     ChildMedicalrecordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMedicalrecordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMedicalrecordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMedicalrecordQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMedicalrecordQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMedicalrecordQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMedicalrecordQuery leftJoinChild($relationAlias = null) Adds a LEFT JOIN clause to the query using the Child relation
 * @method     ChildMedicalrecordQuery rightJoinChild($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Child relation
 * @method     ChildMedicalrecordQuery innerJoinChild($relationAlias = null) Adds a INNER JOIN clause to the query using the Child relation
 *
 * @method     ChildMedicalrecordQuery joinWithChild($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Child relation
 *
 * @method     ChildMedicalrecordQuery leftJoinWithChild() Adds a LEFT JOIN clause and with to the query using the Child relation
 * @method     ChildMedicalrecordQuery rightJoinWithChild() Adds a RIGHT JOIN clause and with to the query using the Child relation
 * @method     ChildMedicalrecordQuery innerJoinWithChild() Adds a INNER JOIN clause and with to the query using the Child relation
 *
 * @method     \ChildQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMedicalrecord findOne(ConnectionInterface $con = null) Return the first ChildMedicalrecord matching the query
 * @method     ChildMedicalrecord findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMedicalrecord matching the query, or a new ChildMedicalrecord object populated from the query conditions when no match is found
 *
 * @method     ChildMedicalrecord findOneByMedrecordid(int $medRecordId) Return the first ChildMedicalrecord filtered by the medRecordId column
 * @method     ChildMedicalrecord findOneByChildid(int $childId) Return the first ChildMedicalrecord filtered by the childId column
 * @method     ChildMedicalrecord findOneByRecordtype(string $recordType) Return the first ChildMedicalrecord filtered by the recordType column
 * @method     ChildMedicalrecord findOneByDescription(string $description) Return the first ChildMedicalrecord filtered by the description column
 * @method     ChildMedicalrecord findOneByDateentered(string $dateEntered) Return the first ChildMedicalrecord filtered by the dateEntered column *

 * @method     ChildMedicalrecord requirePk($key, ConnectionInterface $con = null) Return the ChildMedicalrecord by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedicalrecord requireOne(ConnectionInterface $con = null) Return the first ChildMedicalrecord matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMedicalrecord requireOneByMedrecordid(int $medRecordId) Return the first ChildMedicalrecord filtered by the medRecordId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedicalrecord requireOneByChildid(int $childId) Return the first ChildMedicalrecord filtered by the childId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedicalrecord requireOneByRecordtype(string $recordType) Return the first ChildMedicalrecord filtered by the recordType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedicalrecord requireOneByDescription(string $description) Return the first ChildMedicalrecord filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMedicalrecord requireOneByDateentered(string $dateEntered) Return the first ChildMedicalrecord filtered by the dateEntered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMedicalrecord[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMedicalrecord objects based on current ModelCriteria
 * @method     ChildMedicalrecord[]|ObjectCollection findByMedrecordid(int $medRecordId) Return ChildMedicalrecord objects filtered by the medRecordId column
 * @method     ChildMedicalrecord[]|ObjectCollection findByChildid(int $childId) Return ChildMedicalrecord objects filtered by the childId column
 * @method     ChildMedicalrecord[]|ObjectCollection findByRecordtype(string $recordType) Return ChildMedicalrecord objects filtered by the recordType column
 * @method     ChildMedicalrecord[]|ObjectCollection findByDescription(string $description) Return ChildMedicalrecord objects filtered by the description column
 * @method     ChildMedicalrecord[]|ObjectCollection findByDateentered(string $dateEntered) Return ChildMedicalrecord objects filtered by the dateEntered column
 * @method     ChildMedicalrecord[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MedicalrecordQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MedicalrecordQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Medicalrecord', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMedicalrecordQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMedicalrecordQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMedicalrecordQuery) {
            return $criteria;
        }
        $query = new ChildMedicalrecordQuery();
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
     * @return ChildMedicalrecord|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MedicalrecordTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MedicalrecordTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMedicalrecord A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT medRecordId, childId, recordType, description, dateEntered FROM medicalrecord WHERE medRecordId = :p0';
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
            /** @var ChildMedicalrecord $obj */
            $obj = new ChildMedicalrecord();
            $obj->hydrate($row);
            MedicalrecordTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMedicalrecord|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MedicalrecordTableMap::COL_MEDRECORDID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MedicalrecordTableMap::COL_MEDRECORDID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the medRecordId column
     *
     * Example usage:
     * <code>
     * $query->filterByMedrecordid(1234); // WHERE medRecordId = 1234
     * $query->filterByMedrecordid(array(12, 34)); // WHERE medRecordId IN (12, 34)
     * $query->filterByMedrecordid(array('min' => 12)); // WHERE medRecordId > 12
     * </code>
     *
     * @param     mixed $medrecordid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function filterByMedrecordid($medrecordid = null, $comparison = null)
    {
        if (is_array($medrecordid)) {
            $useMinMax = false;
            if (isset($medrecordid['min'])) {
                $this->addUsingAlias(MedicalrecordTableMap::COL_MEDRECORDID, $medrecordid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($medrecordid['max'])) {
                $this->addUsingAlias(MedicalrecordTableMap::COL_MEDRECORDID, $medrecordid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalrecordTableMap::COL_MEDRECORDID, $medrecordid, $comparison);
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
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function filterByChildid($childid = null, $comparison = null)
    {
        if (is_array($childid)) {
            $useMinMax = false;
            if (isset($childid['min'])) {
                $this->addUsingAlias(MedicalrecordTableMap::COL_CHILDID, $childid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($childid['max'])) {
                $this->addUsingAlias(MedicalrecordTableMap::COL_CHILDID, $childid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalrecordTableMap::COL_CHILDID, $childid, $comparison);
    }

    /**
     * Filter the query on the recordType column
     *
     * Example usage:
     * <code>
     * $query->filterByRecordtype('fooValue');   // WHERE recordType = 'fooValue'
     * $query->filterByRecordtype('%fooValue%', Criteria::LIKE); // WHERE recordType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $recordtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function filterByRecordtype($recordtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($recordtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalrecordTableMap::COL_RECORDTYPE, $recordtype, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalrecordTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the dateEntered column
     *
     * Example usage:
     * <code>
     * $query->filterByDateentered('fooValue');   // WHERE dateEntered = 'fooValue'
     * $query->filterByDateentered('%fooValue%', Criteria::LIKE); // WHERE dateEntered LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateentered The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function filterByDateentered($dateentered = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateentered)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalrecordTableMap::COL_DATEENTERED, $dateentered, $comparison);
    }

    /**
     * Filter the query by a related \Child object
     *
     * @param \Child|ObjectCollection $child The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function filterByChild($child, $comparison = null)
    {
        if ($child instanceof \Child) {
            return $this
                ->addUsingAlias(MedicalrecordTableMap::COL_CHILDID, $child->getChildid(), $comparison);
        } elseif ($child instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MedicalrecordTableMap::COL_CHILDID, $child->toKeyValue('PrimaryKey', 'Childid'), $comparison);
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
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
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
     * @param   ChildMedicalrecord $medicalrecord Object to remove from the list of results
     *
     * @return $this|ChildMedicalrecordQuery The current query, for fluid interface
     */
    public function prune($medicalrecord = null)
    {
        if ($medicalrecord) {
            $this->addUsingAlias(MedicalrecordTableMap::COL_MEDRECORDID, $medicalrecord->getMedrecordid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the medicalrecord table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MedicalrecordTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MedicalrecordTableMap::clearInstancePool();
            MedicalrecordTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MedicalrecordTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MedicalrecordTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MedicalrecordTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MedicalrecordTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MedicalrecordQuery
