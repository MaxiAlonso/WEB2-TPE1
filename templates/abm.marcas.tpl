{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

    <div class='containerBgHome'>
        <div class='headerItems'>
            <h1>Marcas</h1>
        </div>
        <div class='containerAllItems'>
            <div class='containerAddMarca'>
                <h2>Agregar una Marca</h2>
                <a class='linkNoDecoration' href='administrar-marcas/agregar-marca'><p>+</p></a>
            </div>
            {foreach $marcas as $marca}
                <div class='containerProductAdmin'>
                    <div class='containerMarca'>
                        <h2>{$marca->nombre}</h2>
                        <hr>
                        <a class='linkNoDecoration white' href='marcas/{$marca->nombre}'>Ver productos</a>
                    </div>
                    <div class='containerMarcaAdminAccion'>
                        <a href='administrar-marcas/editar-marca/{$marca->nombre}' class='containerAccionProduct linkNoDecoration white'>
                            <div class='containerAccionProduct marca edit'>
                                <p>ADMINISTRAR</p>
                            </div>
                        </a>
                    </div>
                </div>
            {/foreach}
        </div>
    </div>

{include 'templates/footer.tpl'}