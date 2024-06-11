{* single_checkbox.tpl.html *}
{if isset($p) && is_array($p)}



<span class="badge text-bg-secondary{if isset($p.class_add)} {$p.class_add}{/if}"
 {if isset($dataset) && is_array($dataset)}
 {foreach $dataset as $key=>$item}
 data-{$key}="{$item}"
 {/foreach}
 {/if}>
{$colData.id}
</span>

{else}
@
{/if}

