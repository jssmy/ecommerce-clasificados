<!-- Modal -->
<div class="modal fade  " id="mdl-login-form"  tabindex="-1" role="dialog"
     aria-labelledby="demoModal" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered " role="document">
        <div class="modal-content">
            <button type="button" class="close light" data-dismiss="modal"
                    aria-label="Close">
                <span  aria-hidden="true">&times;</span>
            </button>

            <div  class="m-h-30 bg-img rounded-top " style="background-color: #D10024">
                <h2  class="text-center" style="color: white;padding-top: 30px;margin: 10px;">PORQUE SABEMOS LO QUE TE GUSTA</h2>
                <h1 class="text-center" style="color: #fec630!important">{{config('app.name')}}</h1>
            </div>
            <div class="modal-body">
                <div class="px-sm-4 py-sm-4">
                    @include('layouts.partials.login-form')
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal Ends -->
