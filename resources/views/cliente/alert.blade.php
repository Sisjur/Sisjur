<!DOCTYPE html>
<html>
       
        @include("admin/pages/head")

    <body>
  

   <section class="content">

      <div class="error-page">
        <h2 class="headline text-red">Ok!</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Tu caso esta pendiente</h3>

          <p>
           Tu caso esta en proceso de ser activado, esto puede tardar un tiempo.
           Ten un poco de paciencia.
          </p>
          <form action="{{URL::asset('salir')}}" method="GET" class="search-form">
            <div class="input-group">
        

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-danger btn-flat">Lo entiendo
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
      </div>
      <!-- /.error-page -->

    </section>
    </body>
</html>
