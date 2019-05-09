<?php

namespace Base;

use \Staff as ChildStaff;
use \StaffQuery as ChildStaffQuery;
use \Exception;
use \PDO;
use Map\StaffTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'staff' table.
 *
 *
 *
 * @method     ChildStaffQuery orderByStaffid($order = Criteria::ASC) Order by the staffId column
 * @method     ChildStaffQuery orderByFirstname($order = Criteria::ASC) Order by the firstName column
 * @method     ChildStaffQuery orderByLastname($order = Criteria::ASC) Order by the lastName column
 * @method     ChildStaffQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildStaffQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildStaffQuery orderByPassword($order = Criteria::ASC) Order by the password column
 *
 * @method     ChildStaffQuery groupByStaffid() Group by the staffId column
 * @method     ChildStaffQuery groupByFirstname() Group by the firstName column
 * @method     ChildStaffQuery groupByLastname() Group by the lastName column
 * @method     ChildStaffQuery groupByPosition() Group by the position column
 * @method     ChildStaffQuery groupByEmail() Group by the email column
 * @method     ChildStaffQuery groupByPassword() Group by the password column
 *
 * @method     ChildStaffQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStaffQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStaffQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStaffQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildStaffQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildStaffQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildStaffQuery leftJoinChild($relationAlias = null) Adds a LEFT JOIN clause to the query using the Child relation
 * @method     ChildStaffQuery rightJoinChild($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Child relation
 * @method     ChildStaffQuery innerJoinChild($relationAlias = null) Adds a INNER JOIN clause to the query using the Child relation
 *
 * @method     ChildStaffQuery joinWithChild($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Child relation
 *
 * @method     ChildStaffQuery leftJoinWithChild() Adds a LEFT JOIN clause and with to the query using the Child relation
 * @method     ChildStaffQuery rightJoinWithChild() Adds a RIGHT JOIN clause and with to the query using the Child relation
 * @method     ChildStaffQuery innerJoinWithChild() Adds a INNER JOIN clause and with to the query using the Child relation
 *
 * @method     ChildStaffQuery leftJoinExpenses($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expenses relation
 * @method     ChildStaffQuery rightJoinExpenses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expenses relation
 * @method     ChildStaffQuery innerJoinExpenses($relationAlias = null) Adds a INNER JOIN clause to the query using the Expenses relation
 *
 * @method     ChildStaffQuery joinWithExpenses($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Expenses relation
 *
 * @method     ChildStaffQuery leftJoinWithExpenses() Adds a LEFT JOIN clause and with to the query using the Expenses relation
 * @method     ChildStaffQuery rightJoinWithExpenses() Adds a RIGHT JOIN clause and with to the query using the Expenses relation
 * @method     ChildStaffQuery innerJoinWithExpenses() Adds a INNER JOIN clause and with to the query using the Expenses relation
 *
 * @method     ChildStaffQuery leftJoinNewparent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Newparent relation
 * @method     ChildStaffQuery rightJoinNewparent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Newparent relation
 * @method     ChildStaffQuery innerJoinNewparent($relationAlias = null) Adds a INNER JOIN clause to the query using the Newparent relation
 *
 * @method     ChildStaffQuery joinWithNewparent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Newparent relation
 *
 * @method     ChildStaffQuery leftJoinWithNewparent() Adds a LEFT JOIN clause and with to the query using the Newparent relation
 * @method     ChildStaffQuery rightJoinWithNewparent() Adds a RIGHT JOIN clause and with to the query using the Newparent relation
 * @method     ChildStaffQuery innerJoinWithNewparent() Adds a INNER JOIN clause and with to the query using the Newparent relation
 *
 * @method     ChildStaffQuery leftJoinWaitingparent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Waitingparent relation
 * @method     ChildStaffQuery rightJoinWaitingparent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Waitingparent relation
 * @method     ChildStaffQuery innerJoinWaitingparent($relationAlias = null) Adds a INNER JOIN clause to the query using the Waitingparent relation
 *
 * @method     ChildStaffQuery joinWithWaitingparent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Waitingparent relation
 *
 * @method     ChildStaffQuery leftJoinWithWaitingparent() Adds a LEFT JOIN clause and with to the query using the Waitingparent relation
 * @method     ChildStaffQuery rightJoinWithWaitingparent() Adds a RIGHT JOIN clause and with to the query using the Waitingparent relation
 * @method     ChildStaffQuery innerJoinWithWaitingparent() Adds a INNER JOIN clause and with to the query using the Waitingparent relation
 *
 * @method     \ChildQuery|\ExpensesQuery|\NewparentQuery|\WaitingparentQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildStaff findOne(ConnectionInterface $con = null) Return the first ChildStaff matching the query
 * @method     ChildStaff findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStaff matching the query, or a new ChildStaff object populated from the query conditions when no match is found
 *
 * @method     ChildStaff findOneByStaffid(int $staffId) Return the first ChildStaff filtered by the staffId column
 * @method     ChildStaff findOneByFirstname(string $firstName) Return the first ChildStaff filtered by the firstName column
 * @method     ChildStaff findOneByLastname(string $lastName) Return the first ChildStaff filtered by the lastName column
 * @method     ChildStaff findOneByPosition(string $position) Return the first ChildStaff filtered by the position column
 * @method     ChildStaff findOneByEmail(string $email) Return the first ChildStaff filtered by the email column
 * @method     ChildStaff findOneByPassword(string $password) Return the first ChildStaff filtered by the password column *

 * @method     ChildStaff requirePk($key, ConnectionInterface $con = null) Return the ChildStaff by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStaff requireOne(ConnectionInterface $con = null) Return the first ChildStaff matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStaff requireOneByStaffid(int $staffId) Return the first ChildStaff filtered by the staffId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStaff requireOneByFirstname(string $firstName) Return the first ChildStaff filtered by the firstName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStaff requireOneByLastname(string $lastName) Return the first ChildStaff filtered by the lastName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStaff requireOneByPosition(string $position) Return the first ChildStaff filtered by the position column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStaff requireOneByEmail(string $email) Return the first ChildStaff filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStaff requireOneByPassword(string $password) Return the first ChildStaff filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStaff[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStaff objects based on current ModelCriteria
 * @method     ChildStaff[]|ObjectCollection findByStaffid(int $staffId) Return ChildStaff objects filtered by the staffId column
 * @method     ChildStaff[]|ObjectCollection findByFirstname(string $firstName) Return ChildStaff objects filtered by the firstName column
 * @method     ChildStaff[]|ObjectCollection findByLastname(string $lastName) Return ChildStaff objects filtered by the lastName column
 * @method     ChildStaff[]|ObjectCollection findByPosition(string $position) Return ChildStaff objects filtered by the position column
 * @method     ChildStaff[]|ObjectCollection findByEmail(string $email) Return ChildStaff objects filtered by the email column
 * @method     ChildStaff[]|ObjectCollection findByPassword(string $password) Return ChildStaff objects filtered by the password column
 * @method     ChildStaff[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StaffQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\StaffQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Staff', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStaffQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStaffQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStaffQuery) {
            return $criteria;
        }
        $query = new ChildStaffQuery();
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
     * @return ChildStaff|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StaffTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = StaffTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildStaff A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT staffId, firstName, lastName, position, email, password FROM staff WHERE staffId = :p0';
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
            /** @var ChildStaff $obj */
            $obj = new ChildStaff();
            $obj->hydrate($row);
            StaffTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildStaff|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StaffTableMap::COL_STAFFID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StaffTableMap::COL_STAFFID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the staffId column
     *
     * Example usage:
     * <code>
     * $query->filterByStaffid(1234); // WHERE staffId = 1234
     * $query->filterByStaffid(array(12, 34)); // WHERE staffId IN (12, 34)
     * $query->filterByStaffid(array('min' => 12)); // WHERE staffId > 12
     * </code>
     *
     * @param     mixed $staffid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function filterByStaffid($staffid = null, $comparison = null)
    {
        if (is_array($staffid)) {
            $useMinMax = false;
            if (isset($staffid['min'])) {
                $this->addUsingAlias(StaffTableMap::COL_STAFFID, $staffid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($staffid['max'])) {
                $this->addUsingAlias(StaffTableMap::COL_STAFFID, $staffid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StaffTableMap::COL_STAFFID, $staffid, $comparison);
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
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StaffTableMap::COL_FIRSTNAME, $firstname, $comparison);
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
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StaffTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition('fooValue');   // WHERE position = 'fooValue'
     * $query->filterByPosition('%fooValue%', Criteria::LIKE); // WHERE position LIKE '%fooValue%'
     * </code>
     *
     * @param     string $position The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($position)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StaffTableMap::COL_POSITION, $position, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StaffTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StaffTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query by a related \Child object
     *
     * @param \Child|ObjectCollection $child the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStaffQuery The current query, for fluid interface
     */
    public function filterByChild($child, $comparison = null)
    {
        if ($child instanceof \Child) {
            return $this
                ->addUsingAlias(StaffTableMap::COL_STAFFID, $child->getStaffid(), $comparison);
        } elseif ($child instanceof ObjectCollection) {
            return $this
                ->useChildQuery()
                ->filterByPrimaryKeys($child->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildStaffQuery The current query, for fluid interface
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
     * Filter the query by a related \Expenses object
     *
     * @param \Expenses|ObjectCollection $expenses the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStaffQuery The current query, for fluid interface
     */
    public function filterByExpenses($expenses, $comparison = null)
    {
        if ($expenses instanceof \Expenses) {
            return $this
                ->addUsingAlias(StaffTableMap::COL_STAFFID, $expenses->getStaffid(), $comparison);
        } elseif ($expenses instanceof ObjectCollection) {
            return $this
                ->useExpensesQuery()
                ->filterByPrimaryKeys($expenses->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByExpenses() only accepts arguments of type \Expenses or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Expenses relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function joinExpenses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Expenses');

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
            $this->addJoinObject($join, 'Expenses');
        }

        return $this;
    }

    /**
     * Use the Expenses relation Expenses object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ExpensesQuery A secondary query class using the current class as primary query
     */
    public function useExpensesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinExpenses($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Expenses', '\ExpensesQuery');
    }

    /**
     * Filter the query by a related \Newparent object
     *
     * @param \Newparent|ObjectCollection $newparent the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStaffQuery The current query, for fluid interface
     */
    public function filterByNewparent($newparent, $comparison = null)
    {
        if ($newparent instanceof \Newparent) {
            return $this
                ->addUsingAlias(StaffTableMap::COL_STAFFID, $newparent->getStaffid(), $comparison);
        } elseif ($newparent instanceof ObjectCollection) {
            return $this
                ->useNewparentQuery()
                ->filterByPrimaryKeys($newparent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNewparent() only accepts arguments of type \Newparent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Newparent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function joinNewparent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Newparent');

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
            $this->addJoinObject($join, 'Newparent');
        }

        return $this;
    }

    /**
     * Use the Newparent relation Newparent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NewparentQuery A secondary query class using the current class as primary query
     */
    public function useNewparentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNewparent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Newparent', '\NewparentQuery');
    }

    /**
     * Filter the query by a related \Waitingparent object
     *
     * @param \Waitingparent|ObjectCollection $waitingparent the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStaffQuery The current query, for fluid interface
     */
    public function filterByWaitingparent($waitingparent, $comparison = null)
    {
        if ($waitingparent instanceof \Waitingparent) {
            return $this
                ->addUsingAlias(StaffTableMap::COL_STAFFID, $waitingparent->getStaffid(), $comparison);
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
     * @return $this|ChildStaffQuery The current query, for fluid interface
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
     * @param   ChildStaff $staff Object to remove from the list of results
     *
     * @return $this|ChildStaffQuery The current query, for fluid interface
     */
    public function prune($staff = null)
    {
        if ($staff) {
            $this->addUsingAlias(StaffTableMap::COL_STAFFID, $staff->getStaffid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the staff table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StaffTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StaffTableMap::clearInstancePool();
            StaffTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(StaffTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StaffTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            StaffTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            StaffTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // StaffQuery
