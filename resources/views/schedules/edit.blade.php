@extends('schedules.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit schedule</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('schedules.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('schedules.update',$schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
             
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time:</strong>
                <input type="time" name="time" value="{{$schedule->time}}" class="form-control"  >
            </div>
        </div>
                   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price for Child ticket:</strong>
                <input type="number" value="{{$schedule->price_ch}}" name="price_ch" class="form-control"  >
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price for Student ticket:</strong>
                <input type="number" value="{{$schedule->price_st}}"name="price_st" class="form-control"  >
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price for Adult ticket:</strong>
                <input type="number" value="{{$schedule->price_ad}}"name="price_ad" class="form-control"  >
            </div>
        </div>
             
             
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hall number:</strong>
                <input type="number" name="hall_number" value="{{$schedule->hall_number}}" class="form-control"  >
            </div>
        </div>
                      <?php 
          
    $movies = \App\Models\Movie::all();
     $days = \App\Models\Day::all();
    ?>
         
   
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Movie:</strong>
                <select   name="movie_id"   class="form-control">
                   @foreach($movies as $g)
                   <option  <?php if ($g->id == $schedule->movie_id) echo 'selected'; ?>  value="{{$g->id}}">{{$g->title}}</option>
                   @endforeach
                    
                </select>
                  
            </div>
        </div>
         
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Day:</strong>
                <select   name="day_id"   class="form-control">
                   @foreach($days as $g)
                   <option <?php if ($g->id == $schedule->day_id) echo 'selected'; ?>  value="{{$g->id}}">{{$g->text}}</option>
                   @endforeach
                    
                </select>
                  
            </div>
        </div>
             
               <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Finished:</strong>
                <br>
                <div class="row"> 
                Yes<input type="radio" value="1" name="finished" <?php if ($schedule->finished) echo 'checked';?> >
                No<input type="radio" value="0" name="finished" <?php if (!$schedule->finished) echo 'checked';?> ></div>
            </div>
        </div>
              
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
   
    </form>
@endsection