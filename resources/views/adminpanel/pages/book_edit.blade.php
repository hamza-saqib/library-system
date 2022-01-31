@extends('adminpanel.layout.master')
<!-- ================================== EXTEND TITLE AND META TAGS ============================= -->
@section('title-meta')
    <title>Bizblanca | Dashboard</title>
    <meta name="description" content="this is description">
@endsection
<!-- ====================================== EXTRA CSS LINKS ==================================== -->
@section('other-css')
@endsection
<!-- ======================================== BODY CONTENT ====================================== -->
@section('content')
   
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Book</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Book</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

   

    <div class="wrapper wrapper-content animated fadeInRight">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row">

            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('admin.book.update', $book->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        

                        <label class="col-sm-2 control-label">Title</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="title"  value="{{$book->title}}">
                        </div>


                    </div>

                    <div class="form-group">


                        <label class="col-sm-2 control-label">Author</label>

                        <div class="col-sm-4">
                            <input type="text" maxlength="25" class="form-control" name="author" required value="{{$book->author}}">
                        </div>

                        <label class="col-sm-2 control-label">Publish Year</label>

                        <div class="col-sm-4">
                            <input type="number" min="1700" max="2500" class="form-control" name="publish_year" required value="{{$book->publish_year}}">
                        </div>

                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label">Rack</label>

                        <div class="col-sm-4">
                            <select class="form-control" name="rack_id" required>
                            <option selected disabled>Select</option>
                                @foreach ($racks as $rack)
                                    @if ($book->rack_id == $rack->id)
                                    <option selected value="{{ $rack->id }}">{{ $rack->name }} </option>
                                    @else
                                    <option value="{{ $rack->id }}">{{ $rack->name }} </option>
                                    @endif
                                @endforeach

                            </select>
                        </div>



                    </div>



                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Update Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>

        </div>
    </div>

@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

<script>
    var Success = `{{\Session::has('success')}}`;
    var Error = `{{\Session::has('error')}}`;

    if (Success) {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 7000
            };
            toastr.success('Success Message', `{{\Session::get('success')}}`);

        }, 1300);
    }
    else if(Error){
        setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('Failure Message', `{{\Session::get('error')}}`);

            }, 1300);
    }
</script>
@endsection
