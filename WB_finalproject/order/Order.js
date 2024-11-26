const order = [];
let total = 0;

//add to order list
function addToOrder(item, price) {
    order.push({ item, price });
    total += price;
    updateOrderSummary(item);
}
//update order
function updateOrderSummary(titem) {
    //clear order element
    const hiddentext = document.getElementById('listItems');
    const orderList = document.getElementById('order-list');
    orderList.innerHTML = '';
    //takes each item from order list and adds them to order-list element
    order.forEach(({ item, price }) => {
        const li = document.createElement('li');

        li.textContent = `${item} - $${price.toFixed(2)}`;
        
        orderList.appendChild(li);
});
hiddentext.innerHTML += titem + ", ";
    //adds total to the total element
    document.getElementById('total-price').textContent = `Total: $${total.toFixed(2)}`; }
//submit actions
function submitOrder() {
    alert('Thank you for your order!');
    //clear
    order.length = 0;
    total = 0;
    updateOrderSummary();
}


