@extends('layouts.app')

@section('content')
<h2>Dépenes par Année et par Catégorie</h2>
<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Année</th>
            <th>Catégorie</th>
            <th>Total Dépenses</th>
        </tr>
    </thead>
    <tbody>
        @foreach($depensesParAnneeEtCategorie as $depense)
            <tr>
                <td>{{ $depense->annee }}</td>
                <td>{{ $depense->categorie }}</td>
                <td>{{ number_format($depense->total_depenses, 2) }} DH</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
