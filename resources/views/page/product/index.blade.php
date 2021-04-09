@extends('page.admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="width: 90%">List Product</h3>
                    <div style="float:right;width: 10%;">
                        <a href="{{ route('product.create') }}" style="background-color: #3c8dbc;color: white;padding: 5px 10px">Add Product</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <form method="get">
                        <div>
                            <label for="category_filter">Filter:</label>
                            <select id="category_filter" name="category_filter" style="width: 200px">
                                <option value="">---</option>
                                @foreach($category as $item)
                                    <option value="{{ $item->id }}" {{ $request->category_filter == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="submit" value="Filter" style="margin-left: 30px">
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Category</th>
                            <th>Date Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $producct as $val )
                            <tr>
                                <td>{{ $val->name ?? '' }}</td>
                                <td>{{ $val->short_description ?? '' }}</td>
                                <td>{{ $val->category->name ?? '' }}</td>
                                <td>{{ $val->updated_at ?? '' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="float: right">
                        {{ $producct->appends($_GET)->links() }}
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection