
        <nav class="navbar-default navbar-side meniu-fisa" role="navigation">	<!-- /. Meniu din stanga  -->
            <div class="sidebar-collapse sidebar-fisa">
                <ul class="nav">
                	<div id="id_fisa_menu">
                		Fișa #
                	</div>
                    <div class="navigator-fisa">
                    <div class="form-group">
                         <label style="margin-left: -35px; color:black; font-size:14px"><i class="fa fa-arrow-right fa-1x" style="margin-right: 5px;"></i>  Navigator in fişă</label>
                         <div class="radio"><label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" onclick="currentSlide(1)" value="option1" checked/> <strong>General</strong>
                         </label></div>
                          <div class="radio"><label>
                               <input type="radio" name="optionsRadios" id="optionsRadios2" onclick="currentSlide(2)" value="option3"/> <strong>Consultații</strong>
                          </label></div>
                          <div class="radio"><label>
                               <input type="radio" name="optionsRadios" id="optionsRadios3" onclick="currentSlide(3)" value="option2"/> <strong>Analize</strong>
                          </label> </div>
                          <div class="radio"><label>
                               <input type="radio" name="optionsRadios" id="optionsRadios4" onclick="currentSlide(nr_maxim)" value="option4"/> <strong>Altele</strong>
                          </label></div>
                    </div>
                    </div>
                    <div class="navigator-fisa">
                    <div class="form-group">
                         <label style="margin-left: -35px; color:black; font-size:14px"><i class="fa fa-arrow-right fa-1x" style="margin-right: 5px;"></i>  Editări în fişă</label>
                         	<br><a href="#" onclick="save_all()" id="save_all"><i class="fa fa-arrow-right fa-1x"></i> Salvează toate datele</a>
                         
                    </div>
                    </div>
                	<br>
					<li>
                        <a href="#"><i class="fa fa-arrow-right fa-1x"></i>Caută altă fișă</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-arrow-right fa-1x"></i>Exportă fișa ca .pdf</a>
                    </li>
					<li style="margin-top: 60px">
                        <a href="pacienti.php?tab=lista" style="text-decoration: underline;"><i class="fa fa-arrow-left fa-1x"></i>Înapoi la Listă pacienți</a>
                    </li>
                   
                </ul>
            </div>
        </nav> 