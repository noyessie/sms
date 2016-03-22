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
                <li>
                    <div class="timeline-badge info"><i class="fa fa-mail-forward"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title">Envoyer un sms</h4>                            
                            <hr />
                        </div>
                        <div class="timeline-body">
                            <p>
                                
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
    </div>
</div>
