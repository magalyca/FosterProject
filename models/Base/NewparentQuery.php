<?php

namespace Base;

use \Newparent as ChildNewparent;
use \NewparentQuery as ChildNewparentQuery;
use \Exception;
use \PDO;
use Map\NewparentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'newparent' table.
 *
 *
 *
 * @method     ChildNewparentQuery orderByNewparentid($order = Criteria::ASC) Order by the newParentId column
 * @method     ChildNewparentQuery orderByFirstname($order = Criteria::ASC) Order by the firstName column
 * @method     ChildNewparentQuery orderByLastname($order = Criteria::ASC) Order by the lastName column
 * @method     ChildNewparentQuery orderByChildid($order = Criteria::ASC) Order by the childId column
 * @method     ChildNewparentQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     ChildNewparentQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildNewparentQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildNewparentQuery orderByDateapplied($order = Criteria::ASC) Order by the dateApplied column
 * @method     ChildNewparentQuery orderByBiologicalchild($order = Criteria::ASC) Order by the biologicalChild column
 * @method     ChildNewparentQuery orderByStaffid($order = Criteria::ASC) Order by the staffId column
 * @method     ChildNewparentQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildNewparentQuery orderByAge($order = Criteria::ASC) Order by the age column
 *
 * @method     ChildNewparentQuery groupByNewparentid() Group by the newParentId column
 * @method     ChildNewparentQuery groupByFirstname() Group by the firstName column
 * @method     ChildNewparentQuery groupByLastname() Group by the lastName column
 * @method     ChildNewparentQuery groupByChildid() Group by the childId column
 * @method     ChildNewparentQuery groupByTelephone() Group by the telephone column
 * @method     ChildNewparentQuery groupByEmail() Group by the email column
 * @method     ChildNewparentQuery groupByAddress() Group by the address column
 * @method     ChildNewparentQuery groupByDateapplied() Group by the dateApplied column
 * @method     ChildNewparentQuery groupByBiologicalchild() Group by the biologicalChild column
 * @method     ChildNewparentQuery groupByStaffid() Group by the staffId column
 * @method     ChildNewparentQuery groupByGender() Group by the gender column
 * @method     ChildNewparentQuery groupByAge() Group by the age column
 *
 * @method     ChildNewparentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNewparentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNewparentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNewparentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNewparentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNewparentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNewparentQuery leftJoinChild($relationAlias = null) Adds a LEFT JOIN clause to the query using the Child relation
 * @method     ChildNewparentQuery rightJoinChild($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Child relation
 * @method     ChildNewparentQuery innerJoinChild($relationAlias = null) Adds a INNER JOIN clause to the query using the Child relation
 *
 * @method     ChildNewparentQuery joinWithChild($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Child relation
 *
 * @method     ChildNewparentQuery leftJoinWithChild() Adds a LEFT JOIN clause and with to the query using the Child relation
 * @method     ChildNewparentQuery rightJoinWithChild() Adds a RIGHT JOIN clause and with to the query using the Child relation
 * @method     ChildNewparentQuery innerJoinWithChild() Adds a INNER JOIN clause and with to the query using the Child relation
 *
 * @method     ChildNewparentQuery leftJoinStaff($relationAlias = null) Adds a LEFT JOIN clause to the query using the Staff relation
 * @method     ChildNewparentQuery rightJoinStaff($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Staff relation
 * @method     ChildNewparentQuery innerJoinStaff($relationAlias = null) Adds a INNER JOIN clause to the query using the Staff relation
 *
 * @method     ChildNewparentQuery joinWithStaff($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Staff relation
 *
 * @method     ChildNewparentQuery leftJoinWithStaff() Adds a LEFT JOIN clause and with to the query using the Staff relation
 * @method     ChildNewparentQuery rightJoinWithStaff() Adds a RIGHT JOIN clause and with to the query using the Staff relation
 * @method     ChildNewparentQuery innerJoinWithStaff() Adds a INNER JOIN clause and with to the query using the Staff relation
 *
 * @method     \ChildQuery|\StaffQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildNewparent findOne(ConnectionInterface $con = null) Return the first ChildNewparent matching the query
 * @method     ChildNewparent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNewparent matching the query, or a new ChildNewparent object populated from the query conditions when no match is found
 *
 * @method     ChildNewparent findOneByNewparentid(int $newParentId) Return the first ChildNewparent filtered by the newParentId column
 * @method     ChildNewparent findOneByFirstname(string $firstName) Return the first ChildNewparent filtered by the firstName column
 * @method     ChildNewparent findOneByLastname(string $lastName) Return the first ChildNewparent filtered by the lastName column
 * @method     ChildNewparent findOneByChildid(int $childId) Return the first ChildNewparent filtered by the childId column
 * @method     ChildNewparent findOneByTelephone(string $telephone) Return the first ChildNewparent filtered by the telephone column
 * @method     ChildNewparent findOneByEmail(string $email) Return the first ChildNewparent filtered by the email column
 * @method     ChildNewparent findOneByAddress(string $address) Return the first ChildNewparent filtered by the address column
 * @method     ChildNewparent findOneByDateapplied(string $dateApplied) Return the first ChildNewparent filtered by the dateApplied column
 * @method     ChildNewparent findOneByBiologicalchild(string $biologicalChild) Return the first ChildNewparent filtered by the biologicalChild column
 * @method     ChildNewparent findOneByStaffid(int $staffId) Return the first ChildNewparent filtered by the staffId column
 * @method     ChildNewparent findOneByGender(string $gender) Return the first ChildNewparent filtered by the gender column
 * @method     ChildNewparent findOneByAge(int $age) Return the first ChildNewparent filtered by the age column *

 * @method     ChildNewparent requirePk($key, ConnectionInterface $con = null) Return the ChildNewparent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOne(ConnectionInterface $con = null) Return the first ChildNewparent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNewparent requireOneByNewparentid(int $newParentId) Return the first ChildNewparent filtered by the newParentId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByFirstname(string $firstName) Return the first ChildNewparent filtered by the firstName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByLastname(string $lastName) Return the first ChildNewparent filtered by the lastName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByChildid(int $childId) Return the first ChildNewparent filtered by the childId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByTelephone(string $telephone) Return the first ChildNewparent filtered by the telephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByEmail(string $email) Return the first ChildNewparent filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByAddress(string $address) Return the first ChildNewparent filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByDateapplied(string $dateApplied) Return the first ChildNewparent filtered by the dateApplied column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByBiologicalchild(string $biologicalChild) Return the first ChildNewparent filtered by the biologicalChild column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByStaffid(int $staffId) Return the first ChildNewparent filtered by the staffId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByGender(string $gender) Return the first ChildNewparent filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNewparent requireOneByAge(int $age) Return the first ChildNewparent filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNewparent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNewparent objects based on current ModelCriteria
 * @method     ChildNewparent[]|ObjectCollection findByNewparentid(int $newParentId) Return ChildNewparent objects filtered by the newParentId column
 * @method     ChildNewparent[]|ObjectCollection findByFirstname(string $firstName) Return ChildNewparent objects filtered by the firstName column
 * @method     ChildNewparent[]|ObjectCollection findByLastname(string $lastName) Return ChildNewparent objects filtered by the lastName column
 * @method     ChildNewparent[]|ObjectCollection findByChildid(int $childId) Return ChildNewparent objects filtered by the childId column
 * @method     ChildNewparent[]|ObjectCollection findByTelephone(string $telephone) Return ChildNewparent objects filtered by the telephone column
 * @method     ChildNewparent[]|ObjectCollection findByEmail(string $email) Return ChildNewparent objects filtered by the email column
 * @method     ChildNewparent[]|ObjectCollection findByAddress(string $address) Return ChildNewparent objects filtered by the address column
 * @method     ChildNewparent[]|ObjectCollection findByDateapplied(string $dateApplied) Return ChildNewparent objects filtered by the dateApplied column
 * @method     ChildNewparent[]|ObjectCollection findByBiologicalchild(string $biologicalChild) Return ChildNewparent objects filtered by the biologicalChild column
 * @method     ChildNewparent[]|ObjectCollection findByStaffid(int $staffId) Return ChildNewparent objects filtered by the staffId column
 * @method     ChildNewparent[]|ObjectCollection findByGender(string $gender) Return ChildNewparent objects filtered by the gender column
 * @method     ChildNewparent[]|ObjectCollection findByAge(int $age) Return ChildNewparent objects filtered by the age column
 * @method     ChildNewparent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NewparentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NewparentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Newparent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNewparentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNewparentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNewparentQuery) {
            return $criteria;
        }
        $query = new ChildNewparentQuery();
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
     * @return ChildNewparent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NewparentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NewparentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildNewparent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT newParentId, firstName, lastName, childId, telephone, email, address, dateApplied, biologicalChild, staffId, gender, age FROM newparent WHERE newParentId = :p0';
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
            /** @var ChildNewparent $obj */
            $obj = new ChildNewparent();
            $obj->hydrate($row);
            NewparentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildNewparent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NewparentTableMap::COL_NEWPARENTID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewparentTableMap::COL_NEWPARENTID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the newParentId column
     *
     * Example usage:
     * <code>
     * $query->filterByNewparentid(1234); // WHERE newParentId = 1234
     * $query->filterByNewparentid(array(12, 34)); // WHERE newParentId IN (12, 34)
     * $query->filterByNewparentid(array('min' => 12)); // WHERE newParentId > 12
     * </code>
     *
     * @param     mixed $newparentid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByNewparentid($newparentid = null, $comparison = null)
    {
        if (is_array($newparentid)) {
            $useMinMax = false;
            if (isset($newparentid['min'])) {
                $this->addUsingAlias(NewparentTableMap::COL_NEWPARENTID, $newparentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newparentid['max'])) {
                $this->addUsingAlias(NewparentTableMap::COL_NEWPARENTID, $newparentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_NEWPARENTID, $newparentid, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_FIRSTNAME, $firstname, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_LASTNAME, $lastname, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByChildid($childid = null, $comparison = null)
    {
        if (is_array($childid)) {
            $useMinMax = false;
            if (isset($childid['min'])) {
                $this->addUsingAlias(NewparentTableMap::COL_CHILDID, $childid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($childid['max'])) {
                $this->addUsingAlias(NewparentTableMap::COL_CHILDID, $childid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_CHILDID, $childid, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByTelephone($telephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_TELEPHONE, $telephone, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_ADDRESS, $address, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByDateapplied($dateapplied = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateapplied)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_DATEAPPLIED, $dateapplied, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByBiologicalchild($biologicalchild = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($biologicalchild)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_BIOLOGICALCHILD, $biologicalchild, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByStaffid($staffid = null, $comparison = null)
    {
        if (is_array($staffid)) {
            $useMinMax = false;
            if (isset($staffid['min'])) {
                $this->addUsingAlias(NewparentTableMap::COL_STAFFID, $staffid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($staffid['max'])) {
                $this->addUsingAlias(NewparentTableMap::COL_STAFFID, $staffid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_STAFFID, $staffid, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_GENDER, $gender, $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(NewparentTableMap::COL_AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(NewparentTableMap::COL_AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewparentTableMap::COL_AGE, $age, $comparison);
    }

    /**
     * Filter the query by a related \Child object
     *
     * @param \Child|ObjectCollection $child The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByChild($child, $comparison = null)
    {
        if ($child instanceof \Child) {
            return $this
                ->addUsingAlias(NewparentTableMap::COL_CHILDID, $child->getChildid(), $comparison);
        } elseif ($child instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewparentTableMap::COL_CHILDID, $child->toKeyValue('PrimaryKey', 'Childid'), $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
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
     * Filter the query by a related \Staff object
     *
     * @param \Staff|ObjectCollection $staff The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNewparentQuery The current query, for fluid interface
     */
    public function filterByStaff($staff, $comparison = null)
    {
        if ($staff instanceof \Staff) {
            return $this
                ->addUsingAlias(NewparentTableMap::COL_STAFFID, $staff->getStaffid(), $comparison);
        } elseif ($staff instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewparentTableMap::COL_STAFFID, $staff->toKeyValue('PrimaryKey', 'Staffid'), $comparison);
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
     * @return $this|ChildNewparentQuery The current query, for fluid interface
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
     * @param   ChildNewparent $newparent Object to remove from the list of results
     *
     * @return $this|ChildNewparentQuery The current query, for fluid interface
     */
    public function prune($newparent = null)
    {
        if ($newparent) {
            $this->addUsingAlias(NewparentTableMap::COL_NEWPARENTID, $newparent->getNewparentid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the newparent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewparentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NewparentTableMap::clearInstancePool();
            NewparentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NewparentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NewparentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NewparentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NewparentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NewparentQuery
