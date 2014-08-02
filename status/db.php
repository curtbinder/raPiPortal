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

//require "../masterconfig.php";

# database class
class raDB extends SQLite3 {

	const VERSION = 1;

    function __construct() {
        $this->open('reefangel.db');
    }

	private static $pcolumns = array(
		't1', 't2', 't3', 'ph', 'pwma', 'pwmao', 'pwmd', 'pwmdo',
		'atohigh', 'atolow', 'sal', 'orp', 'rdata', 'ronmask', 'roffmask',
		'r1data', 'r1onmask', 'r1offmask', 'r2data', 'r2onmask', 'r2offmask',
		'r3data', 'r3onmask', 'r3offmask', 'r4data', 'r4onmask', 'r4offmask',
		'r5data', 'r5onmask', 'r5offmask', 'r6data', 'r6onmask', 'r6offmask',
		'r7data', 'r7onmask', 'r7offmask', 'r8data', 'r8onmask', 'r8offmask',
		'pwme0', 'pwme1', 'pwme2', 'pwme3', 'pwme4', 'pwme5', 'pwme0o',
		'pwme1o', 'pwme2o', 'pwme3o', 'pwme4o', 'pwme5o', 'aiw', 'aib',
		'airb', 'aiwo', 'aibo', 'airbo', 'rfm', 'rfs', 'rfd', 'rfw', 'rfrb',
		'rfr', 'rfg', 'rfb', 'rfi', 'rfwo', 'rfrbo', 'rfro', 'rfgo', 'rfbo',
		'rfio', 'io', 'c0', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'em',
		'em1', 'rem', 'phe', 'wl', 'wl1', 'wl2', 'wl3', 'wl4', 'hum', 'af', 'sf'
	);

	public static function getParamsColumns() {
		return self::$pcolumns;
	}

    public function createTables() {
    	$this->createParamsTable();
    	$this->createLabelsTable();
    	$this->createDevicesTable();
    	$this->createSiteTable();
    }

    private function createParamsTable() {
        $this->exec('CREATE TABLE params(autoid integer primary key autoincrement,
        	id text,
        	t1 text,
        	t2 text,
        	t3 text,
        	ph text,
        	pwma integer,
			pwmao integer default 255,
        	pwmd integer,
			pwmdo integer default 255,
        	atohigh integer,
        	atolow integer,
        	sal text,
        	orp text,
        	logdate text,
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
        	pwme0 integer,
			pwme0o integer default 255,
			pwme1 integer,
			pwme1o integer default 255,
        	pwme2 integer,
			pwme2o integer default 255,
        	pwme3 integer,
			pwme3o integer default 255,
        	pwme4 integer,
			pwme4o integer default 255,
        	pwme5 integer,
			pwme5o integer default 255,
        	aiw integer,
			aiwo integer default 255,
        	aib integer,
			aibo integer default 255,
        	airb integer,
			airbo integer default 255,
        	rfm integer,
        	rfs integer,
        	rfd integer,
        	rfw integer,
			rfwo integer default 255,
        	rfrb integer,
			rfrbo integer default 255,
        	rfr integer,
			rfro integer default 255,
        	rfg integer,
			rfgo integer default 255,
        	rfb integer,
			rfbo integer default 255,
        	rfi integer,
			rfio integer default 255,
        	io integer,
        	c0 integer,
        	c1 integer,
        	c2 integer,
        	c3 integer,
        	c4 integer,
        	c5 integer,
        	c6 integer,
        	c7 integer,
        	em integer,
        	em1 integer,
        	rem integer,
        	phe text,
        	wl integer,
        	wl1 integer,
        	wl2 integer,
        	wl3 integer,
        	wl4 integer,
        	hum integer,
			af,
			sf
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
        	r88n text,
			pwme0n text,
			pwme1n text,
			pwme2n text,
			pwme3n text,
			pwme4n text,
			pwme5n text,
			phn text,
			saln text,
			orpn text,
			phen text,
			wln text,
			wl1n text,
			wl2n text,
			wl3n text,
			wl4n text,
			humn text,
			c0n text,
			c1n text,
			c2n text,
			c3n text,
			c4n text,
			c5n text,
			c6n text,
			c7n text,
			io0n text,
			io1n text,
			io2n text,
			io3n text,
			io4n text,
			io5n text,
			io6n text,
			atolown text,
			atohighn text,
			rfwn text,
			rfrbn text,
			rfrn text,
			rfgn text,
			rfbn text,
			rfin text,
			aiwn text,
			aibn text,
			airbn text

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
    		$this->createTables();
    		$this->exec("INSERT INTO site (portal_version, db_version, creation) VALUES
    		 ('PORTAL_VERSION','self::VERSION',datetime('now'))");
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

	public function displayAllDevices() {
		$result = $this->query('SELECT id, ip, port FROM devices');
		// DB::iserror($result)
		// print header
		$count = 0;
		printDevicesHeader();
		//if ( $this->hasRows($result) ) {
			while ( $row = $result->fetchArray() ) {
				// print row
				//printDeviceRow($row);
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>\n";
				$count++;
			}
		//} else {
		if ( $count == 0 ) {
			echo "<tr><td colspan=3>No Devices</td></tr>";
		}
		//}
		// print footer
		printDevicesFooter();
	}

	public function isValidDevice($id, $key) {
		// must have an open database connection prior to calling
		$st = $this->prepare("SELECT id, key FROM devices WHERE id = :id");
		$st->bindValue(':id', $id);
		$result = $st->execute();
		if ( $this->hasRows($result)) {
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

	public function hasRows($result) {
		// since numRows is not available, use this function
		// when there are 0 rows, sqlite3 functions return:
		//   fetchArray returns '1'
		//   numColumns returns '1'
		//   column type for column '0' will be SQLITE3_NULL
		if ( $result->numColumns() && $result->columnType(0) != SQLITE3_NULL ) {
			return true;
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

	public function addDevice($device, $host, $port) {
		$st = "INSERT INTO devices (id, ip, port) VALUES ('$device', '$host', '$port')";
		$this->exec($st);
	}

}

function printDevicesHeader() {
	echo "<table><thead><tr><th>Device</th><th>Host / IP</th><th>Port</th></tr></thead>\n";
}

function printDeviceRow($row) {
	echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>\n";
}

function printDevicesFooter() {
	echo "</table>\n";
}
?>
