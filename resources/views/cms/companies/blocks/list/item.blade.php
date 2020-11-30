<?php /** @var \App\Models\Company $company */ ?>
<tr>
    <th scope="row">{{ $company->id }}</th>
    <th>{{ $company->name }} {{ $company->city->name }} {{ $company->city->country->name }} {{  $company->city->country->cities->count() }}</th>
    <th>{{ $company->url }}</th>
    <td>@date($company->created_at)</td>
</tr>
