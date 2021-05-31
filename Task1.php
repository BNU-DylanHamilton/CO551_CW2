<?php

$db = mysqli_connect("127.0.0.1", "root", "", "cw2");

$user1 = "Password";
$user2 = "Password1";
$user3 = "Password2";
$user4 = "Password3";
$user5 = "Password4";

$hash1 = password_hash($user1, PASSWORD_DEFAULT);
$hash2 = password_hash($user2, PASSWORD_DEFAULT);
$hash3 = password_hash($user3, PASSWORD_DEFAULT);
$hash4 = password_hash($user4, PASSWORD_DEFAULT);
$hash5 = password_hash($user5, PASSWORD_DEFAULT);

$sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
VALUES ('20000001', '$hash1', '1999-03-03', 'Dylan', 'Hamilton', '24 Butterfree Road', 'Aylesbury', 'Bucks', 'UK', 'HP21 8SY'), 
('20000002', '$hash2', '1997-11-14', 'Jack', 'Leigh', '15 Rattata Way', 'High Wycombe', 'Bucks', 'UK', 'HP11 5RE'),
('20000003', '$hash3', '2000-07-23', 'Rhys', 'Baynton', '72 Caterpie Lane', 'High Wycombe', 'Bucks', 'UK', 'HP11 7QL'),
('20000004', '$hash4', '2000-04-30', 'Alex', 'Holloway', 'Mew Way', 'Aylesbury', 'Bucks', 'UK', 'HP20 1SQ'),
('20000005', '$hash5', '1999-10-10', 'Michelle', 'Horry', 'Mankey Lane', 'Aylesbury', 'Bucks', 'UK', 'HP22 7BU')";



if ($db->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $db->error;
}

mysqli_close($db);

?>