<!DOCTYPE html>
<html>
<head>
  <title>LAB12</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!--<link rel="stylesheet" href="LAB3.css" type ="text/css">-->
</head>

<body>


  <nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-between">

    <a class="navbar-brand" href="{$base_url}index.php/blog">
      <img src="{$base_url}img/img.jpg" style="width:40px;" alt="Logo">
    </a>



    <div class="dropdown" >
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
        <span class="rounded-circle">
          <img 
          {if file_exists("img/user{$id}.jpg")} 
          {assign "imgpath" "img/user{$id}.jpg"} 

          src="{$base_url}{$imgpath}"
          {else} 
          src="{$base_url}img/user.jpg" 
          {/if}
          style="width:40px;" alt="User Image">
        </span>
        {$username}
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">🛒Shopping Cart</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{$base_url}logout">Log Out</a>
      </div>
    </div> 
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{$base_url}login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{$base_url}register">Register</a>
      </li>
    </ul>
  </nav>

  <div >
    <div class="d-flex flex-nowrap">
      {foreach $products as $product}
        <div class="card-group col-xs-12 col-sm-6 col-md-4 mb-1">
          
          <article class="card text-white bg-dark border-light text-center">
            
            <div class="card-header"><h4>{$product.name}</h4></div>
            <div class="card-body">
              <img class="card-img-top w-50" style="width: 100%;"src="{$base_url}{$product.image}" alt="Card image">
              <p class="card-text">{$product.description}</p>
              <hr>
              <p><b>Price per unit:</b> {$product.price}€</p>
            </div> 
            <div class="card-footer align-contents-center text-center">
          
              <div class="form-group row text-right ">
                <label for="example-number-input" class="col-6 col-form-label">Quantity:</label>
                <div class="col-6">
                  <input class="form-control" id="input{$product.id}" oninput="updateTotal({$product.id},{$product.price})" type="number" value="0" min="0" id="example-number-input">
                </div>
              </div>
              <p> <b>Total:</b> <span id="total{$product.id}">0</span> €</p>
          
              <a href="#" class="btn btn-primary">🛒Add to cart</a>
            </div>

          </article>
        </div>
        <br>
        {/foreach}
    </div>
    
    <ul class="pagination justify-content-end">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
    
  </div>
  <br>
  <footer>
    <div class="row justify-content-around">  
      <p>&copy; 2018 Desenvolvimento de Aplicações Web</p>   
      <p>Designed by <a href="https://github.com/dedeu99">A62362</a></p>
    </div>
  </footer>
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


<script type="text/javascript">
  function updateTotal(id,price){

    var input=document.getElementById("input"+id);
    if(input.value<0)
      input.value=0;
    var total=document.getElementById("total"+id);
    total.textContent=input.value*price;
  }


  function toggle(object){
    
  }
</script>
</html>
