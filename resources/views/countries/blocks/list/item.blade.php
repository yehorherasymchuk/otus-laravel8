<?php /** @var \App\Models\Country $country */ ?>
<tr>
    <th scope="row">{{ link_to(route('cms.countries.show', ['country' => $country->id, 'locale' => $locale]), $country->id) }}</th>
    <th>{{ link_to(route(CMSRoutes::CMS_COUNTRIES_SHOW, ['country' => $country->id, 'locale' => $locale]), $country->name) }}</th>
    <td>@date($country['created_at'])</td>
</tr>
