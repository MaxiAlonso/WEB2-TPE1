{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

    <div class='containerBgHome'>
        <div class='headerItems'>
            <h1>{$marca[0]->nombre}</h1>
            <h3>País de origen: {$marca[0]->pais}</h3>
            <h2>Productos</h2>
            </div>
        <div class='containerAllItems'>
        {foreach $products as $product}
            {$precio = $product->precioBase + $marca[0]->precioAdicional}
            <div class='containerProduct'>
                <img src='{$product->imagen}' class='imgProduct' alt=''>
                <h2>{$product->nombre}</h2>
                <h3>({$marca[0]->nombre})</h3>
                <h5>({$product->cantidad} ml)</h5>
                <div class='containerInfoPriceProduct'>
                    <a class='linkNoDecoration' href='productos/{$product->nombre}'>INFO</a>
                    <div class='containerPriceProduct'>
                        <p>${$precio}</p>
                    </div>
                </div>
            </div>
        {{/foreach}}
        </div>
    </div>

{include 'templates/footer.tpl'}