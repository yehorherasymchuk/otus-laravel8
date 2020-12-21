<?php /** @var \App\Models\Country $country */ ?>
<tr>
    <th scope="row">{{ link_to(route('cms.countries.show', ['country' => $country->id, 'locale' => App::getLocale()]), $country->id) }}</th>
    <th>{{ link_to(route('cms.countries.show', ['country' => $country->id, 'locale' => App::getLocale()]), $country->name) }}</th>
    <td>@date($country['created_at'])</td>
</tr>
