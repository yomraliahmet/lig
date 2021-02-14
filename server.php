<?php

include "db.php";

$teamSql = 'SELECT bags.id bag_id, bags.name bag_name, team_id, teams.name team_name, countries.name country_name, countries.id countries_id
FROM bag_team
LEFT JOIN bags ON bag_team.bag_id = bags.id
LEFT JOIN teams ON bag_team.team_id = teams.id
LEFT JOIN countries ON countries.id = teams.country_id';

$groupSql = 'SELECT * FROM groups';

$teamQuery = $db->query($teamSql, PDO::FETCH_ASSOC);
$all = null;

if ( $teamQuery->rowCount() ){

    $teams = $teamQuery->fetchAll();

    $bags = array_column($teams, 'bag_name', 'bag_id');

    $teamsData = $teams;

    $groups["group_1"] = [];
    $groups["group_2"] = [];
    $groups["group_3"] = [];
    $groups["group_4"] = [];
    $groups["group_5"] = [];
    $groups["group_6"] = [];
    $groups["group_7"] = [];
    $groups["group_8"] = [];


    $data = [];

    while($count = count($teamsData) > 0){

        foreach($teamsData as $key => $team){

            $rand = rand(1,8);

            if(count($groups["group_". $rand]) < 4 && !in_array($key,$groups["group_". $rand])){

                if(count($groups["group_". $rand]) > 0){

                    $countryCheck = 1;
                   
                    foreach($groups["group_". $rand] as $k => $v){

 
                        if((int)$team["countries_id"] == (int)$teams[$v]["countries_id"]){
                            $countryCheck = 0;
                        }

                    }
                    

                    if($countryCheck){
                        $groups["group_". $rand][] = $key;
                        $teams[$key]["group"] = $rand;
                        unset($teamsData[$key]);
                    }

                }else{

                    $groups["group_". $rand][] = $key;
                    $teams[$key]["group"] = $rand;
                    unset($teamsData[$key]);

                }
            }

        }

    }

    echo json_encode($teams);
 
}