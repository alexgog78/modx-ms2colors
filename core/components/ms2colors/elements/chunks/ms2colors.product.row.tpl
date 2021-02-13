<ul class="mt-2">
    {if $_pls['ms2colors_common.id']?}
        <li>
            {'ms2colors_color_common' | lexicon}:
            <img src="{$_pls['ms2colors_common.image']}" width="12" height="12">
            {$_pls['ms2colors_common.name']}
        </li>
    {/if}
    {if $_pls['ms2colors_collection.id']?}
        <li>
            {'ms2colors_color_collection' | lexicon}:
            <img src="{$_pls['ms2colors_collection.image']}" width="12" height="12">
            {$_pls['ms2colors_collection.name']}
        </li>
    {/if}
</ul>
