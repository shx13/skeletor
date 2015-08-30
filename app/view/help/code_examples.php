<div id="container">
<?php $this->renderFeedbackMessages(); ?>

<h1>Code Examples</h1>

<h2>PDO SELECT:</h2>

<code>
// connect to db
$db = Database::getFactory()->getConnection();

// select row
$sql = "SELECT * FROM table_name WHERE valueX = :valueX LIMIT 1";

// prepare query
$query = $db->prepare($sql);

// execute query
$query->execute(array(':valueX' => $valueX));

return $query->fetch();

</code>

<h2>PDO INSERT:</h2>

<code>
// connect to db
$db = Database::getFactory()->getConnection();

// add row to table
$sql = "INSERT INTO table_name ( valueX,  valueY,  valueZ)
                        VALUES (:valueX, :valueY, :valueZ)";

// prepare query
$query = $db->prepare($sql);

// execute query
$query->execute(array(':valueX' => $valueX,
                      ':valueY' => $valueY,
                      ':valueZ' => $valueZ));

// count affected rows
$count =  $query->rowCount();

if ($count == 1) {
  Session::add('feedback_positive', 'Query executed successfully.');
  return true;
}

</code>

<h2>PDO UPDATE:</h2>

<code>
// connect to db
$db = Database::getFactory()->getConnection();

// update row
$sql = "UPDATE table_name
           SET valueX  = :valueX,
               valueY  = :valueY,
               valueZ  = :valueZ
         WHERE page_id = :page_id";

// prepare query
$query = $db->prepare($sql);

// execute query
$query->execute(array(':valueX' => $valueX,
                      ':valueY' => $valueY,
                      ':valueZ' => $valueZ,
                      ':page_id' => $page_id));

// count affected rows
$count =  $query->rowCount();

if ($count == 1) {
  Session::add('feedback_positive', 'Query executed successfully.');
  return true;
}

</code>

<h2>PDO DELETE:</h2>

<code>
// connect to db
$db = Database::getFactory()->getConnection();

// remove row from table
$sql = "DELETE FROM table_name WHERE valueX = :valueX LIMIT 1";

// prepare query
$query = $db->prepare($sql);

// execute query
$query->execute(array(':valueX' => $valueX));

// count affected rows
if ($query->rowCount() == 1) {
  Session::add('feedback_positive', 'Row removed succesfully.');
  return true;
}

</code>

</div>