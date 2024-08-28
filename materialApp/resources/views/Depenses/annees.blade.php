<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Total des Dépenses par Année') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Année</th>
                <th>Total Dépenses</th>
            </tr>
        </thead>
        <tbody>
            @foreach($depensesParAnnee as $depense)
                <tr>
                    <td>{{ $depense->annee }}</td>
                    <td>{{ number_format($depense->total_depenses, 2) }} DH</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
</x-app-layout>




{{-- @extends('layouts.app')

@section('content')
<h2>Total des Dépenses par Année</h2>
<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Année</th>
            <th>Total Dépenses</th>
        </tr>
    </thead>
    <tbody>
        @foreach($depensesParAnnee as $depense)
            <tr>
                <td>{{ $depense->annee }}</td>
                <td>{{ number_format($depense->total_depenses, 2) }} DH</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection --}}

