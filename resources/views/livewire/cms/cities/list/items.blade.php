<?php /** @var \App\Models\City[]|\Illuminate\Pagination\LengthAwarePaginator $cities */ ?>
<tbody>
    @foreach($cities as $city)
        <tr>
            <td class="border px-4 py-2">{{ $city->id }}</td>
            <td class="border px-4 py-2">{{ $city->name }}</td>
            <td class="border px-4 py-2">{{ $city->slug }}</td>
            <td class="border px-4 py-2">{{ __('cms.cities.status.' . $city->status) }}</td>
            <td class="border px-4 py-2">{{ $city->created_at->format('Y.m.d H:i') }}</td>
        </tr>
    @endforeach
</tbody>
