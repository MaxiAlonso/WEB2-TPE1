{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

    <div class='containerBgHome'>
        <div class='headerItems'>
            <h1>Agregar nuevo producto</h1>
        </div>
        <form class='form' method='POST' action='administrar-productos/agregar-producto/verificar-add-producto' enctype='multipart/form-data'>
            <label for='name'>Nombre del producto: </label>
            <input type='text' id='name' name='name' value=''>
            <input type="file" name="input_name" id="imageToUpload" accept=".jpg">
            <label for='description'>Descripción: </label>
            <textarea name='description' id='description'></textarea>
            <label for='cant'>Cantidad del producto (ml): </label>
            <input type='number' id='cant' name='cant' value=''>
            <label for='price'>Precio base del producto ($): </label>
            <input type='number' id='price' name='price' value=''>
            <label for='marca'>Marca del producto: </label>
            <select name='marca' id='marca'>
            {foreach $marcas as $marca}
                <option value='{$marca->id}'>{$marca->nombre}</option>
            {/foreach}
            </select>
            <input id='btnFormSubmit' class='boton' type='submit' name='addProduct' value='Confirmar'>
            <h1 class='error'>{$msg}<h1>
        </form>
    </div>
        
{include 'templates/footer.tpl'}