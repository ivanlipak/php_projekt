<?php
echo'
<div style="width: 80%;; margin-left:auto; margin-right:auto;">
                <div style="width:385px; float:left; margin-left:10px; margin-right:10px; padding-left:35px; padding-right:35px;">
                    <h4><strong>Kontakt informacije</strong></h4>
                    <h5>Sjedište:</h5>
                    <p><span>Ul. Fučeki 26, 10360 Sesvete<br /></span></p>
                    <p>Telefon: +385 (0) 9999 999<br /></p>
                    
                    <strong>MB</strong>: 00000000<br />
                    <strong>OIB</strong>: 00000000000<br />
                    <p>IBAN HR7923600000000000000<br>Zagrebačka banka d.d.</p>
                    <p>Trgovački sud u Zagrebu<br /></p>
                    <p>Temeljni kapital 20.000,00 kn<br> uplaćen u cjelosti.</p>
                    <h5>Email:</h5>
                    <p>majstor@gmail.com</p>
                    <h5>Radno vrijeme:</h5>
                    <p>Ponedjeljak &#8211; Petak &nbsp;&nbsp;8h &#8211; 16h</p>
                </div>
                <div style="width:505px; float:left; padding-left:35px; padding-right:35px;">
                    <h4><strong>Karta</strong></h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.324007373785!2d16.1327978154944!3d45.824795117330545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476679e469013b0f%3A0x678fa4715db6ea14!2sFu%C4%8Deki%20ul.%2026%2C%2010360%2C%20Sesvete!5e0!3m2!1sen!2shr!4v1607511411150!5m2!1sen!2shr" width="100%" height="510" frameborder="0" allowfullscreen="2" aria-hidden="false" tabindex="0"></iframe>
                    <!--style="border:0;"-->
                </div>
                        <!--border:solid black 1px;-->
                <div style="width:385px; float: left; margin-left:10px; margin-right:10px; padding-left:35px; padding-right:35px;">
                    <h4><strong>Napišite nam:</strong></h4>
                    <form action="index.php?menu=10" id="contact_form" name="contact_form" method="POST">
                        <label for="fname">Ime *</label><br>
                        <input type="text" id="fname" name="firstname" placeholder="Vaše ime..." required><br>
                        
                        <label for="lname">Prezime *</label><br>
                        <input type="text" id="lname" name="lastname" placeholder="Vaše prezime..." required><br>
                            
                        <label for="email">E-mail *</label><br>
                        <input type="email" id="email" name="email" placeholder="e-mail..." required><br>
                        <label for="country">Zemlja</label><br>
 
                        <select name="country" id="country"><br>
                        <option value="">Odaberite državu</option>';
                        $query  = "SELECT * FROM countries";
                        $result = @mysqli_query($MySQL, $query);
                        while($row = @mysqli_fetch_array($result)) {
                            print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
                        }
                    print'</select><br>
                        <label for="subject">Subject</label><br>
                        <textarea id="subject" name="subject" placeholder="Napišite nam..." style="height:200px"></textarea>
                        <br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div style="clear: both;"></div>
            </div>';


