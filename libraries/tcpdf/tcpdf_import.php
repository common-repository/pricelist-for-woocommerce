<?php
//============================================================+
// File name   : tcpdf_import.php
// Version     : 1.0.001
// Begin       : 2011-05-23
// Last Update : 2013-09-17
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2011-2013 Nicola Asuni - Tecnick.com LTD
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the License
// along with TCPDF. If not, see
// <http://www.tecnick.com/pagefiles/tcpdf/LICENSE.TXT>.
//
// See LICENSE.TXT file for more information.
// -------------------------------------------------------------------
//
// Description : This is a PHP class extension of the TCPDF library to
//               import existing PDF documents.
//
//============================================================+

/**
 * @file
 * !!! THIS CLASS IS UNDER DEVELOPMENT !!!
 * This is a PHP class extension of the TCPDF (http://www.tcpdf.org) library to import existing PDF documents.<br>
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 1.0.001
 */

// include the TCPDF class
require_once(dirname(__FILE__).'/tcpdf.php');
require_once(dirname(__FILE__).'/tcpdf_parser.php');
class TCPDF_IMPORT extends TCPDF {
	public function importPDF($filename) {
		$rawdata = file_get_contents($filename);
		if ($rawdata === false) {
			$this->Error('Unable to get the content of the file: '.$filename);
		}
		$cfg = array(
			'die_for_errors' => false,
			'ignore_filter_decoding_errors' => true,
			'ignore_missing_filter_decoders' => true,
		);
		try {
			$pdf = new TCPDF_PARSER($rawdata, $cfg);
		} catch (Exception $e) {
			die($e->getMessage());
		}
		$data = $pdf->getParsedData();
		unset($rawdata);


		print_r($data);


		unset($pdf);
	}

}