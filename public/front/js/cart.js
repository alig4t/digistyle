
    
   
    
    var cardTitle = document.getElementById('cart-total');

    var basketTable = document.getElementById('basket-tbl');
    var basketBody = basketTable.querySelector('tbody');


    function loadBasket(basket){
    //   console.log('sssssss');
      basketBody.innerHTML = '';

      basket.items.forEach(elem => {
        // console.log(elem);
        let card_tr = document.createElement('tr');
        let card_td_1 = document.createElement('td');
        card_td_1.className = 'text-center';
        let card_td_1_a = document.createElement('a');
        card_td_1_a.setAttribute('href','#');

        let card_img = document.createElement('img');
        card_img.className = 'img-thumbnail';
        card_img.setAttribute('width','65px');
        card_img.setAttribute('src','/images/products/'+ elem['item'].product.photos[0].path);

        console.log('/images/products/' + elem['item'].product.photos[0].path);

        let card_td_2 = document.createElement('td');
        card_td_2.className = 'text-left';
        let card_td_2_a = document.createElement('a');
        card_td_2_a.setAttribute('href','#');
        card_td_2_a.innerHTML = elem['item'].product.title + "<br>" + elem['item'].size.size + " - " + elem['item'].color.color;


        let card_td_3 = document.createElement('td');
        card_td_3.className = 'text-right';
        card_td_3.textContent = elem.qty;

        let card_td_4 = document.createElement('td');
        card_td_4.className = 'text-right';
        card_td_4.textContent = elem['item'].product.price - elem['item'].product.discount + ' تومان ';

        console.log(elem['item'].product.price);

        let card_td_5 = document.createElement('td');
        card_td_5.className = 'text-center';
        let card_td5_button = document.createElement('button');
        card_td5_button.classList.add('btn','btn-danger','btn-xs','remove');
        card_td5_button.setAttribute('type','button');
        
        let card_td5_i = document.createElement('i');
        card_td5_i.classList.add('fa','fa-times');

        card_td5_button.appendChild(card_td5_i);
        card_td_5.appendChild(card_td5_button);

        card_td_1_a.appendChild(card_img);
        card_td_1.appendChild(card_td_1_a);

        card_td_2.appendChild(card_td_2_a)
        card_tr.appendChild(card_td_1);
        card_tr.appendChild(card_td_2)
        card_tr.appendChild(card_td_3)
        card_tr.appendChild(card_td_4)
        card_tr.appendChild(card_td_5)
        basketBody.append(card_tr);
      });


      document.getElementById('totalprice').innerHTML = basket.totalPrice + " تومان ";
      document.getElementById('totaldiscount').innerHTML = basket.totalDiscount + " تومان ";
      document.getElementById('finalprice').innerHTML = basket.finalPrice + " تومان ";

    }


    function addtoCart(){

        let optId = document.getElementById("input-option200").options.selectedIndex;
        var stock_id = document.getElementById("input-option200").children[optId].value;
        var count = document.getElementById("input-quantity").value;
        console.log(stock_id);
        
        axios.get('/add-to-cart/'+stock_id+'/'+count).then((resp) => {
          cardTitle.innerHTML = resp.data.quantity + " آیتم " + resp.data.totalPrice +" تومان ";
          console.log(resp.data);
          loadBasket(resp.data);
        }).catch((err) => {
          //  console.log(err);
        });
    }
  