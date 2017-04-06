<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 76683-->
<!-- * Date: 2017/1/21-->
<!-- * Time: 11:26-->
<!-- */-->

<div class="project-modal col-md-4 col-lg-3">
    <div class="thumbnail">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default modal-trigger" data-toggle="modal" data-target="#myModal-focusBrands">
            添加关注品牌
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal-focusBrands" tabindex="-1" role="dialog" aria-labelledby="myModal-focusBrandsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="myModal-focusBrandsLabel">添加关注品牌</h3>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'focusBrand.store','method'=>'POST','files'=>'true']) !!}
                @if($brands)
                <ul class="list-group">
                    <li class="list-group-item"><span>品牌</span></li>
                    @if(count($brands)==0)
                    <div class="form-group">你已经关注了全部品牌</div>
                    @endif
                    {!! Form::input('text','searchBrand',null,['claee'=>'form-control-feedback','placeholder'=>'搜索你想关注得品牌','id'=>'searchBrand']) !!}
                    @foreach($brands as $brand)
                    <li class="showBrands list-group-item">
                        <div class=" form-group">
                            {!! Form::input('checkbox','brandid[]',$brand->brandid,['class'=>'checkbox-inline','id'=>'box'.$brand->brandid]) !!}
                            {!! Form::label('box'.$brand->brandid,$brand->name,['class'=>'form-control-static']) !!}
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
                @include('errors.errors')
                <div class="modal-footer">
                    {!! Form::submit('添加关注品牌',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>