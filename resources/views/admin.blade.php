@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Admin panel</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Admin</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						 <a href="#"><img src="{{Auth::User()->profile_pic}}" style="height: 300px; width: 250px"alt=""><br></a>
					</div>
					<div class="user-fav">
						<p>Cruds</p>
						<ul>
                     
                     @if(Auth::user()->role == "admin")                               
              <li  class="active"> <a class="col-12 display-4" href="/days">DAYS CRUD</a> </li>
          <li  class="active">  <a class="col-12 display-4" href="/movies">MOVIES CRUD</a> </li>
          @endif
          
              <li  class="active">   <a class="col-12 display-4" href="/schedules">SCHEDULES CRUD</a> </li>
            
							
						</ul>
					</div>
					<div class="user-fav">
						<p>Others</p>
						<ul>    
                                                    <li style="color: white; font-size: 20px" >Role: {{Auth::User()->role}}</li>
                                    
							 
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
                                     <table class="table table-bordered " style="color: white; font-size: 20px">
        <tr>
            <th>Id</th>
            <th>Movie</th>
             <th>Day</th>
             <th>Hall</th>
               <th>Time</th>
               <th>Finished</th>
               
            <th width="150px">Approve tickets</th>
            
        </tr>
        @foreach ($schedules as $d)
        <tr>
            
            <td>{{ $d->id }}</td>
            <td>{{ $d->movie->title }}</td>
            <td>{{ $d->day->text }}</td>
            <td>{{ $d->hall_number }}</td>
              <td>{{ $d->time }}</td>
          <td>{{ $d->finished }}</td>
          <td><a href="/admin?schedule_id={{$d->id}}#t"  class="btn btn-primary">APPROVE TICKETS</a></td>
            
            
        </tr>
        @endforeach
        
    </table>
                           
                          
                                    @if(isset($_GET['schedule_id']))
                                    
                                    <?php 
                                    
                                    $tickets_un = \App\Models\Ticket::where('schedule_id',$_GET['schedule_id'])->where('approved',0)->get();
                                     function ryad($iterator) {
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
                                    
                                    <div id="t"></div>
                                       @foreach($tickets_un as $ticket)

                                      <div class="jumbotron row" style="font-size:20px; height: 250px; background-color: #cccc00">


                                          <div class="col-3 text-center">

                                              <img class="  border border-primary w-100"src="{{$ticket->user->profile_pic}}" style="width:100%;height:150px">

                                              <span class=" text-center" >{{$ticket->user->name}}</span>
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
                                               <form action="{{ route('tickets.update',$ticket->id) }}" method="POST">


                                                   @csrf
                                                   @method('PUT')

                                                   <button type="submit" class="display-4 btn btn-success" style="font-size: 30px">APPROVE TICKET</button>
                                               </form>
                                           </div>


                                           <div class="col-3 text-center">

                                               <img class="  border border-primary w-100"src="{{$ticket->schedule->movie->small_pic}}" style="width:100%; height:150px">

                                               <span class=" text-center" >{{$ticket->schedule->movie->title}}</span>
                                           </div>


                                       </div>
                                      
                                      @endforeach
                                    
                                    
                                    @endif
                                    
                                    
                                    
				</div>
			</div>
		</div>
	</div>
</div>




@endsection