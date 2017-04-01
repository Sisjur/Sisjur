@if(session("users"))
    <script>window.location.href="/inicio"</script>

@endif
<!DOCTYPE html>
<!-- saved from url=(0033)http://localhost/disgap/index.php -->
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
    
</style>
<title>Sisjur login</title>
<!-- ESTILO-->
<script src="./plugins/animate/jquery.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  
  <script src="./plugins/animate/index.js"></script>
  <link rel="stylesheet prefetch" href="./plugins/animate/animate.min.css">
  <link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Roboto:400,100,400italic,700italic,700">
  <link rel="stylesheet" href="./plugins/animate/style.css" media="screen" type="text/css">
  <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>

    <div class="form animated flipInX" style="top : 15em;" >
      <h2 style="text-align: center"><img src="./dist/img/logo_ingsistemas.png" width="133" height="105"  alt=""></h2>
      <h2 style="text-align: center">SISJUR</h2><h5 style="text-align: center">Sistema Juridico de la Universidad Francisco de Paula Santander</h5><p></p>
      <div id="wrapper">


          <div id="content-login" >

            <form action="/inicio" enctype="multipart/form-data" method="post"  >
                <label>
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input placeholder="Usuario" v-model="usuario" name="usuario" type="email" value="admin@gmail.com" required>
                </label>
            	<label>
                    <input placeholder="Contraseña" v-model="contrasena" name="contrasena" type="password" value="12345" required>
                </label>
                <input type="submit" value="Entrar">
            </form>
          <div >
          @if (session("status"))
          <div  class="alert alert-danger" role="alert">
            
                <span style="font-size: 12px;">{{session("status")}}</span>
            
          </div>
          
          @endif
          <?php session()->forget("status")?>
          </div>
      </div>
    </div>

    <script src="plugins/vue/vue.js"></script>
    <script>
        $(document).on("ready",function(){
        var app =  new Vue({
            el :"#wrapper",
            data :{
                usuario : "admin@gmail.com",
                contrasena : "12345",
                error : false,
                errorMsj : ""
            },
            methods: {
               
            }
        })
        });
        
    </script>


</body>
</html>
