<?php
    include "init.php";
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/default.css">
    <title>Şampiyonlar Ligi Kura Çekimi Örneği</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row justify-content-md-center">

            <?php if($bags != null): ?>
                <?php foreach($bags as $key => $bag): ?>
                    <div class="col-md-3 mb-10">
                        <div class="card">
                            <div class="card-header">
                                <?php echo $bag; ?>
                            </div>
                            <div class="card-body">

                                <ul class="list-group bag_<?php echo $key; ?>">
                                    <?php if($teams != null): ?>
                                        <?php foreach($teams as $team): ?>
                                            <?php if($key == $team["bag_id"]): ?>
                                                <li id="team_<?php echo $team["team_id"]; ?>" class="list-group-item mb-10"><?php echo $team["team_name"]."(". $team["country_name"] .")"; ?></li>
                                            <?php endif ?>    
                                        <?php endforeach ?>
                                    <?php endif; ?>    
                                </ul>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>    
            <?php endif; ?>    

        </div>
    </div>
    <hr>
    <div class="container-fluid text-center">
        <button id="draw_last" class="btn btn-success">
            <div class="spinner spinner-border spinner-border-sm text-light" style="display:none;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div> 
            Kura Çek
        </button>
        <button onclick="window.location = location.href" class="btn btn-primary">Yenile</button>
    </div>                                         
    <hr>

    <div class="container-fluid">
        <div class="row justify-content-md-center">

            <?php if($groups != null):?>
                <?php foreach($groups as $group):?>
                    <div class="col-md-3 mb-10">
                        <div class="card">
                            <div class="card-header">
                                <?php echo $group["name"]; ?>
                            </div>
                            <div class="card-body">

                                <ul id="group_<?php echo $group["id"]; ?>" class="list-group">
                                        
                                </ul>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>
    </div>    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="/js/default.js"></script>   
</body>
</html>