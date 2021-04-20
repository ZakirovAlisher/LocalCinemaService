@extends('schedules.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All schedules</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('schedules.create') }}"> Add schedule</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="m-2 alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered " style="color: white">
        <tr>
            <th>Id</th>
            <th>Movie</th>
             <th>Day</th>
             <th>Hall</th>
               <th>Time</th>
               <th>Finished</th>
              <th>Price(Child)</th>
              <th>Price(Student)</th>
              <th>Price(Adult)</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($schedules as $d)
        <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->movie->title }}</td>
            <td>{{ $d->day->text }}</td>
            <td>{{ $d->hall_number }}</td>
              <td>{{ $d->time }}</td>
          <td>{{ $d->finished }}</td>
            <td>{{ $d->price_ch }}</td>
            <td>{{ $d->price_st }}</td>
            <td>{{ $d->price_ad }}</td>
            <td>
                <form action="{{ route('schedules.destroy',$d->id) }}" method="POST">
   
                  
    
                    <a class="btn btn-primary" href="{{ route('schedules.edit',$d->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
      
      
@endsection

