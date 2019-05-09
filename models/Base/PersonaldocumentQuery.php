<?php

namespace Base;

use \Personaldocument as ChildPersonaldocument;
use \PersonaldocumentQuery as ChildPersonaldocumentQuery;
use \Exception;
use \PDO;
use Map\PersonaldocumentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'personaldocument' table.
 *
 *
 *
 * @method     ChildPersonaldocumentQuery orderByDocumentid($order = Criteria::ASC) Order by the documentId column
 * @method     ChildPersonaldocumentQuery orderByChildid($order = Criteria::ASC) Order by the childId column
 * @method     ChildPersonaldocumentQuery orderByDoctype($order = Criteria::ASC) Order by the docType column
 * @method     ChildPersonaldocumentQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildPersonaldocumentQuery orderByDateentered($order = Criteria::ASC) Order by the dateEntered column
 *
 * @method     ChildPersonaldocumentQuery groupByDocumentid() Group by the documentId column
 * @method     ChildPersonaldocumentQuery groupByChildid() Group by the childId column
 * @method     ChildPersonaldocumentQuery groupByDoctype() Group by the docType column
 * @method     ChildPersonaldocumentQuery groupByDescription() Group by the description column
 * @method     ChildPersonaldocumentQuery groupByDateentered() Group by the dateEntered column
 *
 * @method     ChildPersonaldocumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPersonaldocumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPersonaldocumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPersonaldocumentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPersonaldocumentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPersonaldocumentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPersonaldocumentQuery leftJoinChild($relationAlias = null) Adds a LEFT JOIN clause to the query using the Child relation
 * @method     ChildPersonaldocumentQuery rightJoinChild($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Child relation
 * @method     ChildPersonaldocumentQuery innerJoinChild($relationAlias = null) Adds a INNER JOIN clause to the query using the Child relation
 *
 * @method     ChildPersonaldocumentQuery joinWithChild($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Child relation
 *
 * @method     ChildPersonaldocumentQuery leftJoinWithChild() Adds a LEFT JOIN clause and with to the query using the Child relation
 * @method     ChildPersonaldocumentQuery rightJoinWithChild() Adds a RIGHT JOIN clause and with to the query using the Child relation
 * @method     ChildPersonaldocumentQuery innerJoinWithChild() Adds a INNER JOIN clause and with to the query using the Child relation
 *
 * @method     ChildPersonaldocumentQuery leftJoinWaitingparent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Waitingparent relation
 * @method     ChildPersonaldocumentQuery rightJoinWaitingparent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Waitingparent relation
 * @method     ChildPersonaldocumentQuery innerJoinWaitingparent($relationAlias = null) Adds a INNER JOIN clause to the query using the Waitingparent relation
 *
 * @method     ChildPersonaldocumentQuery joinWithWaitingparent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Waitingparent relation
 *
 * @method     ChildPersonaldocumentQuery leftJoinWithWaitingparent() Adds a LEFT JOIN clause and with to the query using the Waitingparent relation
 * @method     ChildPersonaldocumentQuery rightJoinWithWaitingparent() Adds a RIGHT JOIN clause and with to the query using the Waitingparent relation
 * @method     ChildPersonaldocumentQuery innerJoinWithWaitingparent() Adds a INNER JOIN clause and with to the query using the Waitingparent relation
 *
 * @method     \ChildQuery|\WaitingparentQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPersonaldocument findOne(ConnectionInterface $con = null) Return the first ChildPersonaldocument matching the query
 * @method     ChildPersonaldocument findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPersonaldocument matching the query, or a new ChildPersonaldocument object populated from the query conditions when no match is found
 *
 * @method     ChildPersonaldocument findOneByDocumentid(int $documentId) Return the first ChildPersonaldocument filtered by the documentId column
 * @method     ChildPersonaldocument findOneByChildid(int $childId) Return the first ChildPersonaldocument filtered by the childId column
 * @method     ChildPersonaldocument findOneByDoctype(string $docType) Return the first ChildPersonaldocument filtered by the docType column
 * @method     ChildPersonaldocument findOneByDescription(string $description) Return the first ChildPersonaldocument filtered by the description column
 * @method     ChildPersonaldocument findOneByDateentered(string $dateEntered) Return the first ChildPersonaldocument filtered by the dateEntered column *

 * @method     ChildPersonaldocument requirePk($key, ConnectionInterface $con = null) Return the ChildPersonaldocument by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonaldocument requireOne(ConnectionInterface $con = null) Return the first ChildPersonaldocument matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersonaldocument requireOneByDocumentid(int $documentId) Return the first ChildPersonaldocument filtered by the documentId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonaldocument requireOneByChildid(int $childId) Return the first ChildPersonaldocument filtered by the childId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonaldocument requireOneByDoctype(string $docType) Return the first ChildPersonaldocument filtered by the docType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonaldocument requireOneByDescription(string $description) Return the first ChildPersonaldocument filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonaldocument requireOneByDateentered(string $dateEntered) Return the first ChildPersonaldocument filtered by the dateEntered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersonaldocument[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPersonaldocument objects based on current ModelCriteria
 * @method     ChildPersonaldocument[]|ObjectCollection findByDocumentid(int $documentId) Return ChildPersonaldocument objects filtered by the documentId column
 * @method     ChildPersonaldocument[]|ObjectCollection findByChildid(int $childId) Return ChildPersonaldocument objects filtered by the childId column
 * @method     ChildPersonaldocument[]|ObjectCollection findByDoctype(string $docType) Return ChildPersonaldocument objects filtered by the docType column
 * @method     ChildPersonaldocument[]|ObjectCollection findByDescription(string $description) Return ChildPersonaldocument objects filtered by the description column
 * @method     ChildPersonaldocument[]|ObjectCollection findByDateentered(string $dateEntered) Return ChildPersonaldocument objects filtered by the dateEntered column
 * @method     ChildPersonaldocument[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PersonaldocumentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PersonaldocumentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Personaldocument', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPersonaldocumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPersonaldocumentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPersonaldocumentQuery) {
            return $criteria;
        }
        $query = new ChildPersonaldocumentQuery();
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
     * @return ChildPersonaldocument|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PersonaldocumentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PersonaldocumentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPersonaldocument A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT documentId, childId, docType, description, dateEntered FROM personaldocument WHERE documentId = :p0';
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
            /** @var ChildPersonaldocument $obj */
            $obj = new ChildPersonaldocument();
            $obj->hydrate($row);
            PersonaldocumentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPersonaldocument|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonaldocumentTableMap::COL_DOCUMENTID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonaldocumentTableMap::COL_DOCUMENTID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the documentId column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentid(1234); // WHERE documentId = 1234
     * $query->filterByDocumentid(array(12, 34)); // WHERE documentId IN (12, 34)
     * $query->filterByDocumentid(array('min' => 12)); // WHERE documentId > 12
     * </code>
     *
     * @param     mixed $documentid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByDocumentid($documentid = null, $comparison = null)
    {
        if (is_array($documentid)) {
            $useMinMax = false;
            if (isset($documentid['min'])) {
                $this->addUsingAlias(PersonaldocumentTableMap::COL_DOCUMENTID, $documentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documentid['max'])) {
                $this->addUsingAlias(PersonaldocumentTableMap::COL_DOCUMENTID, $documentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaldocumentTableMap::COL_DOCUMENTID, $documentid, $comparison);
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
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByChildid($childid = null, $comparison = null)
    {
        if (is_array($childid)) {
            $useMinMax = false;
            if (isset($childid['min'])) {
                $this->addUsingAlias(PersonaldocumentTableMap::COL_CHILDID, $childid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($childid['max'])) {
                $this->addUsingAlias(PersonaldocumentTableMap::COL_CHILDID, $childid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaldocumentTableMap::COL_CHILDID, $childid, $comparison);
    }

    /**
     * Filter the query on the docType column
     *
     * Example usage:
     * <code>
     * $query->filterByDoctype('fooValue');   // WHERE docType = 'fooValue'
     * $query->filterByDoctype('%fooValue%', Criteria::LIKE); // WHERE docType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $doctype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByDoctype($doctype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($doctype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaldocumentTableMap::COL_DOCTYPE, $doctype, $comparison);
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
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaldocumentTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByDateentered($dateentered = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateentered)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonaldocumentTableMap::COL_DATEENTERED, $dateentered, $comparison);
    }

    /**
     * Filter the query by a related \Child object
     *
     * @param \Child|ObjectCollection $child The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByChild($child, $comparison = null)
    {
        if ($child instanceof \Child) {
            return $this
                ->addUsingAlias(PersonaldocumentTableMap::COL_CHILDID, $child->getChildid(), $comparison);
        } elseif ($child instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonaldocumentTableMap::COL_CHILDID, $child->toKeyValue('PrimaryKey', 'Childid'), $comparison);
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
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
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
     * Filter the query by a related \Waitingparent object
     *
     * @param \Waitingparent|ObjectCollection $waitingparent the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function filterByWaitingparent($waitingparent, $comparison = null)
    {
        if ($waitingparent instanceof \Waitingparent) {
            return $this
                ->addUsingAlias(PersonaldocumentTableMap::COL_DOCUMENTID, $waitingparent->getFormid(), $comparison);
        } elseif ($waitingparent instanceof ObjectCollection) {
            return $this
                ->useWaitingparentQuery()
                ->filterByPrimaryKeys($waitingparent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWaitingparent() only accepts arguments of type \Waitingparent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Waitingparent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function joinWaitingparent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Waitingparent');

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
            $this->addJoinObject($join, 'Waitingparent');
        }

        return $this;
    }

    /**
     * Use the Waitingparent relation Waitingparent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \WaitingparentQuery A secondary query class using the current class as primary query
     */
    public function useWaitingparentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWaitingparent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Waitingparent', '\WaitingparentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPersonaldocument $personaldocument Object to remove from the list of results
     *
     * @return $this|ChildPersonaldocumentQuery The current query, for fluid interface
     */
    public function prune($personaldocument = null)
    {
        if ($personaldocument) {
            $this->addUsingAlias(PersonaldocumentTableMap::COL_DOCUMENTID, $personaldocument->getDocumentid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the personaldocument table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaldocumentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersonaldocumentTableMap::clearInstancePool();
            PersonaldocumentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PersonaldocumentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PersonaldocumentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PersonaldocumentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PersonaldocumentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PersonaldocumentQuery
