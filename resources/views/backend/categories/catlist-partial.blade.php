@if(isset($list))

@foreach ($catchild->childrenRecursive as $children)
              <tr class="sub-cat-tr">
              <td class="align-middle text-center">{{$children->id}}</td>
             <td class="align-middle text-center">{{str_repeat("---",$level)}}    {{$children->title}}</td>
             <td class="align-middle text-center">{{$children->slug}}</td>
                <td class="align-middle text-center">{{$children->parent->title}}</td>
                <td class="align-middle text-center"><img src="/images/cats/{{$children->photo}}" width="200px"></td>

          
             <td class="align-middle text-center">
               <a href="{{route('categories.edit',$children->id)}}" class="btn btn-warning btn-sm">ویرایش</a>
               @if(count($children->childrenRecursive)>0)
           
               <button type="button" class="btn btn-gray btn-sm disabled">غیر قابل حذف</button>
               @else
               <form class="d-inline" action="{{route('categories.destroy',$children->id)}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="btn btn-warning btn-sm" value="حذف">
              </form>             
                @endif
             </td>






             @if ($children->childrenRecursive)
               @include('backend.categories.catlist-partial',['catchild'=>$children,'level'=>$level+2,'list'=>'list'])  
             @endif

            </tr>
@endforeach


@endif



@if(isset($edit))






@foreach ($catchild->childrenRecursive as $children)

@if($show == 'disabled')

@else
          @if($children->id == $cat->id)
              @php($show='disabled')
            @else
              @php($show='')
            @endif

@endif
            
<option value="{{$children->id}}" @if($cat->parent_id == $children->id) selected @endif {{$show}}>{{str_repeat("---",$level)}} {{$children->title}}</option>
            
            {{-- <option value="{{$children->id}}" @if($cat->parent_id == $children->id) selected @endif @if($children->id == $cat->id || $children->parent_id==$cat->id) disabled @endif>{{str_repeat("---",$level)}} {{$children->title}}</option> --}}
             @if (count($children->childrenRecursive)>0)
               @include('backend.categories.catlist-partial',['catchild'=>$children,'show'=>$show,'level'=>$level+2,'edit'=>'edit'])  
             @endif

@endforeach





@endif


@if(isset($create))




@foreach ($catchild->childrenRecursive as $children)


            <option value="{{$children->id}}">{{str_repeat("---",$level)}} {{$children->title}}</option>

             @if (count($children->childrenRecursive)>0)
               @include('backend.categories.catlist-partial',['catchild'=>$children,'level'=>$level+2,'create'=>'create'])  
             @endif

@endforeach



@endif

