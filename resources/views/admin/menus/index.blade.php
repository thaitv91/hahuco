@extends('layouts.admin')

<style type="text/css">
    p { margin-top:0; font-size:0.97em; }

    ul, li {
        list-style-type:none;
        /*color:#fff;*/
        /*border:1px solid #3f3f3f;*/
    }

    /*ul, #sTree2, #sTreePlus { padding:0; background-color:#151515; }*/
    /*.x_content ul, #sTree2, #sTreePlus { padding:0; background-color:#151515; }*/
    .x_content ul, #sTree2, #sTreePlus { padding:0; background-color:#ecf0f5; }

    #sTree2 li{
        padding-left:50px;
        margin:5px; border:1px solid #f3f3f3;
        /*margin:5px; border:1px solid #3f3f3f;*/
        /*background-color:#3f3f3f;*/
        background-color:#f3f3f3;
    }

    .x_content ul, .x_content li {
        /*border:1px solid #3f3f3f;*/
        border:1px solid #ecf0f5;
        color : #333;
        /*color : #fff;*/
    }

    li div {
        padding:7px;
        background-color:#f9f9f9;
        /*background-color:#555;*/
    }

    li, ul, div { border-radius: 3px; }

    #sTree2, #sTreePlus { margin:10px auto; }

    .btn-xs {
        margin-right: 5px;
    }
