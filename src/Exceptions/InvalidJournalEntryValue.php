<?php

namespace DronTeam\Accounting\Exceptions;

class InvalidJournalEntryValue extends BaseException {
	
	public $message = 'Journal transaction entries must be a positive value';
	
}