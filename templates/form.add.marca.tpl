{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

    <div class='containerBgHome'>
        <div class='headerItems'>
            <h1>Agregar nueva marca</h1>
        </div>
        <form class='form' method='POST' action='administrar-marcas/agregar-marca/verificar-add-marca'>
            <label for='name'>Nombre de la marca: </label>
            <input type='text' id='name' name='name' value=''>
            <label for='country'>País: </label>
            <input type='text' name='country' id='country'></input>
            <label for='price'>Precio adicional ($): </label>
            <input type='number' id='price' name='price' value=''>
            <input id='btnFormSubmit' type='submit' name='addMarca' value='Confirmar'>
            <h1 class='error'>{$msg}<h1>
        </form>
    </div>
        
{include 'templates/footer.tpl'}