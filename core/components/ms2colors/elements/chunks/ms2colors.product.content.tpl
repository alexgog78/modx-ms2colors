<div class="form-group row align-items-center">
    <label class="col-6 col-md-3 text-right text-md-left col-form-label">{'ms2colors_color_common' | lexicon}:</label>
    <div class="col-6 col-md-9">
        {if $_modx->resource.ms2colors_common_id}
            <img src="{$_modx->resource.ms2colors_common_image}" width="12" height="12">
            {$_modx->resource.ms2colors_common_name}
        {/if}
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-6 col-md-3 text-right text-md-left col-form-label">{'ms2colors_color_collection' | lexicon}:</label>
    <div class="col-6 col-md-9">
        {if $_modx->resource.ms2colors_collection_id}
            <img src="{$_modx->resource.ms2colors_collection_image}" width="12" height="12">
            {$_modx->resource.ms2colors_collection_name}
            [[+ms2colors_collection.name]]
        {/if}
    </div>
</div>
