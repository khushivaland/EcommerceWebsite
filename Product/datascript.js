
    function loadDoc(id) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this)
        }
      };
      xhttp.open("GET", "getProduct.php?id=" + id, true);
      xhttp.send();
      xhttp.onload = function() {
        if (xhttp.status != 200) { // analyze HTTP status of the response
          alert(`Error ${xhttp.status}: ${xhttp.statusText}`); // e.g. 404: Not Found
        } else { // show the result
          var jsonData = xhttp.response;
          var dataObj = JSON.parse(jsonData)[0];
          var idInput = document.getElementById("idInput");
          idInput.value = dataObj.id;
          var nameInput = document.getElementById("nameInput");
          nameInput.value = dataObj.name;
          var descInput = document.getElementById("descInput");
          descInput.value = dataObj.description;
          var priceInput = document.getElementById("priceInput");
          priceInput.value = dataObj.price;
          var quantityInput = document.getElementById("quantityInput");
          quantityInput.value = dataObj.quantity;
          var categoryInput = document.getElementById("categoryInput");
          categoryInput.value = dataObj.category;
          var statusInput = document.getElementById("statusInput");
          statusInput.value = dataObj.status;
          //console.log(xhttp.response)
          new bootstrap.Modal(document.querySelector("#editProductModal")).show();


        }
      };
    }

    function deleteProduct(id) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this)
        }
      };
      xhttp.open("GET", "delete.php?id=" + id, true);
      xhttp.send();
      xhttp.onload = function() {
        if (xhttp.status != 200) { // analyze HTTP status of the response
          alert(`Error ${xhttp.status}: ${xhttp.statusText}`); // e.g. 404: Not Found
        } else { // show the result
          var jsonData = xhttp.response;
          location.reload(true);
          //console.log("Product deleted successfully");
        };
      }
    }

    function loadProducts() {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "getProduct.php");
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Parse the JSON response
          var products = JSON.parse(xhr.responseText);

          // Build the table rows
          var rows = "";
          products.forEach(function(product) {
            rows += "<tr><td>" + product.id + "</td><td>" + product.name + "</td><td>" + product.description + "</td><td>" + product.price + "</td></tr>";
          });

          // Add the rows to the table body
          document.querySelector("#product-table tbody").innerHTML = rows;
        } else {
          console.log("Error loading products");
        }
      };
      xhr.send();
    }



    function displayProduct(id) {
      var xhr = new XMLHttpRequest();
      var url = id ? "getProduct.php?page_id="+id : "getProduct.php";
      xhr.open("GET", url);
      xhr.onload = function() {
        if (xhr.status === 200) {


          var productss = JSON.parse(xhr.responseText);
          var tableBody = document.getElementById('table-body');
          tableBody.innerHTML = "";

          for (var i = 0; i < productss.length; i++) {

            var productId = productss[i].id;
            var row = document.createElement('tr');

            var idCell = document.createElement('td');
            idCell.textContent = productId;
            row.appendChild(idCell);

            var nameCell = document.createElement('td');
            nameCell.textContent = productss[i].name;
            row.appendChild(nameCell);

            var descriptionCell = document.createElement('td');
            descriptionCell.textContent = productss[i].description;
            row.appendChild(descriptionCell);

            var priceCell = document.createElement('td');
            priceCell.textContent = productss[i].price;
            row.appendChild(priceCell);

            var quantityCell = document.createElement('td');
            quantityCell.textContent = productss[i].quantity;
            row.appendChild(quantityCell);

            var categoryCell = document.createElement('td');
            categoryCell.textContent = productss[i].category;
            row.appendChild(categoryCell);

            var statusCell = document.createElement('td');
            statusCell.textContent = productss[i].status;
            row.appendChild(statusCell);

            var button = document.createElement("button");
            button.type = "button";
            button.className = "btn btn-primary btns";
            button.onclick = (function(id) {
              return function() {
                loadDoc(id);
              };
            })(productId);
            button.dataset.toggle = "modal";
            button.dataset.target = "#editProductModal";
            button.innerText = "Edit";

            var tdata = document.createElement('td');
            tdata.appendChild(button);
            row.appendChild(tdata);

            var button1 = document.createElement("button");
            button1.type = "button";
            button1.className = "btn btn-danger btns";
            button1.onclick = (function(id) {
              return function() {
                deleteProduct(id);
              };
            })(productId);

            button1.innerText = "Delete";

            var tdata1 = document.createElement('td');
            tdata1.appendChild(button1);
            row.appendChild(tdata1);


            tableBody.appendChild(row);

          }
        } else {
          console.log("Error loading products");
        }
      };
      xhr.send();

    }

    function createpage() {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "getdata.php");
      xhr.onload = function() {
        if (xhr.status === 200) {


          var totalRecord = xhr.responseText;
          var list = document.getElementById('pageing');
          for (let index = 0; index < totalRecord; index++) {
            var row = document.createElement('li');
            row.className = "page-item";

            var aTag = document.createElement('a');
            aTag.className = "page-link";
            aTag.onclick= function(){displayProduct(index)}

            aTag.textContent = index + 1;

            row.appendChild(aTag);
            list.appendChild(row);

          }
        }
      }
      xhr.send();

    }
  