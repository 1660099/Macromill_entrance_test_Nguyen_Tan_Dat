@extends('page.admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title" style="width: 90%">List Category</h3>
                    <div style="float:right;width: 10%;">
                        <a href="{{ route('category.create') }}" style="background-color: #3c8dbc;color: white;padding: 5px 10px">Add Category</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Short Description</th>
                                <th>Parent Category</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $category as $val )
                            <tr>
                                <td>{{ $val->name ?? '' }}</td>
                                <td>{{ $val->short_description ?? '' }}</td>
                                <td>{{ $val->parentCategory->name ?? '' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="float: right">
                        {{ $category->appends($_GET)->links() }}
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection