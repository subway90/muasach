<!DOCTYPE html>
<html>
<head>
  <title>Lọc Sản phẩm</title>
  <script>
    function filterProducts() {
      var inputName = document.getElementById('inputName').value.toUpperCase();
      var inputPrice = document.getElementById('inputPrice').value;
      var inputType = document.getElementById('inputType').value.toUpperCase();
      
      var products = document.getElementsByClassName('product');
      
      for (var i = 0; i < products.length; i++) {
        var name = products[i].getElementsByClassName('name')[0].textContent.toUpperCase();
        var price = parseFloat(products[i].getElementsByClassName('price')[0].textContent);
        var type = products[i].getElementsByClassName('type')[0].textContent.toUpperCase();
        
        if (name.indexOf(inputName) > -1 && price <= inputPrice && type.indexOf(inputType) > -1) {
          products[i].style.display = "";
        } else {
          products[i].style.display = "none";
        }
      }
    }
  </script>
</head>
<body>
  <h2>Lọc Sản phẩm</h2>
  
  <label for="inputName">Tên sản phẩm:</label>
  <input type="text" id="inputName" onkeyup="filterProducts()" placeholder="Nhập tên sản phẩm">
  
  <label for="inputPrice">Giá sản phẩm:</label>
  <input type="range" id="inputPrice" min="1000" max="100000" step="1000" onchange="filterProducts()">
  <span id="selectedPrice"></span>
  
  <label for="inputType">Loại sản phẩm:</label>
  <input type="text" id="inputType" onkeyup="filterProducts()" placeholder="Nhập loại sản phẩm">
  
  <br><br>
  
  <div class="product">
    <span class="name">Doreamon tập 11</span> -
    <span class="price">23000</span> -
    <span class="type">Fuji Fukima</span>
  </div>
  
  <div class="product">
    <span class="name">Conan tập 101</span> -
    <span class="price">25000</span> -
    <span class="type">Gosho Aoyama</span>
  </div>
  
  <div class="product">
    <span class="name">Conan tập 102</span> -
    <span class="price">25000</span> -
    <span class="type">Gosho Aoyama</span>
  </div>
  
  <div class="product">
    <span class="name">Conan tập 103</span> -
    <span class="price">30000</span> -
    <span class="type">Gosho Aoyama</span>
  </div>
  
  <div class="product">
    <span class="name">Shin bút chì</span> -
    <span class="price">19000</span> -
    <span class="type">Kim Đồng</span>
  </div>
  
  <script>
    var inputPrice = document.getElementById('inputPrice');
    var selectedPrice = document.getElementById('selectedPrice');

    inputPrice.oninput = function() {
      selectedPrice.textContent = inputPrice.value;
      filterProducts();
    }
  </script>
</body>
</html>