<nav class="navbar">
    <div class="containerNav">
        <ul id="listNav">
            <li>
                <a class="linkNoDecoration" href="home">HOME</a>
            </li>
            <li>
                <a class="linkNoDecoration" href="productos">PRODUCTOS</a>
            </li>
            <li>
                <a class="linkNoDecoration" href="marcas">MARCAS</a>
            </li>
            {if isset($smarty.session.User)}
                <li>
                    <a class="linkNoDecoration" href="administrar-productos">ADMINISTRAR PRODUCTOS</a>
                </li>
                <li>
                    <a class="linkNoDecoration" href="administrar-marcas">ADMINISTRAR MARCAS</a>
                </li>
            {/if}
        </ul>
    </div>
</nav>