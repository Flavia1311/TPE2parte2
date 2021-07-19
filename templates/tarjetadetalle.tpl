<div class="card mb-3" id="plato" plato-id="{$plato->id_plato}" admin = "{$admin}" usuario= "{$username}">    <div class="row g-0 ">
        <div class="col-md-4">
            <img class="img-thumbnail" src="./{$plato->imagen}" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body ">
                <h5 class="card-title">Plato: {$plato->nombre}</h5>
                <p class="card-text">Detalles: {$plato->detalle}</p>
                <p class="card-text"><small class="text-light">Nacionalidad: {$plato->nacionalidad} </small></p>
                {if isset($imagen->image)}
            <img src="{$plato->image}"/>
        {/if}
                {if $admin == 2}
                    <a class="btn btn-warning" href="formEditarPlato/{$plato->id_plato} ">Editar</a>
                    <a class="btn btn-danger" href="eliminarPlato/{$plato->id_plato}">Eliminar</a>
                {/if}
            </div>  
            
        </div>
    </div>
</div>
        <div class="col-md-8">
        {include file="vue/formComentario.tpl"}
        </div>


<script src="js/comentarios.js"></script>