<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country= $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");
$stmt=$conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if(isset($country)){?>
  <?php $country = trim(filter_var($country, FILTER_SANITIZE_STRING)); ?>
  <?php echo($country);?>
  <table id="countryData">
      <tr>
        <th><?= 'Name'; ?></th>
        <th><?= 'Continent'; ?></th>
        <th><?= 'Independence'; ?></th>
        <th><?= 'Head of State'; ?></th>
      </tr>
  <?php foreach ($results as $row){ ?>
          <tr>
          <td><?= $row['name'];?></td>
          <td><?= $row['continent']; ?></td>
          <td><?= $row['independence_year']; ?></td>
          <td><?= $row['head_of_state']; ?></td> 
        </tr>
  <?php } ?>
  </table>
<?php } ?>