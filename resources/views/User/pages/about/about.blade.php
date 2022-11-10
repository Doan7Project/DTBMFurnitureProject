@extends('User.main.main')
@section('content')

<table class="table w-50 m-5 m-auto">
   <tr>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th>
   </tr>
@for ($i=0;$i <3;$i++)
<tr>
   <td>
    <input class='qty' type="number" name="" id="" value="1">
   </td>
   <td>
       <span class='price'>100</span>
   </td>
   <td>
       <span class='total'>100</span>
   </td>
 </tr>

@endfor

   <tr>
     <th colspan="2" style="text-align:right">Total:</th>
     <th colspan="2" style="text-align:center"><span id="sum"></span></th>
   </tr>
 </table>
<script>
  total();
$(".qty").on('change', function(){
  var parent = $(this).closest('tr');
  var price  = parseFloat($('.price',parent).text());
  var qty = parseFloat($('.qty',parent).val());

  $('.total',parent).text(qty*price);

 total();
});

function total(){
  var sum = 0;
  $(".total").each(function(){
    sum += parseFloat($(this).text());
  });
  $('#sum').text(sum);
}
</script>
@endsection