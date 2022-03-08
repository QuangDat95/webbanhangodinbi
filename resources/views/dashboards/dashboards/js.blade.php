@section('js')
<script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}"></script>
<script>
 var date = JSON.parse('{!!json_encode($dates)!!}');
var amount = JSON.parse('{!!json_encode($amount)!!}');
$('select').on('change', function() {
    $ajax({
        
    });
  });
</script>
<script src="{{asset('app-assets/js/scripts/charts/chart-chartjs.js')}}"></script>
@endsection