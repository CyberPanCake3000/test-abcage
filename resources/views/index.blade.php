@extends('layout.app')

@section('content')
    <div class="py-3">
        Доступные даты для просмотра заказов: 01.01.2021 - 06.02.2021
    </div>
    <div class="py-3">
        Для просмотра цен на товары в заданный день выберите дату и нажмите "Поиск"
    </div>
    <form class="d-flex" action="{{ route('getProducts') }}" method="POST">
        @csrf
        <div class="col-2 me-2">
            <input class="form-control" name="date" type="date" value="{{ $date }}" aria-label="Выберите дату"/>
        </div>
        <button class="btn btn-primary col-1" type="submit">Поиск</button>
    </form>

    @if(count($stocks) == 0)
        <div class="py-3">
            <div class="bg-dark bg-opacity-25 col-12 col-md-6 p-4 rounded-3">
                Тут пока нет заказов
            </div>
        </div>
    @else
    <div class=" py-3">
            <div class="col-12 col-md-6 bg-white rounded-3 p-4">
                <div class="row border-bottom">
                    <div class="col-2">id</div>
                    <div class="col-3">name</div>
                    <div class="col-3">amount</div>
                    <div class="col-4">current price</div>
                </div>
                @foreach($stocks as $stock)
                    <div class="row">
                        <div class="col-2">
                            {{ $stock->getProduct->id }}
                        </div>
                        <div class="col-3">
                            {{ $stock->getProduct->name }}
                        </div>
                        <div class="col-3">
                            {{ $stock->amount }}
                        </div>
                        <div class="col-4">
                            {{ $stock->selling_price }}
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @endif

@endsection
