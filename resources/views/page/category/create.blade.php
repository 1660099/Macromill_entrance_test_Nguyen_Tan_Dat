@extends('page.admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Category</h3>
                </div>
                <div class="box-body">
                    <form action='{{ route('category.store') }}' method="post">
                        @csrf
                        <div class="form-control-lg">
                            <label for="category_name">Name</label>
                            <input type='text' id="category_name" name="name" placeholder='Category Name' class='form-control input-sm' />
                        </div>

                        <div class="form-control-lg">
                            <label for="category_name">Short Description</label>
                            <textarea id="short_description" name="short_description" placeholder='Short Description' class='form-control input-sm'></textarea>
                        </div>

                        <div class="form-control-lg">
                            <label for="sub_id">Sub Category</label>
                            <select id="sub_id" name="sub_id" class='form-control input-sm'>
                                <option value="">---</option>
                                @foreach( $category as $item )
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br/>

                        <div class="form-control-lg" style="width: 20%;float: right;">
                            <input type="submit" name="submit" class='form-control input-sm' style="background-color: #3c8dbc;color: white" />
                        </div>
                    </form>
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection