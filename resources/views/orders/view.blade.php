@extends('layouts.mainlayout')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
            </div>
        </div>
    </div>
    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-lock"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        View Item
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <a href="/home" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-arrow-left"></i>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                
                <div class="kt-section kt-section--first">
                <div class="form-group">
                        <label><b>Order ID:</b></label>
                        <br>
                        {{$data->id}}
                    </div>
                    <div class="form-group">
                        <label><b>Customer Name:</b></label>
                        <br>
                        {{$data->customers()->first()->name}}
                    </div>
                    <div class="form-group">
                        <label><b>Product Ordered</b></label>
                        <br>
                        {{$data->products()->first()->name}}
                    </div>
                    <div class="form-group">
                        <label><b>Product Price:</b></label> <br>
                        {{$data->products()->first()->price}}
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>
<!-- end:: Content -->
</div>
@endsection

