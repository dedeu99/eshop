<!DOCTYPE html>
<html>
  <head>
    <title>LAB9_10</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="LAB3.css" type ="text/css">-->
  </head>
  
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-between">
      <a class="navbar-brand" href="{$base_url}">
        <img src="{$base_url}img/img.jpg" style="width:40px;" alt="Logo">
      </a>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{$base_url}index.php/index/cart">🛒Shopping Cart</a>
      </li>
    </ul>
    {if $loggedin} 

    <div class="dropdown" >
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
        {$username}
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{$base_url}index.php/orders/show">My Orders</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{$base_url}index.php/index/logout">Log Out</a>
      </div>
    </div> 
    {else}
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{$base_url}index.php/index/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{$base_url}index.php/index/register">Register</a>
      </li>
    </ul>
    {/if}

    </nav>  
 
    <br>

    <div class="container shadow ">
      <table class="table table-striped table-hover table-responsive-xs">
        <caption>
          <p>Your cart</p> 
          <button type="button" class="btn btn-primary ml-auto">Checkout</button>
        </caption>
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price per unit</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          {foreach $cart as $item}
          <tr>
            <th scope="row">{$item.id}</th>
            <td>{$item.name}</td>
            <td>{$item.price}€</td>
            <td>{$item.quantity}</td>
            <td>{$item.subtotal}€</td>
          </tr>
          {/foreach}
          <tr>
            <th scope="row"> </th>
            <td> </td>
            <td> </td>
            <td><b>TOTAL</b></td>
            <td>{$total}€</td>
          </tr>
        </tbody>
      </table>
      
      

    </div>
      
    <br>
    <footer>
      <div class="row justify-content-around">  
        <p>&copy; 2018 Desenvolvimento de Aplicações Web</p>   
        <p>Designed by <a href="https://github.com/dedeu99">A62362</a></p>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
