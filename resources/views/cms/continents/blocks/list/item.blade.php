<?php /** @var \App\Models\Continent $continent */ ?>
<tr>
    <th scope="row">{{ link_to(route('cms.continents.edit', ['continent' => $continent->id]), $continent->id) }}</th>
    <th>{{ link_to(route('cms.continents.edit', ['continent' => $continent->id]), $continent->name) }}</th>
    <td>@date($continent['created_at'])</td>
</tr>
