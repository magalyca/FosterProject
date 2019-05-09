<?php

namespace Base;

use \Biologicalparent as ChildBiologicalparent;
use \BiologicalparentQuery as ChildBiologicalparentQuery;
use \Exception;
use \PDO;
use Map\BiologicalparentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'biologicalparent' table.
 *
 *
 *
 * @method     ChildBiologicalparentQuery orderByBioparentid($order = Criteria::ASC) Order by the bioParentId column
 * @method     ChildBiologicalparentQuery orderByFirstname($order = Criteria::ASC) Order by the firstName column
 * @method     ChildBiologicalparentQuery orderByLastname($order = Criteria::ASC) Order by the lastName column
 * @method     ChildBiologicalparentQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildBiologicalparentQuery orderByChildname($order = Criteria::ASC) Order by the childName column
 * @method     ChildBiologicalparentQuery orderByAlive($order = Criteria::ASC) Order by the alive column
 * @method     ChildBiologicalparentQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     ChildBiologicalparentQuery groupByBioparentid() Group by the bioParentId column
 * @method     ChildBiologicalparentQuery groupByFirstname() Group by the firstName column
 * @method     ChildBiologicalparentQuery groupByLastname() Group by the lastName column
 * @method     ChildBiologicalparentQuery groupByGender() Group by the gender column
 * @method     ChildBiologicalparentQuery groupByChildname() Group by the childName column
 * @method     ChildBiologicalparentQuery groupByAlive() Group by the alive column
 * @method     ChildBiologicalparentQuery groupByDescription() Group by the description column
 *
 * @method     ChildBiologicalparentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBiologicalparentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBiologicalparentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBiologicalparentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBiologicalparentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBiologicalparentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBiologicalparentQuery leftJoinChild($relationAlias = null) Adds a LEFT JOIN clause to the query using the Child relation
 * @method     ChildBiologicalparentQuery rightJoinChild($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Child relation
 * @method     ChildBiologicalparentQuery innerJoinChild($relationAlias = null) Adds a INNER JOIN clause to the query using the Child relation
 *
 * @method     ChildBiologicalparentQuery joinWithChild($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Child relation
 *
 * @method     ChildBiologicalparentQuery leftJoinWithChild() Adds a LEFT JOIN clause and with to the query using the Child relation
 * @method     ChildBiologicalparentQuery rightJoinWithChild() Adds a RIGHT JOIN clause and with to the query using the Child relation
 * @method     ChildBiologicalparentQuery innerJoinWithChild() Adds a INNER JOIN clause and with to the query using the Child relation
 *
 * @method     \ChildQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBiologicalparent findOne(ConnectionInterface $con = null) Return the first ChildBiologicalparent matching the query
 * @method     ChildBiologicalparent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBiologicalparent matching the query, or a new ChildBiologicalparent object populated from the query conditions when no match is found
 *
 * @method     ChildBiologicalparent findOneByBioparentid(int $bioParentId) Return the first ChildBiologicalparent filtered by the bioParentId column
 * @method     ChildBiologicalparent findOneByFirstname(string $firstName) Return the first ChildBiologicalparent filtered by the firstName column
 * @method     ChildBiologicalparent findOneByLastname(string $lastName) Return the first ChildBiologicalparent filtered by the lastName column
 * @method     ChildBiologicalparent findOneByGender(string $gender) Return the first ChildBiologicalparent filtered by the gender column
 * @method     ChildBiologicalparent findOneByChildname(int $childName) Return the first ChildBiologicalparent filtered by the childName column
 * @method     ChildBiologicalparent findOneByAlive(string $alive) Return the first ChildBiologicalparent filtered by the alive column
 * @method     ChildBiologicalparent findOneByDescription(string $description) Return the first ChildBiologicalparent filtered by the description column *

 * @method     ChildBiologicalparent requirePk($key, ConnectionInterface $con = null) Return the ChildBiologicalparent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBiologicalparent requireOne(ConnectionInterface $con = null) Return the first ChildBiologicalparent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBiologicalparent requireOneByBioparentid(int $bioParentId) Return the first ChildBiologicalparent filtered by the bioParentId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBiologicalparent requireOneByFirstname(string $firstName) Return the first ChildBiologicalparent filtered by the firstName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBiologicalparent requireOneByLastname(string $lastName) Return the first ChildBiologicalparent filtered by the lastName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBiologicalparent requireOneByGender(string $gender) Return the first ChildBiologicalparent filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBiologicalparent requireOneByChildname(int $childName) Return the first ChildBiologicalparent filtered by the childName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBiologicalparent requireOneByAlive(string $alive) Return the first ChildBiologicalparent filtered by the alive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBiologicalparent requireOneByDescription(string $description) Return the first ChildBiologicalparent filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBiologicalparent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBiologicalparent objects based on current ModelCriteria
 * @method     ChildBiologicalparent[]|ObjectCollection findByBioparentid(int $bioParentId) Return ChildBiologicalparent objects filtered by the bioParentId column
 * @method     ChildBiologicalparent[]|ObjectCollection findByFirstname(string $firstName) Return ChildBiologicalparent objects filtered by the firstName column
 * @method     ChildBiologicalparent[]|ObjectCollection findByLastname(string $lastName) Return ChildBiologicalparent objects filtered by the lastName column
 * @method     ChildBiologicalparent[]|ObjectCollection findByGender(string $gender) Return ChildBiologicalparent objects filtered by the gender column
 * @method     ChildBiologicalparent[]|ObjectCollection findByChildname(int $childName) Return ChildBiologicalparent objects filtered by the childName column
 * @method     ChildBiologicalparent[]|ObjectCollection findByAlive(string $alive) Return ChildBiologicalparent objects filtered by the alive column
 * @method     ChildBiologicalparent[]|ObjectCollection findByDescription(string $description) Return ChildBiologicalparent objects filtered by the description column
 * @method     ChildBiologicalparent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BiologicalparentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BiologicalparentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Biologicalparent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBiologicalparentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBiologicalparentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBiologicalparentQuery) {
            return $criteria;
        }
        $query = new ChildBiologicalparentQuery();
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
     * @return ChildBiologicalparent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BiologicalparentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BiologicalparentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBiologicalparent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT bioParentId, firstName, lastName, gender, childName, alive, description FROM biologicalparent WHERE bioParentId = :p0';
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
            /** @var ChildBiologicalparent $obj */
            $obj = new ChildBiologicalparent();
            $obj->hydrate($row);
            BiologicalparentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBiologicalparent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BiologicalparentTableMap::COL_BIOPARENTID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BiologicalparentTableMap::COL_BIOPARENTID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bioParentId column
     *
     * Example usage:
     * <code>
     * $query->filterByBioparentid(1234); // WHERE bioParentId = 1234
     * $query->filterByBioparentid(array(12, 34)); // WHERE bioParentId IN (12, 34)
     * $query->filterByBioparentid(array('min' => 12)); // WHERE bioParentId > 12
     * </code>
     *
     * @param     mixed $bioparentid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByBioparentid($bioparentid = null, $comparison = null)
    {
        if (is_array($bioparentid)) {
            $useMinMax = false;
            if (isset($bioparentid['min'])) {
                $this->addUsingAlias(BiologicalparentTableMap::COL_BIOPARENTID, $bioparentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bioparentid['max'])) {
                $this->addUsingAlias(BiologicalparentTableMap::COL_BIOPARENTID, $bioparentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiologicalparentTableMap::COL_BIOPARENTID, $bioparentid, $comparison);
    }

    /**
     * Filter the query on the firstName column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstName = 'fooValue'
     * $query->filterByFirstname('%fooValue%', Criteria::LIKE); // WHERE firstName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiologicalparentTableMap::COL_FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastName column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastName = 'fooValue'
     * $query->filterByLastname('%fooValue%', Criteria::LIKE); // WHERE lastName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiologicalparentTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the gender column
     *
     * Example usage:
     * <code>
     * $query->filterByGender('fooValue');   // WHERE gender = 'fooValue'
     * $query->filterByGender('%fooValue%', Criteria::LIKE); // WHERE gender LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gender The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiologicalparentTableMap::COL_GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the childName column
     *
     * Example usage:
     * <code>
     * $query->filterByChildname(1234); // WHERE childName = 1234
     * $query->filterByChildname(array(12, 34)); // WHERE childName IN (12, 34)
     * $query->filterByChildname(array('min' => 12)); // WHERE childName > 12
     * </code>
     *
     * @see       filterByChild()
     *
     * @param     mixed $childname The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByChildname($childname = null, $comparison = null)
    {
        if (is_array($childname)) {
            $useMinMax = false;
            if (isset($childname['min'])) {
                $this->addUsingAlias(BiologicalparentTableMap::COL_CHILDNAME, $childname['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($childname['max'])) {
                $this->addUsingAlias(BiologicalparentTableMap::COL_CHILDNAME, $childname['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiologicalparentTableMap::COL_CHILDNAME, $childname, $comparison);
    }

    /**
     * Filter the query on the alive column
     *
     * Example usage:
     * <code>
     * $query->filterByAlive('fooValue');   // WHERE alive = 'fooValue'
     * $query->filterByAlive('%fooValue%', Criteria::LIKE); // WHERE alive LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alive The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByAlive($alive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alive)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiologicalparentTableMap::COL_ALIVE, $alive, $comparison);
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
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BiologicalparentTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related \Child object
     *
     * @param \Child|ObjectCollection $child The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function filterByChild($child, $comparison = null)
    {
        if ($child instanceof \Child) {
            return $this
                ->addUsingAlias(BiologicalparentTableMap::COL_CHILDNAME, $child->getChildid(), $comparison);
        } elseif ($child instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BiologicalparentTableMap::COL_CHILDNAME, $child->toKeyValue('PrimaryKey', 'Childid'), $comparison);
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
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
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
     * @param   ChildBiologicalparent $biologicalparent Object to remove from the list of results
     *
     * @return $this|ChildBiologicalparentQuery The current query, for fluid interface
     */
    public function prune($biologicalparent = null)
    {
        if ($biologicalparent) {
            $this->addUsingAlias(BiologicalparentTableMap::COL_BIOPARENTID, $biologicalparent->getBioparentid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the biologicalparent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BiologicalparentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BiologicalparentTableMap::clearInstancePool();
            BiologicalparentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BiologicalparentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BiologicalparentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BiologicalparentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BiologicalparentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BiologicalparentQuery
