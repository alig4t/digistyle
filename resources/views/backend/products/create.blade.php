@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ایجاد ویژگی جدید
</title>
@endsection


@section('styles')
<link href="/dist/css/dropzone.min.css" rel="stylesheet">
<style>
.ck-editor__editable_inline {
    min-height: 200px;
}
  </style>
@endsection



@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت محصولات</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('products.index')}}">محصولات</a></li>
              <li class="breadcrumb-item active">ایجاد محصول جدید</li>

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
                      ایجاد محصول جدید
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                    
                    <div class="card-body">
                        @csrf

                      <div class="form-group">
                        <label>عنوان محصول</label>
                        <input type="text" name="title" class="form-control" placeholder="وارد کردن عنوان ...">
                      </div>

                      <div class="form-group">
                        <label>آدرس اختصاصی(اختیاری)</label>
                        <label class="font11">در صورت خالی بودن سیستم به صورت اتومات برای شما می سازد</label>
                        <label class="d-block">مثال : پیراهن-مردانه-نایک</label>

                        <input type="text" name="slug" class="form-control" placeholder="وارد کردن url ...">
                      </div>
  

                      <div class="form-group mb-3">
                        <label>برند</label>
                        <select class="form-control" name="brand">
                          <option value="">یک برند انتخاب نمایید</option>
                          @foreach (\App\Brand::all() as $brand)
                             <option value="{{$brand->id}}">{{$brand->name}}</option>
                          @endforeach
                      </select>
                      </div>


                      <div class="form-group mb-3">
                        <label>دسته بندی</label>
                        <select class="form-control" id="myselect" name="cat" onchange="myFunction()">
                          <option value="0">یک دسته بندی انتخاب نمایید</option>
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->title}}</option>
                         
                          @if(count($category->childrenRecursive)>0)
                          @include('backend.categories.catlist-partial',['catchild'=>$category,'level'=>1,'create'=>'create'])
                                                      
                          @endif  
                          @endforeach
                      </select>
                      </div>

                      <label class="d-none" id="attr-head">  ویژگی های مربوط به این دسته بندی : </label>
              
                      <div class="form-group" id="attr-box">
                      </div>
                       

                      <div class="alert alert-warning alert-dismissible mt-4">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-warning"></i> توجه!</h5>
سایر ویژگی های مصحول را که قابل تعریف عمومی نیستند را در باکس پایین وارد نمایید. بهتر است اگر ویژگی و توضیحاتش قابل تعریف است از قسمت ویژگی ها آن را تعریف نمایید و اگر مقدار ویژگی به صورت متن بیشتر از یک خط و منحصر به فرد است آن را در باکس پایین تعریف کنید
                      </div>

{{-- 
                      <div class="form-group">
                         </div> --}}

                      <div class="form-group" id="extra-box">
                        <label class="d-block" id="attr-head"> تعریف ویژگی های متنی محصول (اختیاری)</label>
                        <label class="mt-3">عنوان و مقدار ویژگی متنی</label>
                        <input type="text" name="extra[0][title]" class="form-control" placeholder=" وارد کردن عنوان ...">
                        <textarea type="text" name="extra[0][desc]" class="form-control" placeholder="توضیح ویژگی را بنویسید..."></textarea>
                     

                        <label class="mt-3">عنوان و مقدار ویژگی متنی2</label>
                        <input type="text" name="extra[1][title]" class="form-control" placeholder="وارد کردن عنوان ...">
                        <textarea type="text" name="extra[1][desc]" class="form-control" placeholder="توضیح ویژگی را بنویسید..."></textarea>
                      </div>
                      <button type="button" onclick="insertInput()" id="add-button" class="btn btn-info btn-flat">اضافه کردن مقادیر بیشتر</button>


                      
                      <div class="form-group mt-4">
                        <label>توضیحات محصول</label>
                        {{-- <textarea id="editor" type="text" name="description" class="ckeditor form-control" placeholder="توضیحات محصول را وارد کنید..."></textarea> --}}

                        {{-- <div id="editor" name="desc">
                          <p>توضیحات محصول را وارد نمایید</p>
                        </div> --}}

                        <textarea id="editor" type="text" name="description" class="form-control" placeholder="توضیحات محصول را وارد کنید..."></textarea>

                      </div>


                      <div class="form-group">
                        <label>قیمت محصول</label>
                        <input type="number" name="price" class="form-control" placeholder="وارد کردن قیمت ...">
                      </div>

                      <div class="form-group">
                        <label>تخفیف محصول (اختیاری)</label>
                        <input type="number" name="discount" class="form-control" placeholder="وارد کردن تخفیف ...">
                      </div>


                      <div class="form-group">
                        <label>وضعیت محصول</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="1">
                          <label class="form-check-label">انتشار در سایت</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="0" checked>
                          <label class="form-check-label">پیش نویس</label>
                        </div>
                      </div>



                        <div class="form-group" id="gl-input">
                          <label>گالری تصاویر</label>
                          {{-- <input type="hidden" name="photo_id[]" id="product-photo"> --}}
                          
                        </div>
                        <div class="dropzone" id="my-awesome-dropzone"></div>







                    </div>
  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ایجاد محصول جدید</button>
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
<script src="{{asset('js/app.js')}}"></script>

<script src="/dist/js/dropzone.min.js"></script>
{{-- <script src="/plugins/ckeditor/ckeditor.js"></script> --}}
<script src="/dist/js/ckeditor.js"></script>
<script>


  var inputIndex = 1;
  var extraBox = document.getElementById('extra-box');

  
  function  insertInput(){

    inputIndex+=1;
    
       let newLabel = document.createElement('label');
       newLabel.textContent = 'عنوان ویژگی متنی '  + Number(+inputIndex+1) +' (اختیاری) ';
       newLabel.classList.add('mt-3');
       extraBox.append(newLabel);

       let attrTitle = document.createElement('input');
       attrTitle.setAttribute('type','text');
       attrTitle.setAttribute('name','extra[' + inputIndex +'][title]');
       attrTitle.setAttribute('placeholder','وارد کردن عنوان ...');
       attrTitle.className = 'form-control';
       extraBox.append(attrTitle);

       let forminput = document.createElement('textarea');
       forminput.setAttribute('type','text');
       forminput.setAttribute('name','extra[' + inputIndex +'][desc]');
       forminput.setAttribute('placeholder','توضیح ویژگی را بنویسید...');
       forminput.className = 'form-control';
       extraBox.append(forminput);

    }


      Dropzone.autoDiscover = false;
        var photosGallery = []
        var galleryInputs = document.getElementById('gl-input');
        var drop = new Dropzone('#my-awesome-dropzone', {
          addRemoveLinks: true,
          url: "{{ route('photos.store') }}",
          sending: function(file, xhr, formData){
            formData.append("_token","{{csrf_token()}}")
            
          },
          success: function(file, response){
            console.log(response.photo_id);
            photosGallery.push(response.photo_id)
            let imgInput = document.createElement('input');
            imgInput.setAttribute('type','hidden');
            imgInput.setAttribute('name','gallery[]');
            imgInput.setAttribute('value',response.photo_id);
            galleryInputs.append(imgInput);
            
          }
        });
        drop.on("removedfile", function(file) {
          // myDropzone.removeFile(file);
          photo_value = JSON.parse(file.xhr.response).photo_id;

          // console.log(photo_value);

          // document.getElementById('product-photo').value = photosGallery
          let removeDom = galleryInputs.querySelector('input[value="' + photo_value+'"]');
          removeDom.remove();
        });


        
        // productGallery = function(){
        //   document.getElementById('product-photo').value = photosGallery
        // }


        console.log('sssss');

        ClassicEditor
            .create( document.querySelector( '#editor' ),{
              language : "fa",
              
            } )
            .catch( error => {
                console.error( error );
            } );

        // CKEDITOR.replace('textareaDescription',{
        //   customConfig: 'config.js',
        //   toolbar: 'simple',
        //   language: 'fa',
        //   removePlugins: 'cloudservices, easyimage'
        // })


// var drop = new Dropzone('#my-awesome-dropzone',{
//   url: "{{route('photos.store')}}",
//   sending:function(file,xhr,formData){
//     formData.append("_token",{{csrf_token()}})
//   },success:function(file,response){
//     console.log(response.photo_id);
//   }
// });
</script>




<script>

  var attrBox = document.getElementById('attr-box');
  var attrHeader = document.getElementById('attr-head');

  function myFunction() {
    attrBox.innerHTML ='';
    attrHeader.className ='d-block';
    var x = document.getElementById("myselect").options.selectedIndex;
    let catId = document.getElementById("myselect").children[x].value;

    axios.get('/api/attribute-cat/'+catId).then(resp => {

    // console.log(resp.data['attrs']['attributegroups']);
    let attrs = resp.data['attrs']['attributegroups'];
 
    
      for(let i=0;i<attrs.length;i++){
        console.log(attrs[i].title);

        let formgroup = document.createElement('div');
        formgroup.classList.add('form-group','mb-3');
        let label = document.createElement('labal');
        label.classList.add('font-weight-bold','ml-4')
        label.textContent = attrs[i].title + ": ";
        formgroup.appendChild(label);
        // divCheck.append(label);
        // attrBox.append(divCheck);
        attrBox.append(formgroup);

        var vals = attrs[i].attribute_values;

        for(let j=0 ; j<vals.length ; j++){

          console.log(vals[j].title);

          let divCheck = document.createElement('div');
          divCheck.classList.add('form-check','d-inline');

          let checkinput = document.createElement('input');
          checkinput.setAttribute('type','checkbox');
          checkinput.setAttribute('name','attr[]');
          checkinput.setAttribute('value',vals[j].id);
          checkinput.className = 'form-check-input';
          divCheck.append(checkinput);

          let checklabel = document.createElement('labal');
          checklabel.classList.add('form-check-label','ml-2');
          checklabel.textContent = vals[j].title;
          divCheck.append(checklabel);

          formgroup.append(divCheck);
        //   attrBox.append(divCheck);
        }



      }


    });



  }
 
</script>

@endsection
