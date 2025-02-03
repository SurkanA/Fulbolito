{include 'head.tpl'}
{include 'header.tpl'}
<div class="players">
    <div class="card" style="width: 16rem;">
        <img src="{$jugador->imagen_url}" class="card-img-top">

        <div class="card-body">
            <h5 class="card-title">{$jugador->nombre_jugador}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Equipo: {$jugador->nombre_equipo}</li>
            <li class="list-group-item">Numero: {$jugador->id_jugador}</li>
            <li class="list-group-item">Edad: {$jugador->edad}</li>
            <li class="list-group-item">Posicion: {$jugador->posicion}</li>
        </ul>
    </div>
</div>
{if isset($admin) && $admin == "S"}
    <div class="container-form">
        <div class="col-md-5 col-lg-8">
            <h4 class="mb-3">Modificar jugador</h4>
            <form class="needs-validation" method="post"
                action="updatePlayer/{$jugador->nombre_equipo|replace:' ':''|lower}/{$jugador->id_jugador}" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="nombre_jugador" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_jugador" name="nombre_jugador" placeholder=""
                            value="{$jugador->nombre_jugador}" required>
                        <div class="invalid-feedback">
                            Por favor introduzca un nombre.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="nombre_equipo" class="form-label">Equipo</label>
                        <select class="form-select" id="nombre_equipo" name="nombre_equipo" required>
                            <option>{$jugador->nombre_equipo}</option>
                            {foreach from=$equipos item=equipo}
                                {if $jugador->nombre_equipo != $equipo->nombre_equipo}
                                    <option value="{$equipo->nombre_equipo}">
                                        {$equipo->nombre_equipo}</option>
                                {/if}
                            {/foreach}
                        </select>
                        <div class="invalid-feedback">
                            Seleccione un equipo valido.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="id_jugador" class="form-label">Numero</label>
                        <input type="number" min="0" max="100" class="form-control" id="id_jugador" name="id_jugador"
                            placeholder="" value="{$jugador->id_jugador}" required>
                        <div class="invalid-feedback">
                            Seleccione un numero valido.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" min="0" max="100" class="form-control" id="edad" name="edad" placeholder=""
                            value="{$jugador->edad}" required>
                        <div class="invalid-feedback">
                            Seleccione una edad valida.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="posicion" class="form-label">Posicion</label>
                        <select class="form-select" id="posicion" name="posicion" required>
                            <option>{$jugador->posicion}</option>
                            {$posiciones = array("Delantero", "Centrocampista", "Defensa", "Portero")}
                            {for $i=0 to ($posiciones|@count - 1)}
                                {if {$jugador->posicion} != {$posiciones[$i]}}
                                    <option>{$posiciones[$i]}</option>
                                {/if}
                            {/for}
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una posición valida.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="biografia" class="form-label">Biografia <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="biografia" name="biografia" placeholder=""
                            value="{$jugador->biografia}">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="imagen_url" class="form-label">Imagen URL <span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="imagen_url" name="imagen_url" placeholder=""
                            value="{$jugador->imagen_url}">
                    </div>
                </div>
                <br>
                <button class="w-50 btn btn-primary btn-lg" type="submit">Modificar jugador</button>
            </form>
        </div>
    </div>
{/if}
{include 'footer.tpl'}