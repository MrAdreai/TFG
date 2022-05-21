<!doctype html>
<html lang="es">
	<head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen">		
		<script type="text/javascript" src="csgo-market-master/index.js"></script>
        <meta charset="utf-8"/>
		<title> WEAPON </title>	
        <link rel="icon" type="image/x-icon" href="./img/logo.ico">		
	</head>	
	<body>
		<div id="header">
            <img src="./img/logo.png" id="logo" alt="imagen no encontrada">
        </div>
        <div id="menu">
            <ul class="menu">
                <li>
                    <a href="#">PISTOLS</a>
                    <ul>
                        <li><a href="cz75.html">CZ-75</a></li>
                        <li><a href="desertEagle.html">DESERT EAGLE</a></li>
                        <li><a href="dualBerettas.html">DUAL BERETTAS</a></li>
                        <li><a href="fiveseven.html">FIVE SEVEN</a></li>
                        <li><a href="index.html">GLOCK-18</a></li>
                        <li><a href="p250.html">P250</a></li>
                        <li><a href="p2000.html">P2000</a></li>
                        <li><a href="r8revolver.html">R8 REVOLVER</a></li>
                        <li><a href="tec9.html">TEC-9</a></li>
                        <li><a href="usps.html">USP-S</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">RIFLES</a>
                    <ul>
                        <li><a href="ak47.html">AK-47</a></li>
                        <li><a href="aug.html">AUG</a></li>
                        <li><a href="awp.html">AWP</a></li>
                        <li><a href="famas.html">FAMAS</a></li>
                        <li><a href="g3sg1.html">G3SG1</a></li>
                        <li><a href="galilar.html">GALIL AR</a></li>
                        <li><a href="m4a1s.html">M4A1-S</a></li>
                        <li><a href="m4a4.html">M4A4</a></li>
                        <li><a href="scar20.html">SCAR-20</a></li>
                        <li><a href="sg553.html">SG553</a></li>
                        <li><a href="ssg08.html">SSG08</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">SMG</a>
                    <ul>
                        <li><a href="mac10.html">MAC-10</a></li>
                        <li><a href="mp5sd.html">MP5-SD</a></li>
                        <li><a href="mp7.html">MP7</a></li>
                        <li><a href="mp9.html">MP9</a></li>
                        <li><a href="ppbizon.html">PP-BIZON</a></li>
                        <li><a href="p90.html">P90</a></li>
                        <li><a href="ump45.html">UMP-45</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">HEAVY</a>
                    <ul>
                        <li><a href="mag7.html">MAG-7</a></li>
                        <li><a href="nova.html">NOVA</a></li>
                        <li><a href="sawedoff.html">SAWED-OFF</a></li>
                        <li><a href="xm1014.html">XM1014</a></li>
                        <li><a href="m249.html">M249</a></li>
                        <li><a href="negev.html">NEGEV</a></li>
                    </ul>
                </li>              
            </ul>   
        </div>
        <div class="cuerpoimg">
            <img src="./img/cesped.png" class="img_ppal" alt="imagen no encontrada">
        </div>
        <br>
        <div id="cuerpo99">
            <br>
            <div>
                <?php
                    include_once("mysql.inc.php");
                    
                    $skin=$_POST['skin'];

                    echo"<div class='center'><h1>$skin</h1><br>";
                    
                    conecta(); 

		            mysqli_select_db($c,"csgo");

                    $image_value1 = "SELECT image FROM response where market_hash_name like '%$skin%(Factory New)%'";
                    $image_value2 = "SELECT image FROM response where market_hash_name like '%$skin%(Minimal Wear)%'";
                    $image_value3 = "SELECT image FROM response where market_hash_name like '%$skin%(Field-Tested)%'";
                    $image_value4 = "SELECT image FROM response where market_hash_name like '%$skin%(Well-Worn)%'";
                    $image_value5 = "SELECT image FROM response where market_hash_name like '%$skin%(Battle-Scarred)%'";

                    $image_result1=mysqli_query($c, $image_value1);
                    $image_result2=mysqli_query($c, $image_value2);
                    $image_result3=mysqli_query($c, $image_value3);
                    $image_result4=mysqli_query($c, $image_value4);
                    $image_result5=mysqli_query($c, $image_value5);

                    $image_true1 = mysqli_fetch_array($image_result1);
                    $image_true2 = mysqli_fetch_array($image_result2);
                    $image_true3 = mysqli_fetch_array($image_result3);
                    $image_true4 = mysqli_fetch_array($image_result4);
                    $image_true5 = mysqli_fetch_array($image_result5);

                    $sqlbattle = "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%$skin %(Battle-Scarred)%'";
                    $sqlfactory = "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%$skin %(Factory New)%'";
                    $sqlfield= "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%$skin %(Field-Tested)%'";
                    $sqlminimal = "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%$skin %(Minimal Wear)%'";
                    $sqlwell = "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%$skin %(Well-Worn)%'";
                    $sqlbattlest = "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%StatTrak% $skin %(Battle-Scarred)%'";
                    $sqlfactoryst = "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%StatTrak% $skin %(Factory New)%'";
                    $sqlfieldst= "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%StatTrak% $skin %(Field-Tested)%'";
                    $sqlminimalst = "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%StatTrak% $skin %(Minimal Wear)%'";
                    $sqlwellst = "SELECT market_hash_name, JSON_EXTRACT(prices, '$.avg') as Price FROM response where market_hash_name like '%StatTrak% $skin %(Well-Worn)%'";
                    
                    $battle=mysqli_query($c, $sqlbattle);
                    $factory=mysqli_query($c, $sqlfactory);
                    $field=mysqli_query($c, $sqlfield);
                    $minimal=mysqli_query($c, $sqlminimal);
                    $well=mysqli_query($c, $sqlwell);
                    $battlest=mysqli_query($c, $sqlbattlest);
                    $factoryst=mysqli_query($c, $sqlfactoryst);
                    $fieldst=mysqli_query($c, $sqlfieldst);
                    $minimalst=mysqli_query($c, $sqlminimalst);
                    $wellst=mysqli_query($c, $sqlwellst);

                    $battle_=mysqli_fetch_array($battle);
                    $factory_=mysqli_fetch_array($factory);
                    $field_=mysqli_fetch_array($field);
                    $minimal_=mysqli_fetch_array($minimal);
                    $well_=mysqli_fetch_array($well);
                    $battlest_=mysqli_fetch_array($battlest);
                    $factoryst_=mysqli_fetch_array($factoryst);
                    $fieldst_=mysqli_fetch_array($fieldst);
                    $minimalst_=mysqli_fetch_array($minimalst);
                    $wellst_=mysqli_fetch_array($wellst);
                    echo "<div class='center_all'>";
                    echo "<div class='weapon_stand2'>";
                        echo "<div class='ancho'>";
                            if($image_true1){
                                echo "<img src=".$image_true1['image']." class='portada'>";
                            }
                            elseif($image_true2){
                                echo "<img src=".$image_true2['image']." class='portada'>";
                            }
                            elseif($image_true3){
                                echo "<img src=".$image_true3['image']." class='portada'>";
                            }
                            elseif($image_true4){
                                echo "<img src=".$image_true4['image']." class='portada'>";
                            }
                            elseif($image_true5){
                                echo "<img src=".$image_true5['image']." class='portada'>";
                            }
                            else{
                                echo "<img src=".$image_true['image']." class='portada'>";
                            }  
                        echo "</div>";
                        echo "<div class='ancho'>";
                            echo "<h2>SKIN</h2>";
                            if($factory_){
                                echo "<br>";
                                echo "<div class='prices'>".$factory_['market_hash_name'].":  <b>".$factory_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }
                            if($minimal_){
                                echo "<br>";
                                echo "<div class='prices'>".$minimal_['market_hash_name'].":  <b>".$minimal_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }
                            if($field_){
                                echo "<br>";
                                echo "<div class='prices'>".$field_['market_hash_name'].":  <b>".$field_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }
                            if($well_){
                                echo "<br>";
                                echo "<div class='prices'>".$well_['market_hash_name'].":  <b>".$well_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }
                            if($battle_){
                                echo "<br>";
                                echo "<div class='prices'>".$battle_['market_hash_name'].":  <b>".$battle_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }

                            echo "<br>";
                            
                                echo "<h2>STATTRAK</h2>";
                            if($factoryst_){
                                echo "<br>";
                                echo "<div class='prices'>".$factoryst_['market_hash_name'].":  <b>".$factoryst_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }
                            if($minimalst_){
                                echo "<br>";
                                echo "<div class='prices'>".$minimalst_['market_hash_name'].":  <b>".$minimalst_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }
                            if($fieldst_){        
                                echo "<br>";
                                echo "<div class='prices'>".$fieldst_['market_hash_name'].":  <b>".$fieldst_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }
                            if($wellst_){        
                                echo "<br>";
                                echo "<div class='prices'>".$wellst_['market_hash_name'].":  <b>".$wellst_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }      
                            if($battlest_){    
                                echo "<br>";
                                echo "<div class='prices'>".$battlest_['market_hash_name'].":  <b>".$battlest_['Price']."$</b></div>";
                            }else{
                                echo "<br>";
                                echo "<div class='prices'>No info</div>";
                            }
                        echo "</div>";
                        echo "<br>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    mysqli_close($c);

                
                ?>
                <br>
            </div>
        </div>
        <br>
        <div id="footer">
            <a href="#">copyright</a>  ||  <a href="acercade.html">acerca de</a>
        </div>
    </body>
</html>