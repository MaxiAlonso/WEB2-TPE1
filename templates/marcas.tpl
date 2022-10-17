{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}


    <div class="containerBgHome">
        <div class="headerItems">
            <h1>Marcas</h1>
        </div>
        <div class="containerAllItems">
            {foreach $marcas as $marca}
            <div class='containerMarca'>
                <h2>{$marca->nombre}</h2>
                <hr>
                <a class='linkNoDecoration white' href='marcas/{$marca->nombre}'>Ver productos</a>
            </div>
            {/foreach}
        </div>
    </div>

{include 'templates/footer.tpl'}