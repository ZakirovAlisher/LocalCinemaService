@extends('layouts.app')
@section('content')

<?php 
  function ryad($iterator){
        $it = 0;
                                           
                                          
         for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < 12; $j++) {
            $it++;
            if ($iterator == $it) {
                $pl['row'] = $i + 1;
                $pl['seat'] = $j + 1;

                return $pl;
            }
        }
    }
}
?>
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>{{Auth::User()->name}}</h1>
					 
				</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
                                            <a href="#"><img src="{{Auth::User()->profile_pic}}" style="height: 300px; width: 250px"alt=""><br></a>
					</div>
				 
					<div class="user-fav">
						<p>Others</p>
						<ul>    
                                                    <li style="font-size: 20px; color: white">Role: {{Auth::User()->role}}</li>
                                    
							 
							<li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                                            </a>
                                    </li>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
                                    
					   @if ($message = Session::get('success'))
                            <div class="m-2 alert alert-success ">
                                <p style="color: black; font-weight: bold">{{ $message }}</p>
                                </div>
                                      @endif
                                           @if ($message = Session::get('error'))
                            <div class="m-2  alert alert-danger ">
                                <p style="color: black; font-weight: bold">{{ $message }}</p>
                                </div>
                                      @endif
                                      
					<form  action="/update/{{Auth::user()->id}}" method="post">
                                             @csrf 
						<h4>Profile details</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Username</label>
                                                                <input type="text" name="name"  value="{{Auth::User()->name}}" >
							</div>
							<div class="col-md-6 form-it">
								<label>Email Address</label>
								<input type="text" value="{{Auth::User()->email}}"  readonly>
							</div>
						</div>
						 <div class="row">
							<div class="col-md-12 form-it">
							<label>Profile pic url</label>
                                                        <input type="text" name="profile_pic" value="{{Auth::User()->profile_pic}}" >	 
							</div>
						</div>
						 
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="save">
							</div>
						</div>	
					</form>
	
                                    <form  action="/updatepass/{{Auth::user()->id}}" method="post" class="password">
                                             @csrf 
						<h4> Change password</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Old Password</label>
                                                                <input type="text" name="old" >
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>New Password</label>
								<input type="text" name="new" >
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Confirm New Password</label>
								<input type="text" name="confirm"  >
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="change">
							</div>
						</div>	
					</form>
                                      
                                      <div class="mt-4 row text-center display-4 text-warning"> UNAPPROVED TICKETS</div>

                                      @foreach($tickets_un as $ticket)

                                      <div class="jumbotron row" style="font-size:20px; height: 250px; background-color: #cccc00">


                                          <div class="col-3 text-center">

                                              <img class="  border border-primary w-100"src="{{Auth::user()->profile_pic}}" style="width:100%;height:150px">

                                              <span class=" text-center" >{{Auth::user()->name}}</span>
                                          </div>


                                    



                                           <div class="col-6 text-center">

                                               {{ ryad($ticket->place)['row']  }} row,  {{ ryad($ticket->place)['seat']  }} seat ({{$ticket->place}} place).<br>

                                               {{ $ticket->type }}
                                                  @if($ticket->type == 'CHILD')
                                               {{ $ticket->schedule->price_ch }} tenge <br>
                                               @endif
                                               @if($ticket->type == 'STUDENT')
                                               {{ $ticket->schedule->price_st }}  tenge <br>
                                               @endif
                                               @if($ticket->type == 'ADULT')
                                               {{ $ticket->schedule->price_ad }}  tenge <br>
                                               @endif
                                               
                                               {{ $ticket->schedule->day->text }}<br>
                                               {{ $ticket->schedule->time }}<br>
                                               {{ $ticket->schedule->hall_number }} hall<br>
                                               <form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">


                                                   @csrf
                                                   @method('DELETE')

                                                   <button type="submit" class="display-4 btn btn-danger" style="font-size: 30px">CANCEL TICKET</button>
                                               </form>
                                           </div>


                                           <div class="col-3 text-center">

                                               <img class="  border border-primary w-100"src="{{$ticket->schedule->movie->small_pic}}" style="width:100%; height:150px">

                                               <span class=" text-center" >{{$ticket->schedule->movie->title}}</span>
                                           </div>


                                       </div>
                                      
                                      @endforeach
                                      
                                       <div class="mt-4 row text-center display-4 text-success"> APPROVED TICKETS</div>

                                      @foreach($tickets_ap as $ticket)

                                      <div class="jumbotron row" style="font-size:20px; height: 250px; background-color: #cccc00">


                                          <div class="col-3 text-center">

                                              <img class="  border border-primary w-100"src="{{Auth::user()->profile_pic}}" style="width:100%;height:150px">

                                              <span class=" text-center" >{{Auth::user()->name}}</span>
                                          </div>


                                    



                                           <div class="col-6 text-center">

                                               {{ ryad($ticket->place)['row']  }} row,  {{ ryad($ticket->place)['seat']  }} seat ({{$ticket->place}} place).<br>

                                           {{ $ticket->type }}<br>
                                                  @if($ticket->type == 'CHILD')
                                               {{ $ticket->schedule->price_ch }} tenge <br>
                                               @endif
                                               @if($ticket->type == 'STUDENT')
                                               {{ $ticket->schedule->price_st }}  tenge <br>
                                               @endif
                                               @if($ticket->type == 'ADULT')
                                               {{ $ticket->schedule->price_ad }}  tenge <br>
                                               @endif
                                               {{ $ticket->schedule->day->text }}<br>
                                               {{ $ticket->schedule->time }}<br>
                                               {{ $ticket->schedule->hall_number }} hall<br>
                    
                                           </div>

                           

                                           <div class="col-3 text-center">

                                               <img class="  border border-primary w-100"src="{{$ticket->schedule->movie->small_pic}}" style="width:100%; height:150px">

                                               <span class=" text-center" >{{$ticket->schedule->movie->title}}</span>
                                           </div>


                                       </div>
                                      
                                      @endforeach
                                      
				</div>
			</div>
		</div>
	</div>
</div>




@endsection