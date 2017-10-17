@extends('comps.compd')


@section('compd_content')
    <script>
     $(document).ready(function(){
	 $("#new-serv").click(function(){
	     $('.serv-class').toggle()
	 });

	 $('#srange').on('change', function(){
	     if($('#srange').val() == 1)
		 $("#serv-dates").show();
	     else if($('#srange').val() == 0)
		 $("#serv-dates").hide();
	     
	 });
     });
    </script>
    @if($comp->comp_sort == 'doner_comp' || $comp->comp_sort == 'both_comp')
	@include('comps.new-service')
    @else
	Include the layout of benefits comps here
    @endif
@endsection
