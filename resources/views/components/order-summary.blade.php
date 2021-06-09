<div id="order-summary" class="box">
  <div class="box-header">
    <h3 class="mb-0">Order summary</h3>
  </div>
  <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
  <div class="table-responsive">
    <table class="table">
      <tbody>
      <tr>
        <td>Order subtotal</td>
        <th>${{$basket['total']}}</th>
      </tr>
      <tr>
        <td>Shipping and handling</td>
        <th>${{$basket['shipAndHandle']}}</th>
      </tr>
      <tr>
        <td>Tax</td>
        <th>${{$basket['tax']}}</th>
      </tr>
      <tr class="total">
        <td>Total</td>
        <th>${{$basket['total'] + $basket['shipAndHandle'] + $basket['tax']}}</th>
      </tr>
      </tbody>
    </table>
  </div>
</div>
