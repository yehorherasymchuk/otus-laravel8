<?php /** @var \App\Models\Country $country */ ?>
<tr>
    <th scope="row">{{ link_to(route('cms.countries.show', ['country' => $country->id]), $country->id) }}</th>
    <th scope="row">{{ $country->continent->name }}</th>
    <th>{{ link_to(route('cms.countries.show', ['country' => $country->id]), $country->name) }}</th>
    <th scope="row">{{ $country->cities->count() }}</th>
    <td>@date($country['created_at'])</td>
</tr>
