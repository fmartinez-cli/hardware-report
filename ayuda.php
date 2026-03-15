<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/report2.png">
    <!-- Bootstrap CSS -->
    <link href="/reporte/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/reporte/css/swipebox.min.css">
    <script src="/reporte/js/jquery-3.6.0.js"></script>
    <script src="/reporte/js/jquery.swipebox.min.js"></script>

    <title>P&#225;gina de Ayuda</title>
    
    
    <style>
.accordion-button::after {
    background-image: url("/reporte/img/plus.png");
    transform: scale(0.75) !important;
}
.accordion-button:not(.collapsed)::after {
    background-image: url("/reporte/img/minus.png");
}

p {
  margin: 0;
  text-align: justify;
}
</style>
  </head>
  

<body style="margin-top: 0px;">
  
  <div class="container">
  <header><!---------------------------Encabezado-------------------------------->

  <?php
  	include 'header_footer/header.php';
  ?>
 
</header><!--------------------------Encabezado-------------------------------->
<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container py-5">
        <h1 class="display-5 fw-bold">Gu&#237;a de ayuda</h1>
        <p class="col-md-8 fs-5 ">La presente gu&#237;a proporciona un "paso a paso" del uso de la aplicacion web "Reporte de Thin Clients"</p>
        
      </div>
    </div> <!--------Termina Jumbotron-------->
    
    
    
    <div class="accordion" id="accordion">
    
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
       <h2>Inicio</h2>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
         <div class="row ">
  <div class="col">
    
    
        <h5 class="card-title">Pagina de Inicio</h5>
        <p class="card-text text-left"><strong>1.-</strong>La pagina de <strong>Inicio</strong> nos da una vision rapida de las 13 thin clients con las que contamos en la bahia. La cual, se puede acceder desde las siguientes direcciones:<br>
        <a href="/reporte/index.php" target="_blank">10.19.16.68/reporte</a> 
        <br>
        <a href="/reporte/index.php" target="_blank">172.16.7.124/reporte</a>
        </p>
       <p><strong>2.-</strong><strong>Tambien,</strong> es el punto de acceso a los formularios
        de reporte individuales de cada maquina o el estatus  general.</p>
  </div>
  
  
  <div class="col">
   
  
        <a rel="gallery-1" href="/reporte/img/ayuda/inicio.gif" class="swipebox" title="pagina de inicio">
        <img src="/reporte/img/ayuda/inicio.gif" class="card-img-bottom" alt="inicio">
        </a>
  </div>
 
  
</div>
</div>
      </div>
    </div>
  </div>  <!----------Termina boton "Inicio"------------>
  
  
  
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <h2>Formularios</h2>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      
      <div class="row">
      <div class="col"> 
     <h5>Formularios</h5>
        <p><strong>1.-</strong><strong>Los formularios</strong> de cada equipo, son la herramienta con la que se genera el reporte del estado actual de la maquina.Se puede acceder a ellos a través de la pagina de <strong>Inicio</strong> con el boton "Reporte"</p>
      </div>
      
  <div class="col">
  <a rel="gallery-2" href="/reporte/img/ayuda/inicio_form.PNG" class="swipebox" title="inicio">
    <img src="/reporte/img/ayuda/inicio_form.PNG"  alt="formualrio">
    </a>
      </div>
      </div>
        <hr>
        
        
        
        
         <div class="row">
         
      <div class="col"> 
       <p><strong>2.-</strong><strong> O </strong> por medio de la barra de navegacion en el menu "elegir PC".</p>
      </div>
      
      
        <div class="col">
        <div class"img">
        <a rel="gallery-2" href="/reporte/img/ayuda/elegir_pc.PNG" class="swipebox" title="menu navegacion">
      <img src="/reporte/img/ayuda/elegir_pc.PNG" class="img-thumbnail rounded" alt="tabla">
      </a>
      
      
        </div>
        </div>
        <hr>
        
        <div class="row">
         <div class="col">
     
        <p><strong>3.-El boton exportar</strong> permite exportar y descargar los datos de la tabla a un archivo xlsx, para posteriormente manipularlos con cualquier hoja de calculo que admita ese formato.</p>
        
        </div>
        
         <div class="col">
         
