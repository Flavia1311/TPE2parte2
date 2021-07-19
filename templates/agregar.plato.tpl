<div class="container_formulario control-label col-sd-12 btn btn-light list-group-item active">
    <div class="card-group mt-3">
    <div class="formulario">
 
        <form method="POST" action="agregarPlato" enctype="multipart/form-data">
            <div class="titulo_formulario">
            <h2>Cargar plato</h2>
            </div>

            <div class="fila_formulario">
                <label for="name"> Nombre </label>
                <input type="text" id="name" name="name" value="">
            </div>
            <div class="fila_formulario">
                <label for="plato"> Categoria: </label>
                <select name="categoria">
                    {foreach from=$categorias item=categoria}
                        <option value="{$categoria->id}">{$categoria->nombre}</option>
                    {/foreach}
                </select>
            </div>
            <div class="fila_formulario">
                <label for="nacionalidad">Nacionalidad: </label>
                <input type="text" id="nacionalidad" name="nacionalidad" value="">
            </div>

            <div class="fila_formulario">
                <label for="detail"> Descripcion: </label>
            </div>
            <div class="fila_formulario">
                <textarea name="detail" cols="30" rows="10"
                    placeholder="Especifique una descripción del plato"></textarea>
            </div>
            <div class="fila_formulario">
            <label for="imagen"> <span>Agregar imagen:</span> </label>
            <input type="file" name="imagen" id="imageToUpload">
            
        </div>
            <div class="fila_formulario">
        
          <div class="fila_formulario">
                <input type="submit" name="agregar" value="Cargar">
            </div>
            </div>
               
        </form>
    </div>
    </div>
</div>