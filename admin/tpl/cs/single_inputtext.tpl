{* single_checkbox.tpl.html debug_print_var *}
{if isset($p) && is_array($p)}





{if $label}
<label for="input_{$p.id}" class="form-label{if isset($p.class_add_label)} {$p.class_add_label}{/if}">{$label}</label>
{/if}
<input  type="text"
 class="form-control bg-white{if isset($p.class_add)} {$p.class_add}{/if}"
 {if isset($p.id)} id="input_{$p.id}"{/if}
 {if isset($options) && is_array($options)} list="datalistOptions_{$p.id}"{/if}
 {if isset($dataset) && is_array($dataset)}
 {foreach $dataset as $key=>$item}
 data-{$key}="{$item}"
 {/foreach}
 {/if}
 value="{$p.value}"
 {if isset($p.isDisabled) && $p.isDisabled eq 1} disabled{/if}
 {if isset($p.isReadonly) && $p.isReadonly eq 1} readonly{/if}

 placeholder="Type{if isset($options) && is_array($options)} | Select{/if} ...">

<datalist id="datalistOptions_{$p.id}">
  <option value="#formatter">
  <option value="#null">
  <option value="#custom">

    {if isset($options) && is_array($options)}
    {foreach $options as $key=>$item}
    <option value="{$item}">
    {/foreach}
    {/if}

</datalist>



{else}
@
{/if}
