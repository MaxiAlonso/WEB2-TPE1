{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

    <div class='containerBgHome'>
        <div class='headerItems'>
            <h1>{$products[0]->nombre}</h1>
        </div>
        <div class='containerAllItems'>
            {foreach $marcas as $marca}
                {if $products[0]->id_marca_fk == $marca->id}
                    {$marcaDelProduct = $marca}
                {/if}
            {{/foreach}}
            {$precio = $products[0]->precioBase + $marcaDelProduct->precioAdicional}
            <div class='containerProduct'>
                <img src='{$products[0]->imagen}' class='imgProduct' alt=''>
                <h2>{$products[0]->nombre}</h2>
                <h3>({$marcaDelProduct->nombre})</h3>
                <h5>({$products[0]->cantidad})</h5>
                <div class='containerInfoPriceProduct'>
                    <div class='containerPriceProduct'>
                        <p>${$precio}</p>
                    </div>
                </div>
            </div>
            <div class='containerDescProduct'>
                <p>{$products[0]->descripcion}</p>
            </div>
        </div>
    </div>

{include 'templates/footer.tpl'}