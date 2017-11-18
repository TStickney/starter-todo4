<?php

/**
 * CSV-persisted collection.
 * 
 * @author		JLP
 * @copyright           Copyright (c) 2010-2017, James L. Parry
 * ------------------------------------------------------------------------
 */
class XML_Model extends Memory_Model
{
    protected $xml = null;

//---------------------------------------------------------------------------
//  Housekeeping methods
//---------------------------------------------------------------------------

	/**
	 * Constructor.
	 * @param string $origin Filename of the XML file
	 * @param string $keyfield  Name of the primary key field
	 * @param string $entity  Entity name meaningful to the persistence
	 */
	function __construct($origin = null, $keyfield = 'id', $entity = null)
	{
		parent::__construct();

		// guess at persistent name if not specified
		if ($origin == null)
			$this->_origin = get_class($this);
		else
			$this->_origin = $origin;

		// remember the other constructor fields
		$this->_keyfield = $keyfield;
		$this->_entity = $entity;

		// start with an empty collection
		$this->_data = array(); // an array of objects
		$this->fields = array(); // an array of strings
		// and populate the collection
		$this->load();
	}

	/**
	 * Load the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function load()
	{
            $this->xml = simplexml_load_file($this->_origin);           
            
            $this->fields = array("id", "task", "priority", "size", "group", "deadline", "status", "flag");
            
            foreach ($this->xml->tasks->item as $item) {
                $record = new stdClass();
                $record->id = (int) $item->id;
                $record->task = (string) $item->task;
                $record->priority = (string) $item->priority;
                $record->size = (int) $item->size;
                $record->group = (int) $item->group;
                $record->deadline = (string) $item->deadline;
                $record->status = (int) $item->status;
                $record->flag = (int) $item->flag;
                
                $key = $record->id;
                $this->_data[$key] = $record;
            }
            // --------------------
	    // rebuild the keys table
	    $this->reindex();
	}

	/**
	 * Store the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function store()
	{
		// rebuild the keys table
		$this->reindex();
		//---------------------
		if (($handle = fopen($this->_origin, "w")) !== FALSE)
		{
			fputcsv($handle, $this->_fields);
			foreach ($this->_data as $key => $record)
				fputcsv($handle, array_values((array) $record));
			fclose($handle);
		}
		// --------------------
	}

}