<div class"img">

<a rel="gallery-2" href="/reporte/img/ayuda/exportar.gif" class="swipebox" title="exportar">
<img src="/reporte/img/ayuda/exportar.gif" class="img-thumbnail rounded" alt="exportar_excel">
</a>

</div>
        </div>
      
    </div> <!--Termina accordion-body--> 
    </div> 
    </div> 
    </div>
    </div>
  <!----------Termina boton "Formularios"------------>
  
  
  
  
  
  
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <h2>Estatus General</h2>
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="row">
      <div class="col"> 
      <p><strong>El estatus general</strong> es una tabla que captura la informacion en la base de datos enviada por los formularios individuales y los presenta de una forma concreta e interactiva.</p>
        <p> A continuacion se muestran las diferentes opciones para manipular la tabla.</p>
        </div>
        <div class="col"> 
      
        
        <div class="img">
        
        <a rel="gallery-3" href="/reporte/img/ayuda/tabla.PNG" class="swipebox" title="estatus general">
        <img src="/reporte/img/ayuda/tabla.PNG" class="img-thumbnail rounded" alt="estatus_general">
        </a>
        
        
        </div>
        
        </div>
        
        
        <hr>
        
        <div class="row">
        <div class="col">
        <h4>1.Cuadro de busqueda</h4>
        <p><strong>El cuadro de busqueda</strong> filtra los resultados ya sea por el contenido de la celda o el de la columna. (Se recomienda filtrar por fecha)</p>
        <div class"img"><img src="/reporte/img/ayuda/cuadro_busqueda.PNG" class="img-thumbnail rounded" alt="cuadro_busqueda"></div>
        </div>
        <div class="col">
        
        <div class"img">.
        
        <a rel="gallery-3" href="/reporte/img/ayuda/busqueda.gif" class="swipebox" title="cuadro de busqueda">
        <img src="/reporte/img/ayuda/busqueda.gif" class="img-thumbnail rounded" alt="busqueda">
        </a>
        </div>
        
        </div>
        </div>
        </div>
        
        
        
        
        
        <hr>
        
        
        
         <div class="row">
      <div class="col"> 
      <h4>2.Boton "esconder columna"</h4>
      <p><strong>Esconder columna</strong> permite gestionar las columnas visibles en la tabla, para mostrar aquellas que son mas relevantes.</p>
        <div class="img"><img src="/reporte/img/ayuda/esconder_columnas.PNG" class="img-thumbnail rounded" alt="esconder_columnas"></div>
        </div>
        <div class="col">
        
        <div class="img">
        <a rel="gallery-3" href="/reporte/img/ayuda/columna.gif" class="swipebox" title="Esconder Columnas">
        <img src="/reporte/img/ayuda/columna.gif" class="img-thumbnail rounded" alt="esconder_columnas">
        </a>
        </div>
        </div>
        
        <hr>
        
        <div class"row"></div>
        <div class="col">
        <h4>3.Copiar</h4>
        <p><strong>El boton copiar</strong> permite copiar las filas mostradas en pantalla en el portapapeles. Se recomienda utilizarla despues de filtrar los resultados en el boton de busqueda.</p>
        <div class"img"><img src="/reporte/img/ayuda/boton_copiar.PNG" class="img-thumbnail rounded" alt="boton_copiar"></div>
        </div>
        
        
        
        <div class="col">
        
        <div class"img">
        <a rel="gallery-3" href="/reporte/img/ayuda/copiar.gif" class="swipebox" title="boton copiar">
        <img src="/reporte/img/ayuda/copiar.gif" class="img-thumbnail rounded" alt="boton_copiar">
        </a>
        </div>
        
        </div>
        </div>
        
       
        
        <hr>
        
        
        <div class="row">
         <div class="col">
        <h4>4.Exportar</h4>
        <p><strong>El boton exportar</strong> permite exportar y descargar los datos de la tabla a un archivo xlsx, para posteriormente manipularlos con cualquier hoja de calculo que admita ese formato.</p>
        <div class"img"><img src="/reporte/img/ayuda/exportar_excel.PNG" class="img-thumbnail rounded" alt="exportar_excel"></div>
        </div>
        
         <div class="col">
         
