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

    </nav>  
 
    <br>

    <div class="container shadow ">
      <br>
      <table class="table table-striped table-hover table-responsive-xs">
        <caption >
      Orders made by {$username}
        </caption>
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Created at</th>
            <th scope="col">Status</th>
            <th scope="col">Total</th>
            <th scope="col">Details</th>
          </tr>
        </thead>
        <tbody>
          {foreach $orders as $order}
          <tr>
            <th scope="row">{$order.id}</th>
            <td>{$order.created_at}</td>
            <td>{$order.status}€</td>
            <td>{$order.total}</td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ordersModal" data-order="{$order.id}">Show more</button></td>

           </tr>
          {/foreach}
        </tbody>
      </table>
      
      

    </div>
      
    <br>


<div class="modal fade" id="ordersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Items in order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<table class="table table-striped table-hover table-responsive-xs">
<caption >
Items in order
</caption>
<thead class="thead-dark">
  <tr>
    <th scope="col">#</th>
    <th scope="col">Created at</th>
    <th scope="col">Status</th>
    <th scope="col">Total</th>
    <th scope="col">Details</th>
  </tr>
</thead>
<tbody>
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>








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

    <script>
      $('#ordersModal').on('show.bs.modal', function (event) {
        alert("ITS WORKING?");
        var button = $(event.relatedTarget) // Button that triggered the modal


 

        $.get("{$base_url}index.php/orders/orderItems/"+button.data('order'), function(data,status){
          var modal = $(this)
          var table= modal.find('.modal-body table').val(recipient);
          console.log(data);
          alert("GET MADE");
          for (var elem in data) {  
            alert("IM WORKING");
            console.log(elem+" = "+data[elem]);
    /*        var row = table.insertRow(0);

            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);

            // Add some text to the new cells:
            cell1.innerHTML = "NEW CELL1";
            cell2.innerHTML = "NEW CELL2";    */
          }
            

        });  
      });
    </script>
  </body>





  
</html>
