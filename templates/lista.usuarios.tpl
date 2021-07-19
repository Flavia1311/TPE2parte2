<div class="container-fluid">
    <div class="row">
        {include file="header.tpl"}
        {include file="nav.tpl"}
        <div class="col-8">
{if $admin == 2}
            <h1 class="text-center">Usuarios</h1>
            
                <table class="table table-dark table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Eliminar usuario</th>
                            <th scope="col">Cambiar permisos</th>
                        </tr>
                    </thead>
                    <tbody>
                    {foreach from=$usuarios item=usuario}
                    {if $usuario->nombre != $username}
                        <tr>
                            <td> {$usuario->nombre}</td>
                            {if $username}
                                <td>
                                {$usuario->admin}
                                </td>
                            {else}
                            <td>
                            remove_done
                            </td>
                            {/if}
                            <td><a class="badge bg-danger p-2" href="eliminarUsuario/{$usuario->id}">Eliminar</a></td>
                            <td><a class="badge bg-warning p-2" href="cambiarPrivilegios/{$usuario->id}">Modificar Rol</a></td>
                        </tr>
                        {/if}
                        {/foreach}
                    </tbody>
                </table>
            </div>
          {/if}   

    {include file="footer.tpl"}