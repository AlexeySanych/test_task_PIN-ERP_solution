<div data-popup class="card-wrapper">
    <div class="card product">
        <div class="product__body">
            <h2>{{$product->name}}</h2>

            <table class="product__table">
                <thead>
                <tr>
                    <th>Артикул</th>
                    <th>Название</th>
                    <th>Статус</th>
                    <th>Атрибуты</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{$product->article}}</th>
                    <th>{{$product->name}}</th>
                    <th>
                        @if($product->status == 'available')Доступен@endif
                        @if($product->status == 'unavailable')Не доступен@endif
                    </th>
                    <th>
                        @if($product->data)
                            @foreach($product->data as $key=>$value)
                                <p>{{$key}}: {{$value}}</p>
                            @endforeach
                        @endif
                    </th>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="btn-block">
            <button class="btn-icon btn-edit" type="button" data-href="{{route('edit', $product->id)}}" data-popup-close>Изменить</button>
            <form class="product__delete-btn" action="{{route('destroy', $product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn-icon btn-delete" type="submit">Delete</button>
            </form>
            <button class="btn-icon btn-close" type="button" data-popup-close>Закрыть</button>
        </div>
    </div>
</div>
