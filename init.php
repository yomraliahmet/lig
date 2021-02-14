<?php

include "db.php";

$teamSql = 'SELECT bags.id bag_id, bags.name bag_name, team_id, teams.name team_name, countries.name country_name
FROM bag_team
LEFT JOIN bags ON bag_team.bag_id = bags.id
LEFT JOIN teams ON bag_team.team_id = teams.id
LEFT JOIN countries ON countries.id = teams.country_id';

$groupSql = 'SELECT * FROM groups';

$teamQuery = $db->query($teamSql, PDO::FETCH_ASSOC);
$all = null;
$bags = null;
if ( $teamQuery->rowCount() ){

    $teams = $teamQuery->fetchAll();
    $bags = array_column($teams, 'bag_name', 'bag_id');
}

$groupQuery = $db->query($groupSql, PDO::FETCH_ASSOC);

$groups = null;
if($groupQuery->rowCount()) {
    $groups = $groupQuery->fetchAll();
}


?>