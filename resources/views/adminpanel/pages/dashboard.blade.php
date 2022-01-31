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
    <div class="wrapper wrapper-content">
        <div class="row">


            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-primary pull-right">Today</span> --}}
                        <h5>Total Racks</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.rack.index')}}">
                            <h1 class="no-margins">{{$totalRacks}}</h1>
                            {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total Amount of Sale Invoices</small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-primary pull-right">Today</span> --}}
                        <h5>Total Books</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.book.index')}}">
                            <h1 class="no-margins">{{$totalBooks}}</h1>
                            {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total Amount of Purchase Invoices</small>
                        </a>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')
<script>
    $(document).ready(function(){
        function sendMarkRequest(id = null) {
            return $.ajax("", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id
                }
            });
        }
        $(function() {
            $('.mark-as-read').click(function() {
                alert('asdf')
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });
            $('#mark-all').click(function() {
                let request = sendMarkRequest();
                request.done(() => {
                    $('div.alert').remove();
                })
            });
        });


    });
</script>

@endsection
