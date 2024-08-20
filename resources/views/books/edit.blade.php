@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-3">
                @include('layouts.sidebar')
                </div>
            <div class="col-md-9">
                @include('layouts.message') 
                    <div class="card border-0 shadow">
                        <div class="card-header bg-danger  text-white">
                            Edit Book
                        </div>
                        <div class="card-body bg-dark">
                            <form action="{{route('books.update',$book->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label text-white">Title</label>
                                <input type="text" class="@error('title') is-invalid @enderror form-control" value="{{old('title',$book->title)}}" placeholder="Title" name="title" id="title" />
                                @error('title')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label text-white">Author</label>
                                <input type="text" value="{{old('author',$book->author)}}" class="@error('author') is-invalid @enderror form-control" placeholder="Author"  name="author" id="author"/>
                                @error('author')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="author" class="form-label text-white">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Description" cols="30" rows="5">{{old('description',$book->description)}}</textarea>
                            </div>
    
                            <div class="mb-3">
                                <label for="Image" class="@error('file') is-invalid @enderror form-label text-white">Image</label>
                                <input type="file" class="form-control btn btn-outline-primary"  name="image" id="image"/>
                                @error('image')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                            @if ($book->image!="")
                            <img class="w-25 my-3" src={{asset('uploads/books/thumb/'.$book->image)}} >
                        @endif
                            </div>
    
                            <div class="mb-3">
                                <label for="author" class="form-label text-white">Status</label>
                                <select name="status" id="status" class="@error('status') is-invalid @enderror form-control">
                                    <option value="1" {{($book->status==1)?'selected':''}}>Active</option>
                                    <option value="0" {{($book->status==0)?'selected':''}}>Block</option>
                                </select>
                                @error('status')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
    
    
                            <button class="btn btn-outline-primary mt-2 form-control">Create</button>    
                            </form>                 
                        </div>
                    </div>                
                </div>
                    
                </div>                
            </div>
        </div>             
     


@endsection