{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

    <div class='containerBgHome'>
        <div class='headerItems'>
            <h1>Actualizar Producto: {$products[0]->nombre}</h1>
        </div>
        <form class='form' method='POST' action='administrar-productos/editar-producto/{$products[0]->nombre}/verificar-edit-producto' enctype='multipart/form-data'>
            <label for='name'>Nombre del producto: </label>
            <input type='text' id='name' name='name' value='{$products[0]->nombre}'>
            <input type="file" name="input_name" id="imageToUpload" accept=".jpg">
            <label for='description'>Descripción: </label>
            <textarea name='description' id='description'>{$products[0]->descripcion}</textarea>
            <label for='cant'>Cantidad del producto (ml): </label>
            <input type='number' id='cant' name='cant' value='{$products[0]->cantidad}'>
            <label for='price'>Precio base del producto ($): </label>
            <input type='number' id='price' name='price' value='{$products[0]->precioBase}'>
            <label for='marca'>Marca del producto: </label>
            <select name='marca' id='marca'>
            {foreach $marcas as $marca}
                <!------VERIFICA CUAL MARCA TIENE PARA MARCARLA COMO SELECCIONADA------->
                {if $marca->id == $products[0]->id_marca_fk}
                    <option selected value='{$marca->id}'>{$marca->nombre}</option>
                {else}
                    <option value='{$marca->id}'>{$marca->nombre}</option>
                {/if}
            {/foreach}
            </select>
            <input id='btnFormSubmit' class='boton' type='submit' name='modificarProducto' value='Confirmar'>
            <input class='boton delete' type='submit' name='borrarProducto' value='BORRAR'>
            <h1 class='error'>{$msg}<h1>
        </form>
    </div>
        
{include 'templates/footer.tpl'}