</style>

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="">

            <div class="box-header with-border">
                <h3 class="box-title">Menu: {{ $menu->name }}</h3>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading bg-red" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="d-block text-white" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Trang
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ul class="list-check">
                                        @foreach($pages as $page)
                                        <li>
                                            <input type="checkbox" id="menu-{{ $page->id }}"/>
                                            <input type="hidden" name="menu-item[{{ $page->id }}][title]" value="{{ $page->title }}">
                                            <input type="hidden" name="menu-item[{{ $page->id }}][url]" value="/{{ $page->slug }}">
                                            <label for="menu-{{ $page->id }}">{{ $page->title }}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <button class="btn btn-block btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading bg-green" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed d-block text-white" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Chuyên mục sản phẩm
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ul class="list-check">
                                        @foreach($terms as $term)
                                            <li>
                                                <input type="checkbox" id="menu-{{ $term->id }}"/>
                                                <input type="hidden" name="menu-item[{{ $term->id }}][title]" value="{{ $term->name }}">
                                                <input type="hidden" name="menu-item[{{ $term->id }}][url]" value="/{{ $term->slug }}">
                                                <label for="menu-{{ $term->id }}">{{ $term->name }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <button class="btn btn-block btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading bg-aqua" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed d-block text-white" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Liên kết tùy chỉnh
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Liên kết 1" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Liên kết 2" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Liên kết 3" />
                                    </div>
                                    <button class="btn btn-block btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh mục menu</h3>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="panel-group" id="accordion-menu" role="tablist" aria-multiselectable="true">
                                {{--@foreach ($menuItems as $key => $item)--}}
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading bg-aqua" role="tab" id="menu-item-{{ $item->id }}">--}}
                                        {{--<h4 class="panel-title">--}}
                                            {{--<a class="collapsed d-block text-white" role="button" data-toggle="collapse" data-parent="#accordion-menu" href="#collapseMenu-{{ $item->id }}" aria-expanded="false" aria-controls="collapseThree">--}}
                                                {{--{{ $item->name }}--}}
                                            {{--</a>--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}

                                    {{--<div id="collapseMenu-{{ $item->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="menu-item-{{ $item->id }}">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Item Label</label>--}}
                                                {{--<input type="text" name="" value="{{$item->name}}" class="form-control" placeholder="Label" />--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Url</label>--}}
                                                {{--<input type="text" name="" value="{{$item->link}}" class="form-control" placeholder="URL" />--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Index</label>--}}
                                                {{--<input type="text" class="form-control" placeholder="Index" />--}}
                                            {{--</div>--}}
                                            {{--<button class="btn btn-block btn-primary">Update</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@endforeach--}}
                                <ul class="sTree2 listsClass" id="sTree2">
                                    {!! $html !!}
                                </ul>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
        });

        var options = {

            onChange: function( cEl )
            {
                $.ajax({
                    url : '{{ route("menu_manager.updateOrder") }}',
                    data : { items : $('#sTree2').sortableListsToArray() }
                }).done(function (data) {
                    if (!data) {
                        toastr.error('Oops! Error, please refresh page and try again');
                    }
                });
            },
            complete: function( cEl )
            {
                // console.log( $('#sTree2').sortableListsToArray());
            },
            isAllowed: function( cEl, hint, target )
            {
                // Be carefull if you test some ul/ol elements here.
                // Sometimes ul/ols are dynamically generated and so they have not some attributes as natural ul/ols.
                // Be careful also if the hint is not visible. It has only display none so it is at the previouse place where it was before(excluding first moves before showing).
                if( target.data('module') === 'c' && cEl.data('module') !== 'c' )
                {
                    hint.css('background-color', '#3c8dbc');
                    // hint.css('background-color', '#ff9999');
                    return false;
                }
                else
                {
                    hint.css('background-color', '#3c8dbc');
                    return true;
                }
            },
            opener: {
                active: true,
                as: 'html',  // if as is not set plugin uses background image
                close: '<i class="fa fa-minus c3"></i>',  // or 'fa-minus c3',  // or './imgs/Remove2.png',
                open: '<i class="fa fa-plus"></i>',  // or 'fa-plus',  // or'./imgs/Add2.png',
                openerCss: {
                    'display': 'inline-block',
                    //'width': '18px', 'height': '18px',
                    'float': 'left',
                    'margin-left': '-35px',
                    'margin-right': '5px',
                    //'background-position': 'center center', 'background-repeat': 'no-repeat',
                    'font-size': '1.1em'
                }
            },
            insertZone: 50,
            ignoreClass: 'clickable',
            insertZonePlus: true,
            // listSelector: 'ol',
            // hintWrapperClass: 'hintClass',
            // hintWrapperCss: {'background-color':'green', 'border':'1px dashed white'}
        };

        // $('.sortableLists').sortableLists( options );
        $('#sTree2').sortableLists( options );

        $('#form-create-menu-item').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url : '{{ route("menu_manager.createMenuItem") }}',
                data : $('#form-create-menu-item').serialize(),
                type : 'GET'
            }).done(function (item) {
                if (item == 0) {
                    toastr.error('Name cannot be null');

                    return false;
                }

                var li = $('<li>', {
                    id : item.id,
                }).appendTo($('#sTree2'));

                var div = $('<div>').appendTo(li);

                var span_name = $('<span>', {
                    text : item.name,
                    class : 'item_name',
                    id : 'item_name_'+item.id
                }).appendTo(div);

                if (item.status == 0) {
                    $('<i>', {text:' (Hidden)'}).appendTo(span_name);
                }

                var span_link = $('<span>', {
                    id : 'item_link_'+item.id,
                    text : ' - ('+item.link + ')'
                }).appendTo(div);

                var a = $('<a>', {
                    text : 'Remove',
                    class : 'btn btn-danger btn-xs clickable pull-right remove-menu-item',
                    href : item.detailMenuItemUrl
                }).appendTo(div);

                var a = $('<a>', {
                    text : 'Edit',
                    class : 'btn btn-warning btn-xs clickable pull-right edit-menu-item',
                    href : item.detailMenuItemUrl
                }).appendTo(div);
            });
            // $('#form-create-menu-item')[0].reset();
            $('#modal-create').modal('hide');
            toastr.success('Create success');
        });

        $('#modal-create').on('hidden.bs.modal', function () {
            $('#form-create-menu-item')[0].reset();
        });

        $(document).on('click','.edit-menu-item', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url : url,
                type : 'GET'
            }).done(function (item) {
                if (item) {
                    $('#edit-menu-item-status').val(item.status);
                    $('#edit-menu-item-name').val(item.name);
                    $('#edit-menu-item-li-class').val(item.li_class);
                    $('#edit-menu-item-icon').val(item.icon);
                    $('#edit-menu-item-link').val(item.link);
                    $('#edit-menu-item-a-class').val(item.a_class);
                    $('#edit-menu-item-id').val(item.id);
                    $('#modal-edit').modal('show');
                } else {
                    alert('Error');
                }
            });
        });

        $('#form-edit-menu-item').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url : "{{ route('menu_manager.updateMenuItem') }}",
                data : $('#form-edit-menu-item').serialize() ,
                type : 'POST'
            }).done(function(item) {
                if (item == 0) {
                    toastr.error('Name cannot be null');
                    return false;
                }

                $('#item_name_'+item.id).find('i').remove();
                $('#item_name_'+item.id).text(item.name);
                $('#item_link_'+item.id).text(' - ('+item.link+')');
                if (item.status == 0) {
                    $('<i>', {text:' (Hidden)'}).appendTo($('#item_name_'+item.id));
                }
                toastr.success('Update success');
            });
            $('#modal-edit').modal('hide');
        })

        $(document).on('click', '#update-menu-item' ,function(e) {
            e.preventDefault();
            $.ajax({
                url : "{{ route('menu_manager.updateMenuItem') }}",
                data : $('#form-edit-menu-item').serialize() ,
                type : 'POST'
            }).done(function(item) {
                if (item == 0) {
                    toastr.error('Name cannot be null');
                    return false;
                }

                $('#item_name_'+item.id).find('i').remove();
                $('#item_name_'+item.id).text(item.name);
                $('#item_link_'+item.id).text(' - ('+item.link+')');
                if (item.status == 0) {
                    $('<i>', {text:' (Hidden)'}).appendTo($('#item_name_'+item.id));
                }
            });
            $('#modal-edit').modal('hide');
        });

        $(document).on('click', '.remove-menu-item' ,function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url : url,
                type : 'GET'
            }).done(function (item) {
                if (item != 0) {
                    $('#link-delete').attr('menu-item-id', item.id);
                    $('#modal-delete').modal('show');
                } else {
                    alert('Error');
                }
            });
        });

        $('#link-delete').on('click', function(e) {
            e.preventDefault();
            var menu_item_id = $(this).attr('menu-item-id');

            $.ajax({
                url : "{{ route('menu_manager.removeMenuItem') }}",
                data : {menu_item_id : menu_item_id},
                type : 'POST'
            }).done(function(status) {
                if (status == 0) {
                    alert('Remove item error');
                } else {
                    $('#'+menu_item_id).remove();
                    toastr.success('Remove success');
                }
            });
            $('#modal-delete').modal('hide');
        });
    </script>
@endsection
