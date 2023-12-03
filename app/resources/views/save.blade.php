<div class="card-wrapper" data-popup>
    <div class="save-product card">
        <div>
            <h2>
                @if($method == 'POST') Добавить продукт @endif
                @if($method == 'PUT') Редактировать {{$product->name}} @endif

            </h2>
            <form class="add-product-form" action="{{$route}}" method='POST' name="addProductForm">
                @csrf
                @method($method)
                <label class="product-item">Артикул
                    <input type="text" name="article"
                           @isset($product) value="{{$product->article}}" @endisset
                           @if(!$isAdmin) readonly @endif
                           pattern="^[a-zA-Z0-9]+$"
                           required
                           maxlength="255"
                    />
                </label>
                <label class="product-item">Название
                    <input type="text" name="name"
                       @isset($product) value="{{$product->name}}" @endisset
                       required
                       minlength="10"
                       maxlength="255"
                    />
                </label>
                <label class="product-item">Статус
                    <select name="status">
                        <option value="available"
                                @isset($product) @if($product->status == 'available') selected @endif @endisset
                        />
                            Доступен</option>
                        <option value="unavailable"
                                @isset($product) @if($product->status == 'unavailable') selected @endif @endisset
                        />
                            Не доступен</option>
                    </select>
                </label>

                <h3>Атрибуты</h3>
                @isset($product->data)
                    @foreach($product->data as $key => $value)
                        <x-forms.attributes :key="$key"
                                            :value="$value"/>
                    @endforeach
                @endisset
                <button class="btn-add-atr" type="button" data-btnAdd>+ Добавить атрибут</button>

                <button class="add-button add-button_edit" type="submit">
                    @if($method == 'POST') Добавить @endif
                    @if($method == 'PUT') Сохранить @endif
                </button>
            </form>
        </div>

        <button class="btn-icon btn-close" type="button" data-popup-close>Закрыть</button>

        <div hidden data-add-attribute>
            <x-forms.attributes :key="null"
                                :value="null"/>
        </div>

    </div>
</div>
