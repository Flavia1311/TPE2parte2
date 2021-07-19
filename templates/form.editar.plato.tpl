{include file="header.tpl"}
<div class="row ">

    {include file="nav.tpl"}

    <div class="col-8 ">

        <div class="form-style">
            <h1 class="text-warning"> Editando {$plato->nombre}</h1>

            <form method="POST" action="editarPlato" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nuevo nombre de plato:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{$plato->nombre}">
                </div>
                <div class="form-group">
                    <label for="detail"> Detalles: </label>
                </div>
                <div class="form-group">
                    <textarea name="detail" cols="30" rows="10">{$plato->detalle}</textarea>
                </div>
                <div class="form-group">
                    <label>Nacionalidad:</label>
                    <input class="form-control" type="text" id="nacionalidad" name="nacionalidad"
                        value="{$plato->nacionalidad}">
                        <input type="file" name="imagen" id="imageToUpload">
                </div>
                <button type="submit" class="btn btn-warning">Guardar</button>
                </form>
                </div>
            </div>
        </div>
