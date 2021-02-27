@extends('layouts.mainlayout')

@section('content')


<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
               
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>
         
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
   <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
        
        </div>
    </div>
    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
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
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    
                    <h3 class="kt-portlet__head-title">
                       Customers
                    </h3>
                </div>
                
                
            </div>
            <div class="kt-portlet__body">
                
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="users">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                            <a href='/customers/view/{{$item->id}}' title='View' class='edit' id='{$row->id}'> <i class='la la-eye'></i></a>&nbsp;
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>
</div>
</div>
<!-- Bootstrap core JavaScript-->
{!! Html::script('js/jquery.min.js') !!}

<!--begin::Global Theme Bundle(used by all pages) -->
{!! Html::script('metronic/plugins/global/plugins.bundle.js') !!}
{!! Html::script('metronic/js/scripts.bundle.js') !!}

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
{!! Html::script('metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js') !!}
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
{!! Html::script('metronic/plugins/custom/gmaps/gmaps.js') !!}
{!! Html::script('metronic/js/pages/dashboard.js') !!}
{!! Html::script('metronic/plugins/custom/datatables/datatables.bundle.js') !!}
{!! Html::script('metronic/js/pages/crud/datatables/basic/basic.js') !!}
{!! Html::script('metronic/js/pages/components/extended/sweetalert2.js') !!}
{!! Html::script('metronic/plugins/custom/jquery-ui/jquery-ui.bundle.js') !!}
{!! Html::script('metronic/js/pages/components/portlets/draggable.js') !!}
{!! Html::script('metronic/js/pages/crud/forms/widgets/select2.js') !!}
<!--end::Page Vendors -->
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
var KTAppOptions = {
  "colors": {
    "state": {
      "brand": "#2c77f4",
      "light": "#ffffff",
      "dark": "#282a3c",
      "primary": "#5867dd",
      "success": "#34bfa3",
      "info": "#36a3f7",
      "warning": "#ffb822",
      "danger": "#fd3995"
    },
    "base": {
      "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
      "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
    }
  }
};
</script>
</body>
</html>
@endsection