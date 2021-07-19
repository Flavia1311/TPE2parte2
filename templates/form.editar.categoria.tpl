{include file="header.tpl"}
<div class="row ">

    {include file="nav.tpl"}

    <div class="col-8 ">

        <div class="form-style">
            <h1 class="text-warning"> Editando {$categoria->nombre}</h1>

            <form method="POST" action="editarCategoria">
                

                <div class="form-group">
                    <label>Categoria a editar:</label>
                    <select name="categoria" class="form-control">
                        <option value="{$categoria->id}">{$categoria->nombre}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nuevo nombre de categoria:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{$categoria->nombre}">
                </div>

                <button type="submit" class="btn btn-warning">Guardar</button>
            </form>
        </div>
    </div>
</div>