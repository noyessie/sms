<!DOCTYPE html>
<html lang="fr">
<head>
    
<?=$header;?>
    
</head>
<body>
    
    
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           <?=$nav;?>
        </nav>

        <div id="page-wrapper">
            
    <?php 
    if (isset($_SESSION['success_message'])) : ?>
        
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= $_SESSION['success_message']; ?></div>
    <?php endif; 
        $_SESSION['success_message']='';
    ?>
        
        <?=$content;?>        
        </div>
        <!-- /#page-wrapper -->
    </div>    
</body>
</html>
