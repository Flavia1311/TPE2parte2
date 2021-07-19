<div class="container_formulario">
<div class="mb-3">

    <div class="formulario">
        <form method="POST" action="formEditarPlato" enctype="multipart/form-data>
            <div class="titulo_formulario">
                Editar plato
            </div>
            <div class="fila_formulario">

                <label for="plato"> Seleccionar plato: </label>
                <select name="plato">
                    {foreach from=$platos item=plato}
                        <option value="{$plato->id_plato}">{$plato->nombre}</option>
                    {/foreach}
                </select>
            </div>
            <div class="fila_formulario">
                <input type="submit" name="editar" value="Ir a edicion">
            </div>
        </form>
    </div>

</div>