{include file="header.tpl"}
<div class="row">
    {include file="nav.tpl"}
    <div class="col-8">
        {include file="listacategorias.tpl"}
        {if $admin == 2}
            {include file="agregar.categoria.tpl"}
            {include file="agregar.plato.tpl"}
        {/if}
        {include file="tarjetasplatos.tpl"}
    </div>
</div>