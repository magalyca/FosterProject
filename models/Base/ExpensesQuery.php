<?php

namespace Base;

use \Expenses as ChildExpenses;
use \ExpensesQuery as ChildExpensesQuery;
use \Exception;
use Map\ExpensesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'expenses' table.
 *
 *
 *
 * @method     ChildExpensesQuery orderByExpensetype($order = Criteria::ASC) Order by the expenseType column
 * @method     ChildExpensesQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildExpensesQuery orderByDatebought($order = Criteria::ASC) Order by the dateBought column
 * @method     ChildExpensesQuery orderByStaffid($order = Criteria::ASC) Order by the staffId column
 *
 * @method     ChildExpensesQuery groupByExpensetype() Group by the expenseType column
 * @method     ChildExpensesQuery groupByAmount() Group by the amount column
 * @method     ChildExpensesQuery groupByDatebought() Group by the dateBought column
 * @method     ChildExpensesQuery groupByStaffid() Group by the staffId column
 *
 * @method     ChildExpensesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildExpensesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildExpensesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildExpensesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildExpensesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildExpensesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildExpensesQuery leftJoinStaff($relationAlias = null) Adds a LEFT JOIN clause to the query using the Staff relation
 * @method     ChildExpensesQuery rightJoinStaff($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Staff relation
 * @method     ChildExpensesQuery innerJoinStaff($relationAlias = null) Adds a INNER JOIN clause to the query using the Staff relation
 *
 * @method     ChildExpensesQuery joinWithStaff($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Staff relation
 *
 * @method     ChildExpensesQuery leftJoinWithStaff() Adds a LEFT JOIN clause and with to the query using the Staff relation
 * @method     ChildExpensesQuery rightJoinWithStaff() Adds a RIGHT JOIN clause and with to the query using the Staff relation
 * @method     ChildExpensesQuery innerJoinWithStaff() Adds a INNER JOIN clause and with to the query using the Staff relation
 *
 * @method     \StaffQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildExpenses findOne(ConnectionInterface $con = null) Return the first ChildExpenses matching the query
 * @method     ChildExpenses findOneOrCreate(ConnectionInterface $con = null) Return the first ChildExpenses matching the query, or a new ChildExpenses object populated from the query conditions when no match is found
 *
 * @method     ChildExpenses findOneByExpensetype(string $expenseType) Return the first ChildExpenses filtered by the expenseType column
 * @method     ChildExpenses findOneByAmount(int $amount) Return the first ChildExpenses filtered by the amount column
 * @method     ChildExpenses findOneByDatebought(string $dateBought) Return the first ChildExpenses filtered by the dateBought column
 * @method     ChildExpenses findOneByStaffid(int $staffId) Return the first ChildExpenses filtered by the staffId column *

 * @method     ChildExpenses requirePk($key, ConnectionInterface $con = null) Return the ChildExpenses by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpenses requireOne(ConnectionInterface $con = null) Return the first ChildExpenses matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpenses requireOneByExpensetype(string $expenseType) Return the first ChildExpenses filtered by the expenseType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpenses requireOneByAmount(int $amount) Return the first ChildExpenses filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpenses requireOneByDatebought(string $dateBought) Return the first ChildExpenses filtered by the dateBought column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildExpenses requireOneByStaffid(int $staffId) Return the first ChildExpenses filtered by the staffId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildExpenses[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildExpenses objects based on current ModelCriteria
 * @method     ChildExpenses[]|ObjectCollection findByExpensetype(string $expenseType) Return ChildExpenses objects filtered by the expenseType column
 * @method     ChildExpenses[]|ObjectCollection findByAmount(int $amount) Return ChildExpenses objects filtered by the amount column
 * @method     ChildExpenses[]|ObjectCollection findByDatebought(string $dateBought) Return ChildExpenses objects filtered by the dateBought column
 * @method     ChildExpenses[]|ObjectCollection findByStaffid(int $staffId) Return ChildExpenses objects filtered by the staffId column
 * @method     ChildExpenses[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ExpensesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ExpensesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Expenses', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildExpensesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildExpensesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildExpensesQuery) {
            return $criteria;
        }
        $query = new ChildExpensesQuery();
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
     * @return ChildExpenses|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Expenses object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Expenses object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildExpensesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Expenses object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildExpensesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Expenses object has no primary key');
    }

    /**
     * Filter the query on the expenseType column
     *
     * Example usage:
     * <code>
     * $query->filterByExpensetype('fooValue');   // WHERE expenseType = 'fooValue'
     * $query->filterByExpensetype('%fooValue%', Criteria::LIKE); // WHERE expenseType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expensetype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpensesQuery The current query, for fluid interface
     */
    public function filterByExpensetype($expensetype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expensetype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensesTableMap::COL_EXPENSETYPE, $expensetype, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpensesQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ExpensesTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ExpensesTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensesTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the dateBought column
     *
     * Example usage:
     * <code>
     * $query->filterByDatebought('fooValue');   // WHERE dateBought = 'fooValue'
     * $query->filterByDatebought('%fooValue%', Criteria::LIKE); // WHERE dateBought LIKE '%fooValue%'
     * </code>
     *
     * @param     string $datebought The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpensesQuery The current query, for fluid interface
     */
    public function filterByDatebought($datebought = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($datebought)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensesTableMap::COL_DATEBOUGHT, $datebought, $comparison);
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
     * @see       filterByStaff()
     *
     * @param     mixed $staffid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildExpensesQuery The current query, for fluid interface
     */
    public function filterByStaffid($staffid = null, $comparison = null)
    {
        if (is_array($staffid)) {
            $useMinMax = false;
            if (isset($staffid['min'])) {
                $this->addUsingAlias(ExpensesTableMap::COL_STAFFID, $staffid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($staffid['max'])) {
                $this->addUsingAlias(ExpensesTableMap::COL_STAFFID, $staffid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ExpensesTableMap::COL_STAFFID, $staffid, $comparison);
    }

    /**
     * Filter the query by a related \Staff object
     *
     * @param \Staff|ObjectCollection $staff The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildExpensesQuery The current query, for fluid interface
     */
    public function filterByStaff($staff, $comparison = null)
    {
        if ($staff instanceof \Staff) {
            return $this
                ->addUsingAlias(ExpensesTableMap::COL_STAFFID, $staff->getStaffid(), $comparison);
        } elseif ($staff instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ExpensesTableMap::COL_STAFFID, $staff->toKeyValue('PrimaryKey', 'Staffid'), $comparison);
        } else {
            throw new PropelException('filterByStaff() only accepts arguments of type \Staff or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Staff relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildExpensesQuery The current query, for fluid interface
     */
    public function joinStaff($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Staff');

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
            $this->addJoinObject($join, 'Staff');
        }

        return $this;
    }

    /**
     * Use the Staff relation Staff object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \StaffQuery A secondary query class using the current class as primary query
     */
    public function useStaffQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStaff($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Staff', '\StaffQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildExpenses $expenses Object to remove from the list of results
     *
     * @return $this|ChildExpensesQuery The current query, for fluid interface
     */
    public function prune($expenses = null)
    {
        if ($expenses) {
            throw new LogicException('Expenses object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the expenses table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ExpensesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ExpensesTableMap::clearInstancePool();
            ExpensesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ExpensesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ExpensesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ExpensesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ExpensesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ExpensesQuery
