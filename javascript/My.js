  function RegisterProduct() {
      $(document).ready(function () {
          $('#send').click( function () {
              $.ajax({
                  url: '/opencart/CreateProduct',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                      prd_desc: document.getElementById('prd-desc').value,
                      prd_name: document.getElementById('prd-name').value,
                      prd_price: document.getElementById('prd-price').value,
                      prd_weight: document.getElementById('prd-weight').value

                  },
                  success: function(data) {

                  },
                  error: function (error) {
                      console.log(error);
                  }
              });
          });
      });
  }
