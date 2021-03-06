<?php
namespace Webtrees;

/**
 * webtrees: online genealogy
 * Copyright (C) 2015 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

// Application configuration data.  Data here has no GUI to edit it,
// although most of it can be altered to customise local installations.

// Unknown surname
$UNKNOWN_NN = I18N::translate_c('Unknown surname', '…');

// Unknown given name
$UNKNOWN_PN = I18N::translate_c('Unknown given name', '…');

// NPFX tags - name prefixes
$NPFX_accept = array(
	'Adm',
	'Amb',
	'Brig',
	'Can',
	'Capt',
	'Chan',
	'Chapln',
	'Cmdr',
	'Col',
	'Cpl',
	'Cpt',
	'Dr',
	'Gen',
	'Gov',
	'Hon',
	'Lady',
	'Lt',
	'Mr',
	'Mrs',
	'Ms',
	'Msgr',
	'Pfc',
	'Pres',
	'Prof',
	'Pvt',
	'Rabbi',
	'Rep',
	'Rev',
	'Sen',
	'Sgt',
	'Sir',
	'Sr',
	'Sra',
	'Srta',
	'Ven',
);

// FILE:FORM tags - file formats
$FILE_FORM_accept = array(
	'avi',
	'bmp',
	'gif',
	'jpeg',
	'mp3',
	'ole',
	'pcx',
	'png',
	'tiff',
	'wav',
);

// Fact tags (as opposed to event tags), that don't normally have a value
$emptyfacts = array(
	'ADOP',
	'ANUL',
	'BAPL',
	'BAPM',
	'BARM',
	'BASM',
	'BIRT',
	'BLES',
	'BURI',
	'CENS',
	'CHAN',
	'CHR',
	'CHRA',
	'CONF',
	'CONL',
	'CREM',
	'DATA',
	'DEAT',
	'DIV',
	'DIVF',
	'EMIG',
	'ENDL',
	'ENGA',
	'FCOM',
	'GRAD',
	'HUSB',
	'IMMI',
	'MAP',
	'MARB',
	'MARC',
	'MARL',
	'MARR',
	'MARS',
	'NATU',
	'ORDN',
	'PROB',
	'RESI',
	'RETI',
	'SLGC',
	'SLGS',
	'WIFE',
	'WILL',
	'_HOL',
	'_NMR',
	'_NMAR',
	'_SEPR',
);

// Tags that don't require a PLAC subtag
$nonplacfacts = array(
	'ENDL',
	'NCHI',
	'REFN',
	'SLGC',
	'SLGS',
);

// Tags that don't require a DATE subtag
$nondatefacts = array(
	'ABBR',
	'ADDR',
	'AFN',
	'AUTH',
	'CHIL',
	'EMAIL',
	'FAX',
	'FILE',
	'HUSB',
	'NAME',
	'NCHI',
	'NOTE',
	'OBJE',
	'PHON',
	'PUBL',
	'REFN',
	'REPO',
	'RESN',
	'SEX',
	'SOUR',
	'SSN',
	'TEXT',
	'TITL',
	'WIFE',
	'WWW',
	'_EMAIL',
);

// Tags that require a DATE:TIME as well as a DATE
$date_and_time = array(
	'BIRT',
	'DEAT',
);

// Level 2 tags that apply to specific Level 1 tags
// Tags are applied in the order they appear here.
$level2_tags = array(
	'_HEB'=>array(
		'NAME',
		'TITL',
	),
	'ROMN'=>array(
		'NAME',
		'TITL',
	),
	'TYPE'=>array(
		'EVEN',
		'FACT',
		'GRAD',
		'IDNO',
		'MARR',
		'ORDN',
		'SSN',
	),
	'AGNC'=>array(
		'EDUC',
		'GRAD',
		'OCCU',
		'ORDN',
		'RETI',
	),
	'CALN'=>array(
		'REPO',
	),
	'CEME'=>array( // CEME is NOT a valid 5.5.1 tag
		//'BURI',
	),
	'RELA'=>array(
		'ASSO',
		'_ASSO',
	),
	'DATE'=>array(
		'ADOP',
		'ANUL',
		'BAPL',
		'BAPM',
		'BARM',
		'BASM',
		'BIRT',
		'BLES',
		'BURI',
		'CENS',
		'CENS',
		'CHR',
		'CHRA',
		'CONF',
		'CONL',
		'CREM',
		'DEAT',
		'DIV',
		'DIVF',
		'DSCR',
		'EDUC',
		'EMIG',
		'ENDL',
		'ENGA',
		'EVEN',
		'FCOM',
		'GRAD',
		'IMMI',
		'MARB',
		'MARC',
		'MARL',
		'MARR',
		'MARS',
		'NATU',
		'OCCU',
		'ORDN',
		'PROB',
		'PROP',
		'RELI',
		'RESI',
		'RETI',
		'SLGC',
		'SLGS',
		'WILL',
		'_TODO',
	),
	'AGE'=>array(
		'CENS',
		'DEAT',
	),
	'TEMP'=>array(
		'BAPL',
		'CONL',
		'ENDL',
		'SLGC',
		'SLGS',
	),
	'PLAC'=>array(
		'ADOP',
		'ANUL',
		'BAPL',
		'BAPM',
		'BARM',
		'BASM',
		'BIRT',
		'BLES',
		'BURI',
		'CENS',
		'CHR',
		'CHRA',
		'CONF',
		'CONL',
		'CREM',
		'DEAT',
		'DIV',
		'DIVF',
		'EDUC',
		'EMIG',
		'ENDL',
		'ENGA',
		'EVEN',
		'FCOM',
		'GRAD',
		'IMMI',
		'MARB',
		'MARC',
		'MARL',
		'MARR',
		'MARS',
		'NATU',
		'OCCU',
		'ORDN',
		'PROB',
		'PROP',
		'RELI',
		'RESI',
		'RETI',
		'SLGC',
		'SLGS',
		'SSN',
		'WILL',
	),
	'STAT'=>array(
		'BAPL',
		'CONL',
		'ENDL',
		'SLGC',
		'SLGS',
	),
	'ADDR'=>array(
		'BAPM',
		'BIRT',
		'BURI',
		'CENS',
		'CHR',
		'CHRA',
		'CONF',
		'CREM',
		'DEAT',
		'EDUC',
		'EVEN',
		'GRAD',
		'MARR',
		'OCCU',
		'ORDN',
		'PROP',
		'RESI',
	),
	'CAUS'=>array(
		'DEAT',
	),
	'PHON'=>array(
		'OCCU',
		'RESI',
	),
	'FAX'=>array(
		'OCCU',
		'RESI',
	),
	'WWW'=>array(
		'OCCU',
		'RESI',
	),
	'EMAIL'=>array(
		'OCCU',
		'RESI',
	),
	'HUSB'=>array(
		'MARR',
	),
	'WIFE'=>array(
		'MARR',
	),
	'FAMC'=>array(
		'ADOP',
		'SLGC',
	),
	'FILE'=>array(
		'OBJE',
	),
	'_PRIM'=>array(
		'OBJE',
	),
	'EVEN'=>array(
		'DATA',
	),
	'_WT_USER'=>array(
		'_TODO',
	),
	// See https://bugs.launchpad.net/webtrees/+bug/1082666
	'RELI'=>array(
		//'CHR',
		//'CHRA',
		//'BAPM',
		//'MARR',
		//'BURI',
	),
);

// Name fields
$STANDARD_NAME_FACTS = array('NAME', 'NPFX', 'GIVN', 'SPFX', 'SURN', 'NSFX');
