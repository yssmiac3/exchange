<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-9xl mx-auto sm:px-6 lg:px-x">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="all-transactions-table" class="table table-xs">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('User id') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Converted from') }}</th>
                                    <th>{{ __('Converted to') }}</th>
                                    <th>{{ __('Date') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <th>{{ $transaction['id'] }}</th>
                                        <th>{{ $transaction['user_id'] }}</th>
                                        <th>{{ $transaction['name'] }}</th>
                                        <th>{{ $transaction['converted_from'] }}</th>
                                        <th>{{ $transaction['converted_to'] }}</th>
                                        <th>{{ $transaction['date'] }}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                </div>
        </div>
    </div>
</x-app-layout>
