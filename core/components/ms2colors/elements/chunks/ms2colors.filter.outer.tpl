{var $key = $table ~ $delimeter ~ $filter}
<fieldset id="mse2_{$key}">
    <h4 class="filter_title">{('mse2_filter_' ~ $filter) | lexicon}</h4>
    {$rows}
</fieldset>
