<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <title>Comment Ajax</title>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
            
                <h1>Article Ajax</h1>
                <p>Suppose to do</p><hr>
                <div class="form-group">
                    <label for="text_comment">Comment</label>
                    <textarea name="text_comment" id="text_comment" class="form-control" placeholder="Enter text here ..."></textarea><br>
                    <div class="float-right">
                        <input type="submit" name="submit_comment" id="submit_comment" value="Save" class="btn btn-primary">
                    </div>
                </div><br><br>
                
                <h4>Your Comment: </h4><hr>
                <div id="wrapper_comment">
                    <?php 
                        require_once 'DB.php';
                        $q   = "SELECT * FROM komentar ORDER BY id DESC";
                        $res = mysqli_query($link, $q);
                        foreach ($res as $r) :
                    ?>
                    
                    <div id="comment_<?= $r['id'] ?>" data-id="<?= $r['id'] ?>">
                        
                        <div class="float-right">
                            <div class="row">
                                <div class="col-2">
                                    <button class="btn btn-info btn-sm edit" data-id="<?= $r['id'] ?>">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-danger btn-sm delete" data-id="<?= $r['id'] ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>  
                        </div>
                        
                       <div class="col-10">
                            <p class="comment_text" data-id="<?= $r['id'] ?>"> <?= $r['isi_komentar'] ?> </p> 
                       </div><hr> 
                        
                    </div>
                   
                    <?php endforeach; ?>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/main.js"></script>
</body>
</html>