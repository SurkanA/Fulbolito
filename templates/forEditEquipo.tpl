{include 'head.tpl'}
{include 'header.tpl'}
<div class="players">
    <div class="card" style="width: 16rem;">
        <img src="{$equipo->imagen_url}" class="card-img-top">

        <div class="card-body">
            <h5 class="card-title">{$equipo->nombre_equipo}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Ciudad: {$equipo->ciudad}</li>
            <li class="list-group-item">Año de fundación: {$equipo->year_fundado}</li>
            <li class="list-group-item">Biografia: {$equipo->biografia}</li>
        </ul>
    </div>
</div>
{if isset($admin) && $admin == "S"}
    <div class="container-form">
        <div class="col-md-5 col-lg-8">
            <h4 class="mb-3">Modificar Equipo</h4>
            <form class="needs-validation" method="post" action="updateEquipo" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="nombre_equipo" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" placeholder=""
                            value="{$equipo->nombre_equipo}" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="año_fundado" class="form-label">Año de fundación</label>
                        <input type="number" class="form-control" id="year_fundado" name="year_fundado" placeholder=""
                            value="{$equipo->year_fundado}" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="ciudad" class="form-label">Cuidad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder=""
                            value="{$equipo->ciudad}" required>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="biografia" class="form-label">Biografia <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="biografia" name="biografia" placeholder=""
                            value="{$equipo->biografia}">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="imagen_url" class="form-label">Imagen URL <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="imagen_url" name="imagen_url" placeholder=""
                            value="{$equipo->imagen_url}">
                    </div>
                </div>
                <br>
                <button class="w-50 btn btn-primary btn-lg" type="submit">Modificar jugador</button>
            </form>
        </div>
    </div>
{/if}
{include 'footer.tpl'}