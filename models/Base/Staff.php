<?php

namespace Base;

use \Child as ChildChild;
use \ChildQuery as ChildChildQuery;
use \Expenses as ChildExpenses;
use \ExpensesQuery as ChildExpensesQuery;
use \Newparent as ChildNewparent;
use \NewparentQuery as ChildNewparentQuery;
use \Staff as ChildStaff;
use \StaffQuery as ChildStaffQuery;
use \Waitingparent as ChildWaitingparent;
use \WaitingparentQuery as ChildWaitingparentQuery;
use \Exception;
use \PDO;
use Map\ChildTableMap;
use Map\ExpensesTableMap;
use Map\NewparentTableMap;
use Map\StaffTableMap;
use Map\WaitingparentTableMap;
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
 * Base class that represents a row from the 'staff' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Staff implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\StaffTableMap';


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
     * The value for the staffid field.
     *
     * @var        int
     */
    protected $staffid;

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
     * The value for the position field.
     *
     * @var        string
     */
    protected $position;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * @var        ObjectCollection|ChildChild[] Collection to store aggregation of ChildChild objects.
     */
    protected $collChildren;
    protected $collChildrenPartial;

    /**
     * @var        ObjectCollection|ChildExpenses[] Collection to store aggregation of ChildExpenses objects.
     */
    protected $collExpensess;
    protected $collExpensessPartial;

    /**
     * @var        ObjectCollection|ChildNewparent[] Collection to store aggregation of ChildNewparent objects.
     */
    protected $collNewparents;
    protected $collNewparentsPartial;

    /**
     * @var        ObjectCollection|ChildWaitingparent[] Collection to store aggregation of ChildWaitingparent objects.
     */
    protected $collWaitingparents;
    protected $collWaitingparentsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildChild[]
     */
    protected $childrenScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildExpenses[]
     */
    protected $expensessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildNewparent[]
     */
    protected $newparentsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildWaitingparent[]
     */
    protected $waitingparentsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Staff object.
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
     * Compares this with another <code>Staff</code> instance.  If
     * <code>obj</code> is an instance of <code>Staff</code>, delegates to
     * <code>equals(Staff)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Staff The current object, for fluid interface
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
     * Get the [staffid] column value.
     *
     * @return int
     */
    public function getStaffid()
    {
        return $this->staffid;
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
     * Get the [position] column value.
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of [staffid] column.
     *
     * @param int $v new value
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function setStaffid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->staffid !== $v) {
            $this->staffid = $v;
            $this->modifiedColumns[StaffTableMap::COL_STAFFID] = true;
        }

        return $this;
    } // setStaffid()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[StaffTableMap::COL_FIRSTNAME] = true;
        }

        return $this;
    } // setFirstname()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[StaffTableMap::COL_LASTNAME] = true;
        }

        return $this;
    } // setLastname()

    /**
     * Set the value of [position] column.
     *
     * @param string $v new value
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function setPosition($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->position !== $v) {
            $this->position = $v;
            $this->modifiedColumns[StaffTableMap::COL_POSITION] = true;
        }

        return $this;
    } // setPosition()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[StaffTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[StaffTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : StaffTableMap::translateFieldName('Staffid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->staffid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : StaffTableMap::translateFieldName('Firstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : StaffTableMap::translateFieldName('Lastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : StaffTableMap::translateFieldName('Position', TableMap::TYPE_PHPNAME, $indexType)];
            $this->position = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : StaffTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : StaffTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = StaffTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Staff'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(StaffTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildStaffQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collChildren = null;

            $this->collExpensess = null;

            $this->collNewparents = null;

            $this->collWaitingparents = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Staff::setDeleted()
     * @see Staff::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(StaffTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildStaffQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(StaffTableMap::DATABASE_NAME);
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
                StaffTableMap::addInstanceToPool($this);
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

            if ($this->childrenScheduledForDeletion !== null) {
                if (!$this->childrenScheduledForDeletion->isEmpty()) {
                    \ChildQuery::create()
                        ->filterByPrimaryKeys($this->childrenScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->childrenScheduledForDeletion = null;
                }
            }

            if ($this->collChildren !== null) {
                foreach ($this->collChildren as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->expensessScheduledForDeletion !== null) {
                if (!$this->expensessScheduledForDeletion->isEmpty()) {
                    \ExpensesQuery::create()
                        ->filterByPrimaryKeys($this->expensessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->expensessScheduledForDeletion = null;
                }
            }

            if ($this->collExpensess !== null) {
                foreach ($this->collExpensess as $referrerFK) {
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

            if ($this->waitingparentsScheduledForDeletion !== null) {
                if (!$this->waitingparentsScheduledForDeletion->isEmpty()) {
                    \WaitingparentQuery::create()
                        ->filterByPrimaryKeys($this->waitingparentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->waitingparentsScheduledForDeletion = null;
                }
            }

            if ($this->collWaitingparents !== null) {
                foreach ($this->collWaitingparents as $referrerFK) {
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

        $this->modifiedColumns[StaffTableMap::COL_STAFFID] = true;
        if (null !== $this->staffid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . StaffTableMap::COL_STAFFID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(StaffTableMap::COL_STAFFID)) {
            $modifiedColumns[':p' . $index++]  = 'staffId';
        }
        if ($this->isColumnModified(StaffTableMap::COL_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'firstName';
        }
        if ($this->isColumnModified(StaffTableMap::COL_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'lastName';
        }
        if ($this->isColumnModified(StaffTableMap::COL_POSITION)) {
            $modifiedColumns[':p' . $index++]  = 'position';
        }
        if ($this->isColumnModified(StaffTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(StaffTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }

        $sql = sprintf(
            'INSERT INTO staff (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'staffId':
                        $stmt->bindValue($identifier, $this->staffid, PDO::PARAM_INT);
                        break;
                    case 'firstName':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case 'lastName':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case 'position':
                        $stmt->bindValue($identifier, $this->position, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
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
        $this->setStaffid($pk);

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
        $pos = StaffTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getStaffid();
                break;
            case 1:
                return $this->getFirstname();
                break;
            case 2:
                return $this->getLastname();
                break;
            case 3:
                return $this->getPosition();
                break;
            case 4:
                return $this->getEmail();
                break;
            case 5:
                return $this->getPassword();
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

        if (isset($alreadyDumpedObjects['Staff'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Staff'][$this->hashCode()] = true;
        $keys = StaffTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getStaffid(),
            $keys[1] => $this->getFirstname(),
            $keys[2] => $this->getLastname(),
            $keys[3] => $this->getPosition(),
            $keys[4] => $this->getEmail(),
            $keys[5] => $this->getPassword(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collChildren) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'children';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'children';
                        break;
                    default:
                        $key = 'Children';
                }

                $result[$key] = $this->collChildren->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collExpensess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'expensess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'expensess';
                        break;
                    default:
                        $key = 'Expensess';
                }

                $result[$key] = $this->collExpensess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collWaitingparents) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'waitingparents';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'waitingparents';
                        break;
                    default:
                        $key = 'Waitingparents';
                }

                $result[$key] = $this->collWaitingparents->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Staff
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = StaffTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Staff
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setStaffid($value);
                break;
            case 1:
                $this->setFirstname($value);
                break;
            case 2:
                $this->setLastname($value);
                break;
            case 3:
                $this->setPosition($value);
                break;
            case 4:
                $this->setEmail($value);
                break;
            case 5:
                $this->setPassword($value);
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
        $keys = StaffTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setStaffid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFirstname($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setLastname($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPosition($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEmail($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPassword($arr[$keys[5]]);
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
     * @return $this|\Staff The current object, for fluid interface
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
        $criteria = new Criteria(StaffTableMap::DATABASE_NAME);

        if ($this->isColumnModified(StaffTableMap::COL_STAFFID)) {
            $criteria->add(StaffTableMap::COL_STAFFID, $this->staffid);
        }
        if ($this->isColumnModified(StaffTableMap::COL_FIRSTNAME)) {
            $criteria->add(StaffTableMap::COL_FIRSTNAME, $this->firstname);
        }
        if ($this->isColumnModified(StaffTableMap::COL_LASTNAME)) {
            $criteria->add(StaffTableMap::COL_LASTNAME, $this->lastname);
        }
        if ($this->isColumnModified(StaffTableMap::COL_POSITION)) {
            $criteria->add(StaffTableMap::COL_POSITION, $this->position);
        }
        if ($this->isColumnModified(StaffTableMap::COL_EMAIL)) {
            $criteria->add(StaffTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(StaffTableMap::COL_PASSWORD)) {
            $criteria->add(StaffTableMap::COL_PASSWORD, $this->password);
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
        $criteria = ChildStaffQuery::create();
        $criteria->add(StaffTableMap::COL_STAFFID, $this->staffid);

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
        $validPk = null !== $this->getStaffid();

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
        return $this->getStaffid();
    }

    /**
     * Generic method to set the primary key (staffid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setStaffid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getStaffid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Staff (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setPosition($this->getPosition());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPassword($this->getPassword());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getChildren() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addChild($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getExpensess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addExpenses($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getNewparents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNewparent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getWaitingparents() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addWaitingparent($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setStaffid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Staff Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Child' == $relationName) {
            $this->initChildren();
            return;
        }
        if ('Expenses' == $relationName) {
            $this->initExpensess();
            return;
        }
        if ('Newparent' == $relationName) {
            $this->initNewparents();
            return;
        }
        if ('Waitingparent' == $relationName) {
            $this->initWaitingparents();
            return;
        }
    }

    /**
     * Clears out the collChildren collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addChildren()
     */
    public function clearChildren()
    {
        $this->collChildren = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collChildren collection loaded partially.
     */
    public function resetPartialChildren($v = true)
    {
        $this->collChildrenPartial = $v;
    }

    /**
     * Initializes the collChildren collection.
     *
     * By default this just sets the collChildren collection to an empty array (like clearcollChildren());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initChildren($overrideExisting = true)
    {
        if (null !== $this->collChildren && !$overrideExisting) {
            return;
        }

        $collectionClassName = ChildTableMap::getTableMap()->getCollectionClassName();

        $this->collChildren = new $collectionClassName;
        $this->collChildren->setModel('\Child');
    }

    /**
     * Gets an array of ChildChild objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildStaff is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildChild[] List of ChildChild objects
     * @throws PropelException
     */
    public function getChildren(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collChildrenPartial && !$this->isNew();
        if (null === $this->collChildren || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collChildren) {
                // return empty collection
                $this->initChildren();
            } else {
                $collChildren = ChildChildQuery::create(null, $criteria)
                    ->filterByStaff($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collChildrenPartial && count($collChildren)) {
                        $this->initChildren(false);

                        foreach ($collChildren as $obj) {
                            if (false == $this->collChildren->contains($obj)) {
                                $this->collChildren->append($obj);
                            }
                        }

                        $this->collChildrenPartial = true;
                    }

                    return $collChildren;
                }

                if ($partial && $this->collChildren) {
                    foreach ($this->collChildren as $obj) {
                        if ($obj->isNew()) {
                            $collChildren[] = $obj;
                        }
                    }
                }

                $this->collChildren = $collChildren;
                $this->collChildrenPartial = false;
            }
        }

        return $this->collChildren;
    }

    /**
     * Sets a collection of ChildChild objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $children A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildStaff The current object (for fluent API support)
     */
    public function setChildren(Collection $children, ConnectionInterface $con = null)
    {
        /** @var ChildChild[] $childrenToDelete */
        $childrenToDelete = $this->getChildren(new Criteria(), $con)->diff($children);


        $this->childrenScheduledForDeletion = $childrenToDelete;

        foreach ($childrenToDelete as $childRemoved) {
            $childRemoved->setStaff(null);
        }

        $this->collChildren = null;
        foreach ($children as $child) {
            $this->addChild($child);
        }

        $this->collChildren = $children;
        $this->collChildrenPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Child objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Child objects.
     * @throws PropelException
     */
    public function countChildren(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collChildrenPartial && !$this->isNew();
        if (null === $this->collChildren || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collChildren) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getChildren());
            }

            $query = ChildChildQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStaff($this)
                ->count($con);
        }

        return count($this->collChildren);
    }

    /**
     * Method called to associate a ChildChild object to this object
     * through the ChildChild foreign key attribute.
     *
     * @param  ChildChild $l ChildChild
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function addChild(ChildChild $l)
    {
        if ($this->collChildren === null) {
            $this->initChildren();
            $this->collChildrenPartial = true;
        }

        if (!$this->collChildren->contains($l)) {
            $this->doAddChild($l);

            if ($this->childrenScheduledForDeletion and $this->childrenScheduledForDeletion->contains($l)) {
                $this->childrenScheduledForDeletion->remove($this->childrenScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildChild $child The ChildChild object to add.
     */
    protected function doAddChild(ChildChild $child)
    {
        $this->collChildren[]= $child;
        $child->setStaff($this);
    }

    /**
     * @param  ChildChild $child The ChildChild object to remove.
     * @return $this|ChildStaff The current object (for fluent API support)
     */
    public function removeChild(ChildChild $child)
    {
        if ($this->getChildren()->contains($child)) {
            $pos = $this->collChildren->search($child);
            $this->collChildren->remove($pos);
            if (null === $this->childrenScheduledForDeletion) {
                $this->childrenScheduledForDeletion = clone $this->collChildren;
                $this->childrenScheduledForDeletion->clear();
            }
            $this->childrenScheduledForDeletion[]= clone $child;
            $child->setStaff(null);
        }

        return $this;
    }

    /**
     * Clears out the collExpensess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addExpensess()
     */
    public function clearExpensess()
    {
        $this->collExpensess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collExpensess collection loaded partially.
     */
    public function resetPartialExpensess($v = true)
    {
        $this->collExpensessPartial = $v;
    }

    /**
     * Initializes the collExpensess collection.
     *
     * By default this just sets the collExpensess collection to an empty array (like clearcollExpensess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initExpensess($overrideExisting = true)
    {
        if (null !== $this->collExpensess && !$overrideExisting) {
            return;
        }

        $collectionClassName = ExpensesTableMap::getTableMap()->getCollectionClassName();

        $this->collExpensess = new $collectionClassName;
        $this->collExpensess->setModel('\Expenses');
    }

    /**
     * Gets an array of ChildExpenses objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildStaff is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildExpenses[] List of ChildExpenses objects
     * @throws PropelException
     */
    public function getExpensess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collExpensessPartial && !$this->isNew();
        if (null === $this->collExpensess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collExpensess) {
                // return empty collection
                $this->initExpensess();
            } else {
                $collExpensess = ChildExpensesQuery::create(null, $criteria)
                    ->filterByStaff($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collExpensessPartial && count($collExpensess)) {
                        $this->initExpensess(false);

                        foreach ($collExpensess as $obj) {
                            if (false == $this->collExpensess->contains($obj)) {
                                $this->collExpensess->append($obj);
                            }
                        }

                        $this->collExpensessPartial = true;
                    }

                    return $collExpensess;
                }

                if ($partial && $this->collExpensess) {
                    foreach ($this->collExpensess as $obj) {
                        if ($obj->isNew()) {
                            $collExpensess[] = $obj;
                        }
                    }
                }

                $this->collExpensess = $collExpensess;
                $this->collExpensessPartial = false;
            }
        }

        return $this->collExpensess;
    }

    /**
     * Sets a collection of ChildExpenses objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $expensess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildStaff The current object (for fluent API support)
     */
    public function setExpensess(Collection $expensess, ConnectionInterface $con = null)
    {
        /** @var ChildExpenses[] $expensessToDelete */
        $expensessToDelete = $this->getExpensess(new Criteria(), $con)->diff($expensess);


        $this->expensessScheduledForDeletion = $expensessToDelete;

        foreach ($expensessToDelete as $expensesRemoved) {
            $expensesRemoved->setStaff(null);
        }

        $this->collExpensess = null;
        foreach ($expensess as $expenses) {
            $this->addExpenses($expenses);
        }

        $this->collExpensess = $expensess;
        $this->collExpensessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Expenses objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Expenses objects.
     * @throws PropelException
     */
    public function countExpensess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collExpensessPartial && !$this->isNew();
        if (null === $this->collExpensess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collExpensess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getExpensess());
            }

            $query = ChildExpensesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStaff($this)
                ->count($con);
        }

        return count($this->collExpensess);
    }

    /**
     * Method called to associate a ChildExpenses object to this object
     * through the ChildExpenses foreign key attribute.
     *
     * @param  ChildExpenses $l ChildExpenses
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function addExpenses(ChildExpenses $l)
    {
        if ($this->collExpensess === null) {
            $this->initExpensess();
            $this->collExpensessPartial = true;
        }

        if (!$this->collExpensess->contains($l)) {
            $this->doAddExpenses($l);

            if ($this->expensessScheduledForDeletion and $this->expensessScheduledForDeletion->contains($l)) {
                $this->expensessScheduledForDeletion->remove($this->expensessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildExpenses $expenses The ChildExpenses object to add.
     */
    protected function doAddExpenses(ChildExpenses $expenses)
    {
        $this->collExpensess[]= $expenses;
        $expenses->setStaff($this);
    }

    /**
     * @param  ChildExpenses $expenses The ChildExpenses object to remove.
     * @return $this|ChildStaff The current object (for fluent API support)
     */
    public function removeExpenses(ChildExpenses $expenses)
    {
        if ($this->getExpensess()->contains($expenses)) {
            $pos = $this->collExpensess->search($expenses);
            $this->collExpensess->remove($pos);
            if (null === $this->expensessScheduledForDeletion) {
                $this->expensessScheduledForDeletion = clone $this->collExpensess;
                $this->expensessScheduledForDeletion->clear();
            }
            $this->expensessScheduledForDeletion[]= clone $expenses;
            $expenses->setStaff(null);
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
     * If this ChildStaff is new, it will return
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
                    ->filterByStaff($this)
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
     * @return $this|ChildStaff The current object (for fluent API support)
     */
    public function setNewparents(Collection $newparents, ConnectionInterface $con = null)
    {
        /** @var ChildNewparent[] $newparentsToDelete */
        $newparentsToDelete = $this->getNewparents(new Criteria(), $con)->diff($newparents);


        $this->newparentsScheduledForDeletion = $newparentsToDelete;

        foreach ($newparentsToDelete as $newparentRemoved) {
            $newparentRemoved->setStaff(null);
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
                ->filterByStaff($this)
                ->count($con);
        }

        return count($this->collNewparents);
    }

    /**
     * Method called to associate a ChildNewparent object to this object
     * through the ChildNewparent foreign key attribute.
     *
     * @param  ChildNewparent $l ChildNewparent
     * @return $this|\Staff The current object (for fluent API support)
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
        $newparent->setStaff($this);
    }

    /**
     * @param  ChildNewparent $newparent The ChildNewparent object to remove.
     * @return $this|ChildStaff The current object (for fluent API support)
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
            $newparent->setStaff(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Staff is new, it will return
     * an empty collection; or if this Staff has previously
     * been saved, it will retrieve related Newparents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Staff.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildNewparent[] List of ChildNewparent objects
     */
    public function getNewparentsJoinChild(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildNewparentQuery::create(null, $criteria);
        $query->joinWith('Child', $joinBehavior);

        return $this->getNewparents($query, $con);
    }

    /**
     * Clears out the collWaitingparents collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addWaitingparents()
     */
    public function clearWaitingparents()
    {
        $this->collWaitingparents = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collWaitingparents collection loaded partially.
     */
    public function resetPartialWaitingparents($v = true)
    {
        $this->collWaitingparentsPartial = $v;
    }

    /**
     * Initializes the collWaitingparents collection.
     *
     * By default this just sets the collWaitingparents collection to an empty array (like clearcollWaitingparents());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initWaitingparents($overrideExisting = true)
    {
        if (null !== $this->collWaitingparents && !$overrideExisting) {
            return;
        }

        $collectionClassName = WaitingparentTableMap::getTableMap()->getCollectionClassName();

        $this->collWaitingparents = new $collectionClassName;
        $this->collWaitingparents->setModel('\Waitingparent');
    }

    /**
     * Gets an array of ChildWaitingparent objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildStaff is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildWaitingparent[] List of ChildWaitingparent objects
     * @throws PropelException
     */
    public function getWaitingparents(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collWaitingparentsPartial && !$this->isNew();
        if (null === $this->collWaitingparents || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collWaitingparents) {
                // return empty collection
                $this->initWaitingparents();
            } else {
                $collWaitingparents = ChildWaitingparentQuery::create(null, $criteria)
                    ->filterByStaff($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collWaitingparentsPartial && count($collWaitingparents)) {
                        $this->initWaitingparents(false);

                        foreach ($collWaitingparents as $obj) {
                            if (false == $this->collWaitingparents->contains($obj)) {
                                $this->collWaitingparents->append($obj);
                            }
                        }

                        $this->collWaitingparentsPartial = true;
                    }

                    return $collWaitingparents;
                }

                if ($partial && $this->collWaitingparents) {
                    foreach ($this->collWaitingparents as $obj) {
                        if ($obj->isNew()) {
                            $collWaitingparents[] = $obj;
                        }
                    }
                }

                $this->collWaitingparents = $collWaitingparents;
                $this->collWaitingparentsPartial = false;
            }
        }

        return $this->collWaitingparents;
    }

    /**
     * Sets a collection of ChildWaitingparent objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $waitingparents A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildStaff The current object (for fluent API support)
     */
    public function setWaitingparents(Collection $waitingparents, ConnectionInterface $con = null)
    {
        /** @var ChildWaitingparent[] $waitingparentsToDelete */
        $waitingparentsToDelete = $this->getWaitingparents(new Criteria(), $con)->diff($waitingparents);


        $this->waitingparentsScheduledForDeletion = $waitingparentsToDelete;

        foreach ($waitingparentsToDelete as $waitingparentRemoved) {
            $waitingparentRemoved->setStaff(null);
        }

        $this->collWaitingparents = null;
        foreach ($waitingparents as $waitingparent) {
            $this->addWaitingparent($waitingparent);
        }

        $this->collWaitingparents = $waitingparents;
        $this->collWaitingparentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Waitingparent objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Waitingparent objects.
     * @throws PropelException
     */
    public function countWaitingparents(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collWaitingparentsPartial && !$this->isNew();
        if (null === $this->collWaitingparents || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collWaitingparents) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getWaitingparents());
            }

            $query = ChildWaitingparentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByStaff($this)
                ->count($con);
        }

        return count($this->collWaitingparents);
    }

    /**
     * Method called to associate a ChildWaitingparent object to this object
     * through the ChildWaitingparent foreign key attribute.
     *
     * @param  ChildWaitingparent $l ChildWaitingparent
     * @return $this|\Staff The current object (for fluent API support)
     */
    public function addWaitingparent(ChildWaitingparent $l)
    {
        if ($this->collWaitingparents === null) {
            $this->initWaitingparents();
            $this->collWaitingparentsPartial = true;
        }

        if (!$this->collWaitingparents->contains($l)) {
            $this->doAddWaitingparent($l);

            if ($this->waitingparentsScheduledForDeletion and $this->waitingparentsScheduledForDeletion->contains($l)) {
                $this->waitingparentsScheduledForDeletion->remove($this->waitingparentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildWaitingparent $waitingparent The ChildWaitingparent object to add.
     */
    protected function doAddWaitingparent(ChildWaitingparent $waitingparent)
    {
        $this->collWaitingparents[]= $waitingparent;
        $waitingparent->setStaff($this);
    }

    /**
     * @param  ChildWaitingparent $waitingparent The ChildWaitingparent object to remove.
     * @return $this|ChildStaff The current object (for fluent API support)
     */
    public function removeWaitingparent(ChildWaitingparent $waitingparent)
    {
        if ($this->getWaitingparents()->contains($waitingparent)) {
            $pos = $this->collWaitingparents->search($waitingparent);
            $this->collWaitingparents->remove($pos);
            if (null === $this->waitingparentsScheduledForDeletion) {
                $this->waitingparentsScheduledForDeletion = clone $this->collWaitingparents;
                $this->waitingparentsScheduledForDeletion->clear();
            }
            $this->waitingparentsScheduledForDeletion[]= clone $waitingparent;
            $waitingparent->setStaff(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Staff is new, it will return
     * an empty collection; or if this Staff has previously
     * been saved, it will retrieve related Waitingparents from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Staff.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildWaitingparent[] List of ChildWaitingparent objects
     */
    public function getWaitingparentsJoinPersonaldocument(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildWaitingparentQuery::create(null, $criteria);
        $query->joinWith('Personaldocument', $joinBehavior);

        return $this->getWaitingparents($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->staffid = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->position = null;
        $this->email = null;
        $this->password = null;
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
            if ($this->collChildren) {
                foreach ($this->collChildren as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collExpensess) {
                foreach ($this->collExpensess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collNewparents) {
                foreach ($this->collNewparents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collWaitingparents) {
                foreach ($this->collWaitingparents as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collChildren = null;
        $this->collExpensess = null;
        $this->collNewparents = null;
        $this->collWaitingparents = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(StaffTableMap::DEFAULT_STRING_FORMAT);
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
