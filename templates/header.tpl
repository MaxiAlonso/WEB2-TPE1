<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{$titulo}</title>
            <base href="{BASE_URL}">
            <link rel="stylesheet" href="css/styles.css">
        </head>
        <body>
            <header class="header">
                <div class="logo">
                    <a class="linkNoDecoration" href="home">Coffee Shop</a>
                </div>
                <div class="logoLogIn">
                    {if isset($smarty.session.User)}
                        <span>({$smarty.session.User})</span>
                        <a class="linkNoDecoration" href="logout"> Log Out</a>
                    {else}
                        <a class="linkNoDecoration" href="login">Log In</a>
                    {/if}
                </div>
            </header>