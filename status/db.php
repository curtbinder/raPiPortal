<?php
/*
 * Copyright 2013 Curt Binder
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
 
require "../masterconfig.php"

# database class
class raDB extends SQLite3 {

	const VERSION = 1;

    function __construct() {
        $this->open('reefangel.db');
    }
    
	private static $pcolumns = array(
		't1', 't2', 't3', 'ph', 'atohigh', 'atolow', 'rdata', 'ronmask', 'roffmask',
		'r1data', 'r1onmask', 'r1offmask', 'r2data', 'r2onmask', 'r2offmask',
		'r3data', 'r3onmask', 'r3offmask', 'r4data', 'r4onmask', 'r4offmask',
		'r5data', 'r5onmask', 'r5offmask', 'r6data', 'r6onmask', 'r6offmask',
		'r7data', 'r7onmask', 'r7offmask', 'r8data', 'r8onmask', 'r8offmask',
		'em', 'em1', 'rem', 'sal', 'orp', 'c0', 'c1', 'c2', 'c3', 'c4', 'c5',
		'c6', 'c7', 'flag', 'pwma', 'pwmd', 'pwme0', 'pwme1', 'pwme2', 'pwme3',
		'pwme4', 'pwme5', 'rfm', 'rfs', 'rfd', 'rfw', 'rfrb', 'rfr', 'rfg', 'rfb',
		'rfi', 'aiw', 'aib', 'airb', 'io', 'phe', 'wl', 'hum', 'dcm', 'dcs', 'dcd'
	);
	
	public static function getParamsColumns() {
		return self::$pcolumns;
	}

    public function createTables() {
    	createParamsTable();
    	createLabelsTable();
    	createDevicesTable();
    	createSiteTable();
    }
    
    private function createParamsTable() {
        $this->exec('CREATE TABLE params(autoid integer primary key autoincrement,
        	id text,
        	t1 text,
        	t2 text,
        	t3 text,
        	ph text,
        	atohigh integer,
        	atolow integer,
        	rdata integer,
        	ronmask integer,
        	roffmask integer,
        	r1data integer,
        	r1onmask integer,
        	r1offmask integer,
        	r2data integer,
        	r2onmask integer,
        	r2offmask integer,
        	r3data integer,
        	r3onmask integer,
        	r3offmask integer,
        	r4data integer,
        	r4onmask integer,
        	r4offmask integer,
        	r5data integer,
        	r5onmask integer,
        	r5offmask integer,
        	r6data integer,
        	r6onmask integer,
        	r6offmask integer,
        	r7data integer,
        	r7onmask integer,
        	r7offmask integer,
        	r8data integer,
        	r8onmask integer,
        	r8offmask integer,
        	em integer,
        	em1 integer,
        	rem integer,
        	sal text,
        	orp text,
        	logdate text,
        	c0 integer,
        	c1 integer,
        	c2 integer,
        	c3 integer,
        	c4 integer,
        	c5 integer,
        	c6 integer,
        	c7 integer,
        	flag integer,
        	pwma integer,
        	pwmd integer,
        	pwme0 integer,
			pwme1 integer,
        	pwme2 integer,
        	pwme3 integer,
        	pwme4 integer,
        	pwme5 integer,
        	rfm integer,
        	rfs integer,
        	rfd integer,
        	rfw integer,
        	rfrb integer,
        	rfr integer,
        	rfg integer,
        	rfb integer,
        	rfi integer,
        	aiw integer,
        	aib integer,
        	airb integer,
        	io integer,
        	phe text,
        	wl integer,
        	hum integer,
        	dcm integer,
        	dcs integer,
        	dcd integer
        	)');    
    }
    
    private function createLabelsTable() {
        $this->exec('CREATE TABLE labels(autoid integer primary key autoincrement,
        	id text,
        	t1n text,
        	t2n text,
        	t3n text,
        	r1n text,
        	r2n text,
        	r3n text,
        	r4n text,
        	r5n text,
        	r6n text,
        	r7n text,
        	r8n text,
        	r11n text,
        	r12n text,
        	r13n text,
        	r14n text,
        	r15n text,
        	r16n text,
        	r17n text,
        	r18n text,
        	r21n text,
        	r22n text,
        	r23n text,
        	r24n text,
        	r25n text,
        	r26n text,
        	r27n text,
        	r28n text,
        	r31n text,
        	r32n text,
        	r33n text,
        	r34n text,
        	r35n text,
        	r36n text,
        	r37n text,
        	r38n text,
        	r41n text,
        	r42n text,
        	r43n text,
        	r44n text,
        	r45n text,
        	r46n text,
        	r47n text,
        	r48n text,
        	r51n text,
        	r52n text,
        	r53n text,
        	r54n text,
        	r55n text,
        	r56n text,
        	r57n text,
        	r58n text,
        	r61n text,
        	r62n text,
        	r63n text,
        	r64n text,
        	r65n text,
        	r66n text,
        	r67n text,
        	r68n text,
        	r71n text,
        	r72n text,
        	r73n text,
        	r74n text,
        	r75n text,
        	r76n text,
        	r77n text,
        	r78n text,
        	r81n text,
        	r82n text,
        	r83n text,
        	r84n text,
        	r85n text,
        	r86n text,
        	r87n text,
        	r88n text
        	)');
    }
    
    private function createDevicesTable() {
        $this->exec('CREATE TABLE devices(autoid integer primary key autoincrement,
        	id text, 
        	ip text, 
        	port integer default 2000, 
        	key text)');    
    }
    
    private function createSiteTable() {
    	$this->exec('CREATE TABLE site(
    		portal_version text,
    		db_version integer,
    		creation text)');
    }
    
    public function checkPortalCreated() {
    	// check if the portal is created and configured
    	// we check for an entry in the site table
    	// if it does not exist, then we will create it along with all the tables
    	$result = $this->query('SELECT * FROM site');
    	if ( !$result ) {
    		// no tables, so create the portal
    		createTables();
    		$this->exec("INSERT INTO site (portal_version, db_version, creation) VALUES
    		 ('PORTAL_VERSION','$this::VERSION',datetime('now'))");
    	}
    }
    
    public function getDatabaseVersion() {
    	// returns the database version
    	// useful for upgrading the database
    }
    
    public function getPortalVersion() {
    	// returns the portal version
    	// useful for upgrading the portal software
    }

	//public function getLatestData($id) {
	//}
	
	public function isValidDevice($id, $key) {
		// must have an open database connection prior to calling
		$st = $this->prepare('SELECT id, key FROM devices WHERE id = :id');
		$st->bindValue(':id', $id);
		$result = $st->execute();
		if ( $result->numColumns() > 0 ) {
			// we have a device, compare keys
			if ( empty($key) ) {
				return true;
			} else {
				$row = $result->fetchArray();
				if ( strcmp($key, $row[1]) == 0 ) {
					return true;
				} else {
					return false;
				}
			}
		}
		return false;
	}
	
	public function insertParameters($c, $v) {
		$st = "INSERT INTO params ($c) VALUES ($v)";
		$this->exec($st);
	}
	
	public function updateDeviceLastIP($id, $ip) {
		$st = SQLite3::escapeString("UPDATE devices SET ip = '$ip' WHERE id = '$id'");
		$this->exec($st);
	}

}

?>