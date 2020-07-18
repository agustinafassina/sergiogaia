<?php require('controlador/coneccion.php');
error_reporting();
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>GAIA Espacio Holístico - Centro Psicológico y Multidisciplinario</title>
   <!--   <meta name="description" content="Gaia Espacio Holístico es un centro psicológico y multidisciplinario coordinado por la Lic. en Psicología María Paz Luján Pérez. Actividades: Psicología, Yoga, Alimentación Consciente y otras terapias."/>
<meta name="keywords" content="Gaia, Córdoba, espacio holístico, psicoterapia, nutrición, psicología, yoga, Gaia espacio holístico, yoga córdoba, psicoterapia holística, centro psicológico, centro multidisciplinario"/>

<meta property="og:locale" content="es_ES" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Novedades" />
<meta property="og:description" content="Gaia Espacio Holístico es un centro psicológico y multidisciplinario coordinado por la Lic. en Psicología María Paz Luján Pérez. Actividades: Psicología, Yoga, Alimentación Consciente y otras terapias."/>
<meta property="og:url" content="http://www.gaiaespacioholistico.com/novedades.php/" />
<meta property="og:site_name" content="Gaia Espacio Holístico" />
<meta property="og:image" content="http://www.gaiaespacioholistico.com/img/novedad2.jpg"/>-->

      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">
      <!-- CUSTOM STYLE -->  
      <link rel="stylesheet" href="css/template-style.css">
<link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/responsee.js"></script>   
      
      <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80250412-1', 'auto');
  ga('send', 'pageview');
  
  function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

</script>
<style type="text/css">
  .botonmas{
    padding: 5px 10px;
    border: 1px solid #FC115C;
    color: #a0a0a0;
    font-size: 0.909em;
    font-weight: bold;
    display: inline-block;
    cursor: pointer;
    text-align: center;
    position: relative;
    left: 50%;
    -webkit-transform: translate(-50%);
    -moz-transform: translate(-50%);
    -o-transform: translate(-50%);
    -ms-transform: translate(-50%);
    transform: translate(-50%);
  }
</style>

      <!--[if lt IE 9]>
	      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <![endif]-->
   </head>
   <body class="size-1140" onLoad="MM_preloadImages('img/logo-footer1.png')">
      <!-- TOP NAV WITH LOGO -->  
      <header>
         <nav>
            <div class="line">
               <div class="top-nav">              
                  <div class="logo hide-l">
                    <a href="index.html"><img src="img/logo-gaia.png" alt="Gaia Logo" id="header-logo"></a>
                  </div>                  
                  <p class="nav-text"></p>
                                   
                     <li class="logo hide-s hide-m">
                       <img src="img/logo-gaia.png" alt="Gaia Logo" id="header-logo">
                     </li>
                 
                  <div class="top-nav">
                     <ul>
                        <li><a href="index.html">INICIO</a></li>
                        <li><a href="equipo.html">EQUIPO</a></li>
                        <li><a href="servicios.html">SERVICIOS</a></li>
                        <li><a href="novedades.php">NOVEDADES</a></li>                    
                        <li><a href="galeria.html">GALERÍA</a></li>
                        <li><a href="contacto.html">CONTACTO</a></li>
                        <li><a href="https://www.facebook.com/GAIAespacioholistico/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="https://www.instagram.com/gaia.espacioholistico/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        
                     </ul> 
                  </div>
               </div>
            </div>
         </nav>
      </header>
      <section>
         <!-- CAROUSEL -->  	
         <div id="carousel">
            <div id="owl-demo" class="owl-carousel owl-theme">

                <div class="item">
                  <img src="img/cuarta.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9 m-9">
                           <h2>amate</h2>
                           <h3>tal cual eres</h3>
                        </div>
                     </div>
                  </div>
               </div>
               
                               <div class="item">
                  <img src="img/primera.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                       <div class="s-12 l-9 m-9">
                           <h2>conecta</h2>
                           <h3>con tu esencia</h3>
                        </div>
                     </div>
                  </div>
               </div>
               
               
                            <div class="item">
                  <img src="img/segunda.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                       <div class="s-12 l-9 m-9">
                          <h2>vive tu vida</h2>
                           <h3>en plenitud</h3>
                        </div>
                     </div>
                  </div>
               </div>
               
                              <div class="item">
                  <img src="img/tercera.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9 m-9">
                           <h2>recuerda</h2>
                           <h3>quien eres</h3>
                        </div>
                     </div>
                  </div>
               </div>
               
               
               </div>
               
            </div>
         </div>
         <!-- FIRST BLOCK --> 	
         <div id="first-block">
            <div class="line">
               <h1><strong>NOVEDADES</strong></h1>
               <?php 
		            $sql = "SELECT * FROM novedades ORDER by fecha desc";
		            // mysqli_set_charset($con, "utf8");
		            if (!$result=mysqli_query($con,$sql));
                  while($row = mysqli_fetch_array($result)){
              	   $id = $row['id'];
               ?>
               <div class="margin">
               	 
               <div class="s-12 l-5">
                <?php if($row['imagen'] !== 'novedades/'){?>
               		<img src="panel/<?php echo $row['imagen'] ?>" alt="<?php echo $row['titulo'] ?>" class="imagen">
                <?php }else if($row['link'] !== ''){?>
                <div class="video-container">
                <iframe width="433" height="253" src="<?php echo $row['link'];?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <?php } ?>
               </div>
               <div class="s-12 l-7">
                  <h4><?php echo $row['titulo'] ?></h4>
                   <p><?php 
                   $texto = $row['detalle'];
                    echo substr($texto,0,200).'...... <div class="botonmas"><a href="verdetalle.php?id='.$row['id'].'">ver más</a></div>'; ?></p>
               </div>
                 </div>
            	<?php }?>
                     </div>
      </section>
      <!-- FOOTER -->   
      <footer>
         <div class="line">
            <div class="s-12 l-6">
            
               <p><i class="icon fa fa-phone"></i>(0351) 152-437982</p>
               <p><i class="icon fa fa-map-marker"></i><a href="contacto.html#mapa">Obispo Trejo 219, Centro - Córdoba Capital, Argentina.</a></p>
               <p><i class="icon fa fa-envelope"></i><a href="mailto:info@gaiaespacioholistico.com">info@gaiaespacioholistico.com</a></p>
               

            </div>
            <div class="s-12 l-6">
          
                              <div class="logofooter">
                              <p>
                              <a href="http://www.doctoraliar.com/centro-medico/gaia+espacio+holistico-2529829" target="_blank" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image10','','img/logo-footer1.png',1)"><img id="Image10" alt="Doctoralia Gaia" src="img/logo-footer.png"></a>
                              </p>
                              </div><br><br>




                              <div class="logofooter"><p>© 2016 Gaia Espacio Holístico | Todos los derechos reservados.</p></div>
                              
                              
                              
                              
      
            </div>
             </div>

      </footer>
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>   
      <script type="text/javascript">
         jQuery(document).ready(function($) {  
           $("#owl-demo").owlCarousel({
         	slideSpeed : 300,
         	autoPlay : true,
         	navigation : false,
         	pagination : false,
         	singleItem:true
           });
           $("#owl-demo2").owlCarousel({
         	slideSpeed : 300,
         	autoPlay : true,
         	navigation : false,
         	pagination : true,
         	singleItem:true
           });
         });	
          
      </script> 
   </body>
</html>