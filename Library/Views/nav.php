			<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/sms/home/">Sms</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="/sms/home/"><i class="fa fa-bullseye"></i>Home</a></li>
                    <li><a href="/sms/home/"><i class="fa fa-tasks"></i>Ecrire un sms</a></li>
                    <li><a href="/sms/creation/carnet/index"><i class="fa fa-globe"></i> Gerer le carnet d'adresses</a></li>
                    <li><a href="/sms/settings/"><i class="fa fa-list-ol"></i> Parametres </a></li>
                    <li><a href="/sms/logout/"><i class="fa fa-font"></i> Se deconnecter </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                     <li class="dropdown user-dropdown">
                        <a href="/sms/home/#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Bonjour <?= isset($user) ? $user : 'user' ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/sms/home/#"><i class="fa fa-gear"></i> Paramètres</a></li>
                            <li class="divider"></li>
                            <li><a href="/sms/logout/"><i class="fa fa-power-off"></i> Se deconnecter</a></li>
                        </ul>
                    </li>
                </ul>
            </div>