<link rel="stylesheet" href="/css/base.6164cf6a.css">
<link rel="stylesheet" href="/css/style.6164cf6a.css">

@extends('website.welcome')
@section('content')
    
<h1>CONTACT</h1>
<div>
@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif
</div>

<form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div id="grid_11" class="fr-widget fr-grid fr_grid_11">
     <div class="fr-widget fr-text"> <div class="fr-text">
<h5>If you would like to have a virtual version of your bricks and mortar gallery created, or if you have a question about Exhibbit’s service, please let us know below.</h5>
     </div>
     </div>
<div class="fr-widget fr-text"> 
<h5>To help us advise you on the best way to use and integrate an Exhibbit gallery with your website and business, please let us know what you would like to achieve and we will respond promptly.</h5>
</div>
</div>
<div class="fr-widget fr_contact_panel_3"> <div id="text_block_59" class="fr_text_block_59"> <div class="fr-text">
<h3>Please use this contact form for your message</h3>
</div>
</div>
<div id="grid_12"> <input type="text" class="fr_input_19" placeholder="Your name" name="name" required>
</div>
<div id="input_20"> <input type="email" class="fr_input_20" placeholder="Email Address" name="email" required>
</div>
<div id="input_22"> <input type="text" class="fr_input_22" placeholder="Occupation" name="occupation" required>
</div>
</div>
<div id="input_21"> <textarea class="fr_input_21" placeholder="Please tell us about your particular area of interest." name="message" required></textarea>
</div>

     <button id="text_82" class="fr-widget fr_text_82"  tabindex="0"><div class="fr-text">SEND</div></button>
</div>
</form>


@endsection