--TEST--
pdo_informix: Tests all Fetch orientations
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
    //Remember to add ;EnableScrollableCursors=1 to the DSN for this tests 
    //to pass.

    require_once('fvt.inc');
    class Test extends FVTTest {
        public function runTest(){
            $this->connect();
            $this->prepareDB();
            
            $stmt = $this->db->prepare( "SELECT id, breed, name, weight FROM animals ORDER BY id" , 
                array( PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL ) );
            $stmt->execute();
            $row = $stmt->fetch( PDO::FETCH_BOTH , PDO::FETCH_ORI_FIRST );
            var_dump( $row );
            $row = $stmt->fetch( PDO::FETCH_BOTH , PDO::FETCH_ORI_NEXT );
            var_dump( $row );
            $row = $stmt->fetch( PDO::FETCH_BOTH , PDO::FETCH_ORI_PRIOR );
            var_dump( $row );
            $row = $stmt->fetch( PDO::FETCH_BOTH , PDO::FETCH_ORI_LAST );
            var_dump( $row );
            $row = $stmt->fetch( PDO::FETCH_BOTH , PDO::FETCH_ORI_ABS , 2 );
            var_dump( $row );
            $row = $stmt->fetch( PDO::FETCH_BOTH , PDO::FETCH_ORI_REL , 1 );
            var_dump( $row );

            $stmt->closeCursor();
        }
    }

    $testcase = new Test();
    $testcase->runTest();
?>
--EXPECT--
array(8) {
  ["id"]=>
  string(1) "0"
  [0]=>
  string(1) "0"
  ["breed"]=>
  string(3) "cat"
  [1]=>
  string(3) "cat"
  ["name"]=>
  string(16) "Pook            "
  [2]=>
  string(16) "Pook            "
  ["weight"]=>
  string(4) "3.20"
  [3]=>
  string(4) "3.20"
}
array(8) {
  ["id"]=>
  string(1) "1"
  [0]=>
  string(1) "1"
  ["breed"]=>
  string(3) "dog"
  [1]=>
  string(3) "dog"
  ["name"]=>
  string(16) "Peaches         "
  [2]=>
  string(16) "Peaches         "
  ["weight"]=>
  string(5) "12.30"
  [3]=>
  string(5) "12.30"
}
array(8) {
  ["id"]=>
  string(1) "0"
  [0]=>
  string(1) "0"
  ["breed"]=>
  string(3) "cat"
  [1]=>
  string(3) "cat"
  ["name"]=>
  string(16) "Pook            "
  [2]=>
  string(16) "Pook            "
  ["weight"]=>
  string(4) "3.20"
  [3]=>
  string(4) "3.20"
}
array(8) {
  ["id"]=>
  string(1) "6"
  [0]=>
  string(1) "6"
  ["breed"]=>
  string(5) "llama"
  [1]=>
  string(5) "llama"
  ["name"]=>
  string(16) "Sweater         "
  [2]=>
  string(16) "Sweater         "
  ["weight"]=>
  string(6) "150.00"
  [3]=>
  string(6) "150.00"
}
array(8) {
  ["id"]=>
  string(1) "1"
  [0]=>
  string(1) "1"
  ["breed"]=>
  string(3) "dog"
  [1]=>
  string(3) "dog"
  ["name"]=>
  string(16) "Peaches         "
  [2]=>
  string(16) "Peaches         "
  ["weight"]=>
  string(5) "12.30"
  [3]=>
  string(5) "12.30"
}
array(8) {
  ["id"]=>
  string(1) "2"
  [0]=>
  string(1) "2"
  ["breed"]=>
  string(5) "horse"
  [1]=>
  string(5) "horse"
  ["name"]=>
  string(16) "Smarty          "
  [2]=>
  string(16) "Smarty          "
  ["weight"]=>
  string(6) "350.00"
  [3]=>
  string(6) "350.00"
}
