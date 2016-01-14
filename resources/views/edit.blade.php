@extends('layout.profile')
@section('content')
    <div class="row">
        <div class="col-md-12">
            {!!  Form::open(array('class'=> 'form-horizontal','autocomplete' => 'off', 'id' => 'editProjectForm','role' => 'form',  'route'=> array('edit', $pro_details[0]->project_id)))!!}

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{!! $pro_details[0]->title !!}"
                           name="pro-title-e" placeholder="Title"/>
                </div>
            </div>
             <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control"
                           name="description1" placeholder="Description">{!! $pro_details[0]->description!!}</textarea>
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="Category" >Category</label>
                <div class="col-sm-10">
                    <select  name="category1" class="form-control">
                        @foreach($category as $cat) {
                        @if($pro_details[0]->category_id == $cat->category_id)
                        <option selected value="{!!  $cat->category_id !!}"> {!! $cat->name !!}  </option>
                        @else
                        <option value="{!!  $cat->category_id !!}">{!!  $cat->name !!} </option>
                        @endif
                        @endforeach
                        }
                         </select>
                </div>
                 <script>
                     function funk(){
                         alert("will you delete the project? ");

                     }
                 </script>
            </div>
            <div class="modal-footer">

            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-10">
                    <button type="submit" id="delete" onclick="funk()" class="btn btn-m btn-danger pull-left" >
                        Delete
                    </button>
                    <button type="submit" id="update" class="btn btn-primary pull-right" >
                        Update
                    </button>
                </div>
            </div>


            </div>
            {!! Form::close() !!}

    </div>
    </div>
    @endsection


