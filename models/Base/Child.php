<?php

namespace Base;

use \Biologicalparent as ChildBiologicalparent;
use \BiologicalparentQuery as ChildBiologicalparentQuery;
use \Child as ChildChild;
use \ChildQuery as ChildChildQuery;
use \Medicalrecord as ChildMedicalrecord;
use \MedicalrecordQuery as ChildMedicalrecordQuery;
use \Newparent as ChildNewparent;
use \NewparentQuery as ChildNewparentQuery;
use \Personaldocument as ChildPersonaldocument;
use \PersonaldocumentQuery as ChildPersonaldocumentQuery;
use \Rooms as ChildRooms;
use \RoomsQuery as ChildRoomsQuery;
use \Staff as ChildStaff;
use \StaffQuery as ChildStaffQuery;
use \Exception;
use \PDO;
use Map\BiologicalparentTableMap;
use Map\ChildTableMap;
use Map\MedicalrecordTableMap;
use Map\NewparentTableMap;
use Map\PersonaldocumentTableMap;
use Map\RoomsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'child' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Child implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ChildTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the childid field.
     *
     * @var        int
     */
    protected $childid;

    /**
     * The value for the firstname field.
     *
     * @var        string
     */
    protected $firstname;

    /**
     * The value for the lastname field.
     *
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the dateofbirth field.
     *
     * @var        string
     */
    protected $dateofbirth;

    /**
     * The value for the age field.
     *
     * @var        int
     */
    protected $age;

    /**
     * The value for the gender field.
     *
     * @var        string
     */
    protected $gender;

    /**
     * The value for the roomnumber field.
     *
     * @var        int
     */
    protected $roomnumber;

    /**
     * The value for the adopted field.
     *
     * @var        string
     */
    protected $adopted;

    /**
     * The value for the staffid field.
     *
     * @var        int
     */
    protected $staffid;

    /**
     * The value for the dateentered field.
     *
     * @var        string
     */
    protected $dateentered;

    /**
     * The value for the emergencycontact field.
     *
     * @var        string
     */
    protected $emergencycontact;

    /**
     * The value for the medicalrecordid field.
     *
     * @var        int
     */
    protected $medicalrecordid;

    /**
     * The value for the personaldocid field.
     *
     * @var        int
     */
    protected $personaldocid;

    /**
     * The value for the height field.
     *
     * @var        int
     */
    protected $height;

    /**
     * The value for the weight field.
     *
     * @var        int
     */
    protected $weight;

    /**
     * The value for the bioparentid field.
     *
     * @var        int
     */
    protected $bioparentid;

    /**
     * The value for the newparentid field.
     *
     * @var        int
     */
    protected $newparentid;

    /**
     * @var        ChildStaff
     */
    protected $aStaff;

    /**
     * @var        ObjectCollection|ChildBiologicalparent[] Collection to store aggregation of ChildBiologicalparent objects.
     */
    protected $collBiologicalparents;
    protected $collBiologicalparentsPartial;

    /**
     * @var        ObjectCollection|ChildMedicalrecord[] Collection to store aggregation of ChildMedicalrecord objects.
     */
    protected $collMedicalrecords;
    protected $collMedicalrecordsPartial;

    /**
     * @var        ObjectCollection|ChildNewparent[] Collection to store aggregation of ChildNewparent objects.
     */
    protected $collNewparents;
    protected $collNewparentsPartial;

    /**
     * @var        ObjectCollection|ChildPersonaldocument[] Collection to store aggregation of ChildPersonaldocument objects.
     */
    protected $collPersonaldocuments;
    protected $collPersonaldocumentsPartial;

    /**
     * @var        ObjectCollection|ChildRooms[] Collection to store aggregation of ChildRooms objects.
     */
    protected $collRoomss;
    protected $collRoomssPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildBiologicalparent[]
     */
    protected $biologicalparentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMedicalrecord[]
     */
    protected $medicalrecordsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildNewparent[]
     */
    protected $newparentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPersonaldocument[]
     */
    protected $personaldocumentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildRooms[]
     */
    protected $roomssScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Child object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Child</code> instance.  If
     * <code>obj</code> is an instance of <code>Child</code>, delegates to
     * <code>equals(Child)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Child The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [childid] column value.
     *
     * @return int
     */
    public function getChildid()
    {
        return $this->childid;
    }

    /**
     * Get the [firstname] column value.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the [dateofbirth] column value.
     *
     * @return string
     */
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * Get the [age] column value.
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the [gender] column value.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Get the [roomnumber] column value.
     *
     * @return int
     */
    public function getRoomnumber()
    {
        return $this->roomnumber;
    }

    /**
     * Get the [adopted] column value.
     *
     * @return string
     */
    public function getAdopted()
    {
        return $this->adopted;
    }

    /**
     * Get the [staffid] column value.
     *
     * @return int
     */
    public function getStaffid()
    {
        return $this->staffid;
    }

    /**
     * Get the [dateentered] column value.
     *
     * @return string
     */
    public function getDateentered()
    {
        return $this->dateentered;
    }

    /**
     * Get the [emergencycontact] column value.
     *
     * @return string
     */
    public function getEmergencycontact()
    {
        return $this->emergencycontact;
    }

    /**
     * Get the [medicalrecordid] column value.
     *
     * @return int
     */
    public function getMedicalrecordid()
    {
        return $this->medicalrecordid;
    }

    /**
     * Get the [personaldocid] column value.
     *
     * @return int
     */
    public function getPersonaldocid()
    {
        return $this->personaldocid;
    }

    /**
     * Get the [height] column value.
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the [weight] column value.
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get the [bioparentid] column value.
     *
     * @return int
     */
    public function getBioparentid()
    {
        return $this->bioparentid;
    }

    /**
     * Get the [newparentid] column value.
     *
     * @return int
     */
    public function getNewparentid()
    {
        return $this->newparentid;
    }

    /**
     * Set the value of [childid] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setChildid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->childid !== $v) {
            $this->childid = $v;
            $this->modifiedColumns[ChildTableMap::COL_CHILDID] = true;
        }

        return $this;
    } // setChildid()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[ChildTableMap::COL_FIRSTNAME] = true;
        }

        return $this;
    } // setFirstname()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[ChildTableMap::COL_LASTNAME] = true;
        }

        return $this;
    } // setLastname()

    /**
     * Set the value of [dateofbirth] column.
     *
     * @param string $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setDateofbirth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dateofbirth !== $v) {
            $this->dateofbirth = $v;
            $this->modifiedColumns[ChildTableMap::COL_DATEOFBIRTH] = true;
        }

        return $this;
    } // setDateofbirth()

    /**
     * Set the value of [age] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[ChildTableMap::COL_AGE] = true;
        }

        return $this;
    } // setAge()

    /**
     * Set the value of [gender] column.
     *
     * @param string $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setGender($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->gender !== $v) {
            $this->gender = $v;
            $this->modifiedColumns[ChildTableMap::COL_GENDER] = true;
        }

        return $this;
    } // setGender()

    /**
     * Set the value of [roomnumber] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setRoomnumber($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->roomnumber !== $v) {
            $this->roomnumber = $v;
            $this->modifiedColumns[ChildTableMap::COL_ROOMNUMBER] = true;
        }

        return $this;
    } // setRoomnumber()

    /**
     * Set the value of [adopted] column.
     *
     * @param string $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setAdopted($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adopted !== $v) {
            $this->adopted = $v;
            $this->modifiedColumns[ChildTableMap::COL_ADOPTED] = true;
        }

        return $this;
    } // setAdopted()

    /**
     * Set the value of [staffid] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setStaffid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->staffid !== $v) {
            $this->staffid = $v;
            $this->modifiedColumns[ChildTableMap::COL_STAFFID] = true;
        }

        if ($this->aStaff !== null && $this->aStaff->getStaffid() !== $v) {
            $this->aStaff = null;
        }

        return $this;
    } // setStaffid()

    /**
     * Set the value of [dateentered] column.
     *
     * @param string $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setDateentered($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dateentered !== $v) {
            $this->dateentered = $v;
            $this->modifiedColumns[ChildTableMap::COL_DATEENTERED] = true;
        }

        return $this;
    } // setDateentered()

    /**
     * Set the value of [emergencycontact] column.
     *
     * @param string $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setEmergencycontact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->emergencycontact !== $v) {
            $this->emergencycontact = $v;
            $this->modifiedColumns[ChildTableMap::COL_EMERGENCYCONTACT] = true;
        }

        return $this;
    } // setEmergencycontact()

    /**
     * Set the value of [medicalrecordid] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setMedicalrecordid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->medicalrecordid !== $v) {
            $this->medicalrecordid = $v;
            $this->modifiedColumns[ChildTableMap::COL_MEDICALRECORDID] = true;
        }

        return $this;
    } // setMedicalrecordid()

    /**
     * Set the value of [personaldocid] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setPersonaldocid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->personaldocid !== $v) {
            $this->personaldocid = $v;
            $this->modifiedColumns[ChildTableMap::COL_PERSONALDOCID] = true;
        }

        return $this;
    } // setPersonaldocid()

    /**
     * Set the value of [height] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setHeight($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->height !== $v) {
            $this->height = $v;
            $this->modifiedColumns[ChildTableMap::COL_HEIGHT] = true;
        }

        return $this;
    } // setHeight()

    /**
     * Set the value of [weight] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setWeight($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->weight !== $v) {
            $this->weight = $v;
            $this->modifiedColumns[ChildTableMap::COL_WEIGHT] = true;
        }

        return $this;
    } // setWeight()

    /**
     * Set the value of [bioparentid] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setBioparentid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bioparentid !== $v) {
            $this->bioparentid = $v;
            $this->modifiedColumns[ChildTableMap::COL_BIOPARENTID] = true;
        }

        return $this;
    } // setBioparentid()

    /**
     * Set the value of [newparentid] column.
     *
     * @param int $v new value
     * @return $this|\Child The current object (for fluent API support)
     */
    public function setNewparentid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->newparentid !== $v) {
            $this->newparentid = $v;
            $this->modifiedColumns[ChildTableMap::COL_NEWPARENTID] = true;
        }

        return $this;
    } // setNewparentid()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ChildTableMap::translateFieldName('Childid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->childid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ChildTableMap::translateFieldName('Firstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ChildTableMap::translateFieldName('Lastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ChildTableMap::translateFieldName('Dateofbirth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dateofbirth = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ChildTableMap::translateFieldName('Age', TableMap::TYPE_PHPNAME, $indexType)];
            $this->age = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ChildTableMap::translateFieldName('Gender', TableMap::TYPE_PHPNAME, $indexType)];
            $this->gender = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ChildTableMap::translateFieldName('Roomnumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->roomnumber = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ChildTableMap::translateFieldName('Adopted', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adopted = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ChildTableMap::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->staffid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ChildTableMap::translateFieldName('Dateentered', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dateentered = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ChildTableMap::translateFieldName('Emergencycontact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->emergencycontact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ChildTableMap::translateFieldName('Medicalrecordid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->medicalrecordid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ChildTableMap::translateFieldName('Personaldocid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->personaldocid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ChildTableMap::translateFieldName('Height', TableMap::TYPE_PHPNAME, $indexType)];
            $this->height = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ChildTableMap::translateFieldName('Weight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weight = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ChildTableMap::translateFieldName('Bioparentid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bioparentid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : ChildTableMap::translateFieldName('Newparentid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->newparentid = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = ChildTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Child'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aStaff !== null && $this->staffid !== $this->aStaff->getStaffid()) {
            $this->aStaff = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChildTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildChildQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aStaff = null;
            $this->collBiologicalparents = null;

            $this->collMedicalrecords = null;

            $this->collNewparents = null;

            $this->collPersonaldocuments = null;

            $this->collRoomss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Child::setDeleted()
     * @see Child::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChildTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildChildQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChildTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ChildTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aStaff !== null) {
                if ($this->aStaff->isModified() || $this->aStaff->isNew()) {
                    $affectedRows += $this->aStaff->save($con);
                }
                $this->setStaff($this->aStaff);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->biologicalparentsScheduledForDeletion !== null) {
                if (!$this->biologicalparentsScheduledForDeletion->isEmpty()) {
                    \BiologicalparentQuery::create()
                        ->filterByPrimaryKeys($this->biologicalparentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->biologicalparentsScheduledForDeletion = null;
                }
            }

            if ($this->collBiologicalparents !== null) {
                foreach ($this->collBiologicalparents as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->medicalrecordsScheduledForDeletion !== null) {
                if (!$this->medicalrecordsScheduledForDeletion->isEmpty()) {
                    \MedicalrecordQuery::create()
                        ->filterByPrimaryKeys($this->medicalrecordsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->medicalrecordsScheduledForDeletion = null;
                }
            }

            if ($this->collMedicalrecords !== null) {
                foreach ($this->collMedicalrecords as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->newparentsScheduledForDeletion !== null) {
                if (!$this->newparentsScheduledForDeletion->isEmpty()) {
                    \NewparentQuery::create()
                        ->filterByPrimaryKeys($this->newparentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->newparentsScheduledForDeletion = null;
                }
            }

            if ($this->collNewparents !== null) {
                foreach ($this->collNewparents as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->personaldocumentsScheduledForDeletion !== null) {
                if (!$this->personaldocumentsScheduledForDeletion->isEmpty()) {
                    \PersonaldocumentQuery::create()
                        ->filterByPrimaryKeys($this->personaldocumentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->personaldocumentsScheduledForDeletion = null;
                }
            }

            if ($this->collPersonaldocuments !== null) {
                foreach ($this->collPersonaldocuments as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->roomssScheduledForDeletion !== null) {
                if (!$this->roomssScheduledForDeletion->isEmpty()) {
                    \RoomsQuery::create()
                        ->filterByPrimaryKeys($this->roomssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->roomssScheduledForDeletion = null;
                }
            }

            if ($this->collRoomss !== null) {
                foreach ($this->collRoomss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[ChildTableMap::COL_CHILDID] = true;
        if (null !== $this->childid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ChildTableMap::COL_CHILDID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ChildTableMap::COL_CHILDID)) {
            $modifiedColumns[':p' . $index++]  = 'childId';
        }
        if ($this->isColumnModified(ChildTableMap::COL_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'firstName';
        }
        if ($this->isColumnModified(ChildTableMap::COL_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'lastName';
        }
        if ($this->isColumnModified(ChildTableMap::COL_DATEOFBIRTH)) {
            $modifiedColumns[':p' . $index++]  = 'dateOfBirth';
        }
        if ($this->isColumnModified(ChildTableMap::COL_AGE)) {
            $modifiedColumns[':p' . $index++]  = 'age';
        }
        if ($this->isColumnModified(ChildTableMap::COL_GENDER)) {
            $modifiedColumns[':p' . $index++]  = 'gender';
        }
        if ($this->isColumnModified(ChildTableMap::COL_ROOMNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'roomNumber';
        }
        if ($this->isColumnModified(ChildTableMap::COL_ADOPTED)) {
            $modifiedColumns[':p' . $index++]  = 'adopted';
        }
        if ($this->isColumnModified(ChildTableMap::COL_STAFFID)) {
            $modifiedColumns[':p' . $index++]  = 'staffId';
        }
        if ($this->isColumnModified(ChildTableMap::COL_DATEENTERED)) {
            $modifiedColumns[':p' . $index++]  = 'dateEntered';
        }
        if ($this->isColumnModified(ChildTableMap::COL_EMERGENCYCONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'emergencyContact';
        }
        if ($this->isColumnModified(ChildTableMap::COL_MEDICALRECORDID)) {
            $modifiedColumns[':p' . $index++]  = 'medicalRecordId';
        }
        if ($this->isColumnModified(ChildTableMap::COL_PERSONALDOCID)) {
            $modifiedColumns[':p' . $index++]  = 'personalDocId';
        }
        if ($this->isColumnModified(ChildTableMap::COL_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'height';
        }
        if ($this->isColumnModified(ChildTableMap::COL_WEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'weight';
        }
        if ($this->isColumnModified(ChildTableMap::COL_BIOPARENTID)) {
            $modifiedColumns[':p' . $index++]  = 'bioParentId';
        }
        if ($this->isColumnModified(ChildTableMap::COL_NEWPARENTID)) {
            $modifiedColumns[':p' . $index++]  = 'newParentId';
        }

        $sql = sprintf(
            'INSERT INTO child (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'childId':
                        $stmt->bindValue($identifier, $this->childid, PDO::PARAM_INT);
                        break;
                    case 'firstName':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case 'lastName':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case 'dateOfBirth':
                        $stmt->bindValue($identifier, $this->dateofbirth, PDO::PARAM_STR);
                        break;
                    case 'age':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_INT);
                        break;
                    case 'gender':
                        $stmt->bindValue($identifier, $this->gender, PDO::PARAM_STR);
                        break;
                    case 'roomNumber':
                        $stmt->bindValue($identifier, $this->roomnumber, PDO::PARAM_INT);
                        break;
                    case 'adopted':
                        $stmt->bindValue($identifier, $this->adopted, PDO::PARAM_STR);
                        break;
                    case 'staffId':
                        $stmt->bindValue($identifier, $this->staffid, PDO::PARAM_INT);
                        break;
                    case 'dateEntered':
                        $stmt->bindValue($identifier, $this->dateentered, PDO::PARAM_STR);
                        break;
                    case 'emergencyContact':
                        $stmt->bindValue($identifier, $this->emergencycontact, PDO::PARAM_STR);
                        break;
                    case 'medicalRecordId':
                        $stmt->bindValue($identifier, $this->medicalrecordid, PDO::PARAM_INT);
                        break;
                    case 'personalDocId':
                        $stmt->bindValue($identifier, $this->personaldocid, PDO::PARAM_INT);
                        break;
                    case 'height':
                        $stmt->bindValue($identifier, $this->height, PDO::PARAM_INT);
                        break;
                    case 'weight':
                        $stmt->bindValue($identifier, $this->weight, PDO::PARAM_INT);
                        break;
                    case 'bioParentId':
                        $stmt->bindValue($identifier, $this->bioparentid, PDO::PARAM_INT);
                        break;
                    case 'newParentId':
                        $stmt->bindValue($identifier, $this->newparentid, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setChildid($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ChildTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getChildid();
                break;
            case 1:
                return $this->getFirstname();
                break;
            case 2:
                return $this->getLastname();
                break;
            case 3:
                return $this->getDateofbirth();
                break;
            case 4:
                return $this->getAge();
                break;
            case 5:
                return $this->getGender();
                break;
            case 6:
                return $this->getRoomnumber();
                break;
            case 7:
                return $this->getAdopted();
                break;
            case 8:
                return $this->getStaffid();
                break;
            case 9:
                return $this->getDateentered();
                break;
            case 10:
                return $this->getEmergencycontact();
                break;
            case 11:
                return $this->getMedicalrecordid();
                break;
            case 12:
                return $this->getPersonaldocid();
                break;
            case 13:
                return $this->getHeight();
                break;
            case 14:
                return $this->getWeight();
                break;
            case 15:
                return $this->getBioparentid();
                break;
            case 16:
                return $this->getNewparentid();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Child'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Child'][$this->hashCode()] = true;
        $keys = ChildTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getChildid(),
            $keys[1] => $this->getFirstname(),
            $keys[2] => $this->getLastname(),
            $keys[3] => $this->getDateofbirth(),
            $keys[4] => $this->getAge(),
            $keys[5] => $this->getGender(),
            $keys[6] => $this->getRoomnumber(),
            $keys[7] => $this->getAdopted(),
            $keys[8] => $this->getStaffid(),
            $keys[9] => $this->getDateentered(),
            $keys[10] => $this->getEmergencycontact(),
            $keys[11] => $this->getMedicalrecordid(),
            $keys[12] => $this->getPersonaldocid(),
            $keys[13] => $this->getHeight(),
            $keys[14] => $this->getWeight(),
            $keys[15] => $this->getBioparentid(),
            $keys[16] => $this->getNewparentid(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aStaff) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'staff';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'staff';
                        break;
                    default:
                        $key = 'Staff';
                }

                $result[$key] = $this->aStaff->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBiologicalparents) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'biologicalparents';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'biologicalparents';
                        break;
                    default:
                        $key = 'Biologicalparents';
                }

                $result[$key] = $this->collBiologicalparents->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMedicalrecords) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'medicalrecords';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'medicalrecords';
                        break;
                    default:
                        $key = 'Medicalrecords';
                }

                $result[$key] = $this->collMedicalrecords->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collNewparents) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'newparents';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'newparents';
                        break;
                    default:
                        $key = 'Newparents';
                }

                $result[$key] = $this->collNewparents->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPersonaldocuments) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'personaldocuments';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'personaldocuments';
                        break;
                    default:
                        $key = 'Personaldocuments';
                }

                $result[$key] = $this->collPersonaldocuments->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRoomss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'roomss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'roomss';
                        break;
                    default:
                        $key = 'Roomss';
                }

                $result[$key] = $this->collRoomss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Child
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ChildTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Child
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setChildid($value);
                break;
            case 1:
                $this->setFirstname($value);
                break;
            case 2:
                $this->setLastname($value);
                break;
            case 3:
                $this->setDateofbirth($value);
                break;
            case 4:
                $this->setAge($value);
                break;
            case 5:
                $this->setGender($value);
                break;
            case 6:
                $this->setRoomnumber($value);
                break;
            case 7:
                $this->setAdopted($value);
                break;
            case 8:
                $this->setStaffid($value);
                break;
            case 9:
                $this->setDateentered($value);
                break;
            case 10:
                $this->setEmergencycontact($value);
                break;
            case 11:
                $this->setMedicalrecordid($value);
                break;
            case 12:
                $this->setPersonaldocid($value);
                break;
            case 13:
                $this->setHeight($value);
                break;
            case 14:
                $this->setWeight($value);
                break;
            case 15:
                $this->setBioparentid($value);
                break;
            case 16:
                $this->setNewparentid($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = ChildTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setChildid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFirstname($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setLastname($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDateofbirth($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAge($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setGender($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRoomnumber($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAdopted($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setStaffid($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDateentered($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setEmergencycontact($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setMedicalrecordid($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPersonaldocid($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setHeight($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setWeight($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setBioparentid($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setNewparentid($arr[$keys[16]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Child The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ChildTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ChildTableMap::COL_CHILDID)) {
            $criteria->add(ChildTableMap::COL_CHILDID, $this->childid);
        }
        if ($this->isColumnModified(ChildTableMap::COL_FIRSTNAME)) {
            $criteria->add(ChildTableMap::COL_FIRSTNAME, $this->firstname);
        }
        if ($this->isColumnModified(ChildTableMap::COL_LASTNAME)) {
            $criteria->add(ChildTableMap::COL_LASTNAME, $this->lastname);
        }
        if ($this->isColumnModified(ChildTableMap::COL_DATEOFBIRTH)) {
            $criteria->add(ChildTableMap::COL_DATEOFBIRTH, $this->dateofbirth);
        }
        if ($this->isColumnModified(ChildTableMap::COL_AGE)) {
            $criteria->add(ChildTableMap::COL_AGE, $this->age);
        }
        if ($this->isColumnModified(ChildTableMap::COL_GENDER)) {
            $criteria->add(ChildTableMap::COL_GENDER, $this->gender);
        }
        if ($this->isColumnModified(ChildTableMap::COL_ROOMNUMBER)) {
            $criteria->add(ChildTableMap::COL_ROOMNUMBER, $this->roomnumber);
        }
        if ($this->isColumnModified(ChildTableMap::COL_ADOPTED)) {
            $criteria->add(ChildTableMap::COL_ADOPTED, $this->adopted);
        }
        if ($this->isColumnModified(ChildTableMap::COL_STAFFID)) {
            $criteria->add(ChildTableMap::COL_STAFFID, $this->staffid);
        }
        if ($this->isColumnModified(ChildTableMap::COL_DATEENTERED)) {
            $criteria->add(ChildTableMap::COL_DATEENTERED, $this->dateentered);
        }
        if ($this->isColumnModified(ChildTableMap::COL_EMERGENCYCONTACT)) {
            $criteria->add(ChildTableMap::COL_EMERGENCYCONTACT, $this->emergencycontact);
        }
        if ($this->isColumnModified(ChildTableMap::COL_MEDICALRECORDID)) {
            $criteria->add(ChildTableMap::COL_MEDICALRECORDID, $this->medicalrecordid);
        }
        if ($this->isColumnModified(ChildTableMap::COL_PERSONALDOCID)) {
            $criteria->add(ChildTableMap::COL_PERSONALDOCID, $this->personaldocid);
        }
        if ($this->isColumnModified(ChildTableMap::COL_HEIGHT)) {
            $criteria->add(ChildTableMap::COL_HEIGHT, $this->height);
        }
        if ($this->isColumnModified(ChildTableMap::COL_WEIGHT)) {
            $criteria->add(ChildTableMap::COL_WEIGHT, $this->weight);
        }
        if ($this->isColumnModified(ChildTableMap::COL_BIOPARENTID)) {
            $criteria->add(ChildTableMap::COL_BIOPARENTID, $this->bioparentid);
        }
        if ($this->isColumnModified(ChildTableMap::COL_NEWPARENTID)) {
            $criteria->add(ChildTableMap::COL_NEWPARENTID, $this->newparentid);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildChildQuery::create();
        $criteria->add(ChildTableMap::COL_CHILDID, $this->childid);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getChildid();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getChildid();
    }

    /**
     * Generic method to set the primary key (childid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setChildid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getChildid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Child (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setDateofbirth($this->getDateofbirth());
        $copyObj->setAge($this->getAge());
        $copyObj->setGender($this->getGender());
        $copyObj->setRoomnumber($this->getRoomnumber());
        $copyObj->setAdopted($this->getAdopted());
        $copyObj->setStaffid($this->getStaffid());
        $copyObj->setDateentered($this->getDateentered());
        $copyObj->setEmergencycontact($this->getEmergencycontact());
        $copyObj->setMedicalrecordid($this->getMedicalrecordid());
        $copyObj->setPersonaldocid($this->getPersonaldocid());
        $copyObj->setHeight($this->getHeight());
        $copyObj->setWeight($this->getWeight());
        $copyObj->setBioparentid($this->getBioparentid());
        $copyObj->setNewparentid($this->getNewparentid());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getBiologicalparents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBiologicalparent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMedicalrecords() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMedicalrecord($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewparents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNewparent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPersonaldocuments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPersonaldocument($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRoomss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRooms($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setChildid(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Child Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildStaff object.
     *
     * @param  ChildStaff $v
     * @return $this|\Child The current object (for fluent API support)
     * @throws PropelException
     */
    public function setStaff(ChildStaff $v = null)
    {
        if ($v === null) {
            $this->setStaffid(NULL);
        } else {
            $this->setStaffid($v->getStaffid());
        }

        $this->aStaff = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildStaff object, it will not be re-added.
        if ($v !== null) {
            $v->addChild($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildStaff object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildStaff The associated ChildStaff object.
     * @throws PropelException
     */
    public function getStaff(ConnectionInterface $con = null)
    {
        if ($this->aStaff === null && ($this->staffid != 0)) {
            $this->aStaff = ChildStaffQuery::create()->findPk($this->staffid, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aStaff->addChildren($this);
             */
        }

        return $this->aStaff;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Biologicalparent' == $relationName) {
            $this->initBiologicalparents();
            return;
        }
        if ('Medicalrecord' == $relationName) {
            $this->initMedicalrecords();
            return;
        }
        if ('Newparent' == $relationName) {
            $this->initNewparents();
            return;
        }
        if ('Personaldocument' == $relationName) {
            $this->initPersonaldocuments();
            return;
        }
        if ('Rooms' == $relationName) {
            $this->initRoomss();
            return;
        }
    }

    /**
     * Clears out the collBiologicalparents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addBiologicalparents()
     */
    public function clearBiologicalparents()
    {
        $this->collBiologicalparents = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collBiologicalparents collection loaded partially.
     */
    public function resetPartialBiologicalparents($v = true)
    {
        $this->collBiologicalparentsPartial = $v;
    }

    /**
     * Initializes the collBiologicalparents collection.
     *
     * By default this just sets the collBiologicalparents collection to an empty array (like clearcollBiologicalparents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBiologicalparents($overrideExisting = true)
    {
        if (null !== $this->collBiologicalparents && !$overrideExisting) {
            return;
        }

        $collectionClassName = BiologicalparentTableMap::getTableMap()->getCollectionClassName();

        $this->collBiologicalparents = new $collectionClassName;
        $this->collBiologicalparents->setModel('\Biologicalparent');
    }

    /**
     * Gets an array of ChildBiologicalparent objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildChild is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildBiologicalparent[] List of ChildBiologicalparent objects
     * @throws PropelException
     */
    public function getBiologicalparents(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collBiologicalparentsPartial && !$this->isNew();
        if (null === $this->collBiologicalparents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBiologicalparents) {
                // return empty collection
                $this->initBiologicalparents();
            } else {
                $collBiologicalparents = ChildBiologicalparentQuery::create(null, $criteria)
                    ->filterByChild($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collBiologicalparentsPartial && count($collBiologicalparents)) {
                        $this->initBiologicalparents(false);

                        foreach ($collBiologicalparents as $obj) {
                            if (false == $this->collBiologicalparents->contains($obj)) {
                                $this->collBiologicalparents->append($obj);
                            }
                        }

                        $this->collBiologicalparentsPartial = true;
                    }

                    return $collBiologicalparents;
                }

                if ($partial && $this->collBiologicalparents) {
                    foreach ($this->collBiologicalparents as $obj) {
                        if ($obj->isNew()) {
                            $collBiologicalparents[] = $obj;
                        }
                    }
                }

                $this->collBiologicalparents = $collBiologicalparents;
                $this->collBiologicalparentsPartial = false;
            }
        }

        return $this->collBiologicalparents;
    }

    /**
     * Sets a collection of ChildBiologicalparent objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $biologicalparents A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function setBiologicalparents(Collection $biologicalparents, ConnectionInterface $con = null)
    {
        /** @var ChildBiologicalparent[] $biologicalparentsToDelete */
        $biologicalparentsToDelete = $this->getBiologicalparents(new Criteria(), $con)->diff($biologicalparents);


        $this->biologicalparentsScheduledForDeletion = $biologicalparentsToDelete;

        foreach ($biologicalparentsToDelete as $biologicalparentRemoved) {
            $biologicalparentRemoved->setChild(null);
        }

        $this->collBiologicalparents = null;
        foreach ($biologicalparents as $biologicalparent) {
            $this->addBiologicalparent($biologicalparent);
        }

        $this->collBiologicalparents = $biologicalparents;
        $this->collBiologicalparentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Biologicalparent objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Biologicalparent objects.
     * @throws PropelException
     */
    public function countBiologicalparents(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collBiologicalparentsPartial && !$this->isNew();
        if (null === $this->collBiologicalparents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBiologicalparents) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBiologicalparents());
            }

            $query = ChildBiologicalparentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByChild($this)
                ->count($con);
        }

        return count($this->collBiologicalparents);
    }

    /**
     * Method called to associate a ChildBiologicalparent object to this object
     * through the ChildBiologicalparent foreign key attribute.
     *
     * @param  ChildBiologicalparent $l ChildBiologicalparent
     * @return $this|\Child The current object (for fluent API support)
     */
    public function addBiologicalparent(ChildBiologicalparent $l)
    {
        if ($this->collBiologicalparents === null) {
            $this->initBiologicalparents();
            $this->collBiologicalparentsPartial = true;
        }

        if (!$this->collBiologicalparents->contains($l)) {
            $this->doAddBiologicalparent($l);

            if ($this->biologicalparentsScheduledForDeletion and $this->biologicalparentsScheduledForDeletion->contains($l)) {
                $this->biologicalparentsScheduledForDeletion->remove($this->biologicalparentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildBiologicalparent $biologicalparent The ChildBiologicalparent object to add.
     */
    protected function doAddBiologicalparent(ChildBiologicalparent $biologicalparent)
    {
        $this->collBiologicalparents[]= $biologicalparent;
        $biologicalparent->setChild($this);
    }

    /**
     * @param  ChildBiologicalparent $biologicalparent The ChildBiologicalparent object to remove.
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function removeBiologicalparent(ChildBiologicalparent $biologicalparent)
    {
        if ($this->getBiologicalparents()->contains($biologicalparent)) {
            $pos = $this->collBiologicalparents->search($biologicalparent);
            $this->collBiologicalparents->remove($pos);
            if (null === $this->biologicalparentsScheduledForDeletion) {
                $this->biologicalparentsScheduledForDeletion = clone $this->collBiologicalparents;
                $this->biologicalparentsScheduledForDeletion->clear();
            }
            $this->biologicalparentsScheduledForDeletion[]= clone $biologicalparent;
            $biologicalparent->setChild(null);
        }

        return $this;
    }

    /**
     * Clears out the collMedicalrecords collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMedicalrecords()
     */
    public function clearMedicalrecords()
    {
        $this->collMedicalrecords = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMedicalrecords collection loaded partially.
     */
    public function resetPartialMedicalrecords($v = true)
    {
        $this->collMedicalrecordsPartial = $v;
    }

    /**
     * Initializes the collMedicalrecords collection.
     *
     * By default this just sets the collMedicalrecords collection to an empty array (like clearcollMedicalrecords());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMedicalrecords($overrideExisting = true)
    {
        if (null !== $this->collMedicalrecords && !$overrideExisting) {
            return;
        }

        $collectionClassName = MedicalrecordTableMap::getTableMap()->getCollectionClassName();

        $this->collMedicalrecords = new $collectionClassName;
        $this->collMedicalrecords->setModel('\Medicalrecord');
    }

    /**
     * Gets an array of ChildMedicalrecord objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildChild is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMedicalrecord[] List of ChildMedicalrecord objects
     * @throws PropelException
     */
    public function getMedicalrecords(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMedicalrecordsPartial && !$this->isNew();
        if (null === $this->collMedicalrecords || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMedicalrecords) {
                // return empty collection
                $this->initMedicalrecords();
            } else {
                $collMedicalrecords = ChildMedicalrecordQuery::create(null, $criteria)
                    ->filterByChild($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMedicalrecordsPartial && count($collMedicalrecords)) {
                        $this->initMedicalrecords(false);

                        foreach ($collMedicalrecords as $obj) {
                            if (false == $this->collMedicalrecords->contains($obj)) {
                                $this->collMedicalrecords->append($obj);
                            }
                        }

                        $this->collMedicalrecordsPartial = true;
                    }

                    return $collMedicalrecords;
                }

                if ($partial && $this->collMedicalrecords) {
                    foreach ($this->collMedicalrecords as $obj) {
                        if ($obj->isNew()) {
                            $collMedicalrecords[] = $obj;
                        }
                    }
                }

                $this->collMedicalrecords = $collMedicalrecords;
                $this->collMedicalrecordsPartial = false;
            }
        }

        return $this->collMedicalrecords;
    }

    /**
     * Sets a collection of ChildMedicalrecord objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $medicalrecords A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function setMedicalrecords(Collection $medicalrecords, ConnectionInterface $con = null)
    {
        /** @var ChildMedicalrecord[] $medicalrecordsToDelete */
        $medicalrecordsToDelete = $this->getMedicalrecords(new Criteria(), $con)->diff($medicalrecords);


        $this->medicalrecordsScheduledForDeletion = $medicalrecordsToDelete;

        foreach ($medicalrecordsToDelete as $medicalrecordRemoved) {
            $medicalrecordRemoved->setChild(null);
        }

        $this->collMedicalrecords = null;
        foreach ($medicalrecords as $medicalrecord) {
            $this->addMedicalrecord($medicalrecord);
        }

        $this->collMedicalrecords = $medicalrecords;
        $this->collMedicalrecordsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Medicalrecord objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Medicalrecord objects.
     * @throws PropelException
     */
    public function countMedicalrecords(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMedicalrecordsPartial && !$this->isNew();
        if (null === $this->collMedicalrecords || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMedicalrecords) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMedicalrecords());
            }

            $query = ChildMedicalrecordQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByChild($this)
                ->count($con);
        }

        return count($this->collMedicalrecords);
    }

    /**
     * Method called to associate a ChildMedicalrecord object to this object
     * through the ChildMedicalrecord foreign key attribute.
     *
     * @param  ChildMedicalrecord $l ChildMedicalrecord
     * @return $this|\Child The current object (for fluent API support)
     */
    public function addMedicalrecord(ChildMedicalrecord $l)
    {
        if ($this->collMedicalrecords === null) {
            $this->initMedicalrecords();
            $this->collMedicalrecordsPartial = true;
        }

        if (!$this->collMedicalrecords->contains($l)) {
            $this->doAddMedicalrecord($l);

            if ($this->medicalrecordsScheduledForDeletion and $this->medicalrecordsScheduledForDeletion->contains($l)) {
                $this->medicalrecordsScheduledForDeletion->remove($this->medicalrecordsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMedicalrecord $medicalrecord The ChildMedicalrecord object to add.
     */
    protected function doAddMedicalrecord(ChildMedicalrecord $medicalrecord)
    {
        $this->collMedicalrecords[]= $medicalrecord;
        $medicalrecord->setChild($this);
    }

    /**
     * @param  ChildMedicalrecord $medicalrecord The ChildMedicalrecord object to remove.
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function removeMedicalrecord(ChildMedicalrecord $medicalrecord)
    {
        if ($this->getMedicalrecords()->contains($medicalrecord)) {
            $pos = $this->collMedicalrecords->search($medicalrecord);
            $this->collMedicalrecords->remove($pos);
            if (null === $this->medicalrecordsScheduledForDeletion) {
                $this->medicalrecordsScheduledForDeletion = clone $this->collMedicalrecords;
                $this->medicalrecordsScheduledForDeletion->clear();
            }
            $this->medicalrecordsScheduledForDeletion[]= clone $medicalrecord;
            $medicalrecord->setChild(null);
        }

        return $this;
    }

    /**
     * Clears out the collNewparents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addNewparents()
     */
    public function clearNewparents()
    {
        $this->collNewparents = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collNewparents collection loaded partially.
     */
    public function resetPartialNewparents($v = true)
    {
        $this->collNewparentsPartial = $v;
    }

    /**
     * Initializes the collNewparents collection.
     *
     * By default this just sets the collNewparents collection to an empty array (like clearcollNewparents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNewparents($overrideExisting = true)
    {
        if (null !== $this->collNewparents && !$overrideExisting) {
            return;
        }

        $collectionClassName = NewparentTableMap::getTableMap()->getCollectionClassName();

        $this->collNewparents = new $collectionClassName;
        $this->collNewparents->setModel('\Newparent');
    }

    /**
     * Gets an array of ChildNewparent objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildChild is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildNewparent[] List of ChildNewparent objects
     * @throws PropelException
     */
    public function getNewparents(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collNewparentsPartial && !$this->isNew();
        if (null === $this->collNewparents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNewparents) {
                // return empty collection
                $this->initNewparents();
            } else {
                $collNewparents = ChildNewparentQuery::create(null, $criteria)
                    ->filterByChild($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collNewparentsPartial && count($collNewparents)) {
                        $this->initNewparents(false);

                        foreach ($collNewparents as $obj) {
                            if (false == $this->collNewparents->contains($obj)) {
                                $this->collNewparents->append($obj);
                            }
                        }

                        $this->collNewparentsPartial = true;
                    }

                    return $collNewparents;
                }

                if ($partial && $this->collNewparents) {
                    foreach ($this->collNewparents as $obj) {
                        if ($obj->isNew()) {
                            $collNewparents[] = $obj;
                        }
                    }
                }

                $this->collNewparents = $collNewparents;
                $this->collNewparentsPartial = false;
            }
        }

        return $this->collNewparents;
    }

    /**
     * Sets a collection of ChildNewparent objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $newparents A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function setNewparents(Collection $newparents, ConnectionInterface $con = null)
    {
        /** @var ChildNewparent[] $newparentsToDelete */
        $newparentsToDelete = $this->getNewparents(new Criteria(), $con)->diff($newparents);


        $this->newparentsScheduledForDeletion = $newparentsToDelete;

        foreach ($newparentsToDelete as $newparentRemoved) {
            $newparentRemoved->setChild(null);
        }

        $this->collNewparents = null;
        foreach ($newparents as $newparent) {
            $this->addNewparent($newparent);
        }

        $this->collNewparents = $newparents;
        $this->collNewparentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Newparent objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Newparent objects.
     * @throws PropelException
     */
    public function countNewparents(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collNewparentsPartial && !$this->isNew();
        if (null === $this->collNewparents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNewparents) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getNewparents());
            }

            $query = ChildNewparentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByChild($this)
                ->count($con);
        }

        return count($this->collNewparents);
    }

    /**
     * Method called to associate a ChildNewparent object to this object
     * through the ChildNewparent foreign key attribute.
     *
     * @param  ChildNewparent $l ChildNewparent
     * @return $this|\Child The current object (for fluent API support)
     */
    public function addNewparent(ChildNewparent $l)
    {
        if ($this->collNewparents === null) {
            $this->initNewparents();
            $this->collNewparentsPartial = true;
        }

        if (!$this->collNewparents->contains($l)) {
            $this->doAddNewparent($l);

            if ($this->newparentsScheduledForDeletion and $this->newparentsScheduledForDeletion->contains($l)) {
                $this->newparentsScheduledForDeletion->remove($this->newparentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildNewparent $newparent The ChildNewparent object to add.
     */
    protected function doAddNewparent(ChildNewparent $newparent)
    {
        $this->collNewparents[]= $newparent;
        $newparent->setChild($this);
    }

    /**
     * @param  ChildNewparent $newparent The ChildNewparent object to remove.
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function removeNewparent(ChildNewparent $newparent)
    {
        if ($this->getNewparents()->contains($newparent)) {
            $pos = $this->collNewparents->search($newparent);
            $this->collNewparents->remove($pos);
            if (null === $this->newparentsScheduledForDeletion) {
                $this->newparentsScheduledForDeletion = clone $this->collNewparents;
                $this->newparentsScheduledForDeletion->clear();
            }
            $this->newparentsScheduledForDeletion[]= clone $newparent;
            $newparent->setChild(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Child is new, it will return
     * an empty collection; or if this Child has previously
     * been saved, it will retrieve related Newparents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Child.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildNewparent[] List of ChildNewparent objects
     */
    public function getNewparentsJoinStaff(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildNewparentQuery::create(null, $criteria);
        $query->joinWith('Staff', $joinBehavior);

        return $this->getNewparents($query, $con);
    }

    /**
     * Clears out the collPersonaldocuments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPersonaldocuments()
     */
    public function clearPersonaldocuments()
    {
        $this->collPersonaldocuments = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPersonaldocuments collection loaded partially.
     */
    public function resetPartialPersonaldocuments($v = true)
    {
        $this->collPersonaldocumentsPartial = $v;
    }

    /**
     * Initializes the collPersonaldocuments collection.
     *
     * By default this just sets the collPersonaldocuments collection to an empty array (like clearcollPersonaldocuments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPersonaldocuments($overrideExisting = true)
    {
        if (null !== $this->collPersonaldocuments && !$overrideExisting) {
            return;
        }

        $collectionClassName = PersonaldocumentTableMap::getTableMap()->getCollectionClassName();

        $this->collPersonaldocuments = new $collectionClassName;
        $this->collPersonaldocuments->setModel('\Personaldocument');
    }

    /**
     * Gets an array of ChildPersonaldocument objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildChild is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPersonaldocument[] List of ChildPersonaldocument objects
     * @throws PropelException
     */
    public function getPersonaldocuments(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPersonaldocumentsPartial && !$this->isNew();
        if (null === $this->collPersonaldocuments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPersonaldocuments) {
                // return empty collection
                $this->initPersonaldocuments();
            } else {
                $collPersonaldocuments = ChildPersonaldocumentQuery::create(null, $criteria)
                    ->filterByChild($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPersonaldocumentsPartial && count($collPersonaldocuments)) {
                        $this->initPersonaldocuments(false);

                        foreach ($collPersonaldocuments as $obj) {
                            if (false == $this->collPersonaldocuments->contains($obj)) {
                                $this->collPersonaldocuments->append($obj);
                            }
                        }

                        $this->collPersonaldocumentsPartial = true;
                    }

                    return $collPersonaldocuments;
                }

                if ($partial && $this->collPersonaldocuments) {
                    foreach ($this->collPersonaldocuments as $obj) {
                        if ($obj->isNew()) {
                            $collPersonaldocuments[] = $obj;
                        }
                    }
                }

                $this->collPersonaldocuments = $collPersonaldocuments;
                $this->collPersonaldocumentsPartial = false;
            }
        }

        return $this->collPersonaldocuments;
    }

    /**
     * Sets a collection of ChildPersonaldocument objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $personaldocuments A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function setPersonaldocuments(Collection $personaldocuments, ConnectionInterface $con = null)
    {
        /** @var ChildPersonaldocument[] $personaldocumentsToDelete */
        $personaldocumentsToDelete = $this->getPersonaldocuments(new Criteria(), $con)->diff($personaldocuments);


        $this->personaldocumentsScheduledForDeletion = $personaldocumentsToDelete;

        foreach ($personaldocumentsToDelete as $personaldocumentRemoved) {
            $personaldocumentRemoved->setChild(null);
        }

        $this->collPersonaldocuments = null;
        foreach ($personaldocuments as $personaldocument) {
            $this->addPersonaldocument($personaldocument);
        }

        $this->collPersonaldocuments = $personaldocuments;
        $this->collPersonaldocumentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Personaldocument objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Personaldocument objects.
     * @throws PropelException
     */
    public function countPersonaldocuments(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPersonaldocumentsPartial && !$this->isNew();
        if (null === $this->collPersonaldocuments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPersonaldocuments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPersonaldocuments());
            }

            $query = ChildPersonaldocumentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByChild($this)
                ->count($con);
        }

        return count($this->collPersonaldocuments);
    }

    /**
     * Method called to associate a ChildPersonaldocument object to this object
     * through the ChildPersonaldocument foreign key attribute.
     *
     * @param  ChildPersonaldocument $l ChildPersonaldocument
     * @return $this|\Child The current object (for fluent API support)
     */
    public function addPersonaldocument(ChildPersonaldocument $l)
    {
        if ($this->collPersonaldocuments === null) {
            $this->initPersonaldocuments();
            $this->collPersonaldocumentsPartial = true;
        }

        if (!$this->collPersonaldocuments->contains($l)) {
            $this->doAddPersonaldocument($l);

            if ($this->personaldocumentsScheduledForDeletion and $this->personaldocumentsScheduledForDeletion->contains($l)) {
                $this->personaldocumentsScheduledForDeletion->remove($this->personaldocumentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPersonaldocument $personaldocument The ChildPersonaldocument object to add.
     */
    protected function doAddPersonaldocument(ChildPersonaldocument $personaldocument)
    {
        $this->collPersonaldocuments[]= $personaldocument;
        $personaldocument->setChild($this);
    }

    /**
     * @param  ChildPersonaldocument $personaldocument The ChildPersonaldocument object to remove.
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function removePersonaldocument(ChildPersonaldocument $personaldocument)
    {
        if ($this->getPersonaldocuments()->contains($personaldocument)) {
            $pos = $this->collPersonaldocuments->search($personaldocument);
            $this->collPersonaldocuments->remove($pos);
            if (null === $this->personaldocumentsScheduledForDeletion) {
                $this->personaldocumentsScheduledForDeletion = clone $this->collPersonaldocuments;
                $this->personaldocumentsScheduledForDeletion->clear();
            }
            $this->personaldocumentsScheduledForDeletion[]= clone $personaldocument;
            $personaldocument->setChild(null);
        }

        return $this;
    }

    /**
     * Clears out the collRoomss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRoomss()
     */
    public function clearRoomss()
    {
        $this->collRoomss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collRoomss collection loaded partially.
     */
    public function resetPartialRoomss($v = true)
    {
        $this->collRoomssPartial = $v;
    }

    /**
     * Initializes the collRoomss collection.
     *
     * By default this just sets the collRoomss collection to an empty array (like clearcollRoomss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRoomss($overrideExisting = true)
    {
        if (null !== $this->collRoomss && !$overrideExisting) {
            return;
        }

        $collectionClassName = RoomsTableMap::getTableMap()->getCollectionClassName();

        $this->collRoomss = new $collectionClassName;
        $this->collRoomss->setModel('\Rooms');
    }

    /**
     * Gets an array of ChildRooms objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildChild is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildRooms[] List of ChildRooms objects
     * @throws PropelException
     */
    public function getRoomss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collRoomssPartial && !$this->isNew();
        if (null === $this->collRoomss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRoomss) {
                // return empty collection
                $this->initRoomss();
            } else {
                $collRoomss = ChildRoomsQuery::create(null, $criteria)
                    ->filterByChild($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collRoomssPartial && count($collRoomss)) {
                        $this->initRoomss(false);

                        foreach ($collRoomss as $obj) {
                            if (false == $this->collRoomss->contains($obj)) {
                                $this->collRoomss->append($obj);
                            }
                        }

                        $this->collRoomssPartial = true;
                    }

                    return $collRoomss;
                }

                if ($partial && $this->collRoomss) {
                    foreach ($this->collRoomss as $obj) {
                        if ($obj->isNew()) {
                            $collRoomss[] = $obj;
                        }
                    }
                }

                $this->collRoomss = $collRoomss;
                $this->collRoomssPartial = false;
            }
        }

        return $this->collRoomss;
    }

    /**
     * Sets a collection of ChildRooms objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $roomss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function setRoomss(Collection $roomss, ConnectionInterface $con = null)
    {
        /** @var ChildRooms[] $roomssToDelete */
        $roomssToDelete = $this->getRoomss(new Criteria(), $con)->diff($roomss);


        $this->roomssScheduledForDeletion = $roomssToDelete;

        foreach ($roomssToDelete as $roomsRemoved) {
            $roomsRemoved->setChild(null);
        }

        $this->collRoomss = null;
        foreach ($roomss as $rooms) {
            $this->addRooms($rooms);
        }

        $this->collRoomss = $roomss;
        $this->collRoomssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rooms objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Rooms objects.
     * @throws PropelException
     */
    public function countRoomss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collRoomssPartial && !$this->isNew();
        if (null === $this->collRoomss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRoomss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRoomss());
            }

            $query = ChildRoomsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByChild($this)
                ->count($con);
        }

        return count($this->collRoomss);
    }

    /**
     * Method called to associate a ChildRooms object to this object
     * through the ChildRooms foreign key attribute.
     *
     * @param  ChildRooms $l ChildRooms
     * @return $this|\Child The current object (for fluent API support)
     */
    public function addRooms(ChildRooms $l)
    {
        if ($this->collRoomss === null) {
            $this->initRoomss();
            $this->collRoomssPartial = true;
        }

        if (!$this->collRoomss->contains($l)) {
            $this->doAddRooms($l);

            if ($this->roomssScheduledForDeletion and $this->roomssScheduledForDeletion->contains($l)) {
                $this->roomssScheduledForDeletion->remove($this->roomssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildRooms $rooms The ChildRooms object to add.
     */
    protected function doAddRooms(ChildRooms $rooms)
    {
        $this->collRoomss[]= $rooms;
        $rooms->setChild($this);
    }

    /**
     * @param  ChildRooms $rooms The ChildRooms object to remove.
     * @return $this|ChildChild The current object (for fluent API support)
     */
    public function removeRooms(ChildRooms $rooms)
    {
        if ($this->getRoomss()->contains($rooms)) {
            $pos = $this->collRoomss->search($rooms);
            $this->collRoomss->remove($pos);
            if (null === $this->roomssScheduledForDeletion) {
                $this->roomssScheduledForDeletion = clone $this->collRoomss;
                $this->roomssScheduledForDeletion->clear();
            }
            $this->roomssScheduledForDeletion[]= clone $rooms;
            $rooms->setChild(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aStaff) {
            $this->aStaff->removeChild($this);
        }
        $this->childid = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->dateofbirth = null;
        $this->age = null;
        $this->gender = null;
        $this->roomnumber = null;
        $this->adopted = null;
        $this->staffid = null;
        $this->dateentered = null;
        $this->emergencycontact = null;
        $this->medicalrecordid = null;
        $this->personaldocid = null;
        $this->height = null;
        $this->weight = null;
        $this->bioparentid = null;
        $this->newparentid = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collBiologicalparents) {
                foreach ($this->collBiologicalparents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMedicalrecords) {
                foreach ($this->collMedicalrecords as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewparents) {
                foreach ($this->collNewparents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPersonaldocuments) {
                foreach ($this->collPersonaldocuments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRoomss) {
                foreach ($this->collRoomss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collBiologicalparents = null;
        $this->collMedicalrecords = null;
        $this->collNewparents = null;
        $this->collPersonaldocuments = null;
        $this->collRoomss = null;
        $this->aStaff = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ChildTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
