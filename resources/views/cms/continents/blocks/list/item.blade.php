<?php /** @var \App\Models\Continent $continent */ ?>
<tr>
    <th scope="row">{{ link_to(route('cms.continents.edit', ['continent' => $continent->id, 'locale' => $locale]), $continent->id) }}</th>
    <th>{{ link_to(route('cms.continents.edit', ['continent' => $continent->id, 'locale' => $locale]), $continent->name) }}</th>
    <td>@date($continent['created_at'])</td>
</tr>
