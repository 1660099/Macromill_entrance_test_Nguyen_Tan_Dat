@extends('page.admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Product</h3>
                </div>
                <div class="box-body">
                    <form action='{{ route('product.store') }}' method="post">
                        @csrf
                        <div class="form-control-lg">
                            <label for="category_name">Name</label>
                            <input type='text' id="category_name" name="name" placeholder='Product Name' class='form-control input-sm' />
                        </div>

                        <div class="form-control-lg">
                            <label for="short_description">Short Description</label>
                            <textarea id="short_description" name="short_description" placeholder='Short Description' class='form-control input-sm'></textarea>
                        </div>

                        <div class="form-control-lg">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class='form-control input-sm'>
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