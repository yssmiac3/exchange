<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exchange') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-9xl mx-auto sm:px-6 lg:px-x">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Updated at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <th scope="row">{{ $record['id'] }}</th>
                                <th>{{ $record['currency'] }}</th>
                                <th>{{ $record['amount'] }}</th>
                                <th>{{ $record['updated_at'] }}</th>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <form action="{{route('doExchange')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="currency_from">Enter the currency to convert from</label>
                            <select class="form-control" name="currency_from" id="currency_from">
                                @foreach($currencies as $currency)
                                    <option>{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Enter amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" value=0>
                        </div>
                        <div class="form-group">
                            <label for="currency_to">Enter the currency to convert to</label>
                            <select class="form-control" name="currency_to" id="currency_to">
                                @foreach($currencies as $currency)
                                    <option>{{ $currency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
