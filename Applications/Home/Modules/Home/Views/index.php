<div id="creergroupe">
    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger err"><?= $error_message; ?></div>
    <?php endif; ?>
    <?php if (isset($message)) : ?>
        <div class="alert alert-success"><?= $message; ?></div>
    <?php endif; ?>
    <br>
    <br>
    <div class="page-header">
                <h1 id="timeline">Acceuil</h1>
            </div>
            <ul class="timeline">
                <?php
                    foreach ($results as $r):
                            ?>
                    <li>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title"><span><i class="fa fa-clock-o fa-2x"></i><?=$r['date'];?></span></h4>                            
                            <hr />
                        </div>
                        <div class="timeline-body">
                            <p>
                                <i class="fa fa-check text-success"></i>Nombre de sms envoyes: <?=$r['nbSMSE'];?>
                                <br>
                                <i class="fa fa-exclamation-triangle text-danger"></i>Nombre de sms echoues: <?=$r['nbSMSN'];?> <a href="/sms/home/<?=$r['dateBrut'];?>"><i class="fa fa-mail-forward"></i>en   </a> <span> </span>
                            </p>
                        </div>
                    </div>
                    </li>
                <?php endforeach; ?>
                        
                
            </ul>
    </div>
</div>
