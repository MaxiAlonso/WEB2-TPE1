{include 'templates/header.tpl'}
{include 'templates/nav.tpl'}

    <div class='containerBgHome'>
        <div class='headerItems'>
            <h1>Actualizar Marca: {$marca[0]->nombre}</h1>
        </div>
        <form class='form' method='POST' action='administrar-marcas/editar-marca/{$marca[0]->nombre}/verificar-edit-marca'>
            <label for='name'>Nombre de la marca: </label>
            <input type='text' id='name' name='name' value='{$marca[0]->nombre}'>
            <label for='country'>País: </label>
            <input type='text' name='country' id='country' value='{$marca[0]->pais}'></input>
            <label for='price'>Precio adicional ($): </label>
            <input type='number' id='price' name='price' value='{$marca[0]->precioAdicional}'>
            <input class='boton' id='btnFormSubmit' type='submit' name='modificarMarca' value='Confirmar'>
            <input class='boton delete' type='submit' name='borrarMarca' value='BORRAR'>
            <h1 class='error'>{$msg}<h1>
        </form>
    </div>
        
{include 'templates/footer.tpl'}