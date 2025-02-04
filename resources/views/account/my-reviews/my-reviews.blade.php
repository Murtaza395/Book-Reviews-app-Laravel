@extends('layouts.app')
@section('main')
<div class="container">
    <div class="row my-5">
        <div class="col-md-3">
            @include('layouts.sidebar')               
        </div>
        <div class="col-md-9">
            
            <div class="card border-0 shadow">
                <div class="card-header  text-white bg-danger">
                    My Reviews
                </div>
                <div class="card-body pb-0 bg-dark">    
                    <div class="d-flex justify-content-end">
                        
                        <form action="" method="get">
                            <div class="d-flex">
                        <input type="text" name="keyword" id="keyword" class="form-control" value="{{Request::get('keyword')}}" placeholder="Keyword">
                        <button type="submit" class="btn btn-outline-primary ms-2">Search</button>
                        <a href="{{route('account.myReviews')}}" class="btn btn-outline-primary ms-2">Clear</a>
                    </div>
                    </form>
                </div>              
                    <table class="table  table-striped mt-3">
                        <thead class="table-danger">
                            <tr>
                                <th>Book</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Status</th>                                  
                                <th width="100">Action</th>
                            </tr>
                            <tbody class="table-dark border border-primary">
                                @if ($reviews->isNotEmpty())
                                @foreach ($reviews as $review)
                                    
                                <tr>
                                    <td>{{$review->book->title}}</td>
                                    <td>{{$review->review}}</td>                                        
                                    <td>{{$review->rating}}</td>
                                    <td>
                                        @if($review->status==1)
                                        <span class="text-success">Active</span>
                                        @else
                                        <span class="text-danger">Block</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('account.myReviews.editReview',$review->id)}}" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="#" onclick="deleteReview({{$review->id}})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        <form action="{{route('account.myReviews.deleteReview',$review->id)}}" method="post" id="deleteReviewFrom{{$review->id}}">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr> 
                                @endforeach
                                    
                                @endif                              
                            </tbody>
                        </thead>
                    </table>   
                    {{$reviews->links()}}              
                </div>
                
            </div>                
        </div>
    </div>       
</div>

@endsection


@section('script')
<script>
    function deleteReview(id){
    if (confirm("Are you sure to delete this review")){
        document.getElementById("deleteReviewFrom"+id).submit();
    }
    }
    </script>

@endsection