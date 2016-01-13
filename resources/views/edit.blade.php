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
                    <input type="text" class="form-control"   value="{!! $pro_details[0]->description!!}"
                           name="description1" placeholder="Description"/>
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
            </div>
            <div class="modal-footer">

                <button type="submit" id="update" class="btn btn-primary" >
                    Update
                </button>
            </div>
            {!! Form::close() !!}

    </div>
    </div>
    @endsection


