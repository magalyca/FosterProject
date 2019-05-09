<?php

namespace Base;

use \Child as ChildChild;
use \ChildQuery as ChildChildQuery;
use \Exception;
use \PDO;
use Map\ChildTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'child' table.
 *
 *
 *
 * @method     ChildChildQuery orderByChildid($order = Criteria::ASC) Order by the childId column
 * @method     ChildChildQuery orderByFirstname($order = Criteria::ASC) Order by the firstName column
 * @method     ChildChildQuery orderByLastname($order = Criteria::ASC) Order by the lastName column
 * @method     ChildChildQuery orderByDateofbirth($order = Criteria::ASC) Order by the dateOfBirth column
 * @method     ChildChildQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildChildQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     ChildChildQuery orderByRoomnumber($order = Criteria::ASC) Order by the roomNumber column
 * @method     ChildChildQuery orderByAdopted($order = Criteria::ASC) Order by the adopted column
 * @method     ChildChildQuery orderByStaffid($order = Criteria::ASC) Order by the staffId column
 * @method     ChildChildQuery orderByDateentered($order = Criteria::ASC) Order by the dateEntered column
 * @method     ChildChildQuery orderByEmergencycontact($order = Criteria::ASC) Order by the emergencyContact column
 * @method     ChildChildQuery orderByMedicalrecordid($order = Criteria::ASC) Order by the medicalRecordId column
 * @method     ChildChildQuery orderByPersonaldocid($order = Criteria::ASC) Order by the personalDocId column
 * @method     ChildChildQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildChildQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildChildQuery orderByBioparentid($order = Criteria::ASC) Order by the bioParentId column
 * @method     ChildChildQuery orderByNewparentid($order = Criteria::ASC) Order by the newParentId column
 *
 * @method     ChildChildQuery groupByChildid() Group by the childId column
 * @method     ChildChildQuery groupByFirstname() Group by the firstName column
 * @method     ChildChildQuery groupByLastname() Group by the lastName column
 * @method     ChildChildQuery groupByDateofbirth() Group by the dateOfBirth column
 * @method     ChildChildQuery groupByAge() Group by the age column
 * @method     ChildChildQuery groupByGender() Group by the gender column
 * @method     ChildChildQuery groupByRoomnumber() Group by the roomNumber column
 * @method     ChildChildQuery groupByAdopted() Group by the adopted column
 * @method     ChildChildQuery groupByStaffid() Group by the staffId column
 * @method     ChildChildQuery groupByDateentered() Group by the dateEntered column
 * @method     ChildChildQuery groupByEmergencycontact() Group by the emergencyContact column
 * @method     ChildChildQuery groupByMedicalrecordid() Group by the medicalRecordId column
 * @method     ChildChildQuery groupByPersonaldocid() Group by the personalDocId column
 * @method     ChildChildQuery groupByHeight() Group by the height column
 * @method     ChildChildQuery groupByWeight() Group by the weight column
 * @method     ChildChildQuery groupByBioparentid() Group by the bioParentId column
 * @method     ChildChildQuery groupByNewparentid() Group by the newParentId column
 *
 * @method     ChildChildQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChildQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChildQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChildQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildChildQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildChildQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildChildQuery leftJoinStaff($relationAlias = null) Adds a LEFT JOIN clause to the query using the Staff relation
 * @method     ChildChildQuery rightJoinStaff($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Staff relation
 * @method     ChildChildQuery innerJoinStaff($relationAlias = null) Adds a INNER JOIN clause to the query using the Staff relation
 *
 * @method     ChildChildQuery joinWithStaff($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Staff relation
 *
 * @method     ChildChildQuery leftJoinWithStaff() Adds a LEFT JOIN clause and with to the query using the Staff relation
 * @method     ChildChildQuery rightJoinWithStaff() Adds a RIGHT JOIN clause and with to the query using the Staff relation
 * @method     ChildChildQuery innerJoinWithStaff() Adds a INNER JOIN clause and with to the query using the Staff relation
 *
 * @method     ChildChildQuery leftJoinBiologicalparent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Biologicalparent relation
 * @method     ChildChildQuery rightJoinBiologicalparent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Biologicalparent relation
 * @method     ChildChildQuery innerJoinBiologicalparent($relationAlias = null) Adds a INNER JOIN clause to the query using the Biologicalparent relation
 *
 * @method     ChildChildQuery joinWithBiologicalparent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Biologicalparent relation
 *
 * @method     ChildChildQuery leftJoinWithBiologicalparent() Adds a LEFT JOIN clause and with to the query using the Biologicalparent relation
 * @method     ChildChildQuery rightJoinWithBiologicalparent() Adds a RIGHT JOIN clause and with to the query using the Biologicalparent relation
 * @method     ChildChildQuery innerJoinWithBiologicalparent() Adds a INNER JOIN clause and with to the query using the Biologicalparent relation
 *
 * @method     ChildChildQuery leftJoinMedicalrecord($relationAlias = null) Adds a LEFT JOIN clause to the query using the Medicalrecord relation
 * @method     ChildChildQuery rightJoinMedicalrecord($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Medicalrecord relation
 * @method     ChildChildQuery innerJoinMedicalrecord($relationAlias = null) Adds a INNER JOIN clause to the query using the Medicalrecord relation
 *
 * @method     ChildChildQuery joinWithMedicalrecord($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Medicalrecord relation
 *
 * @method     ChildChildQuery leftJoinWithMedicalrecord() Adds a LEFT JOIN clause and with to the query using the Medicalrecord relation
 * @method     ChildChildQuery rightJoinWithMedicalrecord() Adds a RIGHT JOIN clause and with to the query using the Medicalrecord relation
 * @method     ChildChildQuery innerJoinWithMedicalrecord() Adds a INNER JOIN clause and with to the query using the Medicalrecord relation
 *
 * @method     ChildChildQuery leftJoinNewparent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Newparent relation
 * @method     ChildChildQuery rightJoinNewparent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Newparent relation
 * @method     ChildChildQuery innerJoinNewparent($relationAlias = null) Adds a INNER JOIN clause to the query using the Newparent relation
 *
 * @method     ChildChildQuery joinWithNewparent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Newparent relation
 *
 * @method     ChildChildQuery leftJoinWithNewparent() Adds a LEFT JOIN clause and with to the query using the Newparent relation
 * @method     ChildChildQuery rightJoinWithNewparent() Adds a RIGHT JOIN clause and with to the query using the Newparent relation
 * @method     ChildChildQuery innerJoinWithNewparent() Adds a INNER JOIN clause and with to the query using the Newparent relation
 *
 * @method     ChildChildQuery leftJoinPersonaldocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the Personaldocument relation
 * @method     ChildChildQuery rightJoinPersonaldocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Personaldocument relation
 * @method     ChildChildQuery innerJoinPersonaldocument($relationAlias = null) Adds a INNER JOIN clause to the query using the Personaldocument relation
 *
 * @method     ChildChildQuery joinWithPersonaldocument($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Personaldocument relation
 *
 * @method     ChildChildQuery leftJoinWithPersonaldocument() Adds a LEFT JOIN clause and with to the query using the Personaldocument relation
 * @method     ChildChildQuery rightJoinWithPersonaldocument() Adds a RIGHT JOIN clause and with to the query using the Personaldocument relation
 * @method     ChildChildQuery innerJoinWithPersonaldocument() Adds a INNER JOIN clause and with to the query using the Personaldocument relation
 *
 * @method     ChildChildQuery leftJoinRooms($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rooms relation
 * @method     ChildChildQuery rightJoinRooms($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rooms relation
 * @method     ChildChildQuery innerJoinRooms($relationAlias = null) Adds a INNER JOIN clause to the query using the Rooms relation
 *
 * @method     ChildChildQuery joinWithRooms($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Rooms relation
 *
 * @method     ChildChildQuery leftJoinWithRooms() Adds a LEFT JOIN clause and with to the query using the Rooms relation
 * @method     ChildChildQuery rightJoinWithRooms() Adds a RIGHT JOIN clause and with to the query using the Rooms relation
 * @method     ChildChildQuery innerJoinWithRooms() Adds a INNER JOIN clause and with to the query using the Rooms relation
 *
 * @method     \StaffQuery|\BiologicalparentQuery|\MedicalrecordQuery|\NewparentQuery|\PersonaldocumentQuery|\RoomsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildChild findOne(ConnectionInterface $con = null) Return the first ChildChild matching the query
 * @method     ChildChild findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChild matching the query, or a new ChildChild object populated from the query conditions when no match is found
 *
 * @method     ChildChild findOneByChildid(int $childId) Return the first ChildChild filtered by the childId column
 * @method     ChildChild findOneByFirstname(string $firstName) Return the first ChildChild filtered by the firstName column
 * @method     ChildChild findOneByLastname(string $lastName) Return the first ChildChild filtered by the lastName column
 * @method     ChildChild findOneByDateofbirth(string $dateOfBirth) Return the first ChildChild filtered by the dateOfBirth column
 * @method     ChildChild findOneByAge(int $age) Return the first ChildChild filtered by the age column
 * @method     ChildChild findOneByGender(string $gender) Return the first ChildChild filtered by the gender column
 * @method     ChildChild findOneByRoomnumber(int $roomNumber) Return the first ChildChild filtered by the roomNumber column
 * @method     ChildChild findOneByAdopted(string $adopted) Return the first ChildChild filtered by the adopted column
 * @method     ChildChild findOneByStaffid(int $staffId) Return the first ChildChild filtered by the staffId column
 * @method     ChildChild findOneByDateentered(string $dateEntered) Return the first ChildChild filtered by the dateEntered column
 * @method     ChildChild findOneByEmergencycontact(string $emergencyContact) Return the first ChildChild filtered by the emergencyContact column
 * @method     ChildChild findOneByMedicalrecordid(int $medicalRecordId) Return the first ChildChild filtered by the medicalRecordId column
 * @method     ChildChild findOneByPersonaldocid(int $personalDocId) Return the first ChildChild filtered by the personalDocId column
 * @method     ChildChild findOneByHeight(int $height) Return the first ChildChild filtered by the height column
 * @method     ChildChild findOneByWeight(int $weight) Return the first ChildChild filtered by the weight column
 * @method     ChildChild findOneByBioparentid(int $bioParentId) Return the first ChildChild filtered by the bioParentId column
 * @method     ChildChild findOneByNewparentid(int $newParentId) Return the first ChildChild filtered by the newParentId column *

 * @method     ChildChild requirePk($key, ConnectionInterface $con = null) Return the ChildChild by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOne(ConnectionInterface $con = null) Return the first ChildChild matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChild requireOneByChildid(int $childId) Return the first ChildChild filtered by the childId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByFirstname(string $firstName) Return the first ChildChild filtered by the firstName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByLastname(string $lastName) Return the first ChildChild filtered by the lastName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByDateofbirth(string $dateOfBirth) Return the first ChildChild filtered by the dateOfBirth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByAge(int $age) Return the first ChildChild filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByGender(string $gender) Return the first ChildChild filtered by the gender column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByRoomnumber(int $roomNumber) Return the first ChildChild filtered by the roomNumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByAdopted(string $adopted) Return the first ChildChild filtered by the adopted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByStaffid(int $staffId) Return the first ChildChild filtered by the staffId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByDateentered(string $dateEntered) Return the first ChildChild filtered by the dateEntered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByEmergencycontact(string $emergencyContact) Return the first ChildChild filtered by the emergencyContact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByMedicalrecordid(int $medicalRecordId) Return the first ChildChild filtered by the medicalRecordId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByPersonaldocid(int $personalDocId) Return the first ChildChild filtered by the personalDocId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByHeight(int $height) Return the first ChildChild filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByWeight(int $weight) Return the first ChildChild filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByBioparentid(int $bioParentId) Return the first ChildChild filtered by the bioParentId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildChild requireOneByNewparentid(int $newParentId) Return the first ChildChild filtered by the newParentId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildChild[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChild objects based on current ModelCriteria
 * @method     ChildChild[]|ObjectCollection findByChildid(int $childId) Return ChildChild objects filtered by the childId column
 * @method     ChildChild[]|ObjectCollection findByFirstname(string $firstName) Return ChildChild objects filtered by the firstName column
 * @method     ChildChild[]|ObjectCollection findByLastname(string $lastName) Return ChildChild objects filtered by the lastName column
 * @method     ChildChild[]|ObjectCollection findByDateofbirth(string $dateOfBirth) Return ChildChild objects filtered by the dateOfBirth column
 * @method     ChildChild[]|ObjectCollection findByAge(int $age) Return ChildChild objects filtered by the age column
 * @method     ChildChild[]|ObjectCollection findByGender(string $gender) Return ChildChild objects filtered by the gender column
 * @method     ChildChild[]|ObjectCollection findByRoomnumber(int $roomNumber) Return ChildChild objects filtered by the roomNumber column
 * @method     ChildChild[]|ObjectCollection findByAdopted(string $adopted) Return ChildChild objects filtered by the adopted column
 * @method     ChildChild[]|ObjectCollection findByStaffid(int $staffId) Return ChildChild objects filtered by the staffId column
 * @method     ChildChild[]|ObjectCollection findByDateentered(string $dateEntered) Return ChildChild objects filtered by the dateEntered column
 * @method     ChildChild[]|ObjectCollection findByEmergencycontact(string $emergencyContact) Return ChildChild objects filtered by the emergencyContact column
 * @method     ChildChild[]|ObjectCollection findByMedicalrecordid(int $medicalRecordId) Return ChildChild objects filtered by the medicalRecordId column
 * @method     ChildChild[]|ObjectCollection findByPersonaldocid(int $personalDocId) Return ChildChild objects filtered by the personalDocId column
 * @method     ChildChild[]|ObjectCollection findByHeight(int $height) Return ChildChild objects filtered by the height column
 * @method     ChildChild[]|ObjectCollection findByWeight(int $weight) Return ChildChild objects filtered by the weight column
 * @method     ChildChild[]|ObjectCollection findByBioparentid(int $bioParentId) Return ChildChild objects filtered by the bioParentId column
 * @method     ChildChild[]|ObjectCollection findByNewparentid(int $newParentId) Return ChildChild objects filtered by the newParentId column
 * @method     ChildChild[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChildQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ChildQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Child', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChildQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChildQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChildQuery) {
            return $criteria;
        }
        $query = new ChildChildQuery();
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
     * @return ChildChild|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChildTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ChildTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildChild A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT childId, firstName, lastName, dateOfBirth, age, gender, roomNumber, adopted, staffId, dateEntered, emergencyContact, medicalRecordId, personalDocId, height, weight, bioParentId, newParentId FROM child WHERE childId = :p0';
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
            /** @var ChildChild $obj */
            $obj = new ChildChild();
            $obj->hydrate($row);
            ChildTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildChild|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChildTableMap::COL_CHILDID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChildTableMap::COL_CHILDID, $keys, Criteria::IN);
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
     * @param     mixed $childid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByChildid($childid = null, $comparison = null)
    {
        if (is_array($childid)) {
            $useMinMax = false;
            if (isset($childid['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_CHILDID, $childid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($childid['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_CHILDID, $childid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_CHILDID, $childid, $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_FIRSTNAME, $firstname, $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the dateOfBirth column
     *
     * Example usage:
     * <code>
     * $query->filterByDateofbirth('fooValue');   // WHERE dateOfBirth = 'fooValue'
     * $query->filterByDateofbirth('%fooValue%', Criteria::LIKE); // WHERE dateOfBirth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateofbirth The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByDateofbirth($dateofbirth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateofbirth)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_DATEOFBIRTH, $dateofbirth, $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_AGE, $age, $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByGender($gender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gender)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_GENDER, $gender, $comparison);
    }

    /**
     * Filter the query on the roomNumber column
     *
     * Example usage:
     * <code>
     * $query->filterByRoomnumber(1234); // WHERE roomNumber = 1234
     * $query->filterByRoomnumber(array(12, 34)); // WHERE roomNumber IN (12, 34)
     * $query->filterByRoomnumber(array('min' => 12)); // WHERE roomNumber > 12
     * </code>
     *
     * @param     mixed $roomnumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByRoomnumber($roomnumber = null, $comparison = null)
    {
        if (is_array($roomnumber)) {
            $useMinMax = false;
            if (isset($roomnumber['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_ROOMNUMBER, $roomnumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roomnumber['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_ROOMNUMBER, $roomnumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_ROOMNUMBER, $roomnumber, $comparison);
    }

    /**
     * Filter the query on the adopted column
     *
     * Example usage:
     * <code>
     * $query->filterByAdopted('fooValue');   // WHERE adopted = 'fooValue'
     * $query->filterByAdopted('%fooValue%', Criteria::LIKE); // WHERE adopted LIKE '%fooValue%'
     * </code>
     *
     * @param     string $adopted The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByAdopted($adopted = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($adopted)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_ADOPTED, $adopted, $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByStaffid($staffid = null, $comparison = null)
    {
        if (is_array($staffid)) {
            $useMinMax = false;
            if (isset($staffid['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_STAFFID, $staffid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($staffid['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_STAFFID, $staffid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_STAFFID, $staffid, $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByDateentered($dateentered = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateentered)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_DATEENTERED, $dateentered, $comparison);
    }

    /**
     * Filter the query on the emergencyContact column
     *
     * Example usage:
     * <code>
     * $query->filterByEmergencycontact('fooValue');   // WHERE emergencyContact = 'fooValue'
     * $query->filterByEmergencycontact('%fooValue%', Criteria::LIKE); // WHERE emergencyContact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emergencycontact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByEmergencycontact($emergencycontact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emergencycontact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_EMERGENCYCONTACT, $emergencycontact, $comparison);
    }

    /**
     * Filter the query on the medicalRecordId column
     *
     * Example usage:
     * <code>
     * $query->filterByMedicalrecordid(1234); // WHERE medicalRecordId = 1234
     * $query->filterByMedicalrecordid(array(12, 34)); // WHERE medicalRecordId IN (12, 34)
     * $query->filterByMedicalrecordid(array('min' => 12)); // WHERE medicalRecordId > 12
     * </code>
     *
     * @param     mixed $medicalrecordid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByMedicalrecordid($medicalrecordid = null, $comparison = null)
    {
        if (is_array($medicalrecordid)) {
            $useMinMax = false;
            if (isset($medicalrecordid['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_MEDICALRECORDID, $medicalrecordid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($medicalrecordid['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_MEDICALRECORDID, $medicalrecordid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_MEDICALRECORDID, $medicalrecordid, $comparison);
    }

    /**
     * Filter the query on the personalDocId column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonaldocid(1234); // WHERE personalDocId = 1234
     * $query->filterByPersonaldocid(array(12, 34)); // WHERE personalDocId IN (12, 34)
     * $query->filterByPersonaldocid(array('min' => 12)); // WHERE personalDocId > 12
     * </code>
     *
     * @param     mixed $personaldocid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByPersonaldocid($personaldocid = null, $comparison = null)
    {
        if (is_array($personaldocid)) {
            $useMinMax = false;
            if (isset($personaldocid['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_PERSONALDOCID, $personaldocid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personaldocid['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_PERSONALDOCID, $personaldocid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_PERSONALDOCID, $personaldocid, $comparison);
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight(1234); // WHERE height = 1234
     * $query->filterByHeight(array(12, 34)); // WHERE height IN (12, 34)
     * $query->filterByHeight(array('min' => 12)); // WHERE height > 12
     * </code>
     *
     * @param     mixed $height The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight(1234); // WHERE weight = 1234
     * $query->filterByWeight(array(12, 34)); // WHERE weight IN (12, 34)
     * $query->filterByWeight(array('min' => 12)); // WHERE weight > 12
     * </code>
     *
     * @param     mixed $weight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (is_array($weight)) {
            $useMinMax = false;
            if (isset($weight['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_WEIGHT, $weight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weight['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_WEIGHT, $weight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_WEIGHT, $weight, $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByBioparentid($bioparentid = null, $comparison = null)
    {
        if (is_array($bioparentid)) {
            $useMinMax = false;
            if (isset($bioparentid['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_BIOPARENTID, $bioparentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bioparentid['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_BIOPARENTID, $bioparentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_BIOPARENTID, $bioparentid, $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function filterByNewparentid($newparentid = null, $comparison = null)
    {
        if (is_array($newparentid)) {
            $useMinMax = false;
            if (isset($newparentid['min'])) {
                $this->addUsingAlias(ChildTableMap::COL_NEWPARENTID, $newparentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($newparentid['max'])) {
                $this->addUsingAlias(ChildTableMap::COL_NEWPARENTID, $newparentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChildTableMap::COL_NEWPARENTID, $newparentid, $comparison);
    }

    /**
     * Filter the query by a related \Staff object
     *
     * @param \Staff|ObjectCollection $staff The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildChildQuery The current query, for fluid interface
     */
    public function filterByStaff($staff, $comparison = null)
    {
        if ($staff instanceof \Staff) {
            return $this
                ->addUsingAlias(ChildTableMap::COL_STAFFID, $staff->getStaffid(), $comparison);
        } elseif ($staff instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ChildTableMap::COL_STAFFID, $staff->toKeyValue('PrimaryKey', 'Staffid'), $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
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
     * Filter the query by a related \Biologicalparent object
     *
     * @param \Biologicalparent|ObjectCollection $biologicalparent the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChildQuery The current query, for fluid interface
     */
    public function filterByBiologicalparent($biologicalparent, $comparison = null)
    {
        if ($biologicalparent instanceof \Biologicalparent) {
            return $this
                ->addUsingAlias(ChildTableMap::COL_CHILDID, $biologicalparent->getChildname(), $comparison);
        } elseif ($biologicalparent instanceof ObjectCollection) {
            return $this
                ->useBiologicalparentQuery()
                ->filterByPrimaryKeys($biologicalparent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBiologicalparent() only accepts arguments of type \Biologicalparent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Biologicalparent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function joinBiologicalparent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Biologicalparent');

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
            $this->addJoinObject($join, 'Biologicalparent');
        }

        return $this;
    }

    /**
     * Use the Biologicalparent relation Biologicalparent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \BiologicalparentQuery A secondary query class using the current class as primary query
     */
    public function useBiologicalparentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBiologicalparent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Biologicalparent', '\BiologicalparentQuery');
    }

    /**
     * Filter the query by a related \Medicalrecord object
     *
     * @param \Medicalrecord|ObjectCollection $medicalrecord the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChildQuery The current query, for fluid interface
     */
    public function filterByMedicalrecord($medicalrecord, $comparison = null)
    {
        if ($medicalrecord instanceof \Medicalrecord) {
            return $this
                ->addUsingAlias(ChildTableMap::COL_CHILDID, $medicalrecord->getChildid(), $comparison);
        } elseif ($medicalrecord instanceof ObjectCollection) {
            return $this
                ->useMedicalrecordQuery()
                ->filterByPrimaryKeys($medicalrecord->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMedicalrecord() only accepts arguments of type \Medicalrecord or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Medicalrecord relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function joinMedicalrecord($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Medicalrecord');

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
            $this->addJoinObject($join, 'Medicalrecord');
        }

        return $this;
    }

    /**
     * Use the Medicalrecord relation Medicalrecord object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MedicalrecordQuery A secondary query class using the current class as primary query
     */
    public function useMedicalrecordQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMedicalrecord($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Medicalrecord', '\MedicalrecordQuery');
    }

    /**
     * Filter the query by a related \Newparent object
     *
     * @param \Newparent|ObjectCollection $newparent the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChildQuery The current query, for fluid interface
     */
    public function filterByNewparent($newparent, $comparison = null)
    {
        if ($newparent instanceof \Newparent) {
            return $this
                ->addUsingAlias(ChildTableMap::COL_CHILDID, $newparent->getChildid(), $comparison);
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
     * @return $this|ChildChildQuery The current query, for fluid interface
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
     * Filter the query by a related \Personaldocument object
     *
     * @param \Personaldocument|ObjectCollection $personaldocument the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChildQuery The current query, for fluid interface
     */
    public function filterByPersonaldocument($personaldocument, $comparison = null)
    {
        if ($personaldocument instanceof \Personaldocument) {
            return $this
                ->addUsingAlias(ChildTableMap::COL_CHILDID, $personaldocument->getChildid(), $comparison);
        } elseif ($personaldocument instanceof ObjectCollection) {
            return $this
                ->usePersonaldocumentQuery()
                ->filterByPrimaryKeys($personaldocument->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildChildQuery The current query, for fluid interface
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
     * Filter the query by a related \Rooms object
     *
     * @param \Rooms|ObjectCollection $rooms the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildChildQuery The current query, for fluid interface
     */
    public function filterByRooms($rooms, $comparison = null)
    {
        if ($rooms instanceof \Rooms) {
            return $this
                ->addUsingAlias(ChildTableMap::COL_CHILDID, $rooms->getChildid(), $comparison);
        } elseif ($rooms instanceof ObjectCollection) {
            return $this
                ->useRoomsQuery()
                ->filterByPrimaryKeys($rooms->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRooms() only accepts arguments of type \Rooms or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rooms relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function joinRooms($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rooms');

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
            $this->addJoinObject($join, 'Rooms');
        }

        return $this;
    }

    /**
     * Use the Rooms relation Rooms object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RoomsQuery A secondary query class using the current class as primary query
     */
    public function useRoomsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRooms($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rooms', '\RoomsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChild $child Object to remove from the list of results
     *
     * @return $this|ChildChildQuery The current query, for fluid interface
     */
    public function prune($child = null)
    {
        if ($child) {
            $this->addUsingAlias(ChildTableMap::COL_CHILDID, $child->getChildid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the child table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChildTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChildTableMap::clearInstancePool();
            ChildTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ChildTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChildTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ChildTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChildTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChildQuery
