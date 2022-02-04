@extends('welcome')
@section('content')

<div id="ppPrint">
<div class="text-center">
    <h1><u>Report of last 30days</u></h1>
</div>
<br><br>

<h4>Total category created:<b> {{$gallery->count()}}</b></h4>
<h4>Total images uploaded:<b> {{$images->count()}}</b></h4>
<h4>Total events created:<b>  {{$events->count()}}</b></h4>
<h4>Total courses created:<b> {{$courses->count()}}</b></h4>
<h4>Total blogs uploaded:<b>  {{$blogs->count()}}</b></h4>
<h4>Total artist made:<b>     {{$artists->count()}}</b></h4>
<h4>Total users registered:<b>{{$users->count()}}</b></h4>


</div>
<input class="btn btn-primary mr-5" type="button" onClick="PrintDiv('ppPrint');" value="Print">
@endsection

<script language="javascript">
    function PrintDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
