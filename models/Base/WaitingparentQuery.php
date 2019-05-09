<?php

namespace Base;

use \Waitingparent as ChildWaitingparent;
use \WaitingparentQuery as ChildWaitingparentQuery;
use \Exception;
use \PDO;
use Map\WaitingparentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'waitingparent' table.
 *
 *
 *
 * @method     ChildWaitingparentQuery orderByWaitingparentid($order = Criteria::ASC) Order by the waitingParentId column
 * @method     ChildWaitingparentQuery orderByFirstname($order = Criteria::ASC) Order by the firstName column
 * @method     ChildWaitingparentQuery orderByLastname($order = Criteria::ASC) Order by the lastName column
 * @method     ChildWaitingparentQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     ChildWaitingparentQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildWaitingparentQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildWaitingparentQuery orderByDateapplied($order = Criteria::ASC) Order by the dateApplied column
 * @method     ChildWaitingparentQuery orderByBiologicalchild($order = Criteria::ASC) Order by the biologicalChild column
 * @method     ChildWaitingparentQuery orderByStaffid($order = Criteria::ASC) Order by the staffId column
 * @method     ChildWaitingparentQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildWaitingparentQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildWaitingparentQuery orderByFormid($order = Criteria::ASC) Order by the formId column
 *
 * @method     ChildWaitingparentQuery groupByWaitingparentid() Group by the waitingParentId column
 * @method     ChildWaitingparentQuery groupByFirstname() Group by the firstName column
 * @method     ChildWaitingparentQuery groupByLastname() Group by the lastName column
 * @method     ChildWaitingparentQuery groupByTelephone() Group by the telephone column
 * @method     ChildWaitingparentQuery groupByEmail() Group by the email column
 * @method     ChildWaitingparentQuery groupByAddress() Group by the address column
 * @method     ChildWaitingparentQuery groupByDateapplied() Group by the dateApplied column
 * @method     ChildWaitingparentQuery groupByBiologicalchild() Group by the biologicalChild column
 * @method     ChildWaitingparentQuery groupByStaffid() Group by the staffId column
 * @method     ChildWaitingparentQuery groupByGender() Group by the gender column
 * @method     ChildWaitingparentQuery groupByAge() Group by the age column
 * @method     ChildWaitingparentQuery groupByFormid() Group by the formId column
 *
 * @method     ChildWaitingparentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWaitingparentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWaitingparentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWaitingparentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWaitingparentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWaitingparentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWaitingparentQuery leftJoinPersonaldocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Personaldocument relation
 * @method     ChildWaitingparentQuery rightJoinPersonaldocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Personaldocument relation
 * @method     ChildWaitingparentQuery innerJoinPersonaldocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Personaldocument relation
 *
 * @method     ChildWaitingparentQuery joinWithPersonaldocument($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Personaldocument relation
 *
 * @method     ChildWaitingparentQuery leftJoinWithPersonaldocument() Adds a LEFT JOIN clause and with to the query using the Personaldocument relation
 * @method     ChildWaitingparentQuery rightJoinWithPersonaldocument() Adds a RIGHT JOIN clause and with to the query using the Personaldocument relation
 * @method     ChildWaitingparentQuery innerJoinWithPersonaldocument() Adds a INNER JOIN clause and with to the query using the Personaldocument relation
 *
 * @method     ChildWaitingparentQuery leftJoinStaff($relationAlias = null) Adds a LEFT JOIN clause to the query using the Staff relation
 * @method     ChildWaitingparentQuery rightJoinStaff($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Staff relation
 * @method     ChildWaitingparentQuery innerJoinStaff($relationAlias = null) Adds a INNER JOIN clause to the query using the Staff relation
 *
 * @method     ChildWaitingparentQuery joinWithStaff($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Staff relation
 *
 * @method     ChildWaitingparentQuery leftJoinWithStaff() Adds a LEFT JOIN clause and with to the query using the Staff relation
 * @method     ChildWaitingparentQuery rightJoinWithStaff() Adds a RIGHT JOIN clause and with to the query using the Staff relation
 * @method     ChildWaitingparentQuery innerJoinWithStaff() Adds a INNER JOIN clause and with to the query using the Staff relation
 *
 * @method     \PersonaldocumentQuery|\StaffQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildWaitingparent findOne(ConnectionInterface $con = null) Return the first ChildWaitingparent matching the query
 * @method     ChildWaitingparent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWaitingparent matching the query, or a new ChildWaitingparent object populated from the query conditions when no match is found
 *
 * @method     ChildWaitingparent findOneByWaitingparentid(int $waitingParentId) Return the first ChildWaitingparent filtered by the waitingParentId column
 * @method     ChildWaitingparent findOneByFirstname(string $firstName) Return the first ChildWaitingparent filtered by the firstName column
 * @method     ChildWaitingparent findOneByLastname(string $lastName) Return the first ChildWaitingparent filtered by the lastName column
 * @method     ChildWaitingparent findOneByTelephone(string $telephone) Return the first ChildWaitingparent filtered by the telephone column
 * @method     ChildWaitingparent findOneByEmail(string $email) Return the first ChildWaitingparent filtered by the email column
 * @method     ChildWaitingparent findOneByAddress(string $address) Return the first ChildWaitingparent filtered by the address column
 * @method     ChildWaitingparent findOneByDateapplied(string $dateApplied) Return the first ChildWaitingparent filtered by the dateApplied column
 * @method     ChildWaitingparent findOneByBiologicalchild(string $biologicalChild) Return the first ChildWaitingparent filtered by the biologicalChild column
 * @method     ChildWaitingparent findOneByStaffid(int $staffId) Return the first ChildWaitingparent filtered by the staffId column
 * @method     ChildWaitingparent findOneByGender(string $gender) Return the first ChildWaitingparent filtered by the gender column
 * @method     ChildWaitingparent findOneByAge(int $age) Return the first ChildWaitingparent filtered by the age column
 * @method     ChildWaitingparent findOneByFormid(int $formId) Return the first ChildWaitingparent filtered by the formId column *

 * @method     ChildWaitingparent requirePk($key, ConnectionInterface $con = null) Return the ChildWaitingparent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOne(ConnectionInterface $con = null) Return the first ChildWaitingparent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWaitingparent requireOneByWaitingparentid(int $waitingParentId) Return the first ChildWaitingparent filtered by the waitingParentId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByFirstname(string $firstName) Return the first ChildWaitingparent filtered by the firstName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByLastname(string $lastName) Return the first ChildWaitingparent filtered by the lastName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByTelephone(string $telephone) Return the first ChildWaitingparent filtered by the telephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByEmail(string $email) Return the first ChildWaitingparent filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByAddress(string $address) Return the first ChildWaitingparent filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByDateapplied(string $dateApplied) Return the first ChildWaitingparent filtered by the dateApplied column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByBiologicalchild(string $biologicalChild) Return the first ChildWaitingparent filtered by the biologicalChild column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByStaffid(int $staffId) Return the first ChildWaitingparent filtered by the staffId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByGender(string $gender) Return the first ChildWaitingparent filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByAge(int $age) Return the first ChildWaitingparent filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWaitingparent requireOneByFormid(int $formId) Return the first ChildWaitingparent filtered by the formId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWaitingparent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWaitingparent objects based on current ModelCriteria
 * @method     ChildWaitingparent[]|ObjectCollection findByWaitingparentid(int $waitingParentId) Return ChildWaitingparent objects filtered by the waitingParentId column
 * @method     ChildWaitingparent[]|ObjectCollection findByFirstname(string $firstName) Return ChildWaitingparent objects filtered by the firstName column
 * @method     ChildWaitingparent[]|ObjectCollection findByLastname(string $lastName) Return ChildWaitingparent objects filtered by the lastName column
 * @method     ChildWaitingparent[]|ObjectCollection findByTelephone(string $telephone) Return ChildWaitingparent objects filtered by the telephone column
 * @method     ChildWaitingparent[]|ObjectCollection findByEmail(string $email) Return ChildWaitingparent objects filtered by the email column
 * @method     ChildWaitingparent[]|ObjectCollection findByAddress(string $address) Return ChildWaitingparent objects filtered by the address column
 * @method     ChildWaitingparent[]|ObjectCollection findByDateapplied(string $dateApplied) Return ChildWaitingparent objects filtered by the dateApplied column
 * @method     ChildWaitingparent[]|ObjectCollection findByBiologicalchild(string $biologicalChild) Return ChildWaitingparent objects filtered by the biologicalChild column
 * @method     ChildWaitingparent[]|ObjectCollection findByStaffid(int $staffId) Return ChildWaitingparent objects filtered by the staffId column
 * @method     ChildWaitingparent[]|ObjectCollection findByGender(string $gender) Return ChildWaitingparent objects filtered by the gender column
 * @method     ChildWaitingparent[]|ObjectCollection findByAge(int $age) Return ChildWaitingparent objects filtered by the age column
 * @method     ChildWaitingparent[]|ObjectCollection findByFormid(int $formId) Return ChildWaitingparent objects filtered by the formId column
 * @method     ChildWaitingparent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WaitingparentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\WaitingparentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Waitingparent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWaitingparentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWaitingparentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWaitingparentQuery) {
            return $criteria;
        }
        $query = new ChildWaitingparentQuery();
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
     * @return ChildWaitingparent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WaitingparentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WaitingparentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildWaitingparent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT waitingParentId, firstName, lastName, telephone, email, address, dateApplied, biologicalChild, staffId, gender, age, formId FROM waitingparent WHERE waitingParentId = :p0';
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
            /** @var ChildWaitingparent $obj */
            $obj = new ChildWaitingparent();
            $obj->hydrate($row);
            WaitingparentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildWaitingparent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WaitingparentTableMap::COL_WAITINGPARENTID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WaitingparentTableMap::COL_WAITINGPARENTID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the waitingParentId column
     *
     * Example usage:
     * <code>
     * $query->filterByWaitingparentid(1234); // WHERE waitingParentId = 1234
     * $query->filterByWaitingparentid(array(12, 34)); // WHERE waitingParentId IN (12, 34)
     * $query->filterByWaitingparentid(array('min' => 12)); // WHERE waitingParentId > 12
     * </code>
     *
     * @param     mixed $waitingparentid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByWaitingparentid($waitingparentid = null, $comparison = null)
    {
        if (is_array($waitingparentid)) {
            $useMinMax = false;
            if (isset($waitingparentid['min'])) {
                $this->addUsingAlias(WaitingparentTableMap::COL_WAITINGPARENTID, $waitingparentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($waitingparentid['max'])) {
                $this->addUsingAlias(WaitingparentTableMap::COL_WAITINGPARENTID, $waitingparentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_WAITINGPARENTID, $waitingparentid, $comparison);
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
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_FIRSTNAME, $firstname, $comparison);
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
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the telephone column
     *
     * Example usage:
     * <code>
     * $query->filterByTelephone('fooValue');   // WHERE telephone = 'fooValue'
     * $query->filterByTelephone('%fooValue%', Criteria::LIKE); // WHERE telephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telephone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByTelephone($telephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_TELEPHONE, $telephone, $comparison);
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
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the dateApplied column
     *
     * Example usage:
     * <code>
     * $query->filterByDateapplied('fooValue');   // WHERE dateApplied = 'fooValue'
     * $query->filterByDateapplied('%fooValue%', Criteria::LIKE); // WHERE dateApplied LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateapplied The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByDateapplied($dateapplied = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateapplied)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_DATEAPPLIED, $dateapplied, $comparison);
    }

    /**
     * Filter the query on the biologicalChild column
     *
     * Example usage:
     * <code>
     * $query->filterByBiologicalchild('fooValue');   // WHERE biologicalChild = 'fooValue'
     * $query->filterByBiologicalchild('%fooValue%', Criteria::LIKE); // WHERE biologicalChild LIKE '%fooValue%'
     * </code>
     *
     * @param     string $biologicalchild The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByBiologicalchild($biologicalchild = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($biologicalchild)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_BIOLOGICALCHILD, $biologicalchild, $comparison);
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
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByStaffid($staffid = null, $comparison = null)
    {
        if (is_array($staffid)) {
            $useMinMax = false;
            if (isset($staffid['min'])) {
                $this->addUsingAlias(WaitingparentTableMap::COL_STAFFID, $staffid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($staffid['max'])) {
                $this->addUsingAlias(WaitingparentTableMap::COL_STAFFID, $staffid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_STAFFID, $staffid, $comparison);
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
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge(1234); // WHERE age = 1234
     * $query->filterByAge(array(12, 34)); // WHERE age IN (12, 34)
     * $query->filterByAge(array('min' => 12)); // WHERE age > 12
     * </code>
     *
     * @param     mixed $age The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(WaitingparentTableMap::COL_AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(WaitingparentTableMap::COL_AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_AGE, $age, $comparison);
    }

    /**
     * Filter the query on the formId column
     *
     * Example usage:
     * <code>
     * $query->filterByFormid(1234); // WHERE formId = 1234
     * $query->filterByFormid(array(12, 34)); // WHERE formId IN (12, 34)
     * $query->filterByFormid(array('min' => 12)); // WHERE formId > 12
     * </code>
     *
     * @see       filterByPersonaldocument()
     *
     * @param     mixed $formid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByFormid($formid = null, $comparison = null)
    {
        if (is_array($formid)) {
            $useMinMax = false;
            if (isset($formid['min'])) {
                $this->addUsingAlias(WaitingparentTableMap::COL_FORMID, $formid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($formid['max'])) {
                $this->addUsingAlias(WaitingparentTableMap::COL_FORMID, $formid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WaitingparentTableMap::COL_FORMID, $formid, $comparison);
    }

    /**
     * Filter the query by a related \Personaldocument object
     *
     * @param \Personaldocument|ObjectCollection $personaldocument The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByPersonaldocument($personaldocument, $comparison = null)
    {
        if ($personaldocument instanceof \Personaldocument) {
            return $this
                ->addUsingAlias(WaitingparentTableMap::COL_FORMID, $personaldocument->getDocumentid(), $comparison);
        } elseif ($personaldocument instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(WaitingparentTableMap::COL_FORMID, $personaldocument->toKeyValue('PrimaryKey', 'Documentid'), $comparison);
        } else {
            throw new PropelException('filterByPersonaldocument() only accepts arguments of type \Personaldocument or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Personaldocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function joinPersonaldocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Personaldocument');

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
            $this->addJoinObject($join, 'Personaldocument');
        }

        return $this;
    }

    /**
     * Use the Personaldocument relation Personaldocument object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PersonaldocumentQuery A secondary query class using the current class as primary query
     */
    public function usePersonaldocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonaldocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Personaldocument', '\PersonaldocumentQuery');
    }

    /**
     * Filter the query by a related \Staff object
     *
     * @param \Staff|ObjectCollection $staff The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildWaitingparentQuery The current query, for fluid interface
     */
    public function filterByStaff($staff, $comparison = null)
    {
        if ($staff instanceof \Staff) {
            return $this
                ->addUsingAlias(WaitingparentTableMap::COL_STAFFID, $staff->getStaffid(), $comparison);
        } elseif ($staff instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(WaitingparentTableMap::COL_STAFFID, $staff->toKeyValue('PrimaryKey', 'Staffid'), $comparison);
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
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
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
     * @param   ChildWaitingparent $waitingparent Object to remove from the list of results
     *
     * @return $this|ChildWaitingparentQuery The current query, for fluid interface
     */
    public function prune($waitingparent = null)
    {
        if ($waitingparent) {
            $this->addUsingAlias(WaitingparentTableMap::COL_WAITINGPARENTID, $waitingparent->getWaitingparentid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the waitingparent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WaitingparentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WaitingparentTableMap::clearInstancePool();
            WaitingparentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(WaitingparentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WaitingparentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            WaitingparentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WaitingparentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WaitingparentQuery
