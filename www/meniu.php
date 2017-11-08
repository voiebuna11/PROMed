
        <nav class="navbar-default navbar-side" role="navigation">	<!-- /. Meniu din stanga  -->
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<div class="top-lateral">
						<a href="../dashboard/dashboard.php"><img id="home" src="../bootstrap/images/image-4.png"><br><br></a>
                        <i id="doctor" class="fa fa-user-md fa-5x"></i>
                        Bine ai venit,<br> <?php echo $_SESSION['nume'];?>!<br><br>
                        <a href="dashboard/dashboard.php"><i class="fa fa-cog"></i> Setări</a>
					</div>
                    <li>
                        <a href="../dashboard/dashboard.php" id="meniu_1"><i class="fa fa-home fa-3x"></i>Pagină principală</a>
                    </li>
                    <li>
                        <a href="../pacienti/pacienti.php" id="meniu_2"><i class="fa fa-user fa-3x"></i> Pacienți</a>
                    </li>
                    <li>
                        <a href="../servicii/servicii.php" id="meniu_3"><i class="fa fa-ambulance fa-3x"></i>Servicii medicale</a>
                    </li>
					<li>
                        <a href="../adeverinte/adeverinte.php" id="meniu_4"><i class="fa fa-file-text-o fa-3x"></i> Adeverințe</a>
                    </li>	
                    <li>
                        <a href="../program/program.php" id="meniu_5"><i class="fa fa-calendar fa-3x"></i>Program de lucru</a>
                    </li>
                    <li>
                        <a href="../inventar/inventar.php" id="meniu_6"><i class="fa fa-stethoscope fa-3x"></i> Inventar</a>
                    </li>
                </ul>
            </div>
        </nav> 