<div class"img">
<a rel="gallery-3" href="/reporte/img/ayuda/exportar.gif" class="swipebox" title="exportar">
<img src="/reporte/img/ayuda/exportar.gif" class="img-thumbnail rounded" alt="exportar">
</a>
</div>
        </div>
        </div>
        </div>
        </div>
    
  </div><!----------Termina boton "Estatus General"------------>
  
  
  
  
  
  
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        <h2>Generar Reporte</h2>
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
        <div class="row">
         <div class="col">
        <p>Para realizar un <strong>reporte</strong> seguir los siguientes pasos:</p>
        <h4>1.Abrir</h4>
        <p> <strong>Abrir</strong> la pagina de reportes en :<br> <a href="/reporte/index.php" target="_blank">10.19.16.68/reporte</a> 
        <br>
        <a href="/reporte/index.php" target="_blank">172.16.7.124/reporte</a></p>
        </div>
        
         <div class="col">
      <div class"img">
      <a rel="gallery-4" href="/reporte/img/ayuda/inicio.PNG" class="swipebox" title="abrir">
      <img src="/reporte/img/ayuda/inicio.PNG" class="img-thumbnail rounded" alt="exportar_excel">
      </a>
      </div>
        </div>
        <hr>
        <div class="row">
         <div class="col">
        <h4>2.Seleccionar</h4>
        <p><strong>Seleccionar </strong> una thin client para iniciar el reporte</p>
        
        </div>
        
         <div class="col">
        
<div class"img">
<a rel="gallery-4" href="/reporte/img/ayuda/elegir_pc.PNG" class="swipebox" title="seleccionar">
<img src="/reporte/img/ayuda/elegir_pc.PNG" class="img-thumbnail rounded" alt="exportar_excel">
</a>
</div>
        </div>
        <hr>
        
         <div class="row">
         <div class="col">
        <h4>3.Llenar</h4>
        <p><strong>Llenar</strong> el formulario dando click en los selectores tipo radio que estan en el reporte(se recomienda agregar notas para especificar mejor la falla) y dar click en el boton guardar</p>
        </div>
        
         <div class="col">
      <div class"img">
      <a rel="gallery-4" href="/reporte/img/ayuda/llenar_formulario.png" class="swipebox" title="llenar">
      <img src="/reporte/img/ayuda/llenar_formulario.png" class="img-thumbnail rounded" alt="llenar">
      </a>
      </div>
        </div>
        <hr>
        
        <div class="row">
         <div class="col">
        <h4>4.Descargar</h4>
        <p><strong>Descargar</strong> el reporte para manejar los datos y tomar acciones correctivas sobre las thin clients</p>
        
        </div>
        
         <div class="col">
        
<div class"img">
<a rel="gallery-4" href="/reporte/img/ayuda/exportar_excel.PNG"  class="swipebox" title="descargar">
<img src="/reporte/img/ayuda/exportar_excel.PNG" class="img-thumbnail rounded" alt="exportar_excel">
</a>
        </div>
        </div>
        
        <hr>
        
        </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div><!----------Termina boton "Generar Reporte"------------>
  
  
 <div>   <!----------------------------------------- inicia el footer---------------------------------------------------------------------------------------- -->


<?php include 'header_footer/footer.php';?>

<!-------------------------------------------- acaba el footer ------------------------------------------------------------------------------------------>
</div><!--Termina container-->
    
    
 

    <!-- Bootstrap Bundle with Popper -->
    <script src="/reporte/js/bootstrap.bundle.min.js" ></script>

    <script type="text/javascript">
;( function( $ ) {

	$( '.swipebox' ).swipebox();

} )( jQuery );
</script>
  </body>
</html>
