<?php

namespace DromTeam\Accounting\ModelTraits;

use DromTeam\Accounting\Models\Journal;

/**
 * Class AccountingJournal
 * @package DromTeam\Accounting\ModelTraits
 */
trait AccountingJournal {
	
	
	/**
	 * Morph to Journal.
	 *
	 * @return mixed
	 */
	public function journal()
    {
        return $this->morphOne(Journal::class,'morphed');
    }
	
	/**
	 * Initialize a journal for a given model object
	 *
	 * @param string $currency_code
	 * @return Journal
	 * @throws \Exception
	 */
	public function initJournal($currency_code='USD') {
    	if (!$this->journal) {
	        $journal = new Journal();
	        $journal->currency = $currency_code;
	        $journal->balance = 0;
	        return $this->journal()->save($journal);
	    }
		throw new \Exception('Journal already exists.');
    }
	
}