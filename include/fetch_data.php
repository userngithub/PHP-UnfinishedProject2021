<?php
$query = FetchData::getFetchData();
$query .= "WHERE email = '$email' ";
$stmt = $dbcon->query($query);
$stmt= $dbcon->prepare($query);
$stmt->bindParam(':email', $email, PDO::PARAM_INT);
$stmt->bindParam(':first_name', $user_admin, PDO::PARAM_INT);
$stmt->execute([$email, $user_admin]);
$row = $stmt->fetch(PDO::FETCH_NUM);
?>