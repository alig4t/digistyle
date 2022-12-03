@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
مقادیر ویژگی
{{$attr_groups->title}}
</title>
@endsection




@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت مقدار ویژگی ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('attribute-values.index')}}">مقدار ویژگی ها</a></li>
              <li class="breadcrumb-item active">مقادیر ویژگی {{$attr_groups->title}}</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
          <div class="col-10 mx-auto">
            @if(count($errors)>0)
            @foreach($errors->all() as $err)
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6><i class="icon fa fa-ban"></i> {{$err}}</h6>
            </div>
            @endforeach
            @endif
          </div>
            

            <div class="col-md-10 mx-auto">
                <!-- general form elements -->
                <div class="card card-warning ">
                  <div class="card-header">
                    <h3 class="card-title">
                      ایجاد مقدار ویژگی جدید
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('addAttrVal.insert')}}">
                    
                    <div class="card-body" id="card-box">
                        @csrf
                      <div class="form-group">
                          
                        
                      <label>گروه بندی ویژگی</label>
                        <input disabled type="text" value="{{$attr_groups->title}}" class="form-control" placeholder="وارد کردن مقدار ...">
                      </div>


                      <input type="hidden" name="group" value="{{$attr_groups->id}}">
                       
                       <div class="form-group">
                        <label>وارد کردن مقدار ویژگی</label>
                       <input type="text" name="title[]" class="form-control" placeholder="وارد کردن مقدار ...">
                       </div>

                       {{-- <div class="form-group">
                        <label> وارد کردن مقدار ویژگی 2 (اختیاری)</label>
                       <input type="text" name="title[]" class="form-control" placeholder="وارد کردن مقدار ...">
                       </div>
            
                       
                       <div class="form-group">
                        <label> وارد کردن مقدار ویژگی 3 (اختیاری)</label>
                       <input type="text" name="title[]" class="form-control" placeholder="وارد کردن مقدار ...">
                       </div>      --}}
                            
                    </div>
                    <div class="card-body">
                        <button type="button" onclick="insertInput()" id="add-button" class="btn btn-info btn-flat">اضافه کردن مقادیر بیشتر</button>
                    </div>
                    <div class="card-footer mt-2">
                      <button type="submit" class="btn btn-primary pull-left">ایجاد مقدار ویژگی</button>
                    </div>
                    
                  
                </div></form>
                <!-- /.card -->
    
                <!-- Form Element sizes -->
              
    
              </div>
              <!--/.col (left) -->
            
              <!--/.col (right) -->
            </div>






          <!-- /.row -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>














@endsection

@section('scripts')

<script>
    var inputIndex = 1;
    var cardbox = document.getElementById('card-box');

    function  insertInput(){
       inputIndex += 1;
       let divtag = document.createElement('div');
       divtag.className = 'form-group';
        
       let newLabel = document.createElement('label');
       newLabel.textContent = 'وارد کردن مقدار ویژگی ' + inputIndex +' (اختیاری) '
       divtag.prepend(newLabel);

       let forminput = document.createElement('input');
       forminput.setAttribute('type','text');
       forminput.setAttribute('name','title[]');
       forminput.setAttribute('placeholder','وارد کردن مقدار ...');
       forminput.className = 'form-control';
        divtag.append(forminput);

        
        cardbox.append(divtag)


    }


</script>

@endsection